<form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
	<li class="dib search-input-wrapper">
		<input id="search-input" type="text" name="s" placeholder="<?php _e('Search','bank');?>" role="search" aria-label="<?php _e('Search','bank');?>" class="input-reset search-input"/>
	</li>
	<li class="dib">
		<a id="search-toggle" href="#" aria-label="Search button" class="db top-bar-link search">
		<img src="<?php echo THEME; ?>/images/icons/search.png" alt="" class="icon"/></a>
	</li>
	<!-- <button class="search-submit" type="submit" role="button"></button> -->
</form>
