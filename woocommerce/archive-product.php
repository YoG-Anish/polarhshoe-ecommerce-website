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
        <div class="breadcrumbs">
            <?php woocommerce_breadcrumb(); ?>
        </div>

        <?php

        // 1. Check if it is a Category Page
        if ( is_product_category() ) {
            $term = get_queried_object();
            $term_identifier = 'product_cat_' . $term->term_id;
            $left_image_array  = get_field('banner_left', $term_identifier);
            $right_image_array = get_field('banner_right', $term_identifier);
        } 
        // 2. Check if it is the Main Shop Page
        elseif ( is_shop() ) {
            $shop_page_id = wc_get_page_id('shop'); // Get the ID of the page assigned as 'Shop'
            $left_image_array  = get_field('shop_banner_left', $shop_page_id);
            $right_image_array = get_field('shop_banner_right', $shop_page_id);
        }

        // Static fallbacks if nothing is found
        $fallback_l = get_template_directory_uri() . '/images/banner_2.png';
        $fallback_r = get_template_directory_uri() . '/images/banner_3.png';
        ?>

        <div class="row">
            <!-- LEFT BANNER -->
            <div class="col-md-6">
                <div class="banner-img">
                    <div class="img-holder">
                        <?php if ( !empty($left_image_array) ) : ?>
                            <img src="<?php echo esc_url($left_image_array['url']); ?>" 
                                 alt="<?php echo esc_attr($left_image_array['alt']); ?>">
                        <?php else : ?>
                            <img src="<?php echo esc_url($fallback_l); ?>" alt="Shop Banner Left">
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- RIGHT BANNER -->
            <div class="col-md-6 d-md-block d-none">
                <div class="banner-img">
                    <div class="img-holder">
                        <?php if ( !empty($right_image_array) ) : ?>
                            <img src="<?php echo esc_url($right_image_array['url']); ?>" 
                                 alt="<?php echo esc_attr($right_image_array['alt']); ?>">
                        <?php else : ?>
                            <img src="<?php echo esc_url($fallback_r); ?>" alt="Shop Banner Right">
                        <?php endif; ?>
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




        <div class="product-listing">
            <div class="row gy-5">
                <!-- 2. SELECTED TAGS & PRODUCT COUNT AREA -->
                <div class="product-filter-grid mt-4">
                    <div class="d-flex justify-content-between align-items-center">

                        <div class="filter-result">
                            <?php
                            /**
                             * This shortcode calls ONLY the active tags like "Black x".
                             * It does not include the dropdowns or the sorting.
                             */
                            echo do_shortcode('[woof_search_options]');
                            ?>
                        </div>

                        <div class="no-of-product">
                            <?php woocommerce_result_count(); // Displays "18 Products" 
                            ?>
                        </div>

                    </div>
                </div>

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
    </div>
</section>
<?php

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');


get_footer('shop');
