<div id="second-nav-waypoint"></div>
<nav id="second-nav" aria-label="Secondary Navigation" role="navigation" class="second-nav">
    <div class="transition-wrapper">
        <div class="wrapper">
        <?php
            $secondary_menu = get_field('secondary_menu_items','option');
            if($secondary_menu):
        ?>
            <ul class="row row--with-dividers row--equal-height-flex">
                <?php foreach ($secondary_menu as $second_menu):?>
                <?php
                    $title    = $second_menu['title'];
                    $icon     = $second_menu['icon'];
                    $link     = $second_menu['link'] ? $second_menu['link'] : "#";
                ?>
                    <li class="col col-1-5">
                        <a href="<?php echo $link; ?>" class="db fluid second-nav-link align-center">
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
    </div>
</nav>
