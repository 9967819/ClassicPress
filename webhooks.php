<?php
error_reporting(E_ALL|E_STRICT);
require_once dirname(__FILE__) . '/wp-load.php';
require_once dirname(__FILE__) . '/wp-includes/post.php';

function update_post($data = array(), $options = array())
{
	$user = DB_USER;
	$password = DB_PASSWORD;
	$table = 'wp_posts';
	$dsn = sprintf("mysql:host=%s;dbname=%s;charset=%s", '127.0.0.1', 'ahnjournal_frontend', 'utf8mb4');
	$dbh = new PDO($dsn, $user, $password) or die("snsfeoinwefe asdhns dsoawnd!!!\n");
	

	#KEEP THIS
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
	
	$sql = "UPDATE $table SET likes_count=:likes_count WHERE id=:id";
	try {
		$stmt = $dbh->prepare($sql);
		$stmt->execute($data);
	} catch (PDOException $e) {
		echo "Fatal error updating record: " . $e->getMessage();
		return true;
	}
	return false;

}


function add_vote_to_post($post_id, $redis) {
	//global $redis;
	//$redis->connect('127.0.0.1', 6379);
	var_dump($redis);
	$remoteip = '127.0.0.1';
	$voted = false;
	if (! $redis->sIsMember('clients', $remoteip)){
		$post = get_post($post_id);
		$c = intval($post->likes_count) + 1; # n+1
		$voted = update_post(array('id' => $post_id, 'likes_count' => $c)); 	
	} 	
	if ($voted == true) {
		$json = json_encode(array("result" => "$post->likes_count", 
			"success" => true, "code" => 200));
		$redis->sAdd('clients', $remoteip);
	} else {
		$json = json_encode(array("success" => false, "code" => 403));
	}
	$redis->close(); #Close redis connection. 
	return json_decode($json);
}



if (! empty($_GET['id'])) {
	$post_id = strval($_GET['id']);
	$json = add_vote_to_post($post_id, REDIS_CLIENT);
	#var_dump($json);
	if ($json->code == 200) {
		header('Content-Type: application/json; charset=utf-8');
		http_response_code(200);
		echo $json;
	} else {
		header('Content-Type: text/html; charset=utf-8');
		http_response_code($json->code);
		echo sprintf("<p>Permission denied. (%s)</p>", $json->code);
	}
} else {
	# return error response 400
	http_response_code(400);
	echo "<p>Bad request: Missing required <strong>id</strong> param.</p>";
}
exit;
