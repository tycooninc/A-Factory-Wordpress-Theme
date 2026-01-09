<?php

require_once get_template_directory() .'/codestar-framework/codestar-framework.php';


// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

    $prefix = 'tvbtech';
    $meta_prefix = 'tvbtech_meta_options';
    $meta_download_prefix = 'tvbtech_download_options';
    $meta_product_prefix = 'tvbtech_product_options';
    $meta_inquiry_prefix = 'tvbtech_inquiry_options';
    $meta_seo_prefix = 'tvbtech_seo_options';
    $meta_post_prefix = 'tvbtech_post_options';
    $product_category_options_prefix = 'tvbtech_product_category_options';
    $post_category_options_prefix = 'tvbtech_category_options';
    $download_category_options_prefix = 'tvbtech_download_category_options';

    CSF::createOptions( $prefix, array(
        'menu_title' => 'Theme Settings',       // Title in the main admin menu
        'menu_slug'  => 'theme-settings',       // URL slug (e.g., /wp-admin/admin.php?page=theme-settings)
        'menu_icon'  => 'dashicons-admin-settings', // Dashicon class for the menu icon
        'capability' => 'manage_options',       // Required user capability to see this page
        'menu_type'  => 'menu',                 // 'menu' for top-level, 'submenu' for under Settings etc.
        'menu_position' => 20,                  // Where to place it in the menu order
    ));

    CSF::createSection( $prefix, array(
        'title'  => 'Branding & Identity',
        'icon'   => 'fas fa-paint-brush',
        'fields' => array(

            array(
                'id'    => 'company_name',
                'type'  => 'text',
                'title' => 'Company Name',
                'desc'  => 'Enter the name of your company',
            ),

            array(
                'id'    => 'site_logo',         // Meta key for the logo URL
                'type'  => 'media',             // Use the 'media' type for image uploads
                'title' => 'Website Logo',
                'desc'  => 'Upload your main website logo here.',
                'library' => 'image',
            ),

            array(
                'id'    => 'footer_logo',         // Meta key for the logo URL
                'type'  => 'media',             // Use the 'media' type for image uploads
                'title' => 'Footer Logo',
                'desc'  => 'Upload footer logo here',
                'library' => 'image',
            ),

            array(
                'id'    => 'site_favicon',      // Meta key for the favicon URL
                'type'  => 'media',
                'title' => 'Favicon/Site Icon',
                'desc'  => 'Upload your favicon (usually 32x32 pixels, .ico or .png).',
                'library' => 'image',
                'preview_width'  => '50px',     // Customize the image preview size
            ),

            // Text Field: WhatsApp
            array(
                'id'    => 'whatsapp',
                'type'  => 'text',
                'title' => 'WhatsApp URL',
                'desc'  => 'Enter the full URL or phone number for WhatsApp.',
            ),

            // Text Field: Facebook
            array(
                'id'    => 'facebook',
                'type'  => 'text',
                'title' => 'Facebook URL',
                'desc'  => 'Enter the full URL for your Facebook profile/page.',
            ),

            // Text Field: YouTube
            array(
                'id'    => 'youtube',
                'type'  => 'text',
                'title' => 'YouTube URL',
                'desc'  => 'Enter the full URL for your YouTube channel.',
            ),

            // Text Field: LinkedIn
            array(
                'id'    => 'linkedin',
                'type'  => 'text',
                'title' => 'LinkedIn URL',
                'desc'  => 'Enter the full URL for your LinkedIn profile.',
            ),

            // Text Field: Instagram
            array(
                'id'    => 'instagram',
                'type'  => 'text',
                'title' => 'Instagram URL',
                'desc'  => 'Enter the full URL for your Instagram profile.',
            ),

            array(
                'id'    => 'phone',
                'type'  => 'text',
                'title' => 'Contact Phone',
                'desc'  => 'Enter the phone of your company',
            ),

            array(
                'id'    => 'email',
                'type'  => 'text',
                'title' => 'Contact Email',
                'desc'  => 'Enter the phone of your company',
            ),

            array(
                'id'    => 'wechat_qrcode',         // Meta key for the logo URL
                'type'  => 'media',             // Use the 'media' type for image uploads
                'title' => 'Wechat QR Code',
                'desc'  => 'Upload your wechat qrcode here.',
                'library' => 'image',           // Restrict file selection to images
            ),

            array(
                'id'    => 'office_address',
                'type'  => 'text',
                'title' => 'Office Address',
                'desc'  => 'Enter the address of your company',
            ),

            array(
                'id'    => 'factory_address',
                'type'  => 'text',
                'title' => 'Factory Address',
                'desc'  => 'Enter the address of your company',
            ),

            array(
                'id'    => 'product_category_banner',         // Meta key for the logo URL
                'type'  => 'media',             // Use the 'media' type for image uploads
                'title' => 'Product Category Banner',
                'desc'  => 'Upload your product category here',
                'library' => 'image',           // Restrict file selection to images
            ),

            array(
                'id'    => 'news_category_banner',         // Meta key for the logo URL
                'type'  => 'media',             // Use the 'media' type for image uploads
                'title' => 'News Category Banner',
                'desc'  => 'Upload your news category banner here',
                'library' => 'image',           // Restrict file selection to images
            ),

            array(
                'id'    => 'download_category_banner',         // Meta key for the logo URL
                'type'  => 'media',             // Use the 'media' type for image uploads
                'title' => 'Download Category Banner',
                'desc'  => 'Upload your download category banner here',
                'library' => 'image',           // Restrict file selection to images
            ),

        )
    ) );


    CSF::createSection( $prefix, array(
        'title'  => 'Carousel Setting',
        'icon'   => 'fas fa-paint-brush',
        'fields' => array(
            array(
                'id'     => 'carousel',
                'type'   => 'repeater',
                'title'  => 'carousel',
                'fields' => array(

                    array(
                        'id'      => 'image', // **This is the meta key you use to retrieve the value**
                        'type'    => 'upload',               // **The Codestar Field Type for file/media upload**
                        'title'   => 'carousel image(PC)',
                        'desc'    => 'Carousel image for PCs',
                        'button_title' => 'Select File',
                        'remove_title' => 'Remove File',
                    ),

                    array(
                        'id'      => 'mobile_image', // **This is the meta key you use to retrieve the value**
                        'type'    => 'upload',               // **The Codestar Field Type for file/media upload**
                        'title'   => 'carousel image(mobile)',
                        'desc'    => 'Carousel image for mobile',
                        'button_title' => 'Select File',
                        'remove_title' => 'Remove File',
                    ),

                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => 'link',
                        'desc'  => 'carousel link',
                    ),

                ),
            ),
        )
    ));


    CSF::createMetabox( $meta_prefix, array(
        'title'     => 'Page Options',          // Title displayed on the page edit screen
        'post_type' => 'page',                  // Specifies the Post Type (e.g., 'post', 'page', 'custom_post_type_slug')
        'data_type' => 'serialize',             // How data is stored (default is 'serialize', you can use 'unserialize' or 'normal')
        'context'   => 'normal',                // Where the metabox appears ('normal', 'side', 'advanced')
        'priority'  => 'default',               // Priority of the metabox display
    ) );

    CSF::createSection( $meta_prefix, array(
        'fields' => array(

            array(
                'id'    => 'page_title',         // THIS IS YOUR META KEY: page_title
                'type'  => 'text',               // Type of input field
                'title' => 'Page Title',  // Label for the field in the admin
                'desc'  => 'Enter a custom title for this page.',
            ),

            array(
                'id'    => 'meta_keywords',
                'type'  => 'text',
                'title' => 'Meta Keywords',
                'desc'  => 'Enter your post meta keywords',
            ),

            array(
                'id'    => 'meta_description',
                'type'  => 'text',
                'title' => 'Meta Description',
                'desc'  => 'Enter your post meta description',
            ),

        )
    ));

    CSF::createMetabox( $meta_post_prefix, array(
        'title'     => 'Page Options',          // Title displayed on the page edit screen
        'post_type' => 'post',                  // Specifies the Post Type (e.g., 'post', 'page', 'custom_post_type_slug')
        'data_type' => 'serialize',             // How data is stored (default is 'serialize', you can use 'unserialize' or 'normal')
        'context'   => 'normal',                // Where the metabox appears ('normal', 'side', 'advanced')
        'priority'  => 'default',               // Priority of the metabox display
    ));

    CSF::createSection( $meta_post_prefix, array(
        'fields' => array(

            array(
                'id'    => 'meta_keywords',
                'type'  => 'text',
                'title' => 'Meta Keywords',
                'desc'  => 'Enter your post meta keywords',
            ),

            array(
                'id'    => 'meta_description',
                'type'  => 'text',
                'title' => 'Meta Description',
                'desc'  => 'Enter your post meta description',
            ),

        )
    ));



    CSF::createMetabox( $meta_download_prefix, array(
        'title'     => 'Download File Settings',
        'post_type' => 'downloads',
        'data_type' => 'serialize',
    ));

    CSF::createSection( $meta_download_prefix, array(
        'fields' => array(

            array(
                'id'      => 'download_file_upload', // **This is the meta key you use to retrieve the value**
                'type'    => 'upload',               // **The Codestar Field Type for file/media upload**
                'title'   => 'Select Downloadable File',
                'desc'    => 'Upload the actual file (e.g., PDF, ZIP, MP3) for this download.',
                'library' => 'application',          // Optional: Restrict selection to non-image files
                'button_title' => 'Select File',
                'remove_title' => 'Remove File',
            ),
        )
    ) );


    CSF::createMetabox( $meta_product_prefix, array(
        'title'     => 'Product Information',
        'post_type' => 'products',
        'data_type' => 'serialize',
    ));

    CSF::createSection( $meta_product_prefix, array(
        'fields' => array(

            array(
                'id'    => 'model_number',
                'type'  => 'text',
                'title' => 'Model Number',
                'desc'  => 'product model number',
            ),

            array(
                'id'    => 'short_description',
                'type'  => 'textarea',
                'title' => 'short description',
                'desc'  => 'short description of the products',
            ),

            array(
                'id'    => 'key_features',
                'type'  => 'wp_editor',
                'title' => 'Key Features',
                'desc'  => 'Key Features of the product',
            ),

            array(
                'id'    => 'specification',
                'type'  => 'wp_editor',
                'title' => 'Specification',
                'desc'  => 'Specification of the product',
            ),

            array(
                'id'    => 'what_is_included',
                'type'  => 'wp_editor',
                'title' => "What's Included",
                'desc'  => 'What is included in the product',
            ),

            array(
                'id'    => 'standard_configuration',
                'type'  => 'wp_editor',
                'title' => 'Standard Configuration',
                'desc'  => 'Standard configuration of the product',
            ),

            array(
                'id'    => 'product_gallery',
                'type'  => 'gallery',
                'title' => 'product gallery',
                'desc'  => 'product images of the product',
            ),

            array(
                'id'     => 'downloads',
                'type'   => 'repeater',
                'title'  => 'Upload Product Documents',
                'fields' => array(

                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Document Title'
                    ),

                    array(
                        'id'    => 'file',
                        'type'  => 'upload',
                        'title' => 'Upload',
                    ),

                ),
            ),

            array(
                'id'    => 'meta_keywords',
                'type'  => 'text',
                'title' => 'Meta Keywords',
                'desc'  => 'Please enter meta keywords',
            ),

            array(
                'id'    => 'meta_description',
                'type'  => 'textarea',
                'title' => 'Meta Description',
                'desc'  => 'Please enter meta Description',
            ),
        )
    ) );


    CSF::createMetabox( $meta_inquiry_prefix, array(
        'title'     => 'Inquiry Information',
        'post_type' => 'inquiry',
        'data_type' => 'serialize',
    ));

    CSF::createSection( $meta_inquiry_prefix, array(
        'fields' => array(

            array(
                'id'    => 'product',
                'type'  => 'text',
                'title' => 'Product Name',
                'desc'  => 'product name',
            ),

            array(
                'id'    => 'quantity',
                'type'  => 'text',
                'title' => 'product quantity',
                'desc'  => 'product quantity',
            ),

            array(
                'id'    => 'name',
                'type'  => 'text',
                'title' => 'Name',
                'desc'  => 'name of the customer',
            ),

            array(
                'id'    => 'email',
                'type'  => 'text',
                'title' => 'Email',
                'desc'  => 'email of the customer',
            ),

            array(
                'id'    => 'address',
                'type'  => 'text',
                'title' => 'Address',
                'desc'  => 'customer address',
            ),

            array(
                'id'    => 'telephone',
                'type'  => 'text',
                'title' => 'telephone',
                'desc'  => 'customer telephone',
            ),

            array(
                'id'    => 'skype',
                'type'  => 'text',
                'title' => 'skype',
                'desc'  => 'customer skype',
            ),

            array(
                'id'    => 'content',
                'type'  => 'textarea',
                'title' => 'content',
                'desc'  => 'customer message',
            ),
        )
    ));

    CSF::createTaxonomyOptions($product_category_options_prefix, array(
        'taxonomy' => 'product_category',
        'data_type' => 'serialize',
    ));

    CSF::createSection( $product_category_options_prefix, array(
        'fields' => array(

            array(
                'id'    => 'meta_title',
                'type'  => 'text',
                'title' => 'Meta Title',
                'desc'  => 'Enter your meta Title',
            ),

            array(
                'id'    => 'meta_keywords',
                'type'  => 'text',
                'title' => 'Meta Keywords',
                'desc'  => 'Enter your meta keywords',
            ),
        )
    ));

    CSF::createTaxonomyOptions($post_category_options_prefix, array(
        'taxonomy' => 'category',
        'data_type' => 'serialize',
    ));

    CSF::createSection( $post_category_options_prefix, array(
        'fields' => array(

            array(
                'id'    => 'meta_title',
                'type'  => 'text',
                'title' => 'Meta Title',
                'desc'  => 'Enter your meta Title',
            ),

            array(
                'id'    => 'meta_keywords',
                'type'  => 'text',
                'title' => 'Meta Keywords',
                'desc'  => 'Enter your meta keywords',
            ),
        )
    ));

    CSF::createTaxonomyOptions($download_category_options_prefix, array(
        'taxonomy' => 'download_category',
        'data_type' => 'serialize',
    ));

    CSF::createSection( $download_category_options_prefix, array(
        'fields' => array(

            array(
                'id'    => 'meta_title',
                'type'  => 'text',
                'title' => 'Meta Title',
                'desc'  => 'Enter your meta Title',
            ),

            array(
                'id'    => 'meta_keywords',
                'type'  => 'text',
                'title' => 'Meta Keywords',
                'desc'  => 'Enter your meta keywords',
            ),
        )
    ));

}