<?php
$content = nl2br(get_the_content());
$title = get_the_title();
$author = get_the_author();
$email = get_the_author_meta('user_email');
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
	<!-- Experimental like button for posts -->
	<button class="button" id="likeBtn">
		<i class="fa-solid fa-heart"></i>
	</button>
	</div>
</article>
HTML;
echo $html;


