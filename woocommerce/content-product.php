<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

defined('ABSPATH') || exit;

global $product;

// Check if the product is a valid WooCommerce product and ensure its visibility before proceeding.
if (! is_a($product, WC_Product::class) || ! $product->is_visible()) {
    return;
}
?>

<div <?php wc_product_class('col-lg-2 col-md-3 col-6 product-grid-item', $product); ?>>
    <div class="product-item">
        <div class="wishlist-icon">
            <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
        </div>
        <a href="<?php the_permalink(); ?>">
            <div class="img-holder" style="background: #f6f6f6; padding: 20px;">
                <?php the_post_thumbnail('woocommerce_thumbnail', ['class' => 'img-fluid']); ?>
            </div>
        </a>

        <div class="product-detail mt-2">
            <div class="product-name">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            </div>
            <div class="product-price">
                <span><?php echo $product->get_price_html(); ?></span>
            </div>
        </div>

        <div class="add-to-cart mt-2">
            <?php woocommerce_template_loop_add_to_cart(); ?>
        </div>
        
    </div>
</div>