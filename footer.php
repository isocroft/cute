<footer class="footer">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-1 hidden-xs"> 
			</div>

			<div class="col-lg-5 col-md-5 col-sm-6 col-xs-6"> <p>POPULAR ON MY BLOG</p>

				<?php query_posts(array('orderby' => 'comment_count', 'posts_per_page' => '4'));
				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


				<a href="<?php the_permalink(); ?>"><p class="nopadp"><?php the_title(); ?> <span class="ash"><?php comments_number('0','-','%'); ?></span></p></a>

			<?php endwhile; endif;?>

			<hr/>

			<p>WANT TO GET NOTIFIED OF MY NEXT POST?</p>

			<form class="navbar-form" role="search" method="get">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Email Address" >
					<span class="input-group-btn">
						<button class="btn btn-primary whiteonblack" type="submit">Yes!</button>
					</span>
				</div>
			</form>

		</div>

		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-6">
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

		<div class="col-lg-1 col-md-1 col-sm-2 col-xs-2"> 
		</div>

	</div>
</div>
</footer>

<?php wp_footer(); ?>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script type="text/javascript" src="media/bootstrap/js/bootstrap.min.js"></script>-->
</body>
</html>