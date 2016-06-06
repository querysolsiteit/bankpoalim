<?php /* Template Name: FAQ */ get_header();?>

<?php
    $main_title      = get_field('page_title') ? get_field('page_title') : get_the_title($post->ID);
    $main_subtitle    = get_field('page_subtitle');
    $faq_sections = get_field('faq_sections');
?>

<div id="content" class="wrapper wrapper--mobile-paddingless product-page faq">
    <div class="clearfix">
        <div class="fluid-wrapper">
            <div class="fluid-col">
                <div class="white-bg dp">
                    <header class="heading heading--lg">
                      <h1 class="heading-title"><?php echo $main_title;?></h1>
                    </header>
                    <?php if($faq_sections): ?>
                        <?php foreach ($faq_sections as $section): ?>
                            <?php
                                $section_title = $section['section_title'];
                                $section_question = isset($section['single_question']) ? $section['single_question']: '';
                            ?>
                            <header class="heading heading--md heading--no-stripe faq-subtitle">
                                <h2 class="heading-title"><?php echo $section_title; ?></h2>
                            </header>
                            <?php if($section_question): ?>
                                <ul data-accordion="true" class="faq-ul">
                                    <?php foreach ($section_question as $element): ?>
                                        <?php
                                            $question = $element['question'];
                                            $answer   = $element['answer'];
                                        ?>
                                        <li aria-expanded="false" class="faq-item">
                                            <button class="btn btn-toggle-answer">+</button>
                                            <p class="faq-item-summary"><?php echo $question;?></p>
                                            <p class="faq-item-details"><?php echo $answer;?></p>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <div class="fixed-col">
            <div class="link--with-img">
            <div style="background-image: url(<?php echo THEME; ?>/images/online-banking.png)" class="link-bg"></div><a href="#" alt="" class="db dp">
            <header class="heading heading--md heading--white">
              <h2 class="heading-h"><span class="heading-title">Online</span><span class="heading-tagline">Banking<img src="<?php echo THEME; ?>/images/icons/chevron-right-thin-w.png" alt="" class="icon"/></span></h2>
            </header></a>
            </div>
            <div class="link--with-img">
            <div style="background-image: url(<?php echo THEME; ?>/images/get-started-bg.png)" class="link-bg"></div><a href="#" alt="" class="db dp">
            <header class="heading heading--md heading--white">
              <h2 class="heading-h"><span class="heading-title">Let's Get</span><span class="heading-tagline">Started</span></h2>
            </header>
            <p class="link-text">QUAMOP is a center for quantum physics using atomic molecular</p></a>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
