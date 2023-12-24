<div class="entry-content">
		<?php twentyseventeen_edit_link( get_the_ID() ); ?>
		<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
					'after'  => '</div>',
				)
			);
			
		?>
</div>
