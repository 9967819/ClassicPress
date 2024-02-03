<?php
error_reporting(E_ALL);
define('WP_USE_THEMES', true);
require_once(dirname(__FILE__) . '/../wp-load.php');
require_once(dirname(__FILE__) . '/../wp-includes/class-simplepie.php');
get_header();
# fetch the remote rss
#$rss = fetch_feed('https://open-neurosecurity.org/forum/index.php?action=.xml;type=rss2'); 
$title = '2024 Retro Mix';
$channel = 'AHNJournal';
$url = "https://www.youtube.com/embed/videoseries?si=r8hFKhjoOMqE9vcA&amp;list=PL7Ndnn1jFxfvUyTnLYhJaexNtFUJiTqQZ";
$button_text = "Écouter sur YouTube";
?>
<div class="wrap">
<div id="primary" class="content-area">
	<main id="main" class="site-main entry-content">
	<h2 class="page-title">Communauté</h2>
	<article class="video">
    <h3>Now playing: <?php echo $title ?></h3>

    <iframe width="560" height="315" src="<?php echo $url; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

    <div class="entry-footer">
    <button class="button menu-label"><a href="https://www.youtube.com/channel/UC9lmMDVtBa6Hppy8Ehfpwpg"><?php echo $button_text ?></a></button>
    </div>

    </article>
<section>
<section>
<h3>Contributions récentes</h3>
<?php
$url = 'https://open-neurosecurity.org/wiki/api.php?hidebots=1&urlversion=1&days=7&limit=50&action=feedrecentchanges&feedformat=atom';
$rss2 = fetch_feed($url);
foreach($rss2->get_items(0, 5) as $var2) {
echo "<ul class=\"default-list\">";
$HTML = <<<HTML
<li><a href="{$var2->get_permalink()}">{$var2->get_title()}</a></li>
HTML;
echo $HTML;
}
echo "</ul>";
?>
</section>
</main>
</div>
</div>
<?php
get_footer();
?>
