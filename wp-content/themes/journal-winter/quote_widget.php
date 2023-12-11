<?php

$url = 'https://raw.githubusercontent.com/9967819/free-neurosecurity-quotes/main/freethinking.md';

$data = file($url);
$quotes = array();
foreach($data as $line_num => $item){
	# trim to first 3 bytes
	$text = trim($item, "\D.");
	array_push($quotes, $text);
}

$idx = array_rand($quotes);
echo $quotes[$idx];

