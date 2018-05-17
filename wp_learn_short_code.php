<?php
/*
Plugin Name: WP Learn Short Code
Plugin URI: https://www.facebook.com/lathieuhiep
Description: Learn short code wordpress.
Version: 1.0.0
Author: La Thiếu Hiệp
Author URI: https://www.facebook.com/lathieuhiep
License: GPLv2 or later
Text Domain: wp_learn_short_code
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( !class_exists( 'WP_Learn_Short_Code' ) ) :

    class WP_Learn_Short_Code {

        /*
        * This method loads other methods of the class.
        */
        function __construct() {

            /* Load define */
            $this->wp_learn_shortcode_define();

            /* load languages */
            $this->wp_learn_shortcode_languages();

            /* load includes */
            $this->wp_learn_shortcode_includes();

            /*load script*/
            $this ->wp_learn_shortcode_script();

        }

        /* Load define */
        function wp_learn_shortcode_define() {

            define( 'wp_learn_shortcode_path', plugin_dir_url( __FILE__ ) );

            define( 'wp_learn_shortcode_server_path', plugin_dir_path( __FILE__ ) );

        }

        /* Load languages */
        function wp_learn_shortcode_languages() {

            add_action( 'plugins_loaded', array( $this, 'wp_learn_shortcode_text_domain' ) );

        }

        /* Text domain */
        function wp_learn_shortcode_text_domain() {

            load_plugin_textdomain( 'wp_learn_short_code', false, wp_learn_shortcode_path . 'languages' );

        }

        /* Load includes */
        function wp_learn_shortcode_includes() {

            include_once wp_learn_shortcode_server_path . 'includes/wp-shortcode.php';

        }

        /* Load script */
        function wp_learn_shortcode_script() {

            add_action( 'admin_enqueue_scripts', array( $this, 'wp_learn_shortcode_backend_scripts' ) );
            add_action( 'wp_enqueue_scripts',array( $this, 'wp_learn_shortcode_frontend_scripts' ) );

        }

        /* Backend scripts */
        function wp_learn_shortcode_backend_scripts() {



        }

        /* Frontend scripts */
        function wp_learn_shortcode_frontend_scripts() {



        }

    }

    new WP_Learn_Short_Code();

endif;