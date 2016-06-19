<?php
    $title            = get_field('main_team_title');
    $team_members_ids = get_field('team_members_to_display');
?>
<?php if($team_members_ids):?>
<div class="our-team our-team-component">
    <div class="wrapper">
        <header class="heading heading--md">
          <h2 class="heading-title"><?php echo $title;?></h2>
        </header>
        <?php
            $args = array('post_type'=>'member','posts_per_page'=>-1,'post__in'=>$team_members_ids);
            $query = new WP_Query($args);
            if(is_page_template('template-management.php')){
                $managemnet_team_members_ids = get_field('management_team_members');
                $count_mangement = count($managemnet_team_members_ids);
                $i = $count_mangement+1;
            }
            $items_in_row = 4; // How many Columns to wrap in a Row
            $k = 0;
            $count_items = $query->found_posts;
            if($query->have_posts()):
                while($query->have_posts()): $query->the_post();
                    $thumb_array = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'team_member');
                    $role        = get_field('role');
                    $sub_title   = get_field('sub_title');

                    if($k%$items_in_row == 0 ){
                        echo '<ul class="row row--sm row--equal-height-flex">';
                    }
                ?>

                        <li class="col col-1-4 col-md-1-2 <?php if(($k+1)%4 == 0){echo 'no-border';}?>">
                            <?php if(is_page_template('template-management.php')):?>
                                <a href="#" data-toggle="modal" data-target="#team-photos-modal-<?php echo $i;?>" class="db our-team-item">
                            <?php else: ?>
                                <div class="our-team-item">
                            <?php endif; ?>

                                <?php if($thumb_array): ?>
                                    <img src="<?php echo $thumb_array[0];?>" alt="" class="db fluid"/>
                                <?php endif; ?>
                                <div class="item-text">
                                    <p class="name"><?php the_title();?></p>
                                    <p class="title"><?php echo $role; ?></p>
                                    <p class="desc"><?php echo $sub_title; ?></p>
                                </div>

                            <?php if(is_page_template('template-management.php')):?>
                                </a>
                            <?php else: ?>
                                </div>
                            <?php endif; ?>

                        </li>
        <?php
                    if( ( ($k+1)%$items_in_row == 0 && $k!=0) || $k+1 == $count_items){
                        echo '</ul>';
                    }
                    $k++; $i++;
                    endwhile;
            endif; wp_reset_postdata();
        ?>
    </div>
</div>
<?php endif; ?>


<?php if(is_page_template('template-management.php')):?>
    <?php
        $managemnet_team_members_ids = get_field('management_team_members');
        $count_mangement = count($managemnet_team_members_ids);
        $j = $count_mangement+1;
        if($query->have_posts()):
            $j=$count_mangement+1;
            while($query->have_posts()): $query->the_post();
    ?>
            <div id="team-photos-modal-<?php echo $j;?>" class="modal-wrapper">
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

<?php endif; ?>
