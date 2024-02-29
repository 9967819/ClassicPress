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
$screen = 1;
$donate_amount = 0;
$test_mode = true;
if (! empty($_POST['s'])){
  #$screen = intval($_POST['s']);
  $donate_amount = intval($_POST['amounts']);
  $_SESSION['donate_amount'] = $donate_amount;
  #$_SESSION['test_mode'] = 1;
}
#$ssl_cipher = $_SERVER['CLIENT_SSL_CIPHER'];
?>
<div class="wrap">
<div id="primary" class="content-area">
<article class="page">
<h2>Faire un don à Applied Human Neurosecurity Journal</h2>

<div id="checkout" class="overlay1">
<?php
if ($screen == 1) {
  $html = <<<HTML
  <h3>Choisir un partenaire de connexion :</h3>
   <div id="checkout-btn">
    <button class="button btn-checkout-stripe">
      <a href="https://buy.stripe.com/eVa16X44B54r7gk5kk">Stripe</a>
		</button>
	  <button class="button btn-checkout-stripe">
	    <a href="https://paypal.me/EtienneRobillard">PayPal</a>
		</button>
   </div>
HTML;
  echo $html;
} else { 
  echo "<label class=\"info\">Choisir un mode partenaire de connexion</label>";
  echo "<form action=\".\" method=\"post\">";
  echo "<input type=\"hidden\" name=\"s\" value=\"1\">";
  echo "<p><label for=\"amounts\">Montant : " . $donate_amount_btn . "</label>";
  echo "<div class=\"entry-footer\"><input type=\"submit\" value=\"Suivant\" id=\"confirm-btn\"/></div>";
  echo "</form>";
} 
?>
</article>
</div>
</div>

<?php
get_footer();
?>
