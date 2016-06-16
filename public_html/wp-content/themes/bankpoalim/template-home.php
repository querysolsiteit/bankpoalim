<?php /* Template Name: Home */ get_header();?>

<?php
    $main_title     = get_field('main_page_title') ? get_field('main_page_title') : get_the_title($post->ID);
    $main_subtitle  = get_field('main_page_subtitle');
?>

<div id="content" class="wrapper wrapper--mobile-paddingless home-pg clearfix ov-hidden mb-60">
  <div class="home-pg-get-started clearfix">
    <div class="get-started">
      <div class="get-started-bg"></div>
      <div class="dp">
          <header class="heading heading--lg heading--white">
              <h1 class="heading-h">
              <?php if($main_title): ?>
                  <span class="heading-title"><?php echo $main_title; ?></span>
              <?php endif; ?>
              <?php if($main_subtitle): ?>
                  <span class="heading-tagline"><?php echo $main_subtitle;?></span>
              <?php endif; ?>
              </h1>
          </header>
          <?php while(have_posts()): the_post(); ?>
              <div class="body-text">
                  <?php the_content(); ?>
              </div>
          <?php endwhile; ?>
      </div>
    </div>
  </div>
  <?php get_template_part('inc/home/mod','financial-highlights');?>
</div>

<?php get_template_part('inc/mod','services'); ?>

<?php get_template_part('inc/mod','specialties'); ?>

<?php get_footer(); ?>
