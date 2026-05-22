<?php
/*
    Template Name: Sale Page
*/
get_header();
?>

<section class="product-listing-section section-gaps pt-0">
    <div class="container">
        <div class="main-title">
            <div class="breadcrumbs">
                <?php woocommerce_breadcrumb(); ?>
            </div>
            <h2 class="title">FLASH SALE</h2>
        </div>

        <div class="product-listing mt-5">
            <?php
            // This pulls the shortcode you typed in the WordPress editor
            while (have_posts()) : the_post(); ?>
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
            <?php
                the_content();
            endwhile;
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>