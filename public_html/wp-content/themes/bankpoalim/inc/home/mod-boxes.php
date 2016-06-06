<?php
    $home_boxes = get_field('home_boxes_links');
    if($home_boxes):
        $j=1;
?>
<div class="wrapper wrapper--mobile-paddingless">
  <ul class="row row--with-gutter row--lg row-links row--equal-height-flex">
      <?php foreach ($home_boxes as $box):?>
          <?php
              if($j==1){
                  $color_class = 'heading--semi-white';
              }else{
                  $color_class = 'heading--white';
              }
              $box_bg      = $box['background_image'];
              $box_title   = $box['heading_title'];
              $box_tagline = $box['heading_tagline'];
              $box_link    = $box['link_to'];
          ?>
            <li class="col col-1-3 link--with-img">
                <div style="background-image: url(<?php echo $box_bg['url'];?>" class="link-bg"></div>
                <a href="<?php echo $box_link;?>" alt="" class="db dp">
                    <header class="heading heading--md <?php echo $color_class;?>">
                        <h2 class="heading-h"><span class="heading-title"><?php echo $box_title;?></span>
                            <span class="heading-tagline">
                                <?php echo $box_tagline;?><img src="<?php echo THEME;?>/images/icons/chevron-right-thin-w.png" alt="" class="icon"/>
                            </span>
                        </h2>
                    </header>
                </a>
            </li>
        <?php $j++; endforeach; ?>
    </ul>
</div>
<?php endif; ?>
