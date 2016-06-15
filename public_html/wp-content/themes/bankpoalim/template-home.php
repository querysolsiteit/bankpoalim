<?php /* Template Name: Home */ get_header();?>


<div id="content" class="wrapper wrapper--mobile-paddingless home-pg clearfix ov-hidden mb-60">
  <div class="home-pg-get-started clearfix">
    <div class="get-started">
      <div class="get-started-bg"></div>
      <div class="dp">
        <header class="heading heading--lg heading--white">
          <h1 class="heading-h"><span class="heading-title">Lets</span><span class="heading-tagline">Get Started</span></h1>
        </header>
        <p class="body-text body-text--lg">QUAMOP is a center for quantum physics using atomic molecular and optical systems at the Weizmann  QUAMOP is a center for quantum physics using atomic molecular and optical systems at the Weizmann </p>
        <ul class="ul-theme">
          <li>Lorem ipsum dolor sit amet, consectetur</li>
          <li>Aenean euismod bibendum laoreet.</li>
          <li>Proin gravida dolor sit amet lacus elit.</li>
          <li>Aenean euismod bibendum laoreet. Proin gravida</li>
        </ul><a href="#" class="btn btn-gray btn--compact with-chevron dib">JOIN BHI<img src="images/icons/chevron-right-thin-r.png" alt="" class="icon"></a>
      </div>
    </div>
  </div>
  <div class="financial-highlight">
    <div class="dp">
      <header class="heading heading--sm heading--white">
        <h2 class="heading-title">Financial Highlight</h2>
        <p class="silent-tagline">2015 Q2 report  highlight</p>
      </header>
      <div class="row row--with-gutter highlights align-center">
        <div class="col col-1-3">
          <div class="highlight">
            <div class="img-wrapper"><img src="images/home-icon-1.png" alt=""/></div>
            <p class="number">$449M</p>
            <p class="tagline">Not profit</p>
          </div>
        </div>
        <div class="col col-1-3">
          <div class="highlight">
            <div class="img-wrapper"><img src="images/home-icon-2.png" alt=""/></div>
            <p class="number">$111B</p>
            <p class="tagline">Total assets</p>
          </div>
        </div>
        <div class="col col-1-3">
          <div class="highlight">
            <div class="img-wrapper"><img src="images/home-icon-3.png" alt=""/></div>
            <p class="number">11.0%</p>
            <p class="tagline strong">ROE</p>
          </div>
        </div>
      </div><a href="#" class="read-more with-chevron">To full financial reports<img src="images/icons/chevron-right-thin-w.png" alt="" class="icon"></a>
    </div>
    <div class="row row--equal-height-flex links">
      <div class="col col-1-2"><a href="#" class="link--with-bg bg-a">
          <header class="heading heading--white">
            <p class="lg">40 Years</p><span class="db xs">Investment Experts </span><span class="db sm">BHI USA</span>
          </header></a></div>
      <div class="col col-1-2"><a href="#" class="link--with-bg bg-b">
          <header class="heading heading--semi-white">
            <p class="md">Bank Hapoalim New York Branch member FDIC</p>
          </header></a></div>
    </div>
  </div>
</div>

<?php get_template_part('inc/mod','services'); ?>

<?php get_template_part('inc/mod','specialties'); ?>

<?php get_footer(); ?>
