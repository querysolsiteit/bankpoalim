<?php
    $title      = get_field('financial_title');
    $desc       = get_field('financial_desc');
    $data_items = get_field('financial_data_items');
    $link_text  = get_field('financial_link_text');
    $link_to    = get_field('financial_link_to');

?>
<div class="financial-report dp">
    <div class="row row--with-gutter">
        <div class="col col-2-5">
            <?php if($title):?>
                <header class="heading heading--sm heading--white">
                    <h3 class="heading-h">
                        <span class="heading-title"><?php echo $title;?></span>
                    </h3>
                </header>
            <?php endif; ?>
            <?php if($desc):?><p class="muted"><?php echo $desc;?></p><?php endif; ?>
        </div>
        <?php
            if(!empty($data_items)):
                $k=1;
                foreach ($data_items as $item):
                    $number = $item['number'];
                    $text = $item['data_text'];
                ?>
                <div class="col col-1-5 align-center <?php if($k==1){echo 'no-border';}?>">
                    <strong class="number"><?php echo $number;?></strong>
                    <p class="number-tagline <?php if($k==3){echo 'regular';}?>"><?php echo $text;?></p>
                </div>
        <?php $k++; endforeach; ?>
        <?php endif; ?>
    </div>
    <a href="#" class="read-more muted">
        <span>To full financial reports</span>
        <img src="<?php echo THEME;?>/images/icons/chevron-right-thin-w.png" alt="" class="icon">
    </a>
</div>
