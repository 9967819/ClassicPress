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
	aria-controls="top-menu" aria-haspopup="true">


	<a href="#" class="icon" id="toggle-nav-menu" alt="menu">
		<i class="fa fa-bars"></i>
	</a>
	
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'top',
			'menu_id'        => 'top-menu',
			'menu_class'	 => 'menu',
			'container'	 	 => false
		)
	);
?>



</nav><!-- #swslfindfdnefl -->
