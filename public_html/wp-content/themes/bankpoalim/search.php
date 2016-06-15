<?php get_header(); ?>

	<div id="content" class="wrapper wrapper--mobile-paddingless search-results clearfix">
	  <div class="fluid-wrapper">
	    <div class="fluid-col mb-60">
	      <div class="white-bg search-results-wrapper">
			  <div class="search-bar">
				  <form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
			  		<input id="search-input" type="text" name="s" placeholder="<?php _e('Search','bank');?>" role="search" aria-label="<?php _e('Search','bank');?>" class="db fluid search-results-input"/>
			  		<img src="<?php echo THEME; ?>/images/icons/search-big.png" alt="" class="icon"/>
				  </form>
				<h1 class="search-results-title">
					<span class="query">
						<?php echo get_search_query();?>
					</span>
					<span class="search-found">
						<?php echo sprintf(__('Found %s', 'bank'), $wp_query->found_posts);?>
					</span>
				</h1>
              </div>

			  <?php if (have_posts()) : ?>
			  	<ul>
				  <?php while (have_posts()) : the_post(); ?>
					<li class="search-results-item">
						<a href="#" class="db">
							<header class="heading heading--no-stripe">
							  <h5 class="heading-title"><?php the_title();?></h5>
							</header>
							<div class="body-text">
								<?php the_excerpt(); ?>
							</div>
							<p class="date"><?php the_date('F j, Y');?></p>
						</a>
					</li>
				<?php endwhile; ?>
				</ul>
				<?php
					if ( function_exists('custom_search_pagination') ){
						custom_search_pagination();
					}
				?>
			<?php endif; ?>

	      </div>
	    </div>
	  </div>

	  <div class="fixed-col">
	      <?php get_template_part('inc/mod','sidebar-boxes'); ?>
	  </div>
	</div>

	<?php get_footer(); ?>
