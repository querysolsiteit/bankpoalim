<?php /* Template Name: Careers */ get_header(); ?>

<?php
    $main_title    = get_field('main_page_title') ? get_field('main_page_title') : get_the_title($post->ID);
    $main_subtitle = get_field('main_page_subtitle');
    $careers       = get_field('careers_repeater');
?>
<div id="content" class="wrapper wrapper--mobile-paddingless careers">
  <div class="white-bg dp">
      <header class="heading heading--lg">
          <h1 class="heading-title"><?php echo $main_title;?></h1>
      </header>
    <p class="careers-summary"><?php echo get_the_content($post->ID);?></p>
    <?php if($careers): ?>
    <div class="row row--with-gutter row--lg row--equal-height-flex">
        <?php foreach ($careers as $career): ?>
            <?php
                $job_title    = $career['job_title'];
                $short_desc   = $career['short_desc'];
                $requirements = $career['requirements'];
            ?>
        <div class="col col-1-3">
            <div class="careers-item">
              <header class="heading heading--sm">
                <p class="heading-prefix"><?php _e('Job Title:','bank');?></p>
                <h3 class="heading-title"><?php echo $job_title; ?></h3>
              </header>
              <p class="body-text"><?php echo $short_desc;?></p>
              <strong class="ul-title"><?php _e('Requirements:','bank');?></strong>
              <?php if(!empty($requirements)): ?>
                <ul class="ul-requirements ul-theme">
                    <?php foreach ($requirements as $require): ?>
                  <li><?php echo $require['add_requirement']; ?></li>
              <?php endforeach; ?>
                </ul>
              <?php endif; ?>
              <div class="careers-item-btn-wrapper">
                <button data-toggle="modal" data-target="#careers-modal" data-modal-title="<?php echo $job_title;?>" class="btn btn-default align-center with-chevron">
                    <?php _e('Apply','bank');?>
                    <img src="<?php echo THEME;?>/images/icons/chevron-right-thin-w.png" alt="" class="icon vam"/>
                    <span class="fz-0"><?php _e('Apply for','bank'); echo ' '.$job_title; ?></span>
                </button>
              </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</div>


<div id="careers-modal" class="modal-wrapper">
  <div class="modal career-modal modal--narrow">
    <div class="form-theme careers-form">
        <button type="button" data-role="close-modal" data-close-form-modal="true" class="btn btn-blank btn-close-modal"><img src="<?php echo THEME;?>/images/icons/times.png" alt="" class="icon"></button>
        <h4 class="modal-title">
            <p><?php _e('Apply for','bank');?></p>
            <p><span class="job-title">CFO</span> <?php _e('position','bank');?> </p>
        </h4>
        <?php echo do_shortcode('[contact-form-7 id="364" title="Careers Form"]'); ?>
    </div>
  </div>
</div>

<script>
    function display_careers_response(){
        jQuery('.modal-wrapper').fadeIn();
    }
</script>

<?php get_footer(); ?>
