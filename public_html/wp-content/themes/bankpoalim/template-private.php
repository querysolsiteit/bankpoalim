<?php /* Template Name: Private */ get_header();?>

<?php
    $main_title      = get_field('main_page_title') ? get_field('main_page_title') : get_the_title($post->ID);
    $main_subtitle    = get_field('main_page_subtitle');
?>

<div id="content" class="wrapper wrapper--mobile-paddingless private-pg clearfix ov-hidden mb-60">
    <div class="fluid-wrapper">
        <div class="fluid-col equal-height private-banking">
            <div class="dp">
                <header class="heading heading--md">
                    <h2 class="heading-title">
                        <?php if($main_title): ?>
                            <span class="heading-title"><?php echo $main_title; ?></span>
                        <?php endif; ?>
                        <?php if($main_subtitle): ?>
                            <span class="heading-tagline"><?php echo $main_subtitle;?></span>
                        <?php endif; ?>
                    </h2>
                </header>

                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
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

<?php get_template_part('inc/mod','services'); ?>

</div>
<div class="wrapper mb-60">
  <?php get_template_part('inc/home/mod','global-presence'); ?>
</div>

<?php get_footer();?>
