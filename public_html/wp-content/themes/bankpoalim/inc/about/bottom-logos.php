<?php
    $logos = get_field('about_logos');
    if(!empty($logos)):
?>
<div class="white-bg">
    <div class="dp">
        <div class="wrapper">
            <ul class="row row--with-more-gutter row--with-dividers row--md partner-row">
                <?php foreach ($logos as $logo) :?>
                    <?php
                        $title = $logo['title'];
                        $image = $logo['logo'];
                        $link = $logo['link_to'] ? $logo['link_to']: '';
                    ?>
                    <a <?php if($link){ echo 'href="'.$link.'"';}?> class="col col-1-3 align-center">
                        <img src="<?php echo $image['url'];?>" alt="<?php echo $title;?>">
                    </a>
            <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<?php endif; ?>
