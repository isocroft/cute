<?php get_header(); ?>

<div class="container-fluid">
	<div class="row pad-more">

		<div class="col-lg-3 col-md-3 col-sm-3 hidden-xs left-bar">
		</div>
		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 content">
			<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
				<?php $pid = get_the_ID(); ?>

				<p class="title"><?php the_title();?></p>



				<?php if ( has_post_thumbnail($post) ) {

					$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
					<img src="<?php echo $url; ?>" longdesc="<?php the_title(); ?>" alt="<?php the_title(); ?>" class="img-responsive" />

					<?php }?>

					<p class="body">

						<?php $c = get_the_content();

						echo $c;
						?>

					</p>


				</div>

			<?php endwhile; ?>
		<?php endif; ?>
		<div class="col-lg-1 col-md-2 hidden-sm hidden-xs"></div>

	</div>

	<div class="row prev-next-links">
		<div class="col-lg-3 col-md-3 col-sm-3 hidden-xs left-bar">
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 prev">
			<p>
							<!-- <a href="">

							STARTING A NEW LIFE WITH A DOG</a> -->
							<?php if(get_adjacent_post(true, '', true)) {  ?>

							<span class="glyphicon glyphicon-step-backward"></span>
							<?php previous_post_link(); ?>
							<?php } ?>

						</p></div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 next"><p>
							<?php if(get_adjacent_post(true, '', false)) { ?>
							<?php next_post_link(); ?>

							<span class="glyphicon glyphicon-step-forward"></span>
							<?php } ?>


						</p></div>
					</div>



					<div class="row meta-post">
						<div class="col-lg-3 col-md-3 col-sm-3 hidden-xs ">
						</div>
						<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 post-meta">

							<img src="<?php  echo $r = get_avatar_url( get_the_author_meta( 'ID' )); ?>" class="img-responsive profileimgtwo">

							<p class="nom"><?php the_author_firstname(); echo' '; the_author_lastname(); ?>
							</p><p class="nom">


							<?php 
							$date = date('h:i A jS F Y',get_post_time('U', true));

							echo $r =  time_elapsed_string($date); ?> </p>


							<p>
								<?php $category = get_the_category();
								foreach ($category as $val) {?>

								<span class="ashtwo">

									<?php   echo $val->cat_name; ?>

								</span>
								<?php }


								$posttags = get_the_tags();
								if ($posttags) {


									foreach($posttags as $tag) { 
										?>
										<span class="ashtwo tag">
											<?php echo $tag->name . ' '; ?>
										</span>


										<?php }




									}
									?>

								</p>
							</div>



						</div>


						

						<div class="row before-thumb-more-row">
							<div class="col-lg-3 col-md-3 col-sm-3 hidden-xs left-bar">
							</div>
							<h4>You Might Like These: </h4>
						</div>

						<div class="row thumb-more-row">
							<div class="col-lg-3 col-md-3 col-sm-3 hidden-xs">
							</div>



							<?php
							$args = array( 'numberposts' => '3','post__not_in'=> array($pid));
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

							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-3 hidden-xs left-bar">
								</div>
								<?php comments_template( '/short-comments.php' ); ?>

							</div>













						</div>

						<?php get_footer(); ?>