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
			<div class="col-lg-2 col-md-2 col-sm-3 hidden-xs left-bar">

				
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 search">


				<img src="<?php echo $img; ?>" class="img-responsive">
				<br>

				<?php if($no_result){ ?><p align='center'>Uh oh! The Page You Are Looking For Does Not Exist!</p>
				<p align='center'>Maybe you should search for it below:</p>
				<br>
	<div align='center'>			
<form class="navbar-form big-form" role="search" action="<?php echo home_url( '/' ); ?>" method="get">
<div class="input-group">
						<input type="text" class="form-control" placeholder="Try searching for something else" name="s" id="search" value="<?php the_search_query(); ?>">
						<span class="input-group-btn">
							<button class="btn btn-primary whiteonblack" type="submit">Go!</button>
						</span>
					</div>
</form>
</div>

	<div align='center'>

<h3>Side Note: I found some unrelated hot stuff though. You might like these:</h3>
<div class="recents">
<?php $recent_posts = wp_get_recent_posts();
foreach( $recent_posts as $recent ){
    if($recent['post_status']=="publish"){
	if ( has_post_thumbnail($recent["ID"])) {
		echo '<style="padding:5px;border:2px solid black;">
		<a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   get_the_post_thumbnail($recent["ID"], 'thumbnail'). $recent["post_title"].'</a></li> ';
	}else{
		echo '<style="padding:5px;border:2px solid black;">
		<a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a></li> ';
	}
     }
}
?>
</div>

	</div>

<?php } ?> 

				


                 

			</div>

			<div class="col-lg-1 col-md-2 hidden-sm hidden-xs"></div>

		</div>
		

	</div>




				<?php get_sidebar(); ?>
				<?php get_footer(); ?>