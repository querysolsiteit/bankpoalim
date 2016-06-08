<?php /* Template Name: Mobile */ get_header();?>

<?php
    $main_title      = get_field('main_page_title') ? get_field('main_page_title') : get_the_title($post->ID);
    $main_subtitle    = get_field('main_page_subtitle');
?>

<div id="content" class="wrapper wrapper--mobile-paddingless clearfix mobile-services mb-60">
  <div class="fluid-wrapper">
    <div class="fluid-col">
      <div class="white-bg dp">
        <header class="heading heading--lg">
          <h1 class="heading-h">
              <?php if($main_title): ?>
                  <span class="heading-title"><?php echo $main_title; ?></span>
              <?php endif; ?>
              <?php if($main_subtitle): ?>
                  <span class="heading-tagline"><?php echo $main_subtitle;?></span>
              <?php endif; ?>
          </h1>
        </header>

        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
              <div class="body-text">
                  <?php the_content(); ?>
              </div>
          <?php endwhile; ?>
        <?php endif; ?>

        <?php get_template_part('inc/mod','page-slider'); ?>
      </div>
    </div>
  </div>

  <div class="fixed-col">
      <?php get_template_part('inc/mod','sidebar-boxes'); ?>
  </div>
</div>

<?php get_footer(); ?>
