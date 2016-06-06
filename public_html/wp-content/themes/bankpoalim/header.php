<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		<!-- dns prefetch -->
		<link href="//www.google-analytics.com" rel="dns-prefetch" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon" />
		<?php wp_head(); ?>
		<script type="text/javascript">
			var ThemeUrl = '<?php echo THEME; ?>';
		</script>
	</head>
	
	<!-- rtrtyrt -->
	<body <?php body_class(); ?>>
		<!-- Start html -->
			<?php get_template_part('inc/header/mod','accessibility');?>

			<?php if(is_home() || is_front_page()): ?>
				<header id="home-header" class="header home-header main-header">
			<?php else: ?>
				<header id="page-header" class="header">
			<?php endif; ?>
			  <nav aria-label="Top Navigation" role="navigation" class="top-bar clearfix">
				  <div class="wrapper">
				  <?php get_template_part('inc/header/mod','global-websites'); ?>
				  <ul class="dib top-bar-ul top-bar-right transformed">
					<div id="right-group" class="right-group dib">
						  <li class="dib language_switcher">
							  <?php icl_post_languages(); ?>
						  </li>
			  			<span class="top-bar-divider">|</span>
						<?php
						/*
							$top_right_links = get_field('top_right_links','option');
							if(!empty($top_right_links)):
								foreach ($top_right_links as $top_link):
									$top_title        = $top_link['title'];
									$top_link         = $top_link['link_to'];
									$hide_in_home = $top_link['hide_in_homepage'];
									?>
								  <li class="dib"><a href="<?php echo $top_link;?>" class="db top-bar-link"><?php echo $top_title;?></a></li>
				  			<?php endforeach; ?>
			  			<?php endif; ?>
						*/?>
					</div>
					<?php get_search_form();?>
				  </ul>
				</div>
			  </nav>
			  <div id="main-nav-waypoint" <?php if(is_home() || is_front_page()){echo 'class="home-waypoint"';}?>></div>
			  <nav id="main-nav" aria-label="Main Navigation" role="navigation" class="main-nav">
				  <?php wp_nav_menu(
						  array(
							  'theme_location' => 'main-menu',
							  'menu_class' => 'row row--with-dividers',
							  'container_class'=>'wrapper',
							  'walker'=> new Main_Walker_Nav_Menu
					  	));
				  ?>
			  </nav>
			  <?php
					get_template_part('inc/header/mod','mobile-menu');

					if(is_home() || is_front_page()){
						get_template_part('inc/home/mod','home-slider');
					}

					if(!is_home() && !is_front_page()){
						get_template_part('inc/header/mod','page-banner');
						get_template_part('inc/header/mod','secondary-menu');
					}
				?>
			</header>
