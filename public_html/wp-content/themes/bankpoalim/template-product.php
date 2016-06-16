<?php /* Template Name: Product */ get_header();?>

<?php
    $main_title          = get_field('main_page_title') ? get_field('main_page_title') : get_the_title($post->ID);
    $main_subtitle       = get_field('main_page_subtitle');
    $second_subtitle     = get_field('second_subtitle');
    $second_content_area = get_field('second_content_area');
    $blocks_repeater     = get_field('blocks_repeater');
?>

<div id="content" class="wrapper wrapper--mobile-paddingless product-page clearfix">
  <div class="fluid-wrapper">
    <div class="fluid-col">
      <div class="white-bg dp">
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

          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="body-text">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
          <?php endif; ?>

          <?php if($second_content_area): ?>
              <?php if($second_subtitle): ?>
                  <header class="heading heading--md">
                      <h2 class="heading-title"><?php echo $second_subtitle;?></h2>
                </header>
            <?php endif; ?>
            <div class="product-page-details">
                <div class="body-text"><?php echo $second_content_area;?></div>
            </div>
        <?php endif; ?>
      </div>

      <?php if($blocks_repeater): ?>
          <div class="corporate-banking col--mobile-padded">
              <?php foreach ($blocks_repeater as $block): ?>
                  <?php
                      $image = $block['image']['sizes']['product_block'] ? $block['image']['sizes']['product_block'] : $block['image']['url'];
                      $title = $block['title'];
                      $subtitle = $block['sub_title'];
                      $content = $block['content'];
                  ?>

            <div class="corporate-banking-item clearfix">
              <div class="thumb"><img src="<?php echo $image;?>" alt=""></div>
              <div class="text">
                <header class="heading heading--sm heading--no-stripe">
                  <h3 class="heading-h">
                      <span class="heading-title"><?php echo $title;?></span>
                      <span class="heading-tagline"><?php echo $subtitle;?></span>
                  </h3>
                </header>
                <p class="body-text"><?php echo $content;?></p>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
    <?php endif; ?>
    </div>
  </div>
  <div class="fixed-col">
    <?php get_template_part('inc/mod','sidebar-boxes'); ?>
  </div>
</div>

<?php get_footer(); ?>
