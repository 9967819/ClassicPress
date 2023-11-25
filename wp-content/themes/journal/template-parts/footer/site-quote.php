<?php
$url = 'https://open-neurosecurity.org/static/freethinking.md';
$redis = new Redis(); 
$redis->connect('127.0.0.1', 6379); 
$data = file($url);
$int = random_int(0, count($data));
$randomQuote = $data[$int - 1];
$redis->set('customquote' , $randomQuote);
$redis->close();
?>

<div class="site-info" style="font-size: 12px; text-align: center">
<!-- license, private life, etc... -->
<p>
<a href="/about/">À propos</a> |
<a href="/terms-of-use/">Conditions d'utilisation</a> | 
<a href="/privacy/">Politique de confidentialité</a> |
<a href="/contact/">Contact</a> |
<a href="/sitemap.xml">Plan du site</a> |
<a href="/feed/">RSS</a> 
<br>
&copy; 2023 Applied Human Neurosecurity Journal, 2030 rue Fournier suite 203. Saint-Jérôme, Québec (Canada) <br>
<a href="http://creativecommons.org/licenses/by-nd/4.0/">Contenu sous license CC-BY-ND 4.0</a>
</p>
<p class="dynamic-quote-widget">
<?php 
echo( $redis->get('customquote') ); 
?>
</p>
</div>
