<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php 
wp_head(); 
?>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-QZJECS14WM"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'G-QZJECS14WM');
</script>
</head>
<body class="home blog hfeed has-header-image has-sidebar colors-light">
	<header id="site-header">

		<?php get_template_part( 'template-parts/header/header', 'image' ); ?>

		<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>

	</header><!-- #thismakesnofuckingsense -->

	<?php

	/*
	 * If a regular post or page, and not the front page, show the featured image.
	 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
	 */
	if ( ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
		echo '<div class="single-featured-image-header centered">';
		echo get_the_post_thumbnail( get_queried_object_id(), 'article-image' );
		echo '</div><!-- .single-featured-image-header -->';
	endif;
	?>