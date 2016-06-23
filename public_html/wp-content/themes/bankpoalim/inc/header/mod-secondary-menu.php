<?php
    $sticky = 1;
    if(is_page()){
        $sticky = get_field('secondary_menu_sticky');
    }
?>
<?php if(!is_page_template('template-private.php') && !is_page_template('template-home.php')): ?>
    <div id="second-nav-waypoint"></div>
<?php endif;?>

<nav id="second-nav" aria-label="Secondary Navigation" role="navigation" data-sticky="<?php echo $sticky;?>" class="second-nav">
    <div class="transition-wrapper">
        <div class="wrapper">
            <?php if(is_page_template('template-private.php')): ?>
                <div id="second-nav-waypoint"></div>
            <?php endif;?>
        <?php
            $secondary_menu = get_field('secondary_menu_items','option');
            $count_cols = count($secondary_menu);
            if($secondary_menu):
        ?>
            <ul class="row row--with-dividers row--equal-height-flex">
                <?php foreach ($secondary_menu as $second_menu):?>
                <?php
                    $title    = $second_menu['title'];
                    $icon     = $second_menu['icon'];
                    $link     = $second_menu['link'] ? $second_menu['link'] : "#";
                ?>
                    <li class="col <?php if($count_cols==5){echo 'col-1-5';}elseif($count_cols==6){ echo 'col-1-6';}?>">
                        <a href="<?php echo $link; ?>" class="db fluid second-nav-link align-center <?php if($count_cols==6){echo '';} ?>">
                            <div class="inner-link-wrapper">
                                <div class="img-wrapper"><img src="<?php echo $icon['url'];?>" alt=""/></div>
                                <p><?php echo $title;?></p>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        </div>
        <?php if(is_page_template('template-home.php')):?>
            <div id="second-nav-waypoint"></div>
        <?php endif; ?>
    </div>
</nav>
