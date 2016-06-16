<?php get_header();?>

<div id="content" class="wrapper wrapper--mobile-paddingless clearfix mobile-services mb-60">
  <div class="fluid-wrapper">
    <div class="fluid-col">
      <div class="white-bg dp">
        <header class="heading heading--lg">
          <h1 class="heading-h">
              <span class="heading-title"><?php post_type_archive_title(); ?></span>
          </h1>
        </header>

        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
              <h3><?php the_title();?></h3>
              <div class="body-text">
                  <?php the_content(); ?>
              </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="fixed-col">
      <?php get_template_part('inc/mod','sidebar-boxes'); ?>
  </div>
</div>

<?php get_footer(); ?>
