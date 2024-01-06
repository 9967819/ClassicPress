<?php
#session_start();
#error_reporting(E_ALL);
require_once dirname(__FILE__) . '/wp-load.php';
require_once dirname(__FILE__) . '/wp-includes/post.php';

#TODO: order_by likes_count (posts with most likes) 
function order_by($data = array(), $options = array())
{
	# XXX move this away 
	$user = DB_USER;
	$password = DB_PASSWORD;
	$table = 'wp_posts';
	# define('DSN', ....);
	$dsn = sprintf("mysql:host=%s;dbname=%s;charset=%s", '127.0.0.1', 'ahnjournal_frontend', 'utf8mb4');
	$dbh = new PDO($dsn, $user, $password) or die("snsfeoinwefe asdhns dsoawnd!!!\n");
	

	#KEEP THIS
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
	$sql = "SELECT * FROM $table ORDER BY likes_count DESC";
	try {
		$data = $dbh->query($sql)->fetchAll();
	} catch (PDOException $e) {
		echo "Fatal error updating record: " . $e->getMessage();
		return null;
	}
	return $data;
} 
