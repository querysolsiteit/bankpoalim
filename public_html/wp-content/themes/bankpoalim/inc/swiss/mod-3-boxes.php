<ul class="row row--with-gutter row--lg row-links row--equal-height-flex swiss-links">
    <li class="col col-1-3 contact-us-link link--with-img">
        <?php
            $box_1_title   = get_field('box_01_title');
            $box_1_content = get_field('box_01_content');
            $box_1_link    = get_field('box_01_link') ? get_field('box_01_link'): '#';
            $box_1_bg      = get_field('box_01_bg_image');
        ?>
        <div style="background-image: url(<?php echo $box_1_bg['url'];?>" class="link-bg"></div>
        <a <?php if($box_1_link){ echo 'href="'.$box_1_link.'"';}?> class="db dp">
            <h3 class="title"><?php echo $box_1_title;?></h3>
            <p class="text"><?php echo $box_1_content;?></p>
        </a>
    </li>
    <li class="col col-1-3 link--with-img">
      <?php
          $box_2_title   = get_field('box_02_title');
          $box_2_tagline = get_field('box_02_tagline');
          $box_2_link    = get_field('box_02_link') ? get_field('box_02_link'): '#';
          $box_2_bg      = get_field('box_02_bg_image');
      ?>
        <div style="background-image: url(<?php echo $box_2_bg['url'];?>)" class="link-bg"></div>
        <a <?php if($box_2_link){ echo 'href="'.$box_2_link.'"';}?> alt="" class="db dp">
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
    <li class="col col-1-3 link--with-img">
      <?php
          $box_3_title   = get_field('box_03_title');
          $box_3_tagline = get_field('box_03_tagline');
          $box_3_link    = get_field('box_03_link') ? get_field('box_03_link'): '#';
          $box_3_bg      = get_field('box_03_bg_image');
      ?>
        <div style="background-image: url(<?php echo $box_3_bg['url'];?>)" class="link-bg"></div>
        <a <?php if($box_3_link){ echo 'href="'.$box_3_link.'"';}?> alt="" class="db dp">
          <header class="heading heading--md heading--semi-white">
            <h2 class="heading-h">
                <span class="heading-title"><?php echo $box_3_title;?></span>
                <span class="heading-tagline"><?php echo $box_3_tagline;?>
                    <img src="<?php echo THEME;?>/images/icons/chevron-right-thin-w.png" alt="" class="icon">
                </span>
            </h2>
          </header>
        </a>
    </li>
</ul>
