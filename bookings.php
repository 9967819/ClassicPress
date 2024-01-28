<?php
session_start();
define('WP_USE_THEMES', true);#session_start();
error_reporting(E_ALL);
require_once dirname(__FILE__) . '/wp-load.php';
require_once dirname(__FILE__) . '/wp-includes/post.php';


get_header();


#var_dump($data);
# create a new booking
# steps:
# 1. save user data in table booking_event_contact
#     - name  (required)
#     - email (required)
#     - comment (optional, default=null)
#     - website (optional, default=null)
# 2. add new entry in table booking_event_registrations
$user = DB_USER;
$password = DB_PASSWORD;
$dsn = sprintf("mysql:host=%s;dbname=%s;charset=%s", '127.0.0.1', 'ahnjournal_frontend', 'utf8mb4');
$dbh = new PDO($dsn, $user, $password) or die("snsfeoinwefe asdhns dsoawnd!!!\n");

#KEEP THIS
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

#get or create
function create_new_booking($data = array(), $options = array())
{
	global $dbh;
	$table = 'bookings_event_contact';
	$sql = "INSERT INTO $table (id, name, email, comment, event_id) VALUES (?,?,?,?,?,?)";
	try {
		# create a new booking contact
		$stmt = $dbh->prepare($sql);
		$stmt->execute($data);
	} catch (PDOException $e) {
		echo "Fatal error : " . $e->getMessage();
		return false;
	}
	return true;
}

function get_event_by_date($date, $table = 'bookings_event'){
	global $dbh;
	try {
		$sql = "SELECT * from $table where date=:date";
		$stmt = $dbh->prepare($sql);
		$stmt->execute(['date' => $date]); 
		return $stmt->fetch();
	} catch (PDOException $e) {
		throw PDOException("error: " . $e->getMessage());
	}	
}

function confirm_booking($data, $table = 'bookings_event_reservations'){
	global $dbh;
	$sql = "INSERT INTO $table (booking_event_id, booking_contact_id) VALUES (?,?)"; 
	try {
		$stmt = $dbh->prepare($sql);
		$stmt->execute($data);
		return true
	} catch (PDOException $e){
		throw PDOException("error: " . $e->getMessage());
	}
	return false
}

function get_booking_by_id($pk, $table = 'bookings_event_reservations') {
	global $dbh;
	$stmt = $dbh->query("select * from $table where id=$pk");
	return $stmt->fetch();
}
function render_booking_form($event_data, $redis, $debug = false) {
	# XXX ideally i want to use templates and smarty here bro
	$html = <<<HTML
<div class="wrap">
	<main class="primary" id="main">
		<h3>{$event_data['event_title']}</h3>
		<form action="" method="POST">
			<label for="event_date">Date: </label>
			<input type="text" name="event_date" value="{$event_data['event_date']}">
			<label for="name">Name: </label>
			<input type="text" name="name" required>
			<label for="email">Email: </label>
			<input type="email" name="email" required>
			<label for="comment">Commentaire (optionel): </label>
			<input type="text" name="comment" value="">
			<label for="password">Mot de passe: </label>
			<input type="password" name="password" required>

			<input type="submit" value="Confirmer votre présence">
		</form>
	</main>
</div>
HTML;
	return $html;
}

global $debug;
$debug = true;
if (! empty($_GET['date']) && $_SERVER['REQUEST_METHOD'] == 'GET') {
	# the user provided booking event date: "2024-02-25"
	$event_date = $_GET['date'];
	$event = get_event_by_date($event_date);
	echo render_booking_form($event, REDIS_CLIENT);
} elseif (! empty($_GET['date']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
	# Process POST data here...
	foreach(array('event_date', 'event_title', 'password') as $key){
		unset($_POST[$key]);
	}
	# the contact
	$contact = create_new_booking($_POST);
	if ($contact === true) {
		# new contact saved.
		# update the booking_event_reservations table
		# and send confirmation mail to user and smart
		$booking = confirm_booking(array('booking_event_id'=>);
		if ($booking === true) {
			$msg = "New booking saved. See you soon!";
			echo $msg;
		}
	}
}

get_footer();
?>
