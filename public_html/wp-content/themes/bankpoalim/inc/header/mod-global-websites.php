<?php if(!is_home() && !is_front_page()): ?>
    <?php
        $main_title      = get_field('main_website_title','option');
        $main_link       = get_field('main_website_link','option');
        $corporate_title = get_field('corporate_website_title','option');
        $corporate_link  = get_field('corporate_website_link','option');
        $private_title   = get_field('private_website_title','option');
        $private_link    = get_field('private_website_link','option');
    ?>
    <ul class="dib top-bar-ul top-bar-left">
        <li class="dib"><a href="<?php echo $main_link;?>" class="db top-bar-link"><?php echo $main_title;?></a></li>
        <li class="dib"><a href="<?php echo $corporate_link;?>" class="db top-bar-link active"><?php echo $corporate_title;?></a></li>
        <li class="dib"><a href="<?php echo $private_link; ?>" class="db top-bar-link"><?php echo $private_title;?></a></li>
    </ul>
<?php endif; ?>
