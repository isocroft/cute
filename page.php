<?php 
get_header();


global $post;
$page = $post;
$title = $page->post_title;
$content = $page->post_content;
 if ( has_post_thumbnail($post) ) 
$url = wp_get_attachment_url( get_post_thumbnail_id($page->ID) );
else
$url = get_bloginfo('template_url').'/media/images/traintrack.jpg';


?>

<div class="container-fluid">
<div class="row remove-pad">
	
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 page-header">
		
<img src="<?php echo $url;?>">


<a href="#" class="btn btn-sq-lg btn-primary whiteonblack">
						<?php echo $title; ?>
					</a>

	</div>


</div>



<div class="row">
	
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
		

	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 content">
	<p>
		
<?php 

echo $content; ?>



	</p>
		

	</div>


</div>
</div>






















					<?php get_sidebar(); ?>
					<?php get_footer(); ?>