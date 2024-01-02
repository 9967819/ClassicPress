<?php
#error_reporting(E_ALL|E_STRICT);
#setlocale(LC_ALL, 'fr_CA.utf8');

#require_once dirname(__FILE__) . '/wp-config.php';

class Journal 
{
	public $themename = "journal-winter";

	function __construct() {
		ob_start();

		# Wordpress/Classicpress
		require_once dirname(__FILE__) . '/wp-load.php';
		wp();
		require_once dirname(__FILE__) . '/wp-includes/template-loader.php';
	}

	function renderHTML(){
		$html = ob_get_clean();
		return $html;
    }
}

if ( ! isset( $wp_did_header ) ) {

	$wp_did_header = true;
	
	#$enable_tidy = true;
	#$config = array(
	#	'indent' 		=> TRUE,
	#	'output-xhtml'  => FAlSE,
	#	'wrap' 		    => 200);

	// Load the theme template.
	// require_once ABSPATH . WPINC . '/template-loader.php';
	$journal = new Journal();
	echo $journal->renderHTML();
	//$html = tidy_parse_string(ob_get_clean(), $config, 'UTF8');
	//$html->cleanRepair();
	//echo $html;
}
