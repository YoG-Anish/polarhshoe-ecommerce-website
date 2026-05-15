<?php   

function polarshoe_enqueue_styles() {
    wp_enqueue_style('polarshoe-bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
    wp_enqueue_style('polarshoe-splide-min', get_template_directory_uri() . '/css/splide.min.css');
    wp_enqueue_style('polarshoe-jquery-fancybox-min', get_template_directory_uri() . '/css/jquery.fancybox.min.css');
    wp_enqueue_style('polarshoe-all', get_template_directory_uri() . '/css/all.css');   
    wp_enqueue_style( 'polarshoe-style', get_stylesheet_uri() );
    wp_enqueue_style('polarshoe-responsive', get_template_directory_uri() . '/css/responsive.css');

    wp_enqueue_script('polarshoe-jquery-min', get_template_directory_uri() . '/js/jquery.min.js', array(), null, true);
    wp_enqueue_script('polarshoe-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('polarshoe-jquery-min'), null, true);
    wp_enqueue_script('polarshoe-splide-min', get_template_directory_uri() . '/js/splide.min.js', array(), null, true);
    wp_enqueue_script('polarshoe-script', get_template_directory_uri() . '/js/script.js', array('polarshoe-jquery-min', 'polarshoe-splide-min'), null, true);
    wp_enqueue_script('polarshoe-wow-min', get_template_directory_uri() . '/js/wow.min.js', array('polarshoe-jquery-min'), null, true);
    wp_enqueue_script('polarshoe-jquery-fancybox-min', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array('polarshoe-jquery-min'), null, true);
}
add_action( 'wp_enqueue_scripts', 'polarshoe_enqueue_styles' );

// theme support
function polarshoe_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
       'primary_menu' => 'Primary Menu',
       'header_menu' => 'Header Menu',

    ));
}
add_action('after_setup_theme', 'polarshoe_theme_setup');


// Also, enable WooCommerce support for your theme
function polar_shoes_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'polar_shoes_add_woocommerce_support' );