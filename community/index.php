<?php
define('WP_USE_THEMES', true);
require_once(dirname(__FILE__) . '/../wp-load.php');
require_once(dirname(__FILE__) . '/../wp-includes/class-simplepie.php');
get_header();
?>

<div class="wrap">
	<div class="site-header">
		<h2 class="page-title">Communauté</h2>
	</div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main entry-content">
			<h3 style="color: #fff"></h3>
			<?php 
$rss = fetch_feed('https://open-neurosecurity.org/forum/index.php?action=.xml;type=rss2'); 
?>
<?php foreach($rss->get_items(0, 5) as $item): ?>
<div class="item">
	<h4 class="title"><a href="<?php echo $item->get_permalink(); ?>">
<?php echo $item->get_title(); ?></a></h4>
</div>
<?php endforeach; ?>

			<h3 style="color: #fff">Modifications récentes</h3>
<?php
$url = 'https://open-neurosecurity.org/wiki/api.php?hidebots=1&urlversion=1&days=7&limit=50&action=feedrecentchanges&feedformat=atom';
$rss2 = fetch_feed($url);
?>
<?php foreach($rss2->get_items(0, 5) as $var2): ?>
<div class="item">
<h4 class="title"><a href="<?php echo $var2->get_permalink(); ?>">
<?php echo $var2->get_title(); ?></a></h4>
</div>
<?php endforeach; ?>
</main>
</div>
</div>
</div>
</div>
<?php
get_footer();
?>

