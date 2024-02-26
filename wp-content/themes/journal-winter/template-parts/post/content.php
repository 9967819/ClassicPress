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
$sql = "SELECT * FROM `wp_comments` WHERE comment_post_ID=$articleid and comment_approved=1";
$dsn = sprintf("mysql:host=%s;dbname=%s;charset=%s", '127.0.0.1', 'ahnjournal_frontend', 'utf8mb4');
$dbh = new PDO($dsn, DB_USER, DB_PASSWORD) or die("snsfeoinwefe asdhns dsoawnd!!!\n");
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

$comments = $dbh->query($sql)->fetchAll();
$comment_count = count($comments);
$comment_plural = ($comment_count > 1) ? " commentaires" : "commentaire";
$html = <<<HTML
<article class="full-text">
	<h2 class="entry-title">{$title}</h2>
	<div class="entry-content">
	{$content}
	</div>
    <div class="entry-footer">
      <h3>Données supplémentaires</h3>
      <table id="article-metadata">
        <thead>
        <tr><th>Auteur</th><th>Date de publication</th></tr>
        </thead>
        <tbody>
            <tr><td>{$name}</td><td>{$pubdate}</td></tr>
        </tbody>
      </table>
      <button class="button" id="likeBtn" data-article-id="{$articleid}">
	   <i id="face-smile" class="fa-solid fa-face-smile"></i>
	  </button>
		<label id="likes-count" class=""><span id="count">{$likes_count}{$likes_plural}</label>
		 <p><strong>{$comment_count} {$comment_plural}</strong></p>
     <p><a href="/webhooks.php?action=comment&postid={$articleid}">Envoyer un commentaire</a> | Imprimer</p>
    </div>
</article>
<script async src="/static/assets/journal/web.js"></script>
HTML;
echo $html;

