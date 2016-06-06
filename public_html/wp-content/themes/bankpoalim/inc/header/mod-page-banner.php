<?php
    $bg_image = get_field('page_top_banner');
    if($bg_image):
?>
<div style="background-image: url(<?php echo $bg_image['sizes']['page_top_banner'];?>)" class="header-bg header-bg--corporate"></div>
<?php endif; ?>
