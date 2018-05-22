<?php
global $wp_short_code_element;

$wp_short_code_element = array(
    'tooltip',
    'recent-posts'
);

foreach ( $wp_short_code_element as $wp_short_code_element_item ) :

    include_once $wp_short_code_element_item . '/' . $wp_short_code_element_item .'.php' ;

endforeach;

// Filter Functions with Hooks
function custom_mce_button() {

    // Check if user have permission
    if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
        return;
    }

    // Check if WYSIWYG is enabled
    if ( 'true' == get_user_option( 'rich_editing' ) ) {

        add_filter( 'mce_external_plugins', 'custom_tinymce_plugin' );
        add_filter( 'mce_buttons', 'register_mce_button' );

    }

}
add_action('admin_init', 'custom_mce_button');

// Function for new button
function custom_tinymce_plugin( $plugin_array ) {
    global $wp_short_code_element;

    foreach ( $wp_short_code_element as $wp_short_code_element_item ) :

        $plugin_array[$wp_short_code_element_item] = wp_learn_shortcode_path .'includes/short-code/'.$wp_short_code_element_item.'/'.$wp_short_code_element_item.'-jquery.js';

    endforeach;

    return $plugin_array;
}

// Register new button in the editor
function register_mce_button( $buttons ) {
    global $wp_short_code_element;

    foreach ( $wp_short_code_element as $wp_short_code_element_item ) :

        array_push( $buttons, $wp_short_code_element_item );

    endforeach;

    return $buttons;
}