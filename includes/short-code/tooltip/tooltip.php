<?php
function tooltip_shortcode( $atts, $content = null ) {

    $class = $title = '';

    extract( shortcode_atts( array(

        'class' =>  'top_tooltip',
        'title' =>  '',

    ), $atts ) );

    ob_start();

?>

    <div class="tooltip-box">
        <div class="tooltip <?php echo esc_attr( $class ); ?>">
            <?php echo esc_html( $title ); ?>

            <span class="tooltiptext">
                <?php echo esc_html( $content ); ?>
            </span>
        </div>
    </div>

<?php

    $content_tooltip = ob_get_contents();
    ob_end_clean();
    return $content_tooltip;

}

add_shortcode( 'tooltip', 'tooltip_shortcode' );