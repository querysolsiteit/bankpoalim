<?php /* template Name: Locations */ get_header() ?>

<?php
    $main_title      = get_field('main_page_title') ? get_field('main_page_title') : get_the_title($post->ID);
    $main_subtitle    = get_field('main_page_subtitle');
    $display_text = get_field('display_text_and_content');
    $display_global = get_field('display_global_presence');
?>

<div id="content" class="wrapper wrapper--mobile-paddingless locations">
    <?php
        if($display_global){
            get_template_part('inc/home/mod','global-presence');
        }
    ?>
    <div class="white-bg dp">
        <?php if($display_text): ?>
            <header class="heading heading--lg">
              <h1 class="heading-title"><?php echo $main_title;?></h1>
              <?php if($main_subtitle): ?>
                  <span class="heading-tagline"><?php echo $main_subtitle;?></span>
              <?php endif; ?>
            </header>
            <div class="body-text body-text--lg"><?php echo the_content($post->ID); ?></div>
        <?php endif; ?>
    <?php
        $args = array('post_type'=>'location','posts_per_page'=>-1);
        $locations_query = new WP_Query($args);
        if($locations_query->have_posts()):
    ?>
        <div class="row row--with-gutter row--md">
            <?php while ( $locations_query->have_posts() ) : $locations_query->the_post(); ?>
                <?php
                    $image_arr   = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'location');
                    $branch_name = get_field('branch_name');
                    $address     = get_field('address');
                    $tel         = get_field('telephone');
                    $fax         = get_field('fax');
                    $email       = get_field('email');
                ?>
                <div class="col col-1-3 col-lg-1-2">
                    <div class="locations-item">
                        <?php if($image_arr): ?>
                            <div class="locations-item-thumb">
                                <img src="<?php echo $image_arr[0];?>" alt=""/>
                            </div>
                        <?php endif; ?>
                        <div class="locations-item-text">
                            <header class="heading heading--sm heading--no-stripe">
                                <h3 class="heading-h">
                                    <span class="heading-title"><?php the_title(); ?></span>
                                    <span class="heading-tagline"><?php echo $branch_name;?></span>
                                </h3>
                            </header>
                            <p class="address-line"><?php echo $address;?></p>
                            <ul class="contact-info">
                                <li>
                                    <img src="<?php echo THEME;?>/images/icons/phone.png" alt="" class="icon"/>
                                    <span class="contact-item-text"><?php _e('Tel:','bank');?>  <?php echo $tel;?></span>
                                </li>
                                <li>
                                    <img src="<?php echo THEME;?>/images/icons/doc.png" alt="" class="icon"/>
                                    <span class="contact-item-text"><?php _e('Fax:','bank');?>  <?php echo $fax;?></span>
                                </li>
                                <li>
                                    <img src="<?php echo THEME;?>/images/icons/envelope.png" alt="Email" class="icon"/>
                                    <a href="mailto:<?php echo $email;?>" class="contact-item-text"><?php echo $email; ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; wp_reset_postdata(); ?>
    </div>
</div>


<?php get_footer(); ?>
