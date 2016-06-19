<?php
    $commercial_bg     = get_field('Commercial_bg_image');
    $commercial_repeater = get_field('commercial_boxes');

    if(!empty($commercial_repeater)):
        $items_in_row = 3;
        $k = 0;
        $count_services = count($commercial_repeater);
?>
    <?php foreach ($commercial_repeater as $service):
            $title        = $service['title'];
            $sub_title    = $service['sub_title'];
            $bg_image_url = $service['bg_image'] ? $service['bg_image']['sizes']['private_service'] : $bg_image['url'];
            $color        = $service['color'];
            $description  = $service['short_description'];
            $link_to      = $service['link_to'];
        ?>
        <?php
        if($k%$items_in_row == 0 ){
            if($k == 0 && $commercial_bg){
                echo '<div class="row row--with-gutter row--with-category-icon row--lg">';
                echo '<img src="'.$commercial_bg['url'].'" alt="" class="category-icon">';
            }else{
                echo '<div class="row row--with-gutter row--lg">';
            }
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

<?php endif; ?>
