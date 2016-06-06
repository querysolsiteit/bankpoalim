<?php
add_shortcode('first_shortcode','first_shortcode_handler');
function first_shortcode_handler(){
    ob_start();
    return ob_get_clean();
}
