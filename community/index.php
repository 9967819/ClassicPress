<?php
#error_reporting(E_ALL);
define('WP_USE_THEMES', true); #hack
require_once(dirname(__FILE__) . '/../wp-load.php'); #hack
require_once(dirname(__FILE__) . '/../wp-includes/class-simplepie.php');
get_header(); #hack

$pageId = '2065'; # hack
$post = get_post($pageId); # hack
$likes_count = $post->likes_count;
$likes_count_plural = $likes_count > 1 ? "s" : "";
$people = $likes_count > 1  ? "personnes aiment" : "personne aime";

$title = 'Röyksopp - Profound Mysteries I-III | Livestream 17.11.2022';
$channel = 'AHNJournal';
$url = "https://www.youtube.com/embed/FQ-bUB6lCuw?si=NzxEgI1ckDXni__C";
$button_text = "Écouter sur YouTube";
?>
<div class="wrap">
<div id="primary">
<article class="video">
	<h2 class="page-title">Musique</h2>
    <h3>Piste audio du jour: <?php echo $title ?></h3>

    <iframe width="560" height="315" src="<?php echo $url; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    <div class="entry-footer">
    <button class="button menu-label" id="likeBtn" data-article-id="<?php echo $pageId; ?>">
    <i class="fa-solid fa-face-smile"></i>
    </button>
    <button class="button menu-label"><a href="https://www.youtube.com/"><?php echo $button_text ?></a></button>
    <label id="likes-count"><?php echo $likes_count ?> mention<?php echo $likes_count_plural ?> J'aime.</label>
    </div>
</article>
<section>
<?php
#<section>
#<h3>Contributions récentes</h3>
#<?php
#$url = 'https://open-neurosecurity.org/wiki/api.php?hidebots=1&urlversion=1&days=7&limit=50&action=feedrecentchanges&feedformat=atom';
#$rss2 = fetch_feed($url);
#foreach($rss2->get_items(0, 5) as $var2) {
#echo "<ul class=\"default-list\">";
#$HTML = <<<HTML
#<li><a href="{$var2->get_permalink()}">{$var2->get_title()}</a></li>
#HTML;
#echo $HTML;
#}
#echo "</ul>";
?>
</div>
</div>

<script async src="/static/assets/journal/web.js"></script>

<?php
get_footer();
