<?php
    $sidebar_title   = get_field('features_title');
    $sidebar_tagline = get_field('features_tagline');
    $features_boxes  = get_field('features_boxes');
?>
<div class="col col-1-3 col-discover dp">
    <header class="heading heading--sm">
        <h3 class="heading-h">
            <?php if($sidebar_title): ?>
                <span class="heading-title"><?php echo $sidebar_title; ?></span>
            <?php endif; ?>
            <?php if($sidebar_tagline): ?>
                <span class="heading-tagline"><?php echo $sidebar_tagline;?></span>
            <?php endif; ?>
        </h3>
    </header>
<?php if($features_boxes): ?>
    <ul class="discover-features">
    <?php foreach ($features_boxes as $feature_box):?>
        <?php
            $b_title = $feature_box['title'];
            $b_icon = $feature_box['icon'];
            $b_text = $feature_box['short_text'];
        ?>
        <li class="feature">
            <?php if($b_icon): ?><img src="<?php echo $b_icon['url'];?>" alt="" class="feature-icon"><?php endif; ?>
            <div class="feature-text">
                <?php if($b_title): ?><p class="feature-title"><?php echo $b_title; ?></p><?php endif; ?>
                <?php if($b_text): ?><p class="feature-tagline"><?php echo $b_text;?></p><?php endif; ?>
            </div>
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>
</div>
