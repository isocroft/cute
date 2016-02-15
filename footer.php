<footer class="footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> <p>POPULAR ON MY BLOG</p>

				<?php query_posts(array('orderby' => 'comment_count', 'posts_per_page' => '4'));
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					
					<p><?php the_title(); ?> <a href="<?php the_permalink(); ?>"><span class="ash"><?php comments_number('0','%','%'); ?></span></a></p>
					
<?php endwhile; endif;?>
					

				</div>

				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<?php get_search_form(); ?>

				<p>TAG CLOUD</p>

				<?php 
$args  = array('number' => 10,'orderby'=>'count' );
$tags = get_tags();
//$html = '<div class="post_tags">';
foreach ( $tags as $tag ) {
	$tag_link = get_tag_link( $tag->term_id ); 
	$tag_name = $tag->name; ?>


					<a href="<?php echo $tag_link; ?>" title="<?php echo $tag_name; ?>"><span class="ash"><?php echo $tag_name; ?></span></a>
			
<?php	
}


?>


				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> <p>WANT TO GET NOTIFIED OF MY NEXT POST?</p>

					<form class="navbar-form" role="search" method="get">
<div class="input-group">
						<input type="text" class="form-control" placeholder="Email Address" >
						<span class="input-group-btn">
							<button class="btn btn-primary whiteonblack" type="submit">Yes!</button>
						</span>
					</div>
</form>
					

				</div>

			</div>
		</div>
	</footer>


	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script type="text/javascript" src="media/bootstrap/js/bootstrap.min.js"></script>-->
</body>
</html>