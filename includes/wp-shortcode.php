<?php

include_once 'short-code/function_shortcode.php';

function hello_world() {
    echo ' hello world';
}

add_shortcode( 'call_hello', 'hello_world' );

// Short code social
add_shortcode( 'call_social', 'shortcode_social' );

function shortcode_social( $atts, $content ) {

    $link = '';

    extract( shortcode_atts( array(
        'link' => '#',
    ), $atts ) );

?>

    <a href="<?php echo esc_url( $link ); ?>" title="<?php echo esc_attr( $content ); ?>">
        <?php echo esc_html( $content ); ?>
    </a>

<?php

}