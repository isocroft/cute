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

				<p>TAG CLOUD</p>

				<?php 
$args  = array('number' => 10,'orderby'=>'count' );
$tags = get_tags();
//$html = '<div class="post_tags">';
foreach ( $tags as $tag ) {
	$tag_link = get_tag_link( $tag->term_id ); 
	$tag_name = $tag->name; ?>


					<a href="<?php echo $tag_link; ?>" title="<?php echo $tag_name; ?>"><span class="ash"><?php echo $tag_name; ?></span></a>
			
<?php	//$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
	//$html .= "{$tag->name}</a>";
}
$html .= '</div>';
echo $html;


?>


					

					
					<a href="#"><span class="ash">Beauty</span></a>
					<a href="#"><span class="ash">Software</span></a>
					<a href="#"><span class="ash">Writing</span></a>
					<a href="#"><span class="ash">Same Food</span></a>
					<a href="#"><span class="ash">Gross</span></a>
					<a href="#"><span class="ash">Oops</span></a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> <p>WANT TO GET NOTIFIED OF MY NEXT POST?</p>

					<?php get_search_form(); ?>
					

				</div>

			</div>
		</div>
	</footer>


	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script type="text/javascript" src="media/bootstrap/js/bootstrap.min.js"></script>-->
</body>
</html>