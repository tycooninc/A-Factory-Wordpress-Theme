<?php

add_action( 'rest_api_init', function () {
    register_rest_route( 'tvbtech', '/submit-inquiry', [
        'methods'  => 'POST',
        'callback' => 'handle_product_form_submission',
        'permission_callback' => '__return_true'
    ]);
});

function handle_product_form_submission( WP_REST_Request $request ) {

    // Get parameters
    $data = [
        'action'       => sanitize_text_field( $request['action'] ),
        'm'            => sanitize_text_field( $request['m'] ),
        'product'      => sanitize_text_field( $request['Product'] ),
        'quantity'     => intval( $request['Quantity'] ),
        'name'         => sanitize_text_field( $request['name'] ),
        'email'        => sanitize_email( $request['EMail'] ),
        'address'      => sanitize_text_field( $request['ContactAddr'] ),
        'tel'          => sanitize_text_field( $request['Tel'] ),
        'skype'        => sanitize_text_field( $request['Skype'] ),
        'intro'        => sanitize_textarea_field( $request['Intro'] ),
    ];

    // Basic validation
    if ( empty( $data['name'] ) || empty( $data['email'] ) ) {
        return new WP_REST_Response([
            'success' => false,
            'message' => 'Name and email are required.',
        ], 400);
    }

    $post_id = wp_insert_post([
        'post_title'   => 'Inquiry',
        'post_type'    => 'inquiry',
        'post_status'  => 'publish',
    ]);

    update_post_meta($post_id, 'tvbtech_inquiry_options', array());

    $options = get_post_meta( $post_id, 'tvbtech_inquiry_options', true );
    $options['name'] = $data['name'];
    $options['email'] = $data['email'];
    $options['address'] = $data['address'];
    $options['telephone'] = $data['tel'];
    $options['skype'] = $data['skype'];
    $options['content'] = $data['intro'];
    $options['product'] = $data['product'];
    $options['quantity'] = $data['quantity'];
    update_post_meta($post_id, 'tvbtech_inquiry_options', $options);

    // Example: send email
    wp_mail(
        get_option('admin_email'),
        'New Form Submission',
        print_r( $data, true )
    );

    return new WP_REST_Response([
        'success' => true,
        'message' => 'Form submitted successfully.',
        'data'    => $data,
    ], 200);
}
