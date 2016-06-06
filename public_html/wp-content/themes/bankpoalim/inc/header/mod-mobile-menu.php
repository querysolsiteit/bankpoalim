<?php $mobile_logo = get_field('mobile_logo','option');?>
<nav aria-label="Mobile Navigation" role="navigation" class="mobile-nav">
  <div class="wrapper clearfix">
      <div class="mobile-bar-left">
          <img id="mobile-logo" src="<?php echo $mobile_logo['url']; ?>" alt="" class="vam mobile-logo"/>
          <button id="new-nav-toggle" href="#" class="btn btn-blank db mobile-bar-link menu-toggle">
              <img src="<?php echo THEME; ?>/images/icons/bars.png" alt="" class="icon icon-bars"/>
          </button>
      </div>
      <ul class="mobile-bar-right">
          <li class="vam dib">
              <a href="#" class="db mobile-bar-link">
                  <img src="<?php echo THEME; ?>/images/icons/user.png" alt="" class="icon"/>
              </a>
          </li>
          <li class="vam dib">
            <button id="toggle-nav" href="#" class="btn btn-blank db mobile-bar-link">
                <img src="<?php echo THEME; ?>/images/icons/bars.png" alt="" class="icon icon-bars"/>
            </button>
          </li>
      </ul>
  </div>
</nav>

<?php $mobile_menu = get_field('mobile_menu_items','option'); ?>
<aside id="mobile-nav" class="mobile-nav-links">
  <ul>

    <div class="mobile-search-wrapper">
        <form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
            <input type="text" placeholder="<?php _e('Search','bank');?>" name="s" role="search" aria-label="<?php _e('Search','bank');?>" class="input-reset search-mobile"/>
            <img src="<?php echo THEME; ?>/images/icons/search-black.png" alt="" class="icon search-label"/>
        </form>
    </div>

    <?php if($mobile_menu): $k = 1;?>
        <?php foreach ($mobile_menu as $top_menu):?>
            <?php
                $title    = $top_menu['title'];
                $sub_menu = $top_menu['sub_menu'];
                $icon     = $top_menu['icon'];
                $gray_bg  = $top_menu['gray_bg_color'];
                $link     = $top_menu['link'] ? ($sub_menu ? "#" : $top_menu['link']) : "#";
            ?>

            <li <?php if($sub_menu){ echo 'class="relative"';} ?>>
                <a href="<?php echo $link; ?>" class="db mobile-nav-link <?php if($gray_bg){ echo 'gray';} ?>">
                    <?php if($icon): ?><img src="<?php echo $icon['url']; ?>" alt="" class="vam icon mobile-nav-icon"/><?php endif; ?>
                    <span class="vam mobile-nav-tagline"><?php echo $title; ?></span>
                </a>
                <?php if(!empty($sub_menu)): ?>
                    <button data-toggle="subnav" data-target="#subnav-<?php echo $k;?>" class="btn btn-blank btn-toggle-subnav">
                        <img src="<?php echo THEME; ?>/images/icons/chevron-right.png" alt="" class="vam icon"/>
                    </button>
                <?php endif; ?>
            </li>
            <?php if(!empty($sub_menu)): ?>
                <div id="subnav-<?php echo $k;?>" class="subnav">
                    <?php foreach ($sub_menu as $sub_item):?>
                        <?php
                            $sub_title = $sub_item['sub_item_title'];
                            $sub_link  = $sub_item['sub_item_link'] ? $sub_item['sub_item_link'] : "#";
                        ?>
                        <li>
                            <a href="<?php echo $sub_link;?>" class="db mobile-nav-link gray-dark">
                                <span class="mobile-nav-tagline"><?php echo $sub_title;?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </div>
            <?php endif; // sub menu ?>

    <?php $k++; endforeach; ?>
<?php endif; ?>
  </ul>
</aside>
