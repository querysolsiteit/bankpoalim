<?php /* Template Name: Industry */ get_header();?>

<?php
    $main_title     = get_field('main_page_title') ? get_field('main_page_title') : get_the_title($post->ID);
    $main_subtitle  = get_field('main_page_subtitle');
    $side_title     = geT_field('sidebox_title');
    $side_sub_title = geT_field('sidebox_sub_title');
    $side_content   = geT_field('sidebox_content');
    $side_btn_text  = geT_field('sidebox_button_text');
    $side_link      = geT_field('sidebox_button_link');
    $side_bg        = geT_field('sidebox_bg_image');
?>

<div id="content" class="wrapper wrapper--mobile-paddingless industry-page">
  <div class="dp white-bg mb-60">
    <div class="row row--with-gutter row--xl">
      <div class="col col-title">
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
      </div>
        <?php while(have_posts()): the_post(); ?>
            <div class="col col-summary">
                <div class="body-text">
                    <?php the_content(); ?>
                </div>
            </div>
        <?php endwhile; ?>

      <div class="col col-get-started">
        <div class="get-started" style="background:url(<?php echo $side_bg['url'];?>);">
          <div class="dp">
            <header class="heading heading--xs heading--no-stripe">
              <h4 class="heading-title"><span><?php echo $side_title;?></span><span><?php echo $side_sub_title;?></span></h4>
            </header>
            <p class="body-text body-text--lg"><?php echo $side_content;?></p>
            <a href="<?php echo $side_link;?>" class="btn btn-gray btn--compact db with-chevron">
                <?php echo $side_btn_text; ?>
                <img src="<?php echo THEME;?>/images/icons/chevron-right-thin.png" alt="" class="icon">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_template_part('inc/mod','services'); ?>

<?php get_template_part('inc/mod','specialties'); ?>

<?php get_footer(); ?>
