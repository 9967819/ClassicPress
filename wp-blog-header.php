<?php
#error_reporting(E_ALL|E_STRICT);
setlocale(LC_ALL, 'fr_CA.utf8');

class CustomThemeInstance 
{
	public $themename = "journal";

	function renderHTML(){
		ob_start();

		wp();

		require ABSPATH . WPINC . '/template-loader.php';
    }
}

if ( ! isset( $wp_did_header ) ) {

	$wp_did_header = true;
	
	$enable_tidy = true;
	$config = array(
		'indent' 		=> TRUE,
		'output-xhtml'  => FAlSE,
		'wrap' 		    => 200);

	// Load the ClassicPress library.
	require_once dirname( __FILE__ ) . '/wp-load.php';

	// Load the theme template.
	// require_once ABSPATH . WPINC . '/template-loader.php';
	$theme = new CustomThemeInstance();
	$theme->renderHTML();
	//$html = tidy_parse_string(ob_get_clean(), $config, 'UTF8');
	//$html->cleanRepair();
	//echo $html;
}
