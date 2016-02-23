<?php
/*
Template Name: Search Page
*/
?>
<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

if( strlen($query_string) > 0 ) {
	foreach($query_args as $key => $string) {
		$query_split = explode("=", $string);
		$search_query[$query_split[0]] = urldecode($query_split[1]);
	} // foreach
} //if

$search = new WP_Query($search_query);
?>
<?php
global $wp_query;
$total_results = $wp_query->found_posts;
$s = $total_results > 1 ? "s" : "";
$no_result = $total_results == 0 ? true :false ; 
if($no_result)
	$img = get_bloginfo('template_url').'/media/images/404.png';
else
	$img = get_bloginfo('template_url').'/media/images/search.jpg';



get_header(); 
?>

<div class="container-fluid">
	<div class="row pad-more">
		<div class="col-lg-2 col-md-2 col-sm-3 hidden-xs left-bar">


		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 search">


			<img src="<?php echo $img; ?>" class="img-responsive">

			<?php if(!$no_result){ ?><p align='center'>Yippee! I found <span><?php echo $total_results; ?></span> result<?php echo $s; ?> matching your search for <span>"<?php echo urldecode($query_split[1]);?>"</span></p>
			<?php } else{ ?>

			<p align='center'>Oops! I couldn’t find any results matching your search for <span>"<?php echo urldecode($query_split[1]);?>"</span></p>


			<?php }?> 


			<?php if (have_posts()): ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<div class="result">
						<a href="<?php the_permalink(); ?>">

							<?php if ( has_post_thumbnail($post) ) {

								$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
								<img src="<?php echo $url; ?>" longdesc="<?php the_title(); ?>" alt="<?php the_title(); ?>" class="img-responsive" />

								<?php }


								if (!has_post_thumbnail($post) ) { 
									$sub_title = "";
									$title = $post->post_title;
									$title_array = explode(" ", $title);

									foreach ($title_array as $value) {
										$sub_title .= substr($value, 0,1);

									}
									$sub_title = substr($sub_title, 0,4);




									?>

									<div class="square"><?php echo $sub_title; ?> </div>


							<?php 	} 


								?>
								<p class="s_ptitle"><?php the_title(); ?></p>
								<p class="s_ppreview">
									<?php $content = get_the_excerpt();
									$content = substr($content, 0,160);
									echo $content; ?>


								</p>
							</a>


						</div>


					<?php endwhile; ?>
				<?php endif; ?>


			</div>

			<div class="col-lg-1 col-md-2 hidden-sm hidden-xs"></div>

		</div>
		

	</div>





	<?php get_sidebar(); ?>
	<?php get_footer(); ?>