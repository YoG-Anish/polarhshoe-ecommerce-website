<?php
defined('ABSPATH') || exit;

get_header();
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

    <div class="product-filter-grid">
        <div class="d-flex justify-content-between flex-md-row flex-column gap-md-0 gap-3">
            <div class="filter-result">
                <!-- Active filters show up here via plugins like "Filter Everything" -->
                <div class="no-of-product">
                    <?php woocommerce_result_count(); // "Showing 1-18 of 50" 
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="product-listing">
        <div class="row gy-5">
            <?php
            if (woocommerce_product_loop()) {
                if (wc_get_loop_prop('total')) {
                    while (have_posts()) {
                        the_post();
                        /**
                         * This calls the content-product.php file
                         */
                        wc_get_template_part('content', 'product');
                    }
                }
            } else {
                do_action('woocommerce_no_products_found');
            }
            ?>
        </div>

        <!-- 3. Dynamic Pagination -->
        <div class="pagination-wrapper mt-5">
            <?php woocommerce_pagination(); ?>
        </div>
    </div>
    </div>
</section>

<?php
get_footer();
?>