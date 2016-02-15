<?php 
get_header();

$tag_id = get_query_var('tag_id'); 
$tag_name = single_tag_title();

$tag = get_term($tag_id);
$taxonomy = $tag->taxonomy;



// $categories = get_the_category();
// $category_id = $categories[0]->cat_ID;
// $category_slug = $categories[0]->slug;
// $category_name = $categories[0]->cat_name;



//to get category image
$images = get_posts( array('post_type' => 'attachment', 'category__in' => array($category_id))  );
if ( !empty($images) ) {
    foreach ( $images as $image ) {
        $att= wp_get_attachment_image_src( $image->ID, true );
         $img_url = $att[0];
    }
}
else
$img_url = false;



 $args = array(
	'posts_per_page'   => 6,
	'offset'           => 0,
	'tag_id'			   => $tag_id,
	'taxonomy'		=> $taxonomy,
	'orderby'          => 'date',
	'order'            => 'DESC',
	'post_type'        => 'post',
	'post_status'      => 'publish',
	'suppress_filters' => true 
);
$posts_array = get_posts( $args ); 

?>



	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-3 hidden-xs">
				
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 remove-jumbotron-padding">
				<div class="jumbotron text-center <?php if(!$img_url){ ?> category-header-no-img <?php } else {  ?> category-header <?php } ?>">
					<img src="<?php echo $img_url; ?>" class="img-responsive">

					<a href="#" class="btn btn-sq-lg btn-primary whiteonblack">
						<?php single_tag_title(); ?>
					</a>
				</div>



				<div class="container-fluid">
					<div class="row postrow">

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

								<p class="p-category">-- <?php echo $category_name;?> --</p>
								<h1 class="p-title"><?php the_title(); ?></h1>
								<p class="p-preview">
									<?php $content = get_the_content();
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
			<div class="col-lg-1 col-md-2 hidden-sm hidden-xs"></div>

		</div>

		<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pagination-row">
				<nav>
					<ul class="pagination">
						<li>
							<a href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li>
							<a href="#" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
		</div>






		</div>

	</div>





<?php get_sidebar(); ?>
<?php get_footer(); ?>





