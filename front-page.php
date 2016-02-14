<?php get_header(); ?>


<div class="container-fluid">
	<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-3 hidden-xs pad-little">
			<img src="<?php echo bloginfo('template_url').'/media/images/girl.png'; ?>" class="img-circle img-responsive profileimg">
			<p>
				<?php $bloginfo = get_bloginfo( 'description');
				echo $bloginfo;
				?></p>
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