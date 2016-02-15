<?php get_header(); ?>

<div class="container-fluid">
	<div class="row pad-more">
		<div class="col-lg-2 col-md-2 col-sm-3 hidden-xs left-bar">
			<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
				

				<img src="<?php  echo $r = get_avatar_url( get_the_author_meta( 'ID' )); ?>" class="img-circle img-responsive profileimgtwo">
				<p><?php the_author_firstname(); echo' '; the_author_lastname(); ?>
				</p><p>

				
					<?php 
					$date = date('h:i A jS F Y',get_post_time('U', true));

					echo $r =  time_elapsed_string($date); ?> </p>

					

						<?php $category = get_the_category();
						foreach ($category as $val) {?>

							<p><span class="ashtwo">

							<?php   echo $val->cat_name; ?>

							</span></p>
						<?php }

						?>
						

					

				</div>
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 content">

					<p class="title"><?php the_title();?></p>



					<?php if ( has_post_thumbnail($post) ) {

						$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
						<img src="<?php echo $url; ?>" longdesc="<?php the_title(); ?>" alt="<?php the_title(); ?>" class="img-responsive" />

						<?php }?>

						<p class="body">
							we've all had those moments where we realize we're not going to make it to our own bed for the night, whether it's because you're on a date or you're out with your girlfriends and end the night in an impromptu sleepover. 
							Either way, the next morning can be more than a little awkward when you don't have anything you need to get through the morning ritual, 
							whether that's brunch, heading into the office or whatever else your day has to offer. You can't just go around carrying a weekender bag
							full of gear for moments like these! But you can step up your game and know exactly how to rock an outfit and overnight bag that is on the DL 
							when you think that there may be a potential for a particularly late night. Here is your guide to orchestrate  a solid date night look and repurpose
							it for the next day without any sign of intending to set up shop for the evening ;)

							We've all had those moments where we realize we're not going to make it to our own bed for the night, whether it's because you're on a date or you're out with your girlfriends and end the night in an impromptu sleepover. 
							Either way, the next morning can be more than a little awkward when you don't have anything you need to get through the morning ritual, 
							whether that's brunch, heading into the office or whatever else your day has to offer. You can't just go around carrying a weekender bag
							full of gear for moments like these! But you can step up your game and know exactly how to rock an outfit and overnight bag that is on the DL 
							when you think that there may be a potential for a particularly late night. Here is your guide to orchestrate  a solid date night look and repurpose
							it for the next day without any sign of intending to set up shop for the evening ;)

						</p>


						<div class="container">
							<div class="row prev-next-links">
								<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"><p>
							<!-- <a href="">

							STARTING A NEW LIFE WITH A DOG</a> -->
							<?php if(get_adjacent_post(true, '', true)) {  ?>

							<span class="glyphicon glyphicon-step-backward"></span>
							<?php previous_post_link(); ?>
							<?php } ?>

						</p></div>
						<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"><p>
							<?php if(get_adjacent_post(true, '', false)) { ?>
							<?php next_post_link(); ?>

							<span class="glyphicon glyphicon-step-forward"></span>
							<?php } ?>


						</p></div>
					</div>

					<div class="row">



						<?php
						$args = array( 'numberposts' => '3' );
						$recent_posts = wp_get_recent_posts( $args );
						foreach( $recent_posts as $recent ){ 
							setup_postdata($recent); 
							

							?>


						<div class="col-lg-2 col-md-2 col-sm-4  hidden-xs thumb-more <?php if (!has_post_thumbnail($recent['ID']) ){ echo 'pad-little';
							} ?> ">
							<a href="<?php echo get_permalink($recent["ID"]); ?>">

<?php if ( has_post_thumbnail($recent['ID']) ) {
	

										$url = wp_get_attachment_url( get_post_thumbnail_id($recent["ID"]) ); 
										?>
										<img src="<?php echo $url; ?>" longdesc="<?php the_title(); ?>" alt="<?php the_title(); ?>" class="img-responsive" />

										<?php }
										?>
											 

										


								<p><?php echo $recent["post_title"]; ?></p>


							</a>

						</div>
						<?php }
						
						?>




					</div>
				<?php //comments_template( '/short-comments.php' ); ?>


				</div>






			</div>

		<?php endwhile; ?>
	<?php endif; ?>
	<div class="col-lg-1 col-md-2 hidden-sm hidden-xs"></div>

</div>


</div>

<?php get_footer(); ?>