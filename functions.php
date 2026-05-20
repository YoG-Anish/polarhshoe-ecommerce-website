<?php

function polarshoe_enqueue_styles()
{
    wp_enqueue_style('polarshoe-bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
    wp_enqueue_style('polarshoe-splide-min', get_template_directory_uri() . '/css/splide.min.css');
    wp_enqueue_style('polarshoe-jquery-fancybox-min', get_template_directory_uri() . '/css/jquery.fancybox.min.css');
    wp_enqueue_style('polarshoe-all', get_template_directory_uri() . '/css/all.css');
    wp_enqueue_style('polarshoe-style', get_stylesheet_uri());
    wp_enqueue_style('polarshoe-responsive', get_template_directory_uri() . '/css/responsive.css');

    wp_enqueue_script('polarshoe-jquery-min', get_template_directory_uri() . '/js/jquery.min.js', array(), null, true);
    wp_enqueue_script('polarshoe-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('polarshoe-jquery-min'), null, true);
    wp_enqueue_script('polarshoe-splide-min', get_template_directory_uri() . '/js/splide.min.js', array(), null, true);
    wp_enqueue_script('polarshoe-main-script', get_template_directory_uri() . '/js/script.js', array('polarshoe-jquery-min', 'polarshoe-splide-min', 'jquery'), '1.0', true);
    wp_enqueue_script('polarshoe-wow-min', get_template_directory_uri() . '/js/wow.min.js', array('polarshoe-jquery-min'), null, true);
    wp_enqueue_script('polarshoe-jquery-fancybox-min', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array('polarshoe-jquery-min'), null, true);
}
add_action('wp_enqueue_scripts', 'polarshoe_enqueue_styles');

// theme support
function polarshoe_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary_menu' => 'Primary Menu',
        'header_menu' => 'Header Menu',
        'footer_menu_1' => __('Footer Menu 1', 'polar-shoes'),
        'footer_menu_2' => __('Footer Menu 2', 'polar-shoes'),
        'footer_menu_3' => __('Footer Menu 3', 'polar-shoes'),
    ));
}
add_action('after_setup_theme', 'polarshoe_theme_setup');



//support svg file
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// customizer setting for featured product display wp_customise
function polar_shoes_featured_customizer($wp_customize)
{
    // 1. Add Section
    $wp_customize->add_section('featured_section_settings', array(
        'title'      => __('Featured Section (Home)', 'polar-shoes'),
        'priority'   => 30,
    ));

    // 2. Section Title & Desc
    $wp_customize->add_setting('featured_main_title', array(
        'default' => 'Featured'
    ));
    $wp_customize->add_control('featured_main_title', array(
        'label' => 'Section Title',
        'section' => 'featured_section_settings',
        'type' => 'text'
    ));

    $wp_customize->add_setting('featured_main_desc', array(
        'default' => 'Rooted in Amsterdam street culture...'
    ));
    $wp_customize->add_control('featured_main_desc', array(
        'label' => 'Section Description',
        'section' => 'featured_section_settings',
        'type' => 'textarea'
    ));

    // 3. Dropdowns for Categories
    $categories = get_terms('product_cat', array('hide_empty' => false));
    $cat_options = array('' => 'Select Category');
    foreach ($categories as $cat) {
        $cat_options[$cat->term_id] = $cat->name;
    }

    // Slot 1 (Big Box Top)
    $wp_customize->add_setting('featured_cat_slot_1');
    $wp_customize->add_control('featured_cat_slot_1', array(
        'label' => 'Slot 1 (Big Box Top)',
        'section' => 'featured_section_settings',
        'type' => 'select',
        'choices' => $cat_options
    ));

    // Slot 2 (Rect Box)
    $wp_customize->add_setting('featured_cat_slot_2');
    $wp_customize->add_control('featured_cat_slot_2', array(
        'label' => 'Slot 2 (Rect Box)',
        'section' => 'featured_section_settings',
        'type' => 'select',
        'choices' => $cat_options
    ));

    // Slot 3 (Rect Box)
    $wp_customize->add_setting('featured_cat_slot_3');
    $wp_customize->add_control('featured_cat_slot_3', array(
        'label' => 'Slot 3 (Rect Box)',
        'section' => 'featured_section_settings',
        'type' => 'select',
        'choices' => $cat_options
    ));

    // Slot 4 (Big Box Bottom)
    $wp_customize->add_setting('featured_cat_slot_4');
    $wp_customize->add_control('featured_cat_slot_4', array(
        'label' => 'Slot 4 (Big Box Bottom)',
        'section' => 'featured_section_settings',
        'type' => 'select',
        'choices' => $cat_options
    ));

    //Footer dynamic section
    $wp_customize->add_section('footer_section_settings', array(
        'title'      => __('Footer', 'polar-shoes'),
        'priority'   => 30,
    ));

    //footer title
    $wp_customize->add_setting('footer_main_title', array(
        'default' => 'Footer'
    ));
    $wp_customize->add_control('footer_main_title', array(
        'label' => 'Section Title',
        'section' => 'footer_section_settings',
        'type' => 'text'
    ));

    //footer address text and address
    $wp_customize->add_setting('footer_address_text', array(
        'default' => '',
    ));
    $wp_customize->add_control('footer_address_text', array(
        'label' => 'Address Text',
        'section' => 'footer_section_settings',
        'type' => 'text'
    ));
    $wp_customize->add_setting('footer_address', array(
        'default' => '',
    ));
    $wp_customize->add_control('footer_address', array(
        'label' => 'Address',
        'section' => 'footer_section_settings',
        'type' => 'text'
    ));


    //footer phone text and number
    $wp_customize->add_setting('footer_phone_text', array(
        'default' => '',
    ));
    $wp_customize->add_control('footer_phone_text', array(
        'label' => 'Phone Text',
        'section' => 'footer_section_settings',
        'type' => 'text'
    ));
    $wp_customize->add_setting('footer_phone_number', array(
        'default' => '',
    ));
    $wp_customize->add_control('footer_phone_number', array(
        'label' => 'Phone Number',
        'section' => 'footer_section_settings',
        'type' => 'text'
    ));

    //footer email text and email
    $wp_customize->add_setting('footer_email_text', array(
        'default' => '',
    ));
    $wp_customize->add_control('footer_email_text', array(
        'label' => 'Email Text',
        'section' => 'footer_section_settings',
        'type' => 'text'
    ));
    $wp_customize->add_setting('footer_email', array(
        'default' => '',
    ));
    $wp_customize->add_control('footer_email', array(
        'label' => 'Email',
        'section' => 'footer_section_settings',
        'type' => 'text'
    ));

    //footer get direction text and page link
    $wp_customize->add_setting('footer_get_direction_text', array(
        'default' => '',
    ));
    $wp_customize->add_control('footer_get_direction_text', array(
        'label' => 'Get Direction Text',
        'section' => 'footer_section_settings',
        'type' => 'text'
    ));

    //footer get direaction page link url
    $wp_customize->add_setting('footer_get_direction_page_link', array(
        'default' => '',
    ));
    $wp_customize->add_control('footer_get_direction_page_link', array(
        'label' => 'Get Direction Page Link',
        'section' => 'footer_section_settings',
        'type' => 'url'
    ));

    //footer all social links and image
    $wp_customize->add_section('polar_social_section', array(
        'title'      => __('Social Media Links', 'polar-shoes'),
        'priority'   => 100,
    ));

    // List of platforms to create settings for
    $social_platforms = array('facebook', 'instagram', 'twitter', 'youtube', 'pinterest');

    foreach ($social_platforms as $platform) {
        $wp_customize->add_setting("polar_{$platform}_url", array('default' => ''));
        $wp_customize->add_control("polar_{$platform}_url", array(
            'label'    => ucfirst($platform) . ' URL',
            'section'  => 'footer_section_settings',
            'type'     => 'url', // Ensures it's a valid link
        ));
    }

    //footer menus
    $wp_customize->add_setting('footer_menu_1', array(
        'default' => '',
    ));
    $wp_customize->add_control('footer_menu_1', array(
        'label' => 'Footer Menu 1',
        'section' => 'footer_section_settings',
        'type' => 'text'
    ));
    $wp_customize->add_setting('footer_menu_2', array(
        'default' => '',
    ));
    $wp_customize->add_control('footer_menu_2', array(
        'label' => 'Footer Menu 2',
        'section' => 'footer_section_settings',
        'type' => 'text'
    ));
    $wp_customize->add_setting('footer_menu_3', array(
        'default' => '',
    ));
    $wp_customize->add_control('footer_menu_3', array(
        'label' => 'Footer Menu 3',
        'section' => 'footer_section_settings',
        'type' => 'text'
    ));

    //footer payment imgae and link

    //footer copyright text
    $wp_customize->add_setting('footer_copyright_text', array(
        'default' => '',
    ));
    $wp_customize->add_control('footer_copyright_text', array(
        'label' => 'Copyright Text',
        'section' => 'footer_section_settings',
        'type' => 'text'
    ));
}
add_action('customize_register', 'polar_shoes_featured_customizer');


/**
 * WooCommerce Compatibility & Setup
 * This function enables core features and ensures the client 
 * can manage images and galleries from the dashboard.
 */
function polarshoe_woocommerce_setup()
{

    // 1. Declare WooCommerce Support
    add_theme_support('woocommerce', array(
        'thumbnail_image_width'         => 600, // Dynamic: Client can crop in Customizer
        'single_image_width'            => 800,
        'product_grid'                  => array(
            'default_rows'    => 3,
            'min_rows'        => 1,
            'max_rows'        => 10,
            'default_columns' => 4,
            'min_columns'     => 1,
            'max_columns'     => 6,
        ),
    ));

    // 2. Enable Product Gallery Features (Critical for your Figma Product Page)
    // These allow the client to have a professional zoom/slider without extra plugins
    add_theme_support('wc-product-gallery-zoom');     // Hover to zoom on shoes
    add_theme_support('wc-product-gallery-lightbox'); // Click to see full-screen shoe
    add_theme_support('wc-product-gallery-slider');   // Swipe through shoe angles

}
add_action('after_setup_theme', 'polarshoe_woocommerce_setup');

/**
 * 3. Dynamic Header Cart Update (AJAX)
 * This ensures that when the client adds a shoe to the cart, 
 * the number in your header navigation updates automatically 
 * without refreshing the page.
 */
add_filter('woocommerce_add_to_cart_fragments', 'polarshoe_cart_count_fragments');
function polarshoe_cart_count_fragments($fragments)
{
    ob_start();
?>
    <span class="cart-count">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </span>
<?php
    $fragments['span.cart-count'] = ob_get_clean();
    return $fragments;
}


// Remove default WooCommerce wrappers
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// remove woocommerce breadcrumb
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
// Change "Related Products" to "People Also Bought"
add_filter('woocommerce_product_related_products_heading', function () {
    return 'People Also Bought';
});

// Remove default WooCommerce components from the summary hook
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

// 1. Stop double Images
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

// 2. Stop double Tabs/Description
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);

// 3. Stop double Upsells (You might see these too)
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);

// 4. Stop double Related Products
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
