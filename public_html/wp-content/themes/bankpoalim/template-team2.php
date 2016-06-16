<?php /* Template Name: Team 2 */ get_header();?>

<?php
    $main_title    = get_field('main_page_title') ? get_field('main_page_title') : get_the_title($post->ID);
    $main_subtitle = get_field('main_page_subtitle');

    $args = array( 'posts_per_page' => -1, 'post_type'=>'member');
    $members_query = new WP_Query( $args );
?>
<div id="content" class="wrapper wrapper--mobile-paddingless mb-60 team">
    <div class="white-bg dp">
        <header class="heading heading--lg">
            <h1 class="heading-title"><?php echo $main_title;?></h1>
        </header>
        <p class="body-text body-text--lg summary"><?php echo get_the_content($post->ID);?></p>
        <div class="row row--md row--with-gutter">
            <?php if ($members_query->have_posts()):
                    $k=1;
            ?>
                <?php while ( $members_query->have_posts() ) : $members_query->the_post(); ?>
                    <?php
                        $role = get_field('role');
                        $email = get_field('email');
                        $tel = get_field('phone_number');
                        $color = get_field('box_color');
                    ?>
                    <div class="col col-1-3 col-md-1-2">
                        <div class="team-item team-item--b <?php echo $color;?>">
                            <img src="<?php echo THEME; ?>/images/team-item-<?php echo $color;?>.png" alt="" class="team-item-img"/>
                            <header class="heading heading--sm heading--no-stripe heading--centered">
                                <h3 class="heading-h">
                                    <span class="heading-title"><?php the_title(); ?></span>
                                    <span class="heading-tagline"><?php echo $role;?></span>
                                </h3>
                            </header>
                            <ul class="team-item-info">
                                <li>
                                    <img src="<?php echo THEME; ?>/images/icons/phone.png" alt="" class="icon"/>
                                    <span class="team-item-info-text"><?php _e('Tel:','bank');?>  <?php echo $tel;?></span>
                                </li>
                                <li>
                                    <img src="<?php echo THEME; ?>/images/icons/envelope.png" alt="Email" class="icon"/>
                                    <a href="mailto:<?php echo $email;?>" class="db team-item-info-text"><?php echo $email;?></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                <?php $k++; endwhile; ?>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
