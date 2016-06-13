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




<div class="white-bg private-pg services-tailored mb-60">
    <?php
    $services_title    = get_field('services_main_title');
    $services_desc     = get_field('services_main_description');
    $services_repeater = get_field('services_repeater');
    ?>
  <div class="wrapper">
    <header class="heading heading--md heading--centered">
      <h2 class="heading-title"><?php echo $services_title;?></h2>
      <p class="body-text body-text--lg"><?php echo $services_desc;?></p>
    </header>
    <?php if(!empty($services_repeater)):
        $items_in_row = 3;
        $k = 0;
        $count_services = count($services_repeater);
        ?>
    <?php foreach ($services_repeater as $service):
            $title        = $service['title'];
            $sub_title    = $service['sub_title'];
            $bg_image_url = $service['bg_image'] ? $service['bg_image']['sizes']['private_service'] : $bg_image['url'];
            $color        = $service['color'];
            $description  = $service['short_description'];
            $link_to      = $service['link_to'];
        ?>
        <?php
        if($k%$items_in_row == 0 ){
            echo '<div class="row row--lg row--with-gutter">';
        }
        ?>
      <div class="col col-1-3">
        <figure tabindex="2" class="hover-item">
            <a <?php if($link_to){ echo 'href="'.$link_to.'"';}?> alt="" class="db">
                <img src="<?php echo $bg_image_url;?>" alt="" class="fluid"/>
                <figcaption class="heading heading--xs heading--no-stripe <?php echo $color;?>">
                  <h6 class="heading-h">
                      <span class="heading-title"><?php echo $title;?></span>
                      <span class="heading-tagline <?php if(empty($sub_title)){ echo 'one-line-spacer';}?>"><?php echo $sub_title;?></span>
                  </h6>
                  <p class="description-text"><?php echo $description;?></p>
                </figcaption>
            </a>
        </figure>
      </div>
      <?php
      if( ( ($k+1)%$items_in_row == 0 && $k!=0) || $k+1 == $count_services){
          echo '</div>';
      }
      ?>
      <?php $k++; ?>
  <?php endforeach; ?>
    </div>
<?php endif; ?>
  </div>
</div>
<div class="wrapper mb-60">
  <?php get_template_part('inc/home/mod','global-presence'); ?>
</div>

<?php get_footer();?>
