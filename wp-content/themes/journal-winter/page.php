<?php
get_header(); 
?>

<div class="wrap">
	<div id="primary" class="content-area">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/page/content', 'page' );

			endwhile; // End of the loop.
			?>
	</div>
</div>
</div>
</div>
</div>
<?php
get_footer();
