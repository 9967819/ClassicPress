<?php
define('WP_USE_THEMES', true);
require_once(dirname(__FILE__) . '/../wp-load.php');
require_once(dirname(__FILE__) . '/../wp-includes/class-simplepie.php');
get_header();
#$ssl_cipher = $_SERVER['CLIENT_SSL_CIPHER'];
?>
<div class="wrap">
<div id="primary" class="content-area">
<main id="main" class="site-main entry-content">
<h2>Faire un don à Applied Human Neurosecurity Journal</h2>
<div id="checkout" class="overlay1">
<label>Choisir un mode de paiement :</label>
<div id="checkout-google"></div>
<br>
<form id="paypal-btn" action="https://www.paypal.com/donate" method="post" target="_top">
<input type="hidden" name="hosted_button_id" value="RTU5SPUR6L6YG" />
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
<img alt="" border="0" src="https://www.paypal.com/en_CA/i/scr/pixel.gif" width="1" height="1" />
</form>

<p>Merci d'encourager Applied Human Neurosecurity Journal.</p>
</div>
</main>
</div>
</div>
<!-- Google Wallet client/api -->
<script async defer src="https://pay.google.com/gp/p/js/pay.js"></script>
<script src="/static/assets/google/google.js"></script>
<script>
const env = "PRODUCTION"; //TEST is for testing.. ^-^

window.addEventListener("load", (event) => {

    if(isReadyToPayRequest){
	    const paymentsClient = new google.payments.api.PaymentsClient({environment: env});
	    paymentsClient.isReadyToPay(isReadyToPayRequest).then(function(response) {
	    if (response.result) {
			const googleBtn = paymentsClient.createButton({
            onClick: () => {
              paymentsClient.loadPaymentData(paymentDataRequest).then(function(paymentData){
              // if using gateway tokenization, pass this token without modification
              paymentToken = paymentData.paymentMethodData.tokenizationData.token;
            }).catch(function(err){
              // show error in developer console for debugging
              console.error('hmm problem :' + err);
            });
            },
    		allowedPaymentMethods: []}); // same payment methods as for the loadPaymentData() API call
			document.getElementById('checkout-google').appendChild(googleBtn);
		}
      }).catch(function(err) {
      // show error in developer console for debugging
      console.log('good morning smart');
      console.log(err);
      });
    } else {
      console.log('problem with isReadyToPayRequest');
    }    
});//add event listener
</script>
<?php
get_footer();
?>
