</div><!-- #page -->
<footer class="site-footer overlay">
       <!-- row 2: flexbox footer-1, footer-2, etc... -->
	   <section class="align-items-center row">
		<?php
			get_template_part( 'template-parts/footer/footer', 'widgets' );
         ?>
       </section>
       <!-- copyright, etc... -->
       <?php
	   		get_template_part( 'template-parts/footer/site', 'quote' );
        ?>
</footer>
</body>
</html>
