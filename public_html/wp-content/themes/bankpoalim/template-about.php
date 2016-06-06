<?php /* Template Name: About */ get_header();?>

<?php
    $main_title      = get_field('page_title') ? get_field('page_title') : get_the_title($post->ID);
    $main_subtitle    = get_field('page_subtitle');
    $read_more_link  = get_field('content_read_more_link') ? get_field('content_read_more_link') : "";
?>

<div id="content" class="wrapper wrapper--mobile-paddingless about">

    <?php while (have_posts()) : the_post(); ?>

    <div class="row row--equal-height row--lg">
        <div class="col col-2-3 col-about white-bg">
            <div class="dp">
                <header class="heading heading--md">
                    <h2 class="heading-h">
                        <?php if($main_title): ?>
                            <span class="heading-title"><?php echo $main_title; ?></span>
                        <?php endif; ?>
                        <?php if($main_subtitle): ?>
                            <span class="heading-tagline"><?php echo $main_subtitle;?></span>
                        <?php endif; ?>
                    </h2>
                </header>
                <p class="body-text"><?php echo get_the_content();?></p>
                <?php if($read_more_link): ?>
                    <a href="<?php echo $read_more_link;?>" class="read-more"><span><?php _e('Read More','bank');?></span>
                        <img src="<?php echo THEME;?>/images/icons/chevron-right-thin.png" alt="" class="icon">
                    </a>
                <?php endif; ?>
            </div>
          <?php get_template_part('inc/about/mod','financial-report'); ?>
        </div>
        <?php get_template_part('inc/about/about','sidebar'); ?>
    </div>
<?php endwhile; // have_posts ?>
  <?php get_template_part('inc/about/boxes','after-content'); ?>
</div>
<?php get_template_part('inc/about/bottom','logos'); ?>

<?php get_footer();?>
