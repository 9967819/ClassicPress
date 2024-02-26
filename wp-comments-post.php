<?php
# vim: ts=4:sw=4:et:ai

error_reporting(E_ALL);
/**
 * Handles Comment Post to ClassicPress and prevents duplicate comment posting.
 *
 * @package ClassicPress
 */

if ( 'POST' != $_SERVER['REQUEST_METHOD'] ) {
	$protocol = $_SERVER['SERVER_PROTOCOL'];
	if ( ! in_array( $protocol, array( 'HTTP/1.1', 'HTTP/2', 'HTTP/2.0', 'HTTP/3.0' ) ) ) {
		$protocol = 'HTTP/1.0';
	}

	header( 'Allow: POST' );
	header( "$protocol 405 Method Not Allowed" );
	header( 'Content-Type: text/plain' );
	exit;
}

/** Sets up the ClassicPress Environment. */
require dirname( __FILE__ ) . '/wp-load.php';

nocache_headers();

exit;
