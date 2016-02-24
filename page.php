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
<div class="row remove-padding">
<div class="jumbotron text-center <?php if(!$url){ ?> category-header-no-img <?php } else {  ?> page-header <?php } ?> ">
					<img src="<?php echo $url; ?>" class="img-responsive">

					<a href="#" class="btn btn-sq-lg btn-primary blackonwhite">
						<?php echo $title; ?>
					</a>
				</div>
</div>




<div class="row">
	
	<div class="col-lg-3 col-md-3 col-sm-1 col-xs-1">
		

	</div>
	<div class="col-lg-6 col-md-6 col-sm-10 col-xs-10 content">
	<p>
		
<?php 

echo $content; ?>



	</p>
		

	</div>


</div>
</div>




					<?php get_sidebar(); ?>
					<?php get_footer(); ?>