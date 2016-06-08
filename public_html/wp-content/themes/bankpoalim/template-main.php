<?php /* Template Name: Main */ get_header(); ?>


<div class="main-pg">

    <?php get_template_part('inc/home/mod','main-links-mobile'); ?>

    <div class="wrapper wrapper--mobile-paddingless">
        <?php get_template_part('inc/home/mod','global-presence'); ?>
    </div>
    <?php get_template_part('inc/home/mod','boxes'); ?>

</div>

<?php get_footer(); ?>
