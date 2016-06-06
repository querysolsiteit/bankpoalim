<?php $box_slider = get_field('box_slider');?>
<ul class="row row--with-gutter row--lg row-links row--equal-height-flex">
  <li class="col col-1-3">
      <?php if($box_slider): ?>
    <div id="about-link-slider" class="slider dot-slider white-bg dp">
        <?php foreach ($box_slider as $slide):?>
            <?php
            $slide_title   = $slide['main_title'];
            $slide_logo    = $slide['logo'];
            $slide_content = $slide['content'];
            ?>

      <div class="slide">
        <header class="heading heading--xs heading--with-img">
          <h4 class="heading-h">
              <?php if($slide_title): ?><span class="heading-title"><?php echo $slide_title;?></span><?php endif;?>
              <?php if($slide_logo):?><img src="<?php echo $slide_logo['url'];?>" alt="" class="heading-img"/><?php endif;?>
          </h4>
        </header>
        <p class="award-text body-text"><?php echo $slide_content;?></p>
      </div>
      <?php endforeach; ?>

    </div>
  <?php endif; ?>
  </li>
  <li class="col col-1-3 link--with-img">
      <?php
      $box_2_title   = get_field('box_02_title');
      $box_2_tagline = get_field('box_02_tagline');
      $box_2_link    = get_field('box_02_link') ? get_field('box_02_link'): '#';
      $box_2_bg      = get_field('box_02_bg_image');

      ?>
    <div style="background-image: url(<?php echo $box_2_bg['url'];?>)" class="link-bg"></div>
    <a href="<?php echo $box_2_link;?>" alt="" class="db dp">
      <header class="heading heading--md heading--semi-white">
        <h2 class="heading-h">
            <span class="heading-title"><?php echo $box_2_title;?></span>
            <span class="heading-tagline"><?php echo $box_2_tagline;?>
                <img src="<?php echo THEME;?>/images/icons/chevron-right-thin-w.png" alt="" class="icon">
            </span>
        </h2>
      </header>
  </a>
  </li>
  <li class="col col-1-3 link--with-img csr-report">
      <?php
          $box_3_content = get_field('box_03_content');
          $box_3_link    = get_field('box_03_link') ? get_field('box_03_link'): '#';
          $box_3_bg      = get_field('box_03_bg_image');
      ?>
    <div style="background-image: url(<?php echo $box_3_bg['url'];?>)" class="link-bg"></div>
    <a href="<?php echo $box_3_link;?>" alt="" class="db dp">
        <?php echo $box_3_content;?>
    </a>
  </li>
</ul>
