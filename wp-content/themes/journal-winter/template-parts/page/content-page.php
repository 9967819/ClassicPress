<?php
$page_id = get_the_ID();
$page_content = get_the_content();
$page = get_page( $page_id );
$likes_count = $page->likes_count;
$likes_plural = $likes_count > 1  ? " mentions J'aime enregistrées à ce jour." : " mention J'aime enregistrée à ce jour.";
$lastmodified = do_shortcode('[lmt-post-modified-info]');
?>

<article class="page">
		<?php twentyseventeen_edit_link( get_the_ID() ); ?>
		<?php
			echo $page_content;
?>

        <p><label><?php echo $lastmodified; ?></label></p>

		<div class="entry-footer">
		<button class="button" id="likeBtn" data-article-id="<?php echo $page_id; ?>"><i id="face-smile" class="fa-solid fa-face-smile"></i></button>
		<label id="likes-count" class=""><span id="count"><?php echo $likes_count . $likes_plural; ?></label>
        </div>
</article>
<script async src="/static/assets/journal/web.js"></script>

