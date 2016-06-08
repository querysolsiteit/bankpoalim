<?php
$sidebar_boxes = get_field('sidebar_boxes');
if($sidebar_boxes):
    foreach ($sidebar_boxes as $box):
        $title         = $box['title'];
        $sub_title     = $box['sub_title'];
        $bg_img        = isset($box['bg_image']) ? $box['bg_image'] : '';
        $short_content = $box['short_content'];
        $link_to       = $box['link_to'] ? $box['link_to']: '';
        $display_arrow = $box['display_arrow_link'];
    ?>
        <div class="link--with-img">
            <?php if(!empty($bg_img)):?>
                <div style="background-image: url(<?php echo $box['bg_image']['url']; ?>" class="link-bg"></div>
            <?php endif; ?>
            <a <?php if($link_to){ echo 'href="'.$link_to.'"';}?> alt="" class="db dp">
                <header class="heading heading--md heading--white">
                  <h2 class="heading-h">
                      <span class="heading-title"><?php echo $title; ?></span>
                      <?php if($sub_title):?>
                          <span class="heading-tagline"><?php echo $sub_title; ?>
                              <?php if($display_arrow):?>
                                  <img src="<?php echo THEME; ?>/images/icons/chevron-right-thin-w.png" alt="" class="icon"/>
                              <?php endif;?>
                          </span>
                      <?php endif;?>
                  </h2>
                </header>
                <?php if($short_content):?><p class="link-text"><?php echo $short_content;?></p><?php endif;?>
            </a>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
