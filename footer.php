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
					<a href="#"><span class="ash">Beauty</span></a>
					<a href="#"><span class="ash">Software</span></a>
					<a href="#"><span class="ash">Writing</span></a>
					<a href="#"><span class="ash">Same Food</span></a>
					<a href="#"><span class="ash">Gross</span></a>
					<a href="#"><span class="ash">Oops</span></a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> <p>WANT TO GET NOTIFIED OF MY NEXT POST?</p>


					<div class="input-group">
						<input type="text" class="form-control" placeholder="Email Address">
						<span class="input-group-btn">
							<button class="btn btn-primary whiteonblack" type="button">Yes!</button>
						</span>
					</div>

				</div>

			</div>
		</div>
	</footer>


	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script type="text/javascript" src="media/bootstrap/js/bootstrap.min.js"></script>-->
</body>
</html>