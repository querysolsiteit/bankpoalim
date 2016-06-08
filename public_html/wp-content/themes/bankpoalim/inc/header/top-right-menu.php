<?php
$top_right_links = get_field('top_right_links','option');

if(!empty($top_right_links)){

    $i=1;
    $count_items = count($top_right_links);

    foreach ($top_right_links as $item):
        $top_title       = $item['title'];
        $top_link        = $item['link_to'];
        $display_in_home = $item['display_only_at_homepage'];

        if(is_page_template('template-main.php') || is_page_template('template-private.php')){
            if($display_in_home){
                echo '<li class="dib"><a href="'.$top_link.'" class="db top-bar-link">'.$top_title.'</a></li>';
            }
        }else{
            echo '<li class="dib"><a href="'.$top_link.'" class="db top-bar-link">'.$top_title.'</a></li>';
            if($i < $count_items){
                echo '<span class="top-bar-divider">|</span>';
            }
        }
        $i++;
    endforeach;
}
