<?php
    $add_slide = get_field('add_slider_under_content');
    $page_slider = get_field('page_slider');
?>
<?php if($add_slide && !empty($page_slider)): ?>
    <div class="mobile-services-slider">
      <button class="btn btn-slider-arrow prev gray">
          <span class="fz-0"><?php _e('Previous','bank');?></span>
          <img src="<?php echo THEME; ?>/images/icons/slick-left.png" alt="" class="icon">
      </button>
      <button class="btn btn-slider-arrow next gray">
          <span class="fz-0"><?php _e('Next','bank');?></span>
          <img src="<?php echo THEME; ?>/images/icons/slick-right.png" alt="" class="icon">
      </button>
      <div id="mobile-services-slider" class="dot-slider">
          <?php foreach ($page_slider as $slide):
              $title = $slide['title'];
              $image_url = isset($slide['image']) ? $slide['image']['sizes']['page_slider'] : $slide['image']['url'];
          ?>
              <img src="<?php echo $image_url; ?>" alt="<?php echo $title;?>" class="slide fluid">
          <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
