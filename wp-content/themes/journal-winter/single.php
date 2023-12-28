<?php

get_header(); 
?>

<div class="wrap">
	<div id="primary" class="content-area">
			<?php
			get_template_part( 'template-parts/post/content', get_post_format() );

			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			?>
	</div>
</div>

<?php
get_footer();
