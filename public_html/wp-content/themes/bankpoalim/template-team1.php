<?php /* Template Name: Team 1 */ get_header();?>

<?php
    $main_title    = get_field('main_page_title') ? get_field('main_page_title') : get_the_title($post->ID);
    $main_subtitle = get_field('main_page_subtitle');

    $args = array( 'posts_per_page' => -1, 'post_type'=>'member');
    $members_query = new WP_Query( $args );
?>
<div id="content" class="wrapper wrapper--mobile-paddingless mb-60 team">
    <div class="white-bg dp">
        <header class="heading heading--lg">
            <h1 class="heading-title">Team</h1>
        </header>
        <p class="body-text body-text--lg summary">BHI’s Global Reach is Tailored to its Client’s Needs BHI’s Global Reach is Tailored to its Client’s Needs BHI’s Global Reach is Tailored to its Client’s Needs BHI’s Global Reach is Tailored to its Client’s Needs</p>
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
                          <a href="#" data-toggle="modal" data-target="#team-text-modal-<?php echo $k;?>" class="team-item <?php echo $color;?>">
                              <img src="<?php echo THEME; ?>/images/team-item-<?php echo $color;?>.png" alt="" class="team-item-img"/>
                              <header class="heading heading--sm heading--no-stripe heading--centered">
                                <h3 class="heading-h">
                                    <span class="heading-title"><?php the_title(); ?></span>
                                    <span class="heading-tagline"><?php echo $role;?></span>
                                </h3>
                              </header>
                              <p class="team-item-text body-text body-text--lg"><?php echo wp_trim_words(get_the_excerpt(),15,'');?></p>
                          </a>
                      </div>
                      <?php /*
                      <div id="team-text-modal-<?php echo $k;?>" class="modal-wrapper">
                        <div class="modal team-modal modal--primary">
                          <button data-role="close-modal" class="btn btn-blank btn-close-modal"><img src="<?php echo THEME; ?>/images/icons/times.png" alt="" class="icon"/></button>
                          <div class="slider-arrows-wrapper">
                            <button data-toggle-next="true" class="btn btn-slider-arrow next theme"><img src="<?php echo THEME; ?>/images/icons/slick-right.png" alt="" class="icon"/></button>
                            <button data-toggle-prev="true" class="btn btn-slider-arrow prev gray"><img src="<?php echo THEME; ?>/images/icons/slick-left.png" alt="" class="icon"/></button>
                          </div>
                          <div class="modal-content">
                            <header class="heading heading--sm heading--no-stripe heading--centered team-header team-text-header"><img src="<?php echo THEME; ?>/images/icons/user.png" alt="" class="heading-avatar"/>
                                <h3 class="heading-h">
                                    <span class="heading-title"><?php the_title(); ?></span>
                                    <span class="heading-tagline"><?php echo $role;?></span>
                                </h3>
                            </header>
                            <p class="dp body-text team-modal-content"><?php the_content();?></p>
                          </div>
                        </div>
                      </div>
                      */?>
                <?php $k++; endwhile; ?>
            <?php endif; wp_reset_postdata();?>
        </div>
    </div>
</div>





<?php get_footer(); ?>
