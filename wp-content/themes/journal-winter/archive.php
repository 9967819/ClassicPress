<?php
# XXX: THIS FILES NEEDS HEAVY REVIEWING/UPDATES. 
#error_reporting(E_ALL);
get_header(); 
$page_title = get_the_archive_title('<h2 class=\"page-title\">', '</h2>');
$links = array();
while (have_posts()){
	the_post();
	$posts = get_posts();
	foreach($posts as $post){
		$id = $post->ID;
		$links[$id] = array('permalink' => get_permalink($id),
							'title'     => get_the_title($id));
	}	
	$links_html = "";
	foreach($links as $link) {
		$links_html .= sprintf("<li><a href=\"%s\">%s</a></li>", 
			$link['permalink'], 
		   	$link['title']);
	}
}
$html = <<<HTML
<div class="wrap">
<div id="primary" class="content-area">
<main id="main" class="site-main">
	<h2>{$page_title}</h2>
	<ul class="default-list">
		$links_html
	</ul>
</main>
</div>
</div>
HTML;

echo $html;
get_footer();
