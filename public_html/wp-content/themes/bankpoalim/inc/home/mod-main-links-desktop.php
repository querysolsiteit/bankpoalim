<?php
    $main_links = get_field('home_main_links');
    if($main_links):
        $k=1;
?>
    <div class="main-links-wrapper wrapper desktop">
        <div class="row row--with-gutter">
            <?php foreach ($main_links as $main_link):?>
                <?php
                if($k==1){
                    $color = 'red';
                }elseif($k==2){
                    $color = 'dark';
                }
                $title       = $main_link['home_main_link_title'];
                $link        = $main_link['home_main_link_url'] ? $main_link['home_main_link_url'] : "#";
                $description = $main_link['home_link_description'];
                ?>
            <div class="col col-1-2">
                <a href="<?php echo $link;?>" class="main-link main-link--<?php echo $color;?> with-chevron">
                    <div class="dp">
                        <p class="main-link-title"><?php echo $title;?>
                            <img src="<?php echo THEME; ?>/images/icons/chevron-right-lg-w.png" alt="" class="icon"/>
                        </p>
                        <p class="main-link-tagline"><?php echo $description;?></p>
                    </div>
                    <footer class="main-link-bottom">
                        <img src="<?php echo THEME; ?>/images/icons/eye.png" alt=""/><?php _e('Read More','bank');?>
                    </footer>
                </a>
            </div>
            <?php $k++; endforeach; ?>
        </div>
    </div>
<?php endif; ?>
