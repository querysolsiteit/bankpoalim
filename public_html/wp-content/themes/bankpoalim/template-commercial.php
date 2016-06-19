<?php /* Template Name: Commercial Banking */ get_header(); ?>

<?php
    $main_title     = get_field('main_page_title') ? get_field('main_page_title') : get_the_title($post->ID);
    $main_subtitle  = get_field('main_page_subtitle');
?>

<div id="content" class="wrapper wrapper--mobile-paddingless">
    <div class="white-bg dp commercial-banking">
        <div class="row row--with-gutter row--xl">

            <div class="col col-1-3">
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
            <div class="col col-2-3 info">
                <?php while(have_posts()): the_post(); ?>
                    <div class="body-text">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <?php get_template_part('inc/mod','commercial-boxes'); ?>
    </div>
</div>

<?php get_template_part('inc/mod','team-component'); ?>

<?php get_footer(); ?>
