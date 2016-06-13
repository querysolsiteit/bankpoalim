<?php /* Template Name:  Contact Us */ get_header();?>
<?php
    $main_title      = get_field('main_page_title') ? get_field('main_page_title') : get_the_title($post->ID);
    $main_subtitle    = get_field('main_page_subtitle');
?>

<div id="content" class="wrapper wrapper--mobile-paddingless mb-60 clearfix contact">
  <div class="fluid-wrapper">
    <div class="fluid-col">
      <div class="white-bg dp">
        <header class="heading heading--lg">
          <h1 class="heading-h">
              <?php if($main_title): ?>
                  <h1 class="heading-title"><?php echo $main_title; ?></h1>
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

        <?php get_template_part('inc/mod','page-slider'); ?>
      </div>
    </div>
  </div>

  <div class="fixed-col">
      <?php get_template_part('inc/mod','sidebar-boxes'); ?>
  </div>
</div>

<?php get_footer(); ?>



<?php /*
<form id="contact-form" class="form-theme">
  <div class="form-group select-wrapper">
    <select name="branch" aria-label="Branch" class="input-theme select-reset">
      <option>Choose branch</option>
      <option>branch 1</option>
      <option>branch 2</option>
    </select>
  </div>
  <div class="form-group">
    <input id="name" name="name" type="text" placeholder="*Name" aria-label="Name" class="input-theme">
  </div>
  <div class="form-group">
    <input id="phone" name="phone" type="tel" placeholder="*Phone" aria-label="Phone" class="input-theme">
  </div>
  <div class="form-group">
    <input id="email" name="email" type="email" placeholder="*Email" aria-label="Email" class="input-theme">
  </div>
  <div class="form-group">
    <input type="text" placeholder="Company Name" aria-label="Company Name" class="input-theme">
  </div>
  <div class="form-group">
    <input type="text" placeholder="Subject" aria-label="Subject" class="input-theme">
  </div>
  <div class="form-group">
    <textarea placeholder="Content" rows="10" aria-label="Content" class="input-theme"></textarea>
  </div>
  <div class="form-group">
    <p class="captcha-note">Please type the characters you see in the picture below</p>
    <div class="row row--with-less-gutter">
      <div class="col col-1-3"> <img src="images/captcha.png" alt="" class="captcha"></div>
      <div class="col col-2-3">
        <input type="text" aria-label="Captcha text" class="input-theme">
      </div>
    </div>
  </div>
  <div class="form-group">
    <button id="contact-submit" class="btn btn-default fluid">Apply</button>
  </div>
</form>
*/?>
