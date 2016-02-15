
<form class="navbar-form" role="search" action="<?php echo home_url( '/' ); ?>" method="get">
<div class="input-group">
						<input type="text" class="form-control" placeholder="Search" name="s" id="search" value="<?php the_search_query(); ?>">
						<span class="input-group-btn">
							<button class="btn btn-primary whiteonblack" type="submit">Go!</button>
						</span>
					</div>
</form>