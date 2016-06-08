<?php /* Template Name: FAQ */ get_header();?>

<?php
    $main_title    = get_field('main_page_title') ? get_field('main_page_title') : get_the_title($post->ID);
    $main_subtitle = get_field('main_page_subtitle');
    $faq_sections  = get_field('faq_sections');
?>

<div id="content" class="wrapper wrapper--mobile-paddingless clearfix product-page faq">
    <div class="fluid-wrapper">
        <div class="fluid-col">
            <div class="white-bg dp">
                <header class="heading heading--lg">
                  <h1 class="heading-title"><?php echo $main_title;?></h1>
                  <?php if($main_subtitle): ?>
                      <span class="heading-tagline"><?php echo $main_subtitle;?></span>
                  <?php endif; ?>
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
        <?php get_template_part('inc/mod','sidebar-boxes'); ?>
    </div>
</div>

<?php get_footer(); ?>
