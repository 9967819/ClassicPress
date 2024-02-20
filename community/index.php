<?php
#error_reporting(E_ALL);
define('WP_USE_THEMES', true);
require_once(dirname(__FILE__) . '/../wp-load.php');
require_once(dirname(__FILE__) . '/../wp-includes/class-simplepie.php');
get_header();
# fetch the remote rss
#$rss = fetch_feed('https://open-neurosecurity.org/forum/index.php?action=.xml;type=rss2'); 

$pageId = '2065'; # hack
$post = get_post($pageId); # hack
$likes_count = $post->likes_count;
$people = $likes_count > 1  ? "personnes aiment" : "personne aime";

$title = '2024 EDM Mix';
$channel = 'AHNJournal';
$url = "https://www.youtube.com/embed/videoseries?si=Wemkz1rh4Vp3CEjR&amp;list=PL7Ndnn1jFxfuu2Kmuk7wvaq5j_onbUXpf";
$button_text = "Écouter sur YouTube";
?>
<div class="wrap">
<div id="primary" class="content-area">
	<main id="main" class="site-main entry-content">
	<h2 class="page-title">Communauté</h2>
	<article class="video">
    <h3>Now playing: <?php echo $title ?></h3>

    <iframe width="560" height="315" src="<?php echo $url; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

    <button class="button menu-label" id="likeBtn" data-article-id="<?php echo $pageId; ?>">
     <i class="fa-solid fa-heart"></i>
    </button>
    <button class="button menu-label"><a href="https://www.youtube.com/"><?php echo $button_text ?></a></button>

    <p id="likes-count"><?php echo $likes_count ?></p>

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

<script src="/static/assets/journal/web.js"></script>
<?php
get_footer();
?>
