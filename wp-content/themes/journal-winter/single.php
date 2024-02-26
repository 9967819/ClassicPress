<?php
get_header(); 
?>

<div class="wrap">
	<div id="primary" class="content-area">
			<?php
			get_template_part( 'template-parts/post/content', get_post_format() );
			?>
	</div>
</div>

<?php
get_footer();
?> 
