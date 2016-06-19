<?php

define("THEME", get_template_directory_uri());

require_once( dirname( __FILE__ ) . '/admin/types.php' );
require_once( dirname( __FILE__ ) . '/admin/header-menu-functions.php' );
require_once( dirname( __FILE__ ) . '/admin/footer-menu-functions.php' );
require_once( dirname( __FILE__ ) . '/admin/breadcrumbs.php' );
require_once( dirname( __FILE__ ) . '/admin/shortcodes.php' );
require_once( dirname( __FILE__ ) . '/admin/ajax.php' );

if (function_exists('add_theme_support')){
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('page_top_banner',1920, 300, true);
    add_image_size('page_slider',600, 506, true);
    add_image_size('private_service',370, 228, true);
    add_image_size('location',350, 130, true);
    add_image_size('industry_slide',266, 281, true);
    add_image_size('testimonial',295, 295, true);
    add_image_size('product_block',240, 342, true);
    add_image_size('team_member',293, 214, true);
    add_image_size('modal_team_member',390, 257, true);

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('bank', get_template_directory() . '/languages');
}

// Load Blank styles
function html5blank_styles(){
    wp_register_style('slick', THEME . '/css/slick.css', array(), '1.0', 'all'); wp_enqueue_style('slick');
    wp_register_style('slick-theme', THEME . '/css/slick-theme.css', array(), '1.0', 'all'); wp_enqueue_style('slick-theme');
    wp_register_style('style', THEME . '/style.css', array(), '1.0', 'all'); wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet

// ENQUEUE SCRIPTS
function enqueue_scripts() {
    wp_register_script( 'waypoints', THEME . '/js/waypoint.min.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'waypoints' );
    wp_register_script( 'slick', THEME . '/js/slick.min.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'slick' );
    wp_register_script( 'validate', THEME . '/js/validate.min.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'validate' );
    wp_register_script( 'client', THEME . '/js/client.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'client' );
    wp_register_script( 'scripts', THEME . '/js/scripts.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'scripts' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

// Register Blank Navigation
register_nav_menus(array( // Using array to specify more menus if needed
    'top-menu' => __('Top Menu', 'kolnoa'), // Top Navigation
    'main-menu' => __('Main Menu', 'kolnoa'), // Main Navigation
    'footer-top-menu' => __('Footer Top Menu', 'kolnoa'), // Footer Top Navigation
    'mobile-menu' => __('Mobile Menu', 'kolnoa') // Mobile Navigation
));

// Register sidebars
if (function_exists('register_sidebar')) {
    $sidebar_array = array(
        array('name'=>'Footer 01','id'=>'footer_01'),
        array('name'=>'Footer 02','id'=>'footer_02'),
        array('name'=>'Footer 03','id'=>'footer_03'),
        array('name'=>'Footer 04','id'=>'footer_04'),
        array('name'=>'Footer 05','id'=>'footer_05')
    );
    foreach($sidebar_array as $sidebar){
        register_sidebar(array(
            'name' => $sidebar['name'],
            'id' => $sidebar['id'],
            'description' => __('Drag here menu widgets to put in the sidebar', 'my_textdomain'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	    'after_widget'  => '</div>',
    		'before_title' => '<h5 class="footer-links-title">',
            'after_title' => '</h2>'
        ));
    }
}

// Add body classes
if ( ! function_exists( 'add_body_class' ) ){
    function add_body_class( $classes ) {
        global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
        if( $is_lynx ) $classes[] = 'lynx';
        elseif( $is_gecko ) $classes[] = 'gecko';
        elseif( $is_opera ) $classes[] = 'opera';
        elseif( $is_NS4 ) $classes[] = 'ns4';
        elseif( $is_safari ) $classes[] = 'safari';
        elseif( $is_chrome ) $classes[] = 'chrome';
        elseif( $is_IE ) {
            $classes[] = 'ie';
            if( preg_match( '/MSIE ( [0-11]+ )( [a-zA-Z0-9.]+ )/', $_SERVER['HTTP_USER_AGENT'], $browser_version ) )
            $classes[] = 'ie' . $browser_version[1];
        } else $classes[] = 'unknown';
        if( $is_iphone ) $classes[] = 'iphone';

        if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
                 $classes[] = 'osx';
        } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
                 $classes[] = 'linux';
        } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
                 $classes[] = 'windows';
        }

        return $classes;
    }
    add_filter( 'body_class','add_body_class' );
}


// Advanced Custom Fields Options page
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'General Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
    acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Socials',
        'menu_title'	=> 'Socials',
        'parent_slug'	=> 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Mobile',
        'menu_title'	=> 'Mobile',
        'parent_slug'	=> 'theme-general-settings',
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function my_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
                    'base'    => str_replace($big, '%#%', get_pagenum_link($big)),
                    'format'  => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total'   => $wp_query->max_num_pages
    ));
}

function custom_search_pagination() {
    global $wp_query, $post;
    $big = 999999999;
    $pages = paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?page=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_next' => false,
        'type' => 'array',
        'prev_next' => TRUE,
        'prev_text' => '<span class="fz-0">Previous page</span><img src="'.THEME.'/images/icons/chevron-left-lg.png" alt="" class="icon">',
        'next_text' => '<span class="fz-0">Next page</span><img src="'.THEME.'/images/icons/chevron-right-lg.png" alt="" class="icon">',
            ));

    if (is_array($pages)) {
        $count = count($pages);
        $current_page = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');

        echo '<div class="page-controls">';
        foreach ($pages as $i => $page) {
            // if current is first
            if($current_page == 1){
                $next_link = get_pagenum_link($current_page+1);
                if($i == 0){
                    echo '<button class="btn btn-blank page-controls-page active">'.$page.'</button>';
                }elseif($i==$count-1){
                    echo '<button class="btn btn-blank page-controls-right"><a href="'.$next_link.'"><span class="fz-0">Next page</span><img src="'.THEME.'/images/icons/chevron-right-lg.png" alt="" class="icon"></a></button>';
                }else{
                    echo '<button class="btn btn-blank page-controls-page">'.$page.'</button>';
                }
            }
            // if current is last
            else if($current_page == $wp_query->max_num_pages){
                $prev_link = get_pagenum_link($current_page-1);
                if($i == 0){
                    echo '<button class="btn btn-blank page-controls-left"><a href="'.$prev_link.'"><span class="fz-0">Previous page</span><img src="'.THEME.'/images/icons/chevron-left-lg.png" alt="" class="icon"></a></button>';
                }elseif($i==$wp_query->max_num_pages){
                    echo '<button class="btn btn-blank page-controls-page active">'.$page.'</button>';
                }else{
                    echo '<button class="btn btn-blank page-controls-page">'.$page.'</button>';
                }
            }
            // if current is in the middle
            else{
                $next_link = get_pagenum_link($current_page+1);
                $prev_link = get_pagenum_link($current_page-1);
                if($i == 0){
                    echo '<button class="btn btn-blank page-controls-left"><a href="'.$prev_link.'"><span class="fz-0">Previous page</span><img src="'.THEME.'/images/icons/chevron-left-lg.png" alt="" class="icon"></a></button>';
                }elseif($i == $count-1){
                    echo '<button class="btn btn-blank page-controls-right"><a href="'.$next_link.'"><span class="fz-0">Next page</span><img src="'.THEME.'/images/icons/chevron-right-lg.png" alt="" class="icon"></a></button>';
                }elseif($i == $current_page){
                    echo '<button class="btn btn-blank page-controls-page active">'.$page.'</button>';
                }else{
                    echo '<button class="btn btn-blank page-controls-page">'.$page.'</button>';
                }
            }
        }
        echo '</div>';
    }
}

// Add Actions
add_action('init', 'custom_search_pagination'); // Add our Pagination

// Add Filters
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
    global $post;
    // return '<a class="read_more" href="'. get_permalink($post->ID) . '">'.__('Read More','textdomain').'</a>';
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Replaces the excerpt "more" text by a link
function new_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'new_excerpt_length');

// custom language switcher
function icl_post_languages(){
    $languages = icl_get_languages('skip_missing=0');
    if(count($languages) > 1){
        foreach($languages as $l){
            if($l['active']) {
                $arrow = '<img src="'.THEME.'/images/icons/chevron-down.png" alt="" class="icon icon--chevron"/>';
                $active_item = '<a class="db top-bar-link lang_item active_lang" href="'.$l['url'].'">'.$l['language_code'].$arrow.'</a>';
            }else{
                $langs[] = '<li class="lang_li"><a class="db top-bar-link lang_item " href="'.$l['url'].'">'.$l['language_code'].'</a></li>';
            }
        }
        echo $active_item.'<ul class="langs">'.join('', $langs).'</ul>';
    }
}

// Custom Font Sizes for TinyMCE
if ( ! function_exists( 'wpex_mce_text_sizes' ) ) {
    function wpex_mce_text_sizes( $initArray ){
        $initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 18px 20px 22px 24px 28px 32px 36px";
        return $initArray;
    }
}
add_filter( 'tiny_mce_before_init', 'wpex_mce_text_sizes' );

// Highlight text results
function wps_highlight_results($text){
    if(is_search()){
        $sr = get_query_var('s');
        $keys = explode(" ",$sr);
        $text = preg_replace('/('.implode('|', $keys) .')/iu', '<strong>'.$sr.'</strong>', $text);
    }
     return $text;
}
add_filter('the_excerpt', 'wps_highlight_results');
//add_filter('the_title', 'wps_highlight_results');


function print_filters_for( $hook = '' ) {
    global $wp_filter;
    if( empty( $hook ) || !isset( $wp_filter[$hook] ) )
        return;

    print '<pre>';
    print_r( $wp_filter[$hook] );
    print '</pre>';
}
// print_filters_for( 'the_content' );
