<?php
///$content = nl2br(get_the_content());
$content = get_the_content();
$title = get_the_title();
$post = get_post();
$likes_count = $post->likes_count;
$people = $likes_count > 1  ? "personnes aiment" : "personne aime";
$author = $post->post_author;
$name = get_the_author_meta('display_name', $author);
$articleid = get_the_ID();
$pubdate = get_the_date();
$html = <<<HTML
<article>
	<h2 class="entry-title">{$title}</h2>
	<div class="entry-meta overlay1">
	<p>Publié le {$pubdate} par {$name}.</p>
	</div>
	<div class="entry-content">
	{$content}
	</div>
	<div class="entry-footer">
	<button class="button" id="likeBtn" data-article-id="{$articleid}">
	 <i class="fa-solid fa-heart"></i>
	</button>
	<p id="likes-count" class=""><span id="count">{$likes_count}</span> {$people} ce post.</p>
	</div>
</article>
<script src="/static/assets/journal/web.js"></script>
HTML;
echo $html;

