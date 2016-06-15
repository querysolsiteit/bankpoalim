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
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}
// Add Actions
add_action('init', 'my_pagination'); // Add our Pagination

// Add Filters
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
	return '<a class="read_more" href="'. get_permalink($post->ID) . '">'.__('Read More','textdomain').'</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Replaces the excerpt "more" text by a link
function new_excerpt_length($length) {
    return 20;
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


/**
 * Allow shortcodes in Contact Form 7
 *
 * @author WPSnacks.com
 * @link http://www.wpsnacks.com
 */
function shortcodes_in_cf7( $form ) {
	$form = do_shortcode( $form );
	return $form;
}
add_filter( 'wpcf7_form_elements', 'shortcodes_in_cf7' );
