<?php
$page_id = get_the_ID();
$page_content = get_the_content();
$page = get_page( $page_id );
$likes_count = $page->likes_count;
$people = $likes_count > 1  ? "personnes aiment" : "personne aime";
?>

<div class="entry-content">
		<?php twentyseventeen_edit_link( get_the_ID() ); ?>
		<?php
			echo $page_content;
		?>
		<div class="entry-footer">
		<button class="button" id="likeBtn" data-article-id="<?php echo $page_id; ?>"><i class="fa-solid fa-heart"></i></button>
		<p id="likes-count" class=""><span id="count"><?php echo $likes_count ?></span> <?php echo $people ?> cette page.</p>
	  </div>
</div>
<script async src="/static/assets/journal/web.js"></script>

