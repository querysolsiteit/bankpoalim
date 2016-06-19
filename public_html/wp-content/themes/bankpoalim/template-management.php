<?php /* TEmplate Name: Management */ get_header();?>

<?php
    $main_title    = get_field('main_page_title') ? get_field('main_page_title') : get_the_title($post->ID);
    $main_subtitle = get_field('main_page_subtitle');
?>

<div id="content" class="wrapper wrapper--mobile-paddingless">
    <div class="white-bg team-photos">
        <div class="dp">
            <header class="heading heading--lg">
                <h1 class="heading-title"><?php echo $main_title; ?></h1>
            </header>
            <?php while(have_posts()): the_post(); ?>
                <div class="body-text">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
        </div>
        <?php $managemnet_team_members_ids = get_field('management_team_members'); ?>
        <div class="our-team our-team-gray">
        <?php
            $args = array('post_type'=>'member','posts_per_page'=>-1,'post__in'=>$managemnet_team_members_ids);
            $query_1 = new WP_Query($args);
            $items_in_row = 4; // How many Columns to wrap in a Row
            $k = 0;
            $count_items = $query_1->found_posts;
            if($query_1->have_posts()):
                while($query_1->have_posts()): $query_1->the_post();
                    $thumb_array = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'team_member');
                    $role        = get_field('role');
                    $sub_title   = get_field('sub_title');

                    if($k%$items_in_row == 0 ){
                        echo '<ul class="row row--sm row--equal-height-flex">';
                    }
                ?>
                    <li class="col col-1-3">
                        <?php
                            $thumb_array = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'team_member');
                            $role        = get_field('role');
                            $sub_title   = get_field('sub_title');
                        ?>
                        <a href="" data-toggle="modal" data-target="#team-photos-modal-<?php echo $k+1;?>" class="db our-team-item">
                            <?php if($thumb_array): ?>
                                <img src="<?php echo $thumb_array[0];?>" alt="" class="db fluid"/>
                            <?php endif; ?>
                            <div class="item-text">
                                <p class="name"><?php the_title();?></p>
                                <p class="title"><?php echo $role; ?></p>
                                <p class="desc"><?php echo $sub_title; ?><img src="<?php echo THEME;?>/images/icons/double-chevron.png" alt="" class="icon"/></p>
                            </div>
                        </a>
                    </li>
        <?php
                    if( ( ($k+1)%$items_in_row == 0 && $k!=0) || $k+1 == $count_items){
                        echo '</ul>';
                    }
                    $k++;
                    endwhile;
            endif; wp_reset_postdata();
        ?>
        </div>

        <?php get_template_part('inc/mod','team-component'); ?>
    </div>
</div>

<?php
    $managemnet_team_members_ids = get_field('management_team_members');
    $args = array('post_type'=>'member','posts_per_page'=>-1,'post__in'=>$managemnet_team_members_ids);
    $query_1 = new WP_Query($args);
    if($query_1->have_posts()):
        $j=0;
        while($query_1->have_posts()): $query_1->the_post();
?>
        <div id="team-photos-modal-<?php echo $j+1;?>" class="modal-wrapper">
            <div class="modal team-modal modal--wide">
                <button data-role="close-modal" class="btn btn-blank btn-close-modal">
                    <img src="<?php echo THEME;?>/images/icons/times.png" alt="" class="icon"/>
                </button>
                <div class="slider-arrows-wrapper">
                    <button data-toggle-next="true" class="btn btn-slider-arrow next theme">
                        <img src="<?php echo THEME;?>/images/icons/slick-right.png" alt="" class="icon"/>
                    </button>
                    <button data-toggle-prev="true" class="btn btn-slider-arrow prev gray">
                        <img src="<?php echo THEME;?>/images/icons/slick-left.png" alt="" class="icon"/>
                    </button>
                </div>
                <div class="modal-content">
                    <?php
                        $thumb_array = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'modal_team_member');
                        $role        = get_field('role');
                        $sub_title   = get_field('sub_title');
                    ?>
                    <header class="heading heading--no-stripe heading--centered team-photo-header team-header">
                        <?php if($thumb_array): ?>
                            <img src="<?php echo $thumb_array[0];?>" alt="" class="heading-image"/>
                        <?php endif; ?>
                        <h3 class="heading-h">
                            <span class="heading-title"><?php the_title();?></span>
                            <span class="heading-tagline"><?php echo $sub_title; ?></span>
                        </h3>
                    </header>
                    <div class="dp body-text team-modal-content"><?php the_content(); ?></div>
                </div>
            </div>
        </div>
<?php $j++; endwhile; ?>
<?php endif; wp_reset_postdata();?>

<?php get_footer(); ?>
