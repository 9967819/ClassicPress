<?php
get_header(); 
?>

<div class="wrap">
<div id="content" class="site-main">

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

</div><!-- #content -->
<?php
get_footer();
?>
