<?php
    $global_bg    = get_field('global_background_image', 'option');
    $global_title = get_field('global_presence_title', 'option');
    $first_text   = get_field('first_text_block', 'option');
    $second_text  = get_field('second_text_block', 'option');
    $btn_shortcode    = get_field('global_button_shortcode', 'option');
    $hotspot_map_shortcode    = get_field('hotspot_map_shortcode', 'option');
?>
<div class="global-presence">
    <div class="global_content_wrapper dp">
        <header class="heading heading--md heading--white">
            <h2 class="heading-title"><?php echo $global_title;?></h2>
        </header>
        <?php if($first_text):?><p class="body-text global-presence-summary"><?php echo $first_text;?></p><?php endif;?>
        <?php if($second_text):?><p class="body-text body-text--lg global-presence-details"><?php echo $second_text;?></p><?php endif;?>
        <?php if($btn_shortcode){ echo do_shortcode($btn_shortcode);}?>
    </div>
    <?php if($hotspot_map_shortcode){
            echo do_shortcode($hotspot_map_shortcode);
    } ?>
</div>


<div class="global-presence dp" style="background: url(<?php echo $global_bg['url'];?>) 0 0 no-repeat;">
  <a href="#" class="map-location loc-1">
      <span class="map-location-tagline">Switzerland</span>
      <img src="<?php echo THEME;?>/images/icons/location--white.png" alt="" class="icon"/>
      <img src="<?php echo THEME;?>/images/icons/location--black.png" alt="" class="icon black-icon"/>
  </a>
  <a href="#" class="map-location loc-2">
      <span class="map-location-tagline">Switzerland</span>
      <img src="<?php echo THEME;?>/images/icons/location--white.png" alt="" class="icon"/>
      <img src="<?php echo THEME;?>/images/icons/location--black.png" alt="" class="icon black-icon"/>
  </a>
  <a href="#" class="map-location loc-3">
      <span class="map-location-tagline">Switzerland</span>
      <img src="<?php echo THEME;?>/images/icons/location--white.png" alt="" class="icon"/>
      <img src="<?php echo THEME;?>/images/icons/location--black.png" alt="" class="icon black-icon"/>
  </a>
  <a href="#" class="map-location loc-4">
      <span class="map-location-tagline">Switzerland</span>
      <img src="<?php echo THEME;?>/images/icons/location--white.png" alt="" class="icon"/>
      <img src="<?php echo THEME;?>/images/icons/location--black.png" alt="" class="icon black-icon"/>
  </a>
  <a href="#" class="map-location loc-5">
      <span class="map-location-tagline">Russia</span>
      <img src="<?php echo THEME;?>/images/icons/location--white.png" alt="" class="icon"/>
      <img src="<?php echo THEME;?>/images/icons/location--black.png" alt="" class="icon black-icon"/>
  </a>
  <a href="#" class="map-location loc-6">
      <span class="map-location-tagline">Israel</span>
      <img src="<?php echo THEME;?>/images/icons/location--white.png" alt="" class="icon"/>
      <img src="<?php echo THEME;?>/images/icons/location--black.png" alt="" class="icon black-icon"/>
  </a>
  <a href="#" class="map-location loc-7"><span class="map-location-tagline">Switzerland</span>
      <img src="<?php echo THEME;?>/images/icons/location--white.png" alt="" class="icon"/>
      <img src="<?php echo THEME;?>/images/icons/location--black.png" alt="" class="icon black-icon"/>
  </a>
    <header class="heading heading--md heading--white">
      <h2 class="heading-title"><?php echo $global_title;?></h2>
    </header>
    <?php if($first_text):?><p class="body-text global-presence-summary"><?php echo $first_text;?></p><?php endif;?>
    <?php if($second_text):?><p class="body-text body-text--lg global-presence-details"><?php echo $second_text;?></p><?php endif;?>
    <?php if($btn_shortcode){ echo do_shortcode($btn_shortcode);}?>
</div>
