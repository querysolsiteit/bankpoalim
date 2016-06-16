<?php /* Template Name: Testimonials 1 */ get_header();?>

<?php
    $main_title    = get_field('main_page_title') ? get_field('main_page_title') : get_the_title($post->ID);
    $main_subtitle = get_field('main_page_subtitle');
?>

<div id="content" class="wrapper wrapper--mobile-paddingless mb-60 testimonials">
    <div class="white-bg">
        <div class="dp">
            <header class="heading heading--lg">
                <h1 class="heading-title"><?php echo $main_title;?></h1>
            </header>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="body-text">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <?php get_template_part('inc/mod','testimonials-1'); ?>

    </div>
</div>

<?php get_footer(); ?>
