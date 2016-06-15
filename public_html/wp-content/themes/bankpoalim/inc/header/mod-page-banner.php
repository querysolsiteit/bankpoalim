<?php
    if(is_search() || is_404()){
        $bg_image = get_field('page_top_banner','option');
    }else{
        if(get_field('page_top_banner')){
            $bg_image = get_field('page_top_banner');
        }
        elseif(get_field('page_top_banner','option')){
            $bg_image = get_field('page_top_banner','option');
        }
    }

    if($bg_image):
?>
<div style="background-image: url(<?php echo $bg_image['sizes']['page_top_banner'];?>)" class="header-bg header-bg--corporate"></div>
<?php endif; ?>
