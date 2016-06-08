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
	<body <?php body_class(); ?>>
		<!-- Start html -->
		<?php get_template_part('inc/header/mod','accessibility');?>

		<?php
				if(is_page_template('template-main.php')){
					$header_class = 'header home-header main-header';
					$header_id = 'home-header';
				}
				elseif(is_page_template('template-private.php')){
					$header_class = 'header header--private home-header';
					$header_id = 'home-header';
				}
				else{
					$header_class = 'header';
					$header_id = 'page-header';
				}
			?>
			<header id="<?php echo $header_id;?>" class="<?php echo $header_class;?>">

			  <nav aria-label="Top Navigation" role="navigation" class="top-bar clearfix">
				  <div class="wrapper">
				  <?php get_template_part('inc/header/mod','global-websites'); ?>
				  <ul class="dib top-bar-ul top-bar-right transformed">
					<div id="right-group" class="right-group dib">
						  <li class="dib language_switcher">
							  <?php icl_post_languages(); ?>
						  </li>
			  			<span class="top-bar-divider">|</span>
						<?php get_template_part('inc/header/top','right-menu');?>
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

					if(is_page_template('template-main.php') || is_page_template('template-private.php')){
						get_template_part('inc/home/mod','home-slider');
					}

						get_template_part('inc/header/mod','page-banner');
						get_template_part('inc/header/mod','secondary-menu');
					}
				?>
			</header>
