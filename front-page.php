<?php get_header(); ?>


<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-3 hidden-xs pad-little">
				<img src="<?php echo bloginfo('template_url').'/media/images/girl.png'; ?>" class="img-circle img-responsive profileimg">
				<p>Don't wonder what brought
					you here, into my head.Pretend an alien fairy godmother did in a whirlwind of gold and snow and you are so enamored you don't want to ever leave.You're welcome.</p>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<div class="jumbotron header text-center">
						<p class="headertext">How to break away from the mold</p>
						<p>One funny day in july I woke up and my life had changed.
							Literally.I mean you would not understand me unless.
							...</p>
							<a href="#" class="btn btn-sq-lg btn-primary whiteonblack">
								READ NOW
							</a>
						</div>



						<div class="container-fluid">
							<div class="row postrow">


$<?php $args = array( 'posts_per_page' => 9, 'offset'=> 0);

$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); 



?>




<div id="post-<?php the_ID(); ?>" class="col-lg-3 col-md-4 col-sm-3 col-xs-7 post text-center">
									<a href=" <?php the_permalink(); ?>">
										<!-- <img src="media/images/dd.jpg" class="img-responsive"> -->
										<?php if ( has_post_thumbnail($post) ) {
   
   $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
<img src="<?php echo $url; ?>" longdesc="<?php the_title(); ?>" alt="<?php the_title(); ?>" class="img-responsive" />

<?php }

?>
										<p class="p-category">
										<?php $category = get_the_category();
								$firstCategory = $category[0]->cat_name;?>


										-- <?php echo $firstCategory; ?> --  </p>
										<h1 class="p-title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h1>
										
									

										<p class="p-preview">
										<?php $content = get_the_content();
										if ( has_post_thumbnail($post))
											$content = substr($content, 0,60);
											else
											$content = substr($content, 0,300);
										echo $content; ?></p>
										<?php if (!has_post_thumbnail($post)): ?>
										<a href="<?php the_permalink(); ?>" class="btn btn-sq-lg btn-primary whiteonblack">
											READ NOW
										</a>
										<?php endif; ?>
									</a>
								</div>
	
		
	
<?php endforeach; 
wp_reset_postdata();?>










								<div class="col-lg-3 col-md-4 col-sm-3 col-xs-7 post text-center">
									<a href="#">
										<p class="p-category">-- PERSONAL --</p>
										<h1 class="p-title">Starting a new Life with a new DOG</h1>
										<p class="p-preview"> From playing with new makeup to slathering on the latest and greatest in skincare every night, my face is rarely bare, From playing with new makeup to slathering on the latest and greatest in skincare every night, my face is rarely bare rom playing with new makeup...</p>
										<a href="#" class="btn btn-sq-lg btn-primary whiteonblack">
											READ NOW
										</a>
									</a>
								</div>
							
								
								
								
							</div>
						</div>


					</div>
					<div class="col-lg-1 col-md-2 hidden-sm hidden-xs"></div>

				</div>
				<div class="row">

					


				</div>

			</div>
 
<?php get_sidebar(); ?>
<?php get_footer(); ?>