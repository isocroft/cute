<?php 

get_header();

$mail = get_option( 'admin-email') ;
$avatar = get_avatar_url($mail);

?>


<div class="container-fluid">
	<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-3 hidden-xs pad-little">
			<?php if($avatar){ ?>
			<img src="<?php echo $avatar; ?>" class="img-circle img-responsive profileimg">
			<?php } ?>
			<p>
				<?php $bloginfo = get_bloginfo( 'description');
				echo $bloginfo;
				?> </p>
			</div>


			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

				<?php		
				$args = array(
					'posts_per_page' => 1,
					'post__in'  => get_option( 'sticky_posts' ),
					'ignore_sticky_posts' => 1
					);
				$query = new WP_Query( $args ); 

				if ( $query->have_posts() ) {

					while ( $query->have_posts() ) {

						$query->the_post();

						?>


						<?php if ( has_post_thumbnail($post) ) {

							$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

						} ?>
						<div class="jumbotron header text-center" style="background-image:url(<?php echo $url; ?>)">




							<p class="headertext"><?php the_title(); ?></p>
							<p> <?php $content = get_the_content();
								echo $content = substr($content, 0,100); ?>
								...</p>
								<a href="<?php the_permalink(); ?>" class="btn btn-sq-lg btn-primary whiteonblack">
									READ NOW
								</a>

							</div>


							<?php	}		

						} 
						/* Restore original Post Data */

						wp_reset_postdata();

						?>




						<div class="container-fluid">
							<div class="row postrow">

								<div id="columns">



								<?php 


								


								$display_count  = get_option('posts_per_page');



								// Next, get the current page
								$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

								// After that, calculate the offset
								$offset = ( $paged - 1 ) * $display_count;

								$args = array('paged' => $paged, 'posts_per_page'=>$display_count,'offset'=>$offset);


								$myposts = get_posts( $args );
								foreach ( $myposts as $post ) : setup_postdata( $post ); 



								?>




								<div id="post-<?php the_ID(); ?>" class="col-lg-4 col-md-4 col-sm-3 col-xs-7 post text-center">
									<a href=" <?php the_permalink();?>">

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
														$content = substr($content, 0,400);
													echo $content; ?>...</p>
													<?php if (!has_post_thumbnail($post)): ?>
														<a href="<?php the_permalink(); ?>" class="btn btn-sq-lg btn-primary whiteonblack">
															READ NOW
														</a>
													<?php endif; ?>
												</a>
											</div>



										<?php endforeach; 
										wp_reset_postdata();
										?>

										</div>


									</div>
								</div>












							</div>




							<div class="col-lg-1 col-md-2 hidden-sm hidden-xs"></div>

						</div>



						<div class="row">
							<div class="col-lg-4 col-md-5 col-sm-3 col-xs-2">
							</div>
							<div class="col-lg-4 col-md-5 col-sm-6 col-xs-8 pagination-row">


								<?php if (function_exists("pagination")) {

									if(isset($additional_loop->max_num_pages))
									pagination($additional_loop->max_num_pages);

								} ?>



							</div>
							<div class="col-lg-4 col-md-2 col-sm-3 col-xs-2">
							</div>






						</div>

					</div>

					<?php get_sidebar(); ?>
					<?php get_footer(); ?>