<?php


add_action( 'init', 'create_custom_post_types' );

function create_custom_post_types() {

    $product_labels = array(
        'name'                  => _x( 'Products', 'Post Type General Name', 'tvbtech' ),
        'singular_name'         => _x( 'Product', 'Post Type Singular Name', 'tvbtech' ),
        'menu_name'             => __( 'Products', 'tvbtech' ),
        'name_admin_bar'        => __( 'Product', 'tvbtech' ),
        'archives'              => __( 'Product Archives', 'tvbtech' ),
        'attributes'            => __( 'Product Attributes', 'tvbtech' ),
        'parent_item_colon'     => __( 'Parent Product:', 'tvbtech' ),
        'all_items'             => __( 'All Products', 'tvbtech' ),
        'add_new_item'          => __( 'Add New Product', 'tvbtech' ),
        'add_new'               => __( 'Add New', 'tvbtech' ),
        'new_item'              => __( 'New Product', 'tvbtech' ),
        'edit_item'             => __( 'Edit Product', 'tvbtech' ),
        'update_item'           => __( 'Update Product', 'tvbtech' ),
        'view_item'             => __( 'View Product', 'tvbtech' ),
        'view_items'            => __( 'View Products', 'tvbtech' ),
        'search_items'          => __( 'Search Product', 'tvbtech' ),
        'not_found'             => __( 'Not found', 'tvbtech' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'tvbtech' ),
        'featured_image'        => __( 'Product Image', 'tvbtech' ),
        'set_featured_image'    => __( 'Set product image', 'tvbtech' ),
        'remove_featured_image' => __( 'Remove product image', 'tvbtech' ),
        'use_featured_image'    => __( 'Use as product image', 'tvbtech' ),
        'insert_into_item'      => __( 'Insert into product', 'tvbtech' ),
        'uploaded_to_this_item' => __( 'Uploaded to this product', 'tvbtech' ),
        'items_list'            => __( 'Products list', 'tvbtech' ),
        'items_list_navigation' => __( 'Products list navigation', 'tvbtech' ),
        'filter_items_list'     => __( 'Filter products list', 'tvbtech' ),
    );
    $product_args = array(
        'label'                 => __( 'Product', 'tvbtech' ),
        'description'           => __( 'A post type for physical or digital products.', 'tvbtech' ),
        'labels'                => $product_labels,
        'supports'              => array( 'title','thumbnail','revisions' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-cart', // You can change the icon
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true, // Enable for Gutenberg/REST API
    );
    register_post_type( 'products', $product_args );


    // --- 2. Custom Post Type: Downloads ---
    $download_labels = array(
        'name'                  => _x( 'Downloads', 'Post Type General Name', 'tvbtech' ),
        'singular_name'         => _x( 'Download', 'Post Type Singular Name', 'tvbtech' ),
        'menu_name'             => __( 'Downloads', 'tvbtech' ),
        'name_admin_bar'        => __( 'Download', 'tvbtech' ),
        'archives'              => __( 'Download Archives', 'tvbtech' ),
        'all_items'             => __( 'All Downloads', 'tvbtech' ),
        'add_new_item'          => __( 'Add New Download', 'tvbtech' ),
        'add_new'               => __( 'Add New', 'tvbtech' ),
        'edit_item'             => __( 'Edit Download', 'tvbtech' ),
    );
    $download_args = array(
        'label'                 => __( 'Download', 'tvbtech' ),
        'description'           => __( 'A post type for digital files to be downloaded.', 'tvbtech' ),
        'labels'                => $download_labels,
        'supports'              => array( 'title'), // Less supports needed than products
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'show_in_admin_bar'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
        'menu_icon'             => 'dashicons-download',
    );
    register_post_type( 'downloads', $download_args );


    // Arguments for the Custom Post Type
    $args = array(
        'label'                 => __( 'Inquiry', 'tvbtech' ),
        'description'           => __( 'A post type to record user inquiries and contact forms.', 'tvbtech' ),
        'labels'                => 'inquiry',
        'supports'              => array( 'title' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 25, // Positioned near Comments
        'menu_icon'             => 'dashicons-email-alt', // Simple email icon
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false, // Typically inquiries do not need a public archive page
        'exclude_from_search'   => true,  // Typically inquiries are excluded from frontend search
        'publicly_queryable'    => false, // Typically inquiries are not meant for public viewing
        'capability_type'       => 'post',
        'show_in_rest'          => true, // Enable for Gutenberg/REST API if needed
    );

    register_post_type( 'inquiry', $args );

}

function tvbtech_register_product_category_taxonomy()
{

    $labels = array(
        'name' => 'Product Categories',
        'singular_name' => 'Product Category',
        'search_items' => 'Search Product Categories',
        'all_items' => 'All Product Categories',
        'parent_item' => 'Parent Product Category',
        'parent_item_colon' => 'Parent Product Category:',
        'edit_item' => 'Edit Product Category',
        'update_item' => 'Update Product Category',
        'add_new_item' => 'Add New Product Category',
        'new_item_name' => 'New Product Category Name',
        'menu_name' => 'Product Categories',
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true, // TRUE = category-like, FALSE = tag-like
        'public' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'product-category'),
        'show_in_rest' => true, // Gutenberg support
    );

    // Attach taxonomy to the Product CPT
    register_taxonomy(
        'product_category', // taxonomy slug
        array('products'), // post type(s)
        $args
    );
}

add_action('init', 'tvbtech_register_product_category_taxonomy');


function tvbtech_register_download_category_taxonomy()
{

    $labels = array(
        'name' => 'Download Categories',
        'singular_name' => 'Download Category',
        'search_items' => 'Search Download Categories',
        'all_items' => 'All Download Categories',
        'parent_item' => 'Parent Download Category',
        'parent_item_colon' => 'Parent Download Category:',
        'edit_item' => 'Edit Download Category',
        'update_item' => 'Update Download Category',
        'add_new_item' => 'Add New Download Category',
        'new_item_name' => 'New Download Category Name',
        'menu_name' => 'Download Categories',
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true, // TRUE = category-like, FALSE = tag-like
        'public' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'download-category'),
        'show_in_rest' => true, // Gutenberg support
    );

    // Attach taxonomy to the Product CPT
    register_taxonomy(
        'download_category', // taxonomy slug
        array('downloads'), // post type(s)
        $args
    );
}

add_action('init', 'tvbtech_register_download_category_taxonomy');
