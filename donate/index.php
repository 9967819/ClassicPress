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
<div id="checkout-console" class="overlay1">
Choisir un mode de paiement: 

<button type="button" class="button btn-medium"><a href="https://www.paypal.com/paypalme/EtienneRobillard">PayPal</a></button>
</div>
    </main>
	</div>
</div>
<!-- Google Wallet client/api -->
<script async src="https://pay.google.com/gp/p/js/pay.js"></script>
<script src="/static/assets/google/google.js"></script>

<script>
const paymentsClient = new google.payments.api.PaymentsClient({environment: 'TEST'});
paymentsClient.isReadyToPay(isReadyToPayRequest)
    .then(function(response) {
if (response.result) {
				const googleBtn =
					paymentsClient.createButton({
						onClick: () => console.log('TODO: click handler'),
    				allowedPaymentMethods: []}); // same payment methods as for the loadPaymentData() API call
				document.getElementById('checkout-console').appendChild(googleBtn);
			}
    })
    .catch(function(err) {
      // show error in developer console for debugging
      console.error(err);
    });
</script>
<?php
get_footer();
?>
