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


get_header(); 
?>

<div class="container-fluid">
		<div class="row pad-more">
			<div class="col-lg-2 col-md-2 col-sm-3 hidden-xs left-bar">

				
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 search">


				<img src="<?php echo $img; ?>" class="img-responsive">

				<?php if($no_result){ ?><p align='center'>Uh oh! The Page You Are Looking For Does Not Exist!</p>
				<p align='center'>Maybe you should search for it below:</p>
				<?php get_search_form()
				?>
				<?php } ?> 

				


                 

			</div>

			<div class="col-lg-1 col-md-2 hidden-sm hidden-xs"></div>

		</div>
		

	</div>





				<?php get_sidebar(); ?>
				<?php get_footer(); ?>