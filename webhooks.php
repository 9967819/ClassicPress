<?php
# vim: set ts=4:sw=4:et:ai
error_reporting(E_ALL);
define('WP_USE_THEMES', true);

# autoload.php
require_once dirname(__FILE__) . '/wp-load.php';
require_once dirname(__FILE__) . '/wp-includes/post.php';
require_once dirname(__FILE__) . '/wp-includes/pluggable.php';
require_once dirname(__FILE__) . '/wp-includes/comment-template.php';

# smarty:base/header.t
get_header();

$dsn = sprintf("mysql:host=%s;dbname=%s;charset=%s", '127.0.0.1', 'ahnjournal_frontend', 'utf8mb4');

function update_post($data = array(), $options = array(
	'user' => DB_USER, 'password' => DB_PASSWORD, 'table'=> 'wp_posts'), $dsn, $sql) {
	$dbh = new PDO($dsn, $options['user'], $options['password']) or die("snsfeoinwefe asdhns dsoawnd!!!\n");
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

	try {
		$stmt = $dbh->prepare($sql);
		$stmt->execute($data);
	} catch (PDOException $e) {
		throw "SQL error: " . $e->getMessage();
		return false;
	}
	return true;

}

function add_comment_to_post($data, $debug = false) {
    global $dsn;
    $options = array(
	  'user' 	 => DB_USER,
	  'password' => DB_PASSWORD,
	  'table' 	 => 'wp_comments',
	);
	$sql = "insert into wp_comments (comment_post_ID, comment_author, comment_author_email, comment_date, comment_content, comment_approved) values (:comment_post_ID, :comment_author, :comment_author_email, :comment_date, :comment_content, :comment_approved)";
	update_post($data, $options, $dsn, $sql);
	return array('code'=>200, 'saved'=>true, 'status'=>'pending');
}

function add_vote_to_post($postid, $redis, $debug = false) {
	$data = array(
			'code'  => 201, 
			'voted' => false, 
			'debug' => $debug);
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		
	$remoteip = $_SERVER['X_REAL_IP'] ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';
	
	$post = get_post($postid);
	#$has_voted = false;

	# Make sure i can debug the sql part in dev mode
	if ($debug == true) {
		$redis->sRem('clients', $remoteip);
	}
	# current post is a set
	$post_key = sprintf("post_%d", $post_id);
	


	if (! $redis->sIsMember('clients', $remoteip) && 
  	    ! $redis->sIsMember($post_key, $remoteip)){

		$count = intval($post->likes_count) + 1; # n+1
		
		$table = 'wp_posts';
	    $sql = "UPDATE $table SET likes_count=:likes_count WHERE id=:id";
		update_post(array('id' => $post_id, 'likes_count' => $count), 
		  array('user'=>DB_USER, 'password'=>DB_PASSWORD, 'table'=>$table), $dsn); 	
		$data = array(
			"count"  => $post->likes_count, 
			"voted"  => true, 
			"code"   => 200,
			'remote_addr' => $remoteip);

		$redis->sAdd($post_key, $remoteip);	
		$redis->sAdd('clients', $remoteip);
	} else {
		# Client has already voted for this post
		$data = array(
			"voted"       => false, 
			"code"        => 403,
			"message" 	  => "denied",
			"client_addr" => $remoteip);
		if ($debug == true) {
			$data["count"] = intval($post->likes_count);
		}
	}

	$redis->save(); #Save transaction and close redis connection. 
	$redis->close();
	}//REQUEST_METHOD IS POST
	return $data;

}

global $debug;
$debug = true;

#if ($_SERVER['X_REAL_IP'] == '192.168.0.193'){
#	$debug = true;
#}
#
#

if (! empty($_GET['action']) && $_GET['action'] == 'comment') {
	# render the comment form page (text/html)
	$permalink = get_permalink($_GET['postid']);
	$postid = $_GET['postid'];
	$commentform = <<<HTML
<form action="/webhooks.php" method="POST">
	<input type="hidden" name="id" value="{$postid}">
    <input type="hidden" name="action" value="comment">
	<label for="name">Nom (optionel) :</label>
  <input type="text" name="name" required>
	<label for="email">Courriel (optionel) :</label>
  <input type="text" name="email" required>
	<label for="comment">Commentaire :</label>
	<textarea name="comment" rows="10" cols="20">Everybody knows that he is a narcissist desperately trying to maintain the illusion of wisdom and higher intelligence on his tribe at all costs. In other words, narcissists really hates losing the game of deception.</textarea>
	<input type="submit" value="Soumettre mon commentaire" id="submitCommentBtn">
  <input type="reset" value="Effacer" id="resetBtn">
</form>
<script>
const commentBtn = document.getElementById('submitCommentBtn');
</script>
HTML;
	$html = <<<HTML
<div class="wrap">
<div id="content" class="site-main">
	{$commentform}
</div>	
</div>
HTML;
	echo $html;
	get_footer();
	exit;
} 



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$post_id = intval($_POST['id']);
	$action = strval($_POST['action']);
	if ($action == 'default') {
		$json = add_vote_to_post($post_id, REDIS_CLIENT, $debug);
	} elseif ($action == 'comment') {
		$newcomment = array(
		  'comment_post_ID' 	 => $post_id,
		  'comment_author'  	 => strval($_POST['name']),
		  'comment_author_email' => strval($_POST['email']),
		  'comment_date'		 => date("Y-m-d H:i:s"),
		  'comment_content'      => strval($_POST['comment']),
		  'comment_approved'	 => false
		);
		add_comment_to_post($newcomment);
		# must return html because headers already sent.
		$permalink = get_permalink($post_id);
		$link = '<p>' . "<a href=\"$permalink\">Retour</a>" . "</a></p>"; 
		$html = "<p>" . "Merci!" . "</p>";
		$html .= $link;
		http_response_code(200);
		echo $html;
		exit;
	} else {
		$json = array("code"=>500, "error"=>"this should not happen");
    }
	if ($json['code'] == 200){
	# send email notification to admin ! 
	$subject= '[Applied Human Neurosecurity Journal] New user event notification';
	$client = $_SERVER['X_REAL_IP'];
    $message = sprintf("Client %s likes this. (pageId: %s)", $client, $post_id);

	header('Content-Type: application/json; charset=utf-8');
    http_response_code(200);
    echo json_encode($json);

	mail('ahnjournal@open-neurosecurity.org', $subject, $message);
	} else {
	http_response_code(403);
	echo json_encode(array("code" => 403));
	}
}	
exit;
