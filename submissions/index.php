<?php
define('WP_USE_THEMES', true);
require_once(dirname(__FILE__) . '/../wp-load.php');
require_once(dirname(__FILE__) . '/../wp-includes/class-simplepie.php');
get_header();
?>

<div class="wrap">
	<div id="content" class="primary">
		<h2 class="page-title">Directives aux auteurs</h2>
		
		<div class="form">
		<form method="POST" action="">
		<label for="first_name">Prénom de l'auteur: </label>
		<input type="text" name="first_name" id="first_name" required>
		<label for="last_name">Nom de famille: </label>
		<input type="text" name="last_name" id="last_name" required>
		<label for="email">Courriel: </label>
		<input type="email" name="email" id="email" required>
		<label for="title">Titre du manuscript: </label>
		<input type="text" id="title" required>
		<hr>
		<label for="category">Categorie: </label>
		<select></select>
		<label for="abstract">Abstract: </label>
		<input type="text" name="abstract" required>
		<label for="submission_file">Ajouter un document</label>
		<input type="file" name="submission_file" required>
		<hr>
		<input type="button" class="menu-label" value="Next">		
		</form>
		</div>
	</div>
</div>
<?php
get_footer();
?>

