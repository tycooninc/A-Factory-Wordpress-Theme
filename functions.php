<?php
/**
 * tvbtech functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tvbtech
 */

if ( ! function_exists( 'tvbtech' . '_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function tvbtech_setup() {
        // Make theme available for translation.
        load_theme_textdomain( 'tvbtech', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        // Let WordPress manage the document title.
        //add_theme_support( 'title-tag' );

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails', array( 'post', 'page', 'products' ));

        // Register navigation menus.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Menu', 'tvbtech' ),
            'footer'  => esc_html__( 'Footer Menu', 'tvbtech' ),
        ));

        // Switch default core markup for search form, comment form, and comments to output valid HTML5.
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );
    }
endif;
add_action( 'after_setup_theme', 'tvbtech_setup' );


/**
 * Enqueue scripts and styles.
 */
function tvbtech_scripts() {
    // Theme stylesheet (style.css is automatically enqueued by WP)
    wp_enqueue_style( 'tvbtech-style', get_stylesheet_uri() );

    // Optional: Example of adding a main custom CSS file
    // wp_enqueue_style( 'tvbtech-main-css', get_template_directory_uri() . '/css/main.css', array(), '1.0.0' );

    // Optional: Example of adding a main custom JS file
    // wp_enqueue_script( 'tvbtech-main-js', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0.0', true );

    // Optional: Add custom block editor styles.
    // add_editor_style( 'css/editor-style.css' );
}
add_action( 'wp_enqueue_scripts', 'tvbtech_scripts' );


/**
 * Register widget area.
 */
function tvbtech_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'tvbtech' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'tvbtech' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'tvbtech_widgets_init' );

require_once get_template_directory() . '/post-types.php';
require_once get_template_directory() . '/options.php';
require_once get_template_directory() . '/handle-rest.php';
require_once get_template_directory() . '/change-labels.php';
function tvbtech_breadcrumb($title) {

      if(is_archive('downloads')){
          echo '<div class="box-container">
              <a href="/">Home</a>
              <span> / </span>
              <span class="active">'.$title.'</span>
              </div>';
          return;
      }

      if(is_singular('products')){
            echo '<div class="box-container">
              <a href="/">Home</a>
              <span> / products / </span>
              <span class="active">'.$title.'</span>
              </div>';
           return;
      }

    if ( ! is_home() ) {
        if ( is_category() || is_single() ) {
            echo "&nbsp;&raquo;&nbsp;";
            the_category(', ');
            if ( is_single() ) {
                echo "&nbsp;&raquo;&nbsp;";
                the_title();
            }
        } elseif ( is_page() ) {
            echo '<div class="box-container">
              <a href="/">Home</a>
              <span>/</span>
              <span class="active">'.$title.'</span>
              </div>';
        }
    }
}

function get_tvbtech_option($key, $type = 'text'){
    $options = get_option('tvbtech');
    if($type == 'media'){
        echo $options[$key]['url'];
        return;
    }
    if($type == 'repeater'){
        return $options[$key];
    }

    if(isset($options[$key])){
        echo $options[$key];
    }else{
        echo "";
    }
}

function get_tvbtech_menu_array( $menu_name ) {
    $menu_items = wp_get_nav_menu_items( $menu_name );
    if ( empty( $menu_items ) ) {
        return [];
    }

    $nested_array = [];
    $lookup_array = []; // Used to quickly find parents by ID

    foreach ( (array) $menu_items as $item ) {
        $parent_id = intval( $item->menu_item_parent );

        $data = [
            'id' => $item->ID,
            'title' => $item->title,
            'url' => $item->url,
            'classes' => implode( ' ', $item->classes ),
            'parent_id' => $parent_id,
            'children' => [],
        ];

        $lookup_array[ $item->ID ] = $data;

        if ( $parent_id > 0 && isset( $lookup_array[ $parent_id ] ) ) {
            $lookup_array[ $parent_id ]['children'][] = &$lookup_array[ $item->ID ];
        } else {
            // This is a root item. Add it to the final array.
            $nested_array[] = &$lookup_array[ $item->ID ];
        }
    }

    // Return a deep copy without the references for safety
    return json_decode( json_encode( $nested_array ), true );
}



function tvbtech_output_seo_meta():void
{
    $meta_keyword = "";
    $meta_description = "";
    $title = "Default title";
    $current_uri = $_SERVER['REQUEST_URI'];
    if(is_single() || is_page()):

        if(is_singular('products')){
            $meta_info  = get_post_meta(get_the_ID(), "tvbtech_product_options", true);
        }else{
            $meta_info  = get_post_meta(get_the_ID(), "tvbtech_meta_options", true);
        }

        if(is_single()){
            $meta_info  = get_post_meta(get_the_ID(), "tvbtech_post_options", true);
        }

        if(!empty($meta_info)){
            $meta_keyword = $meta_info['meta_keywords'];
            $meta_description = $meta_info['meta_description'];
        }

        $title = get_the_title();

    elseif(is_archive()):

        if(is_post_type_archive('products')):

            $terms = get_terms( array(
                'taxonomy'   => 'product_category',
                'number'     => 1,           // Only fetch one term
                'orderby'    => 'term_id',   // Use 'name' for alphabetical or 'term_id' for oldest
                'order'      => 'ASC',
                'hide_empty' => false,
            ) );

            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                $first_term_id = $terms[0]->term_id;
                $meta_info = get_term_meta( $first_term_id, 'tvbtech_product_category_options', true );
                $meta_keyword = $meta_info['meta_keywords'];
                $meta_description = $terms[0]->description;
            }

        endif;

        if(is_archive('product_category') && str_contains($current_uri, 'product-category')){
            $queried_object = get_queried_object();
            $term = get_term_by( 'slug', $queried_object->slug, 'product_category');
            $meta_info = get_term_meta($term->term_id, 'tvbtech_product_category_options', true);
            $meta_keyword = $meta_info['meta_keywords'];
            $meta_description = $term->description;
            $title = $meta_info['meta_title'];
        }

        if(is_archive('download_category') && str_contains($current_uri, 'download-category')){
            $queried_object = get_queried_object();
            $term = get_term_by( 'slug', $queried_object->slug, 'download_category');
            $meta_info = get_term_meta($term->term_id, 'tvbtech_download_category_options', true);
            $meta_keyword = $meta_info['meta_keywords'];
            $meta_description = $term->description;
            $title = $meta_info['meta_title'];
        }

        $categories = get_the_category();

        if ( ! empty( $categories ) ) {
            $term_id = $categories[0]->term_id;
            $meta_info = get_term_meta( $term_id, 'tvbtech_category_options', true );
            $meta_keyword = $meta_info['meta_keywords'];
            $meta_description = $categories[0]->description;
            $title = $meta_info['meta_title'];
        }
    endif;

    echo '<title>' . $title . '</title>';
    if(isset($meta_keyword)){
        echo '<meta name="keywords" content="' . $meta_keyword . '">';
    }else{
        echo '<meta name="keywords" content="">';
    }
    if(isset($meta_description)){
        echo '<meta name="description" content="' . $meta_description . '">';
    }else{
        echo '<meta name="description" content="">';
    }
}
