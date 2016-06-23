<?php /* Template Name: Cash Management */ get_header(); ?>

<?php
    $main_title     = get_field('main_page_title') ? get_field('main_page_title') : get_the_title($post->ID);
    $main_subtitle  = get_field('main_page_subtitle');
?>

<div id="content" class="wrapper wrapper--mobile-paddingless cash-management">
    <div class="white-bg dp">
        <div class="row row--with-gutter row--lg">
          <div class="col col-1-3">
              <header class="heading heading--lg">
                  <h1 class="heading-h">
                  <?php if($main_title): ?>
                      <span class="heading-title"><?php echo $main_title; ?></span>
                  <?php endif; ?>
                  <?php if($main_subtitle): ?>
                      <span class="heading-tagline"><?php echo $main_subtitle;?></span>
                  <?php endif; ?>
                  </h1>
              </header>
          </div>
          <div class="col col-2-3 info">
            <?php while(have_posts()): the_post(); ?>
                <div class="col col-summary">
                    <div class="body-text">
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php endwhile; ?>
          </div>
        </div>

        <?php
            $bg_image = get_field('background_image');
            $items_repeater = get_field('items_repeater');
            if($items_repeater):
        ?>
        <div class="row row--with-gutter row--with-category-icon row--equal-height-flex row--split row--sm">
            <?php if($bg_image):?><img src="<?php echo $bg_image['url'];?>" alt="" class="category-icon"><?php endif; ?>
                <?php foreach ($items_repeater as $item): ?>
                    <div class="col col-1-3 col-sm-1-2">
                        <div class="cash-management-item">
                            <heading class="heading heading--xs heading--no-stripe">
                                <h4 class="heading-h">
                                    <span class="heading-title"><?php echo $item['title']; ?></span>
                                    <span class="heading-tagline"><?php echo $item['sub_title']; ?></span>
                                </h4>
                            </heading>
                        <p class="item-text"><?php echo $item['short_text']; ?></p>
                        </div>
                    </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php get_template_part('inc/home/mod','boxes'); ?>

<?php get_template_part('inc/mod','team-component'); ?>

<?php get_footer(); ?>
