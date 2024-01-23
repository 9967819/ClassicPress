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
		<h2 class="page-title">Communauté</h2>
		<section>
			<h3>Now playing....</h3>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?si=_B8h9MSJGJmq8jGu&amp;list=PL7Ndnn1jFxfuu2Kmuk7wvaq5j_onbUXpf" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
		<section>
<section>
<h3>Latest Forum Posts</h3>
<ul>
<?php foreach($rss->get_items(0, 5) as $item): ?>
	<li><a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a></li>
<?php endforeach; ?>
</ul>
</section>
<section>
<h3>Contributions récentes</h3>
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
</section>
</main>
</div>
</div>
</div>
</div>
<?php
get_footer();
?>

