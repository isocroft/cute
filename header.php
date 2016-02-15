<!DOCTYPE html>
<html>
<head>
	<title>Cute theme</title><!-- 
	<link rel="stylesheet" type="text/css" href="media/bootstrap/css/bootstrap.min.css">-->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

 <?php wp_head(); ?>
</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><p><?php echo $blog_title = get_bloginfo( 'name' ); ?></p></a>

			</div>


			<div class="navbar-collapse collapse"> 

				<ul class="nav navbar-nav navbar-right"> 

<?php 
$args = array(
        'order'                  => 'ASC',
        'orderby'                => 'menu_order',
        'post_type'              => 'nav_menu_item',
        'post_status'            => 'publish',
        'output'                 => ARRAY_A,
        'output_key'             => 'menu_order',
        'nopaging'               => true,
        'update_post_term_cache' => false );

$menu_locations = get_nav_menu_locations(); 
$menu = $menu_locations[ 'header-menu' ]; 
$menu = wp_get_nav_menu_items( $menu,$args); 


	foreach ($menu as $menu_item) {
		$url = $menu_item->url;
		$title = $menu_item->title; ?> 

		<li><a href="<?php echo $url; ?>"><?php echo $title; ?></a></li>

		<?php
	}

?>

				</ul>

			</div>
		</div>
	</div>

 ?>