<?php
///$content = nl2br(get_the_content());
$content = get_the_content();
$title = get_the_title();
$post = get_post();
$likes_count = $post->likes_count;
$likes_plural = $likes_count > 1  ? " mentions J'aime enregistrées à ce jour." : " mention J'aime enregistrée à ce jour.";
$author = $post->post_author;
$name = get_the_author_meta('display_name', $author);
$articleid = get_the_ID();
$pubdate = get_the_date();
$html = <<<HTML
<article class="full-text">
	<h2 class="entry-title">{$title}</h2>
	<div class="entry-content">
	{$content}
	</div>
    <div class="entry-footer">
      <h4>Données supplémentaires</h4>
      <table id="article-metadata">
        <thead>
        <tr><th>Auteur</th><th>Date de publication</th>
        </thead>
        <tbody>
            <tr><td>Robillard, Etienne</td><td>{$pubdate}</td></tr>
        </tbody>
      </table>
      <button class="button" id="likeBtn" data-article-id="{$articleid}">
	   <i id="face-smile" class="fa-solid fa-face-smile"></i>
	  </button>
	  <label id="likes-count" class=""><span id="count">{$likes_count}{$likes_plural}</label>
    </div>
</article>
<script async src="/static/assets/journal/web.js"></script>
HTML;
echo $html;

