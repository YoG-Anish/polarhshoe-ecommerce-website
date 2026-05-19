<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');
?>

<section class="innerbanner-section">
    <div class="container">
        <!-- 1. Dynamic Breadcrumbs -->
        <div class="breadcrumbs">
            <?php woocommerce_breadcrumb(); ?>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="banner-img">
                    <div class="img-holder">
                        <?php
                        // Logic: If using ACF, pull category image. Fallback to static if empty.
                        $banner_left = get_template_directory_uri() . '/images/banner_2.png';
                        ?>
                        <img src="<?php echo $banner_left; ?>" alt="Banner Left">
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-md-block d-none">
                <div class="banner-img">
                    <div class="img-holder">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/banner_3.png" alt="Banner Right">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product-listing-section section-gaps pt-0">
    <div class="container">
        <div class="main-title">
            <h2 class="title">
                <?php woocommerce_page_title(); // Dynamic Category Name 
                ?>
            </h2>
        </div>

        <div class="category-section">
            <div class="category-menu flex-md-row flex-column gap-md-0 gap-3">
                <!-- 2. Filter Bar (Static Structure, needs Filter Plugin for logic) -->
                <div class="category-menu-filters">
                    <?php echo do_shortcode('[woof]'); ?>
                </div>
            </div>
            <div class="category-sort">
                <?php woocommerce_catalog_ordering(); // Dynamic Woo Sorting Dropdown 
                ?>
            </div>
        </div>
    </div>

    

    <div class="product-listing">
        <div class="row gy-5">
            <?php
            /**
             * Hook: woocommerce_shop_loop_header.
             *
             * @since 8.6.0
             *
             * @hooked woocommerce_product_taxonomy_archive_header - 10
             */
            do_action('woocommerce_shop_loop_header');

            if (woocommerce_product_loop()) {

                /**
                 * Hook: woocommerce_before_shop_loop.
                 *
                 * @hooked woocommerce_output_all_notices - 10
                 * @hooked woocommerce_result_count - 20
                 * @hooked woocommerce_catalog_ordering - 30
                 */
                do_action('woocommerce_before_shop_loop');

                woocommerce_product_loop_start();

                if (wc_get_loop_prop('total')) {
                    while (have_posts()) {
                        the_post();

                        /**
                         * Hook: woocommerce_shop_loop.
                         */
                        do_action('woocommerce_shop_loop');

                        wc_get_template_part('content', 'product');
                    }
                }

                woocommerce_product_loop_end();

                /**
                 * Hook: woocommerce_after_shop_loop.
                 *
                 * @hooked woocommerce_pagination - 10
                 */
                do_action('woocommerce_after_shop_loop');
            } else {
                /**
                 * Hook: woocommerce_no_products_found.
                 *
                 * @hooked wc_no_products_found - 10
                 */
                do_action('woocommerce_no_products_found');
            } ?>

        </div>

        <div class="pagination-wrapper mt-5">
            <?php woocommerce_pagination(); ?>
        </div>
    </div>
</section>
<?php

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action('woocommerce_sidebar');

get_footer('shop');
