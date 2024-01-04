<?php
define('WP_USE_THEMES', true);
require_once(dirname(__FILE__) . '/../wp-load.php');
require_once(dirname(__FILE__) . '/../wp-includes/class-simplepie.php');
get_header();
?>

<div class="wrap">
	<main class="site-main" id="content">
		<h2 class="page-title">Directives aux auteurs</h2>
		
		<form method="POST" action=".">
		<label for="first_name">Entrez votre prénom: </label>
		<input type="text" name="first_name" id="first_name" required />
		<label for="last_name">Entrez votre nom de famille: </label>
		<input type="text" name="last_name" id="last_name" required />
		<label for="email">Entrez votre courriel: </label>
		<input type="email" name="email" id="email" required />
		<label for="title">Titre du manuscript: </label>
		<input type="text" id="title" required />
		<label for="abstract">Description courte de l'article</label>
		<input type="text" name="abstract" required />
		<label for="submission_file">Ajouter un document</label>
		<input type="file" name="submission_file" required />
		<input type="submit" value="Envoi"/>		
	    </form>
	</main>
</div>
<?php
get_footer();
?>

