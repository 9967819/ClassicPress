<?php
session_start();
define('WP_USE_THEMES', true);
require_once(dirname(__FILE__) . '/../wp-load.php');
require_once(dirname(__FILE__) . '/../wp-includes/class-simplepie.php');
get_header();
#$checkout_screen = "step1";
global $donate_amount_btn;
$donate_amount_btn = <<<HTML
<select name="amounts" id="amount" required>
<option value="" initial>Choisir</option>
<option value="20.00">20.00$</option>
<option value="50.00">50.00$</option>
<option value="100.00">100.00$</option>
<option value="200.00">200.00$</option>
</select>
HTML;
global $screen;
$screen = 0;
$donate_amount = 0;
$test_mode = true;
if (! empty($_POST['s'])){
  $screen = intval($_POST['s']);
  $donate_amount = intval($_POST['amounts']);
  $_SESSION['donate_amount'] = $donate_amount;
  $_SESSION['test_mode'] = 1;
}
$ssl_cipher = $_SERVER['CLIENT_SSL_CIPHER'];
?>
<div class="wrap">
<div id="primary" class="content-area">
<main id="main" class="site-main entry-content">
<h2>Faire un don à Applied Human Neurosecurity Journal</h2>

<div id="checkout" class="overlay1">
<?php
if ($screen == 1) {
  $html = <<<HTML
  <p>Debug test mode: {$test_mode} ({$ssl_cipher})</p>
  <p>Montant du don: {$donate_amount}$</p>
  <label>Choisir un mode de paiement :</label>
  <div id="checkout-google"></div>
  <br>
  <form id="paypal-btn" action="https://www.paypal.com/donate" method="post" target="_top">
  <input type="hidden" name="hosted_button_id" value="RTU5SPUR6L6YG" />
  <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
  <img alt="" border="0" src="https://www.paypal.com/en_CA/i/scr/pixel.gif" width="1" height="1" />
  </form>
HTML;
  echo $html;
} else { 
  echo "<p>Veuillez choisir le montant du don.</p>";
  echo "<form action=\".\" method=\"post\">";
  echo "<input type=\"hidden\" name=\"s\" value=\"1\">";
  echo "<p><label for=\"amounts\">Montant : " . $donate_amount_btn . "</label>";
  echo "<div class=\"entry-footer\"><input type=\"submit\" value=\"Suivant\" id=\"confirm-btn\"/></div>";
  echo "</form>";
} 
?>
</div>
</main>
</div>
</div>
<!-- Google Wallet client/api -->
<script async defer src="https://pay.google.com/gp/p/js/pay.js"></script>
<script src="/static/assets/google/google.js"></script>
<script>
const env = "TEST"; //TEST is for testing.. ^-^
const confirmBtn = document.getElementById('confirm-btn');
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