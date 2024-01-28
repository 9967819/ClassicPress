</div>
<footer class="site-footer overlay" id="footer-snowflakes">
	   <section class="align-items-center row">
		<?php
			get_template_part( 'template-parts/footer/footer', 'widgets' );
         ?>
       </section>
       <?php
	   		get_template_part( 'template-parts/footer/site', 'quote' );
        ?>
</footer>
<!-- Google tag (gtag.js) -->
<script async cross-origin="anonymous" src="https://www.googletagmanager.com/gtag/js?id=G-QZJECS14WM"></script>
			<script>

window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'G-QZJECS14WM');
</script>
<!-- Random quote widget -->
<script async src="/wp-content/themes/journal-winter/assets/js/widgets.js"></script>
<!-- Google Wallet client -->
<script src="/assets/js/google.js"></script>

<!-- Snowflakes -->
<script src="/static/snowflakes.js"></script>
<script>
var snowflakes = new Snowflakes({
color: '#fff', // Default: "#5ECDEF"
container: document.querySelector('footer'), // Default: document.body
count: 100, // 100 snowflakes. Default: 50
minOpacity: 0.1, // From 0 to 1. Default: 0.6
maxOpacity: 0.95, // From 0 to 1. Default: 1
minSize: 4, // Default: 10
maxSize: 10, // Default: 25
rotation: true, // Default: true
speed: 2, // The property affects the speed of falling. Default: 1
wind: false, // Without wind. Default: true
zIndex: 100, // Default: 9999,
autoResize: false // Default: true
});
</script>
</body>
</html>
