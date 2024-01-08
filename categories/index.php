<?php
error_reporting(E_ALL);
define('WP_USE_THEMES', true);
require_once(dirname(__FILE__) . '/../wp-load.php');
require_once(dirname(__FILE__) . '/../wp-includes/category.php');
get_header();
?>
<div class="wrap">
<div id="primary">

	<main id="main" class="site-main archive">

	<h2 class="page-title">Catégories des articles</h2>
<?php 
	echo wp_list_categories(array(
				'title_li'=>'', 
				'show_count'=> 1, 
				'style'=>'default-list')) 
?>
	<h3>Étiquettes les plus populaires</h3>
	<div class="tag-cloud">
		<?php echo wp_tag_cloud() ?>
	</div>	
	</main>
</div>
</div>
<?php
get_footer();
?>

