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
$likes_plural = $likes_count > 1  ? " mentions J'aime" : " mention J'aime";
$sponsors = array(
    'YouTube'  => 'https://youtube.com', 
    'Bandcamp' => 'https://bandcamp.com'
);
$title = 'Emancipator';
$author_description = "Emancipator est un artiste vivant à Portland aux États-Unis. Sa musique est un mélange down-tempo et de sonorités électroniques hautement recherchés et très agréable à écouter préférablement avec votre chat.";   
$youtubelink = "https://emancipator.bandcamp.com"; 
$channel = 'AHNJournal';
$url = "https://www.youtube.com/embed/phTPiTz1SVQ?si=jUYhjUf5Y4z7v0j2";
$button_text = "Écouter sur YouTube";
?>
<div class="wrap">
<div id="primary">
<article class="video">
	<h2 class="page-title">Musique</h2>
    <h3>Artiste du mois: <a href="<?php echo $youtubelink ?>"><?php echo $title ?></a></h3>
    <div class="overlay"><?php echo $author_description ?></div>
    <br>
    <iframe width="560" height="315" src="<?php echo $url; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    <div class="entry-footer">
    <button class="button menu-label" id="likeBtn" data-article-id="<?php echo $pageId; ?>">
    <i class="fa-solid fa-face-smile" id="face-smile"></i>
    </button><br>
   <label id="likes-count" class=""><span id="count"><?php echo "$likes_count" . "$likes_plural" ?></label>
    </div>
    
</article>
<article class="video">
<h3>Contributions récentes</h3>
<?php
$url = 'https://open-neurosecurity.org/wiki/api.php?hidebots=1&urlversion=1&days=7&limit=50&action=feedrecentchanges&feedformat=atom';
$rss2 = fetch_feed($url);

echo "<ul class=\"default-list\">";

foreach($rss2->get_items(0, 5) as $var2) {
    $HTML = <<<HTML
        <li><a href="{$var2->get_permalink()}">{$var2->get_title()}</a></li>
    HTML;
    echo $HTML;
}

echo "</ul>";
?>
</article>
</div>
</div>

<script async src="/static/assets/journal/web.js"></script>

<?php
get_footer();
