<?php
$content = nl2br(get_the_content());
$title = get_the_title();
$post = get_post();
$likes_count = $post->likes_count;
$people = $likes_count > 1  ? "personnes" : "personne";
$author = get_the_author();
$email = get_the_author_meta('user_email');
$articleid = get_the_ID();
$html = <<<HTML
<article>
	<h4 class="entry-title">{$title}</h4>
	<div class="entry-meta">
		<p><a href="mailto:{$email}">{$author}</a></p>
	</div>
	<div class="entry-content">
		{$content}
	</div>
	<div class="entry-footer">
	<button class="button" id="likeBtn" data-article-id="{$articleid}">
		<i class="fa-solid fa-heart"></i>
	</button>
	<p id="likes-count" class="">{$likes_count} {$people} ont aimé ce post.</p>
	</div>
</article>
<script async src="/wp-content/themes/journal-winter/assets/js/web.js"></script>
HTML;
echo $html;


