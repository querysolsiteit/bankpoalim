<?php
    $global_bg    = get_field('global_background_image', 'option');
    $global_title = get_field('global_presence_title', 'option');
    $first_text   = get_field('first_text_block', 'option');
    $second_text  = get_field('second_text_block', 'option');
    $btn_shortcode    = get_field('global_button_shortcode', 'option');
    $hotspot_map_shortcode    = get_field('hotspot_map_shortcode', 'option');
?>
<div class="global-presence">
    <div class="global_content_wrapper dp">
        <header class="heading heading--md heading--white">
            <h2 class="heading-title"><?php echo $global_title;?></h2>
        </header>
        <?php if($first_text):?><p class="body-text global-presence-summary"><?php echo $first_text;?></p><?php endif;?>
        <?php if($second_text):?><p class="body-text body-text--lg global-presence-details"><?php echo $second_text;?></p><?php endif;?>
        <?php if($btn_shortcode){ echo do_shortcode($btn_shortcode);}?>
    </div>
    <?php if($hotspot_map_shortcode){
            echo do_shortcode($hotspot_map_shortcode);
    } ?>
</div>
