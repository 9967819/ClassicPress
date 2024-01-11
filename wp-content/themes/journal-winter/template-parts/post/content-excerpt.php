
<?php
$bgurl = get_the_post_thumbnail_url();
$url = get_permalink();
$categories = get_the_category();

#the primary category
$cat = $categories[0]->name;

$category_url = get_category_link($categories[0]->term_id);

$category_button = "<span class=\"category-label\">" . $cat . "</span>";
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
$body = "<div class=\"entry-content\">" . get_the_excerpt() . "</div>";

$footer= <<<HTML
<div class="entry-footer">
<a href="{$url}">
  <button type="button" class="menu-label">Lire la suite</button>
</a>&nbsp;
<a href="{$category_url}">
 <button type="button" class="menu-label">$category_button</button>
</a>
</div>
</article>
HTML;

##$excerpt = <<<HTML
##<div class="entry-excerpt"> 
##HTML;
##$excerpt .= get_the_excerpt();
##$excerpt .= "</div>";
##echo $excerpt;
echo $body;
echo $footer;
