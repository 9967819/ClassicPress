
<?php
$bgurl = get_the_post_thumbnail_url();
$url = get_permalink();
#$excerpt = wp_trim_excerpt();
$article = <<<HTML
<article class="post grayscale" style="background-image: url({$bgurl}); background-size: cover">
HTML;
echo $article;
$h2= <<<HTML
<h2 class="entry-title">
<a href="{$url}">
HTML;
echo $h2;

echo get_the_title(); 
echo "</a></h2>";
##$excerpt = <<<HTML
##<div class="entry-excerpt"> 
##HTML;
##$excerpt .= get_the_excerpt();
##$excerpt .= "</div>";
##echo $excerpt;
echo "</article>";
