<?php /* Template Name:  Contact Us */ get_header();?>
<?php
    $main_title             = get_field('main_page_title') ? get_field('main_page_title') : get_the_title($post->ID);
    $main_subtitle          = get_field('main_page_subtitle');
    $contact_form_shortcode = get_field('contact_form_shortcode');
    $display_sidebar        = get_field('display_sidebar');
?>

<div id="content" class="wrapper wrapper--mobile-paddingless mb-60 clearfix contact">
  <div class="fluid-wrapper">
    <div class="fluid-col <?php if(!$display_sidebar){ echo 'full_width';}?>">
      <div class="white-bg dp">
        <header class="heading heading--lg">
          <h1 class="heading-h">
              <?php if($main_title): ?>
                  <h1 class="heading-title"><?php echo $main_title; ?></h1>
              <?php endif; ?>
              <?php if($main_subtitle): ?>
                  <span class="heading-tagline"><?php echo $main_subtitle;?></span>
              <?php endif; ?>
          </h1>
        </header>

        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
              <div class="body-text body-text--lg">
                  <?php the_content(); ?>
              </div>
          <?php endwhile; ?>
        <?php endif; ?>

        <?php
            if($contact_form_shortcode){
                echo do_shortcode($contact_form_shortcode);
            }
        ?>
      </div>
    </div>
  </div>
  <?php if($display_sidebar):?>
      <div class="fixed-col">
          <?php get_template_part('inc/mod','sidebar-boxes'); ?>
      </div>
  <?php endif; ?>
</div>

<?php get_footer(); ?>
