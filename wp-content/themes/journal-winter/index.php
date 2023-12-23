<?php
get_header(); 
?>

<div class="wrap">
<div id="content" class="site-main">
			
			<!-- youtube 2024 embedded playlist -->
			<article class="video grayscale">
			<p>Joyeuses fêtes à tous!
			<i class="red fa-regular fa-face-kiss-wink-heart"></i></p>
			<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/videoseries?si=E4K8xNvFTwbAF0X8&amp;list=PL7Ndnn1jFxfvUyTnLYhJaexNtFUJiTqQZ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
			</article>
	
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
