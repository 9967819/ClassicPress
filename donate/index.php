<?php
define('WP_USE_THEMES', true);
require_once(dirname(__FILE__) . '/../wp-load.php');
require_once(dirname(__FILE__) . '/../wp-includes/class-simplepie.php');
get_header();
$rss = fetch_feed('https://open-neurosecurity.org/forum/index.php?action=.xml;type=rss2'); 
?>
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main entry-content">
		<h2>Faire un don à Applied Human Neurosecurity Journal</h2>


<div class="overlay1">
Choisir un mode de paiement: 

<div class="">
<button type="button" class="button btn-medium"><a href="https://www.paypal.com/paypalme/EtienneRobillard">PayPal</a></button>
<button type="button" class="button btn-medium"><a href="https://buy.stripe.com/eVa16X44B54r7gk5kk">Stripe</a></button>
<button id="interacBtn" type="button" class="button btn-medium"><a href="#">Interac</a></button>
</div>
</div>
    </main>
	</div>
</div>
<?php
get_footer();
?>
