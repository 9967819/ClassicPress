<?php
$content = get_the_content();

$html = <<<HTML
<article>
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


