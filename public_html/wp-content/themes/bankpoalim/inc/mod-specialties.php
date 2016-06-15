<?php
    $slider_title       = get_field('slider_title');
    $slider_sub_title   = get_field('slider_sub_title');
    $slider_description = get_field('short_desc');
    $slider_repeater    = get_field('slider_items');

    if($slider_repeater):
?>
<div class="wrapper industry-page gray-part">
  <div class="row row--with-less-gutter row--with-fixed-column">
    <div class="col col-slider-text">
      <header class="heading heading--md">
        <h2 class="heading-h">
            <span class="heading-title"><?php echo $slider_title;?></span>
            <span class="heading-tagline"><?php echo $slider_sub_title;?></span>
        </h2>
      </header>
      <p class="body-text body-text--lg"><?php echo $slider_description;?></p>
      <div class="slider-arrows-wrapper">
        <button class="btn btn-slider-arrow left theme">
            <span class="fz-0"><?php _e('Previous','bank');?></span>
            <img src="<?php echo THEME;?>/images/icons/slick-left.png" alt="" class="icon">
        </button>
        <button class="btn btn-slider-arrow right gray">
            <span class="fz-0"><?php _e('Next','bank');?></span>
            <img src="<?php echo THEME;?>/images/icons/slick-right.png" alt="" class="icon">
        </button>
      </div>
    </div>
    <div id="industry-page-slider" class="col col-slick-slider">
        <?php foreach ($slider_repeater as $slider_item): ?>
            <?php
                $title     = $slider_item['title'];
                $sub_title = $slider_item['sub_title'];
                $image     = $slider_item['image'] ? ($slider_item['image']['sizes']['industry_slide'] ? $slider_item['image']['sizes']['industry_slide'] : $slider_item['image']['url']) : '';
                $link_to   = $slider_item['link_to'];
            ?>
            <a <?php if($link_to){ echo 'href="'.$link_to.'"';}?> alt="" class="industry-page-item">
                <img src="<?php echo $image;?>" alt="" class="item-thumb"/>
                <div class="dp">
                    <header class="heading heading--xs">
                        <h5 class="heading-h">
                            <span class="heading-title"><?php echo $title;?></span>
                            <span class="heading-tagline"><?php echo $sub_title;?></span>
                        </h5>
                    </header>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
  </div>

</div>
<?php endif; ?>
