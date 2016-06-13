<?php

add_shortcode('read_more','read_more_link_handler');
function read_more_link_handler($atts) {
    extract(shortcode_atts(array(
        'title' => 'Read More',
        'url'   => ''
    ), $atts));

    ob_start();?>
        <a <?php if($url){ echo 'href="'.$url.'"';}?> class="read-more">
            <span><?php echo $title;?></span>
            <img src="<?php echo THEME;?>/images/icons/chevron-right-thin.png" alt="" class="icon">
        </a>
<?php
    return ob_get_clean();
}

/**********************************************/
add_shortcode('custom_button','custom_button_handler');
function custom_button_handler($atts) {
    extract(shortcode_atts(array(
        'title' => '',
        'url'   => '',
        'style'=> 'default'
    ), $atts));

    $array_options = array('default','bright','gray','white','dark');
    if(!empty($style) && in_array($style, $array_options)){
        $class = $style;
    }else{ $class = 'default';}

    if($class=='default'){
        $img_name = 'thin-w';
    }else{
        $img_name = 'thin-r';
        $img_name = 'thin';
    }

    ob_start();?>
    <a <?php if($url){ echo 'href="'.$url.'"';}?> class="btn btn-<?php echo $class;?> btn--compact with-chevron">
        <?php echo $title;?>
        <img src="<?php echo THEME;?>/images/icons/chevron-right-<?php echo $img_name;?>.png" alt="" class="icon">
    </a>
<?php
    return ob_get_clean();
}

/***********************/
