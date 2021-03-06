<?php 
get_header();

$tag_id = get_query_var('tag_id'); 

$tag = get_term($tag_id);
$taxonomy = $tag->taxonomy;
$tag_name = $tag->name;




// $categories = get_the_category();
// $category_id = $categories[0]->cat_ID;
// $category_slug = $categories[0]->slug;
// $category_name = $categories[0]->cat_name;



//to get category image
$images = get_posts( array('post_type' => 'attachment', 'tag__in' => array($tag_id))  );
if ( !empty($images) ) {
    foreach ( $images as $image ) {
        $att= wp_get_attachment_image_src( $image->ID, true );
         $img_url = $att[0];
    }
}
else
$img_url = false;





$display_count  = get_option('posts_per_page');



// Next, get the current page
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

// After that, calculate the offset
$offset = ( $paged - 1 ) * $display_count;



 $args = array(
	'posts_per_page'   => $display_count,
	'offset'           => $offset,
	'tag_id'			   => $tag_id,
	'taxonomy'		=> $taxonomy,
	'orderby'          => 'date',
	'order'            => 'DESC',
	'post_type'        => 'post',
	'post_status'      => 'publish',
	'paged'             => $paged,
	'suppress_filters' => true 
);
$posts_array = get_posts( $args ); 

?>



	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-1 hidden-xs">
				
			</div>
			<div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 remove-jumbotron-padding">
				<div class="jumbotron text-center <?php if(!$img_url){ ?> category-header-no-img <?php } else {  ?> category-header <?php } ?>">
					<img src="<?php echo $img_url; ?>" class="img-responsive">

					<a href="#" class="btn btn-sq-lg btn-primary whiteonblack">
						<?php single_tag_title(); ?>
					</a>
				</div>



				<div class="container-fluid">
					<div class="row postrow">
					<div id="columns">

					<?php foreach ($posts_array as $post) {
						setup_postdata( $post );
						
					?>
						<div class="col-lg-3 col-md-4 col-sm-3 col-xs-7 post text-center">
							<a href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail($post) ) {

										$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
										<img src="<?php echo $url; ?>" longdesc="<?php the_title(); ?>" alt="<?php the_title(); ?>" class="img-responsive" />

										<?php }

										?>

								<p class="p-category">-- <?php echo $tag_name;?> --</p>
								<h1 class="p-title"><?php the_title(); ?></h1>
								<p class="p-preview">
									<?php $content = get_the_excerpt();
												if ( has_post_thumbnail($post))
													$content = substr($content, 0,60);
												else
													$content = substr($content, 0,300);
												echo $content; ?>...
								</p>
									<?php if (!has_post_thumbnail($post)): ?>
													<a href="<?php the_permalink(); ?>" class="btn btn-sq-lg btn-primary whiteonblack">
														READ NOW
													</a>
												<?php endif; ?>
							</a>
						</div>

						<?php } ?>





					</div>
					</div>
				</div>


			</div>
			<div class="col-lg-1 col-md-2 hidden-sm hidden-xs"></div>

		</div>

		<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pagination-row">
			
								<?php if (function_exists("pagination")) {

									@pagination($additional_loop->max_num_pages);
								} ?>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
		</div>






		</div>

	</div>





<?php get_sidebar(); ?>
<?php get_footer(); ?>
