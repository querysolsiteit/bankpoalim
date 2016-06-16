<?php
$args = array( 'post_type'=>'testimonial', 'posts_per_page' => -1);
$members_query = new WP_Query( $args );

if($members_query->have_posts()):

    $items_in_row = 2; // How many Columns(items) to wrap in a Row
    $k = 0; // counter for items
    $count_rows = 1; // counter for rows
    $count_items = $members_query->found_posts;
?>

    <?php while($members_query->have_posts()): $members_query->the_post();

        $logo = get_field('logo_icon');
        $role = get_field('role_subtitle');
        $post_thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'testimonial');

        if($k%$items_in_row == 0 ){
            echo '<div class="row row--equal-height-flex row--sm">'; // open row
            $k_inner = 0; // counter for items inside rows
        }
        ?>
        <?php /* get the content of the box before displaying it */ ?>
        <?php ob_start();  // don't print image yet ?>
            <img src="<?php echo $logo['url']; ?>" alt="" class="col-avatar-logo"/>
            <div class="fluid">
                <img src="<?php echo $post_thumb[0];?>" alt="" class="fluid"/>
                <div class="img-text">
                    <span class="name"><?php the_title();?></span>
                    <span class="title"><?php echo $role;?></span>
                </div>
            </div>
        <?php $buffer_image = ob_get_clean(); ?>

        <?php ob_start(); // don't print content yet ?>
            <div>
                <blockquote class="quote"><p><?php the_content(); ?></p></blockquote>
                <?php
                    $posttags = get_the_tags();
                    if ($posttags){
                        $tags_html = array();
                        foreach ($posttags as $tag){
                             $tags_html[] = '<a href="'.get_tag_link($tag->term_id).'" class="db">'.$tag->name.'</a>';
                        }
                        echo implode(', ', $tags_html);
                    } ?>
            </div>
        <?php $buffer_content = ob_get_clean(); ?>

        <?php
            $col_1_class = '';
            $col_2_class = '';
            $col_1_content = '';
            $col_2_content = '';

            if($count_rows%2 == 0){ // even row
                if($k_inner == 0){
                    $col_1_class = 'col-text arrow--right reorder-md reorder-xs';
                    $col_1_content = $buffer_content;
                    $col_2_class = 'col-img col-avatar';
                    $col_2_content = $buffer_image;
                }
                elseif($k_inner == 1){
                    $col_1_class = 'col-text arrow--right reorder-xs';
                    $col_1_content = $buffer_content;
                    $col_2_class = 'col-img col-avatar';
                    $col_2_content = $buffer_image;
                }
            }else{ // odd row
                if($k_inner == 0){
                    $col_1_class = 'col-img col-avatar';
                    $col_1_content = $buffer_image;
                    $col_2_class = 'col-text arrow--left';
                    $col_2_content = $buffer_content;
                }
                elseif($k_inner == 1){
                    $col_1_class = 'col-img col-avatar reorder-md';
                    $col_1_content = $buffer_image;
                    $col_2_class = 'col-text arrow--left';
                    $col_2_content = $buffer_content;
                }
            }

        /* End Of Preperation of the code, for the next developer - I'm sorry! (HILA .MO.) */
    ?>

        <div class="col col-1-4 col-md-1-2 <?php echo $col_1_class; ?>">
            <?php echo $col_1_content; ?>
        </div>
        <div class="col col-1-4 col-md-1-2 <?php echo $col_2_class;?>">
            <?php echo $col_2_content; ?>
        </div>
    <?php
        $k_inner++;
        if( ( ($k+1)%$items_in_row == 0 && $k!=0) || $k+1 == $count_items){
          echo '</div>'; // close row
          $count_rows++;
        }
        $k++;
    endwhile;  // while($members_query->have_posts()):
    ?>

<?php endif; wp_reset_postdata(); ?>
