<?php
/**
 * Custom main menu WALKER class.
 */
class Main_Walker_Nav_Menu extends Walker_Nav_Menu {

    function __construct() {
        $this->counter = 1;
    }

    /**
     * Starts the list before the elements are added.
     *
     * Adds classes to the unordered list sub-menus.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     */
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        // Depth-dependent classes.
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        $classes = array(
            'sub-menu',
            ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
            ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
            'menu-depth-' . $display_depth
        );
        $class_names = implode( ' ', $classes );

        // Build HTML for output.
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }

    /**
     * Start the element output.
     *
     * Adds main/sub-classes to the list items and links.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item   Menu item data object.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     * @param int    $id     Current item ID.
     */

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

        // Depth-dependent classes.
        $depth_classes = array(
            ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
            ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
        // set classes to menu items
        if( $args->menu->count == $this->counter && $depth == 0 ){
            // if this is last top menu item
            $col_class = 'col col-2-7';
        }else{
            $col_class = 'col col-1-7';
        }

        // Passed classes.
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

        // Build HTML.
        $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $col_class  .' '. $depth_class_names . $class_names . '" data-counter="'.$this->counter.'">';

        // Link attributes.
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        if( in_array('current-menu-item', $classes) ){
            $link_active = 'active';
        }else{ $link_active = '';}
        $attributes .= ' class="db main-nav-link ' . $link_active .' '. ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

        // Link title  will be replaced by description, if exists.
        if(! empty ( $item->description )){
            $link_title = $item->description;
        }else{
            $link_title = apply_filters( 'the_title', $item->title, $item->ID );
        }
        // if this is last top menu item - build html
        if( $args->menu->count == $this->counter && $depth == 0 ){
            ob_start();
            ?>
            <div class="row">
                <div class="fixed-width">
                    <a href="#" class="db main-nav-link login-link align-center">
                        <div class="inner-link-wrapper">
                            <img src="<?php echo THEME; ?>/images/user.png" alt="" class="login-img"/>
                            <p><?php _e('Login','bank'); ?>
                                <img src="<?php echo THEME; ?>/images/icons/chevron-down.png" alt="" class="icon"/>
                            </p>
                        </div>
                    </a>
                </div>
                <div class="collapsable">
                    <a <?php echo $attributes;?>>
                        <div class="inner-link-wrapper">
                            <?php echo $link_title;?>
                        </div>
                    </a>
                </div>
            </div>

            <?php
            $item_output = ob_get_clean();

        }else{
            // Build HTML output and pass through the proper filter.
            $item_output = sprintf( '%1$s<a%2$s>%3$s<div class="inner-link-wrapper">%4$s</div>%5$s</a>%6$s',
                $args->before,
                $attributes,
                $args->link_before,
                $link_title,
                $args->link_after,
                $args->after
            );
        }

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        $this->counter ++;
    }

}
/******************************************************************************************************************************/

// Prevent striping tags from menu descriptions
remove_filter( 'nav_menu_description', 'strip_tags' );
function setup_nav_menu_item_description( $menu_item ) {
    if ( isset( $menu_item->post_type ) ) {
        if ( 'nav_menu_item' == $menu_item->post_type ) {
            $menu_item->description = apply_filters( 'nav_menu_description', $menu_item->post_content );
        }
    }
    return $menu_item;
}
add_filter( 'wp_setup_nav_menu_item', 'setup_nav_menu_item_description' );

/*********************************/

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}

/*********************************/
add_filter( 'wp_nav_menu_items', 'logo_main_menu_item', 10, 2 );
function logo_main_menu_item ( $items, $args ) {
    if ($args->theme_location == 'main-menu') {
        $logo = get_field('main_logo','option');
        $tmpItems = $items;
        $items = '';
        $items .='<li class="col col-1-7"><a href="'.home_url().'" class="db main-nav-link logo-link"><img src="'.$logo['url'].'" alt="Homepage link"  class="fluid"/></a></li>';
        $items .= $tmpItems;
    }
    return $items;
}
/*********************************/
