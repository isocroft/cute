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


get_header(); 
?>

<div class="container-fluid">
	<div class="row pad-more">
		<div class="col-lg-1 col-md-1 col-sm-1 hidden-xs left-bar">


		</div>
		<div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 search">


			<img src="<?php echo $img; ?>" class="img-responsive">
			<br>

			<?php if($no_result){ ?><p align='center'>Uh oh! I couldn't find that Page!</p>
			<p align='center'>Do you want to search for something else? </p>
			<br>
			<div align='center'>			
				<form class="navbar-form big-form" role="search" action="<?php echo home_url( '/' ); ?>" method="get">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Try searching for something else" name="s" id="search" value="<?php the_search_query(); ?>">
						<span class="input-group-btn">
							<button class="btn btn-primary 404btn" type="submit">Go!</button>
						</span>
					</div>
				</form>

				<h3>On the side, I found hot stuff you might like:</h3>


			
			</div>

		








		</div>

		<div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>

	</div>

	<div class="row" >
	<div class="recents">
		


						<div class="row thumb-more-row">
							<div class="col-lg-2 col-md-1 col-sm-1 hidden-xs">
							</div>



							<?php
							$args = array( 'numberposts' => '3', 'post_status' => 'publish');
							$recent_posts = wp_get_recent_posts( $args );
							foreach( $recent_posts as $recent ){ 
								setup_postdata($recent); 


								?>


								<div class="col-lg-2 col-md-2 col-sm-2  hidden-xs thumb-more <?php if (!has_post_thumbnail($recent['ID']) ){ echo 'pad-little';
							} ?> ">
							<a href="<?php echo get_permalink($recent["ID"]); ?>">

								<?php if ( has_post_thumbnail($recent['ID']) ) {


									$url = wp_get_attachment_url( get_post_thumbnail_id($recent["ID"]) ); 
									?>







									<img src="<?php echo $url; ?>" longdesc="<?php the_title(); ?>" alt="<?php the_title(); ?>" class="img-responsive img-circle" />

									<?php }
									?>

									<?php if (!has_post_thumbnail($recent['ID']) ) { 
										$sub_title = "";
										$title = $recent["post_title"];
										$title_array = explode(" ", $title);

										foreach ($title_array as $value) {
											$sub_title .= substr($value, 0,1);

										}
										$sub_title = substr($sub_title, 0,4);




										?>

										<div class="circle"><?php echo $sub_title; ?> </div>


										<?php } ?>





										<p><?php echo $recent["post_title"]; ?></p>



									</a>

								</div>
								<?php }

								?>




							</div>


				</div>
				</div>




	</div>

	<?php } ?>






<?php get_sidebar(); ?>
<?php get_footer(); ?>