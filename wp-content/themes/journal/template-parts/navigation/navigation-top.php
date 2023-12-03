<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>
<nav id="site-navigation" class="main-navigation" aria-label="Top Menu" 
	aria-controls="menu" aria-haspopup="true">

	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'top',
			'menu_id'        => 'top-menu',
			'container'	 	 => false
		)
	);
	?>
</nav><!-- #swslfindfdnefl -->
