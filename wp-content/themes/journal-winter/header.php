<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php 
wp_head(); 
?>
<link type="text/css" rel="stylesheet" href="/wp-content/themes/journal-winter/assets/fontawesome/css/fontawesome.min.css">
<link type="text/css" rel="stylesheet" href="/wp-content/themes/journal-winter/assets/fontawesome/css/brands.css">
<link type="text/css" rel="stylesheet" href="/wp-content/themes/journal-winter/assets/fontawesome/css/solid.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

</head>
<body>
	<header id="site-header">

		<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
		<?php get_template_part( 'template-parts/header/header', 'image' ); ?>
	</header>
