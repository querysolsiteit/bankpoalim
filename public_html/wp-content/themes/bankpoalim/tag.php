<?php get_header();?>

<div id="content" class="wrapper wrapper--mobile-paddingless clearfix mobile-services mb-60">
  <div class="fluid-wrapper">
    <div class="fluid-col">
      <div class="white-bg dp">
        <header class="heading heading--lg">
          <h1 class="heading-h">
              <span class="heading-title"><?php single_tag_title(); ?></span>
          </h1>
        </header>
        <?php
            $args = array( 'post_type'=>'testimonial', 'posts_per_page' => -1);
            $testimonials_query = new WP_Query( $args );
         ?>
        <?php if ($testimonials_query->have_posts()) : ?>
          <?php while ($testimonials_query->have_posts()) : $testimonials_query->the_post(); ?>
              <h3><?php the_title();?></h3>
              <div class="body-text">
                  <?php the_content(); ?>
              </div>
          <?php endwhile; ?>
        <?php endif; wp_reset_postdata(); ?>
      </div>
    </div>
  </div>

  <div class="fixed-col">
      <?php get_template_part('inc/mod','sidebar-boxes'); ?>
  </div>
</div>

<?php get_footer(); ?>
