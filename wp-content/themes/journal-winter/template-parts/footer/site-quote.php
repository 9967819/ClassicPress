<?php
$scheme = isset($_SERVER['HTTPS']) == true ? 'https://' : 'http://';
$url = $scheme . $_SERVER['SERVER_NAME'] . '/static/freethinking.md';
 
$data = file($url);
$int = random_int(0, count($data) - 1);
$q = $data[$int];

if (isset($redis)) {
	$redis->set('customquote' , $q);
	$redis->close();
}

?>

<div class="site-info">
<p>
<a href="/about/" title="À propos de nous">À propos</a> |
<a href="/terms-of-use/">Conditions d'utilisation</a> | 
<a href="/privacy/">Politique de confidentialité</a> |
<a href="/relations-medias/">Relations médias</a> |
<a href="/sitemap.xml">Plan du site</a> |
<a href="/feed/">RSS</a> 
<br>
&copy; 2024 Applied Human Neurosecurity Journal, 2030 rue Fournier bureau 203. Saint-Jérôme, Québec (Canada)<br>
<a href="http://creativecommons.org/licenses/by-nd/4.0/">Contenu sous license CC-BY-ND 4.0</a>
</p>
<p id="quotewidget" class="dynamic-quote-widget">
<?php 
echo( $q ); 
?>
</p>
</div>
