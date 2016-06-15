<?php
    $class = '';
    if(is_page_template('template-private')){
        $class = 'private-pg';
    }elseif(is_page_template('template-industry.php')){
        $class ='industry-page';
    }
?>
<div class="white-bg <?php echo $class; ?> services-tailored mb-60">
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
