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
						    <div class="row">
                                  <header class="archive-header">
									<?php
										the_archive_title( '<h2 class="archive-title">', '</h2>' );
									?>
								</header>
						    </div>
							<div class="row postrow">


                       <?php if ( have_posts() ) : ?>			

			             <?php while ( have_posts() ) : the_post(); ?>

								<div class="col-lg-3 col-md-4 col-sm-3 col-xs-7 post text-center">
									<a href="#">
									   <?php if(has_post_thumbnail()) : ?>
										   <img src="<?php get_post_thumbnail(); ?>" class="img-responsive">
									   <?php  else : ?>
									      <img src="<?php get_bloginfo('template_url').'/media/images/traintrack.jpg'; ?>" class="img-responsive">	   
									   <?php endif; ?>
									   <?php
                                          $catz = get_the_category();
                                          if ($catz) :
									   ?>
										<p class="p-category"><?php echo esc_html($catz[0]->name); ?></p>
									   <?php endif; ?>
										<h1 class="p-title"><?php the_title(); ?></h1>
										<p class="p-preview"><?php the_excerpt(); ?></p>
									</a>
								</div>
								
								
								<?php endwhile; // end of the loop. ?>

		                     <?php else : ?>

		                     	<div class="col-lg-3 col-md-4 col-sm-3 col-xs-7 post text-center">
                                     <span>Posts not found !</span>
		                     	</div>

		                     <?php endif; ?>	
								
							</div>
						</div>


					</div>
					<div class="col-lg-1 col-md-2 hidden-sm hidden-xs"></div>

				</div>
				<div class="row">
                 
                        <h1 class="widget-title">Posts By Month</h1>
                        <div class="archive-montly">
                           <p class="cute-paragraph">
                              <?php wp_get_archives('type=monthly&format=custom&after= #'); ?>
                           </p>
                        </div>

				</div>

			</div>
 
<?php get_sidebar(); ?>
<?php get_footer(); ?>