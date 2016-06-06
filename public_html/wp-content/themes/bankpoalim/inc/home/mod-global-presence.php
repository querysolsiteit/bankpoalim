<div class="wrapper wrapper--mobile-paddingless">
    <?php
          $global_bg    = get_field('global_background_image');
          $global_title = get_field('global_presence_title');
          $first_text   = get_field('first_text_block');
          $second_text  = get_field('second_text_block');
    ?>
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
  </div>
</div>
