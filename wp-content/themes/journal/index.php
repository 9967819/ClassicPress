<?php
get_header(); 
?>

<div class="wrap">
	<div class="site-header">
	<?php if ( is_home() && ! is_front_page() ) : ?>
		<h2 class="page-title"><?php single_post_title(); ?></h2>
	<?php else : ?>
		<h2 class="page-title"><?php _e( 'En manchette', 'ahnjournal' ); ?></h2>
	<?php endif; ?>
	</div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/post/content', 'excerpt' );

				endwhile;
			else :
				get_template_part( 'template-parts/post/content', 'none' );
			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->
</div><!-- #content -->
</div><!-- .site-content -->


<!-- default theme bootstrap script -->
<script src="/wp-includes/js/jquery/jquery.js"></script>
<script src="/wp-content/themes/journal/assets/js/jquery.scrollTo.js"></script>
<script src="/wp-content/themes/journal/assets/js/global.js"></script>
<script src="/wp-content/themes/journal/assets/js/navigation.js"></script>

<?php
get_footer();
?>
