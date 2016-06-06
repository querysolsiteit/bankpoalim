<?php
    $home_slider = get_field('home_slider');
    if(!empty($home_slider)):
?>
<div class="header-bg--home relative">
  <div id="private-slider">
      <?php foreach ($home_slider as $slide):?>
          <?php
              $background    = $slide['background_image'];
              $slide_title   = $slide['home_slider_title'];
              $slide_content = $slide['home_slide_content'];
          ?>
        <div style="background-image: url(<?php echo $background['url'];?>" class="header-bg home-slide">
            <div class="wrapper wrapper--extra-padded home-pg-text">
                <h2 class="home-pg-title"><?php echo $slide_title;?></h2>
                <?php if($slide_content):?>
                    <p class="home-pg-tagline"><?php echo $slide_content;?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach;?>
  </div>

    <div class="slider-controls">
        <button class="btn btn-white btn-slider prev">
            <span class="fz-0"><?php _e('Previous','bank');?></span>
            <img src="<?php echo THEME; ?>/images/icons/chevron-left-lg.png" alt="" class="icon"/>
        </button>
        <button class="btn btn-white btn-slider next">
            <span class="fz-0">_e('Naxt','bank');</span>
            <img src="<?php echo THEME; ?>/images/icons/chevron-right-lg.png" alt="" class="icon"/>
        </button>
        <button class="btn btn-dark btn-slider pause">
            <span class="fz-0">_e('Pause','bank');</span>
            <img src="<?php echo THEME; ?>/images/icons/pause.png" alt="" class="icon"/>
        </button>
    </div>
    <?php get_template_part('inc/home/mod','main-links-desktop'); ?>
</div>
<?php endif;?>
