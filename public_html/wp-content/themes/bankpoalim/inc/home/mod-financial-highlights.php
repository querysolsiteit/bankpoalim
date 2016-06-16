<?php
    $title      = get_field('financial_title');
    $desc       = get_field('financial_desc');
    $data_items = get_field('financial_data_items');
    $link_text  = get_field('financial_link_text');
    $link_to    = get_field('financial_link_to');
?>
<div class="financial-highlight">
  <div class="dp">
    <header class="heading heading--sm heading--white">
      <h2 class="heading-title"><?php echo $title;?></h2>
      <p class="silent-tagline"><?php echo $desc;?></p>
    </header>

    <div class="row row--with-gutter highlights align-center">
        <?php
        if(!empty($data_items)):
            $k=1;
            foreach ($data_items as $item):
                $number = $item['number'];
                $text   = $item['data_text'];
                $icon   = $item['icon'];
        ?>
                <div class="col col-1-3">
                    <div class="highlight">
                    <?php if($icon): ?>
                        <div class="img-wrapper"><img src="<?php echo $icon['url'];?>" alt=""/></div>
                    <?php endif; ?>
                        <p class="number"><?php echo $number;?></p>
                        <p class="tagline <?php if($k==3){echo 'strong';}?>"><?php echo $text;?></p>
                    </div>
                </div>
            <?php $k++; endforeach; ?>
        <?php endif; ?>
    </div>
    <a <?php if($link_to){ echo 'href="'.$link_to.'"';}?> class="read-more with-chevron">
        <?php echo $link_text;?>
        <img src="<?php echo THEME;?>/images/icons/chevron-right-thin-w.png" alt="" class="icon">
    </a>
  </div>

<?php
    $boxes = get_field('home_under_financial_boxes');
    if($boxes):?>
        <div class="row row--equal-height-flex links">
            <?php if($boxes[0]): ?>
                <div class="col col-1-2">
                    <a href="<?php echo $boxes[0]['link_to'];?>" class="link--with-bg bg-a" style="background-image:url(<?php echo $boxes[0]['bg_image']['url'];?>);">
                        <header class="heading heading--white">
                            <?php echo $boxes[0]['content'];?>
                        </header>
                    </a>
                </div>
            <?php endif; ?>

            <?php if($boxes[1]): ?>
            <div class="col col-1-2">
                <a href="<?php echo $boxes[1]['link_to'];?>" class="link--with-bg bg-b" style="background-image:url(<?php echo $boxes[1]['bg_image']['url'];?>);">
                    <header class="heading heading--semi-white">
                        <?php echo $boxes[1]['content'];?>
                    </header>
                </a>
            </div>
            <?php endif; ?>

        </div>
    <?php endif; ?>
</div>
