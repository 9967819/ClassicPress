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
					get_template_part( 'template-parts/post/content', 'excerpt' );
				endwhile;

				the_posts_navigation();
			else :
				get_template_part( 'template-parts/post/content', 'none' );
			endif;
			?>

</div><!-- #content -->
<?php
get_footer();
?>
