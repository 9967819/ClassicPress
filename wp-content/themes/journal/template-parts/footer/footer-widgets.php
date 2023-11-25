<aside class="widget-area">
    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div class="widget-column footer-widget-1">
		<section class="widget" id="logo" style="background-color: #fff; border: 2px solid #000;border-radius: 5px">
            <img alt="#" src="https://open-neurosecurity.org/static/images/logo-default-white-noborder.png" class="brand-logo-small">
		</section>
		<?php
		      dynamic_sidebar( 'sidebar-1' ); 
		?>
    </div>
    <?php endif; ?>
    <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
	<div class="widget-column footer-widget-2">
		<?php dynamic_sidebar( 'sidebar-3' ); ?>
    </div>
    <?php endif; ?>
</aside>
