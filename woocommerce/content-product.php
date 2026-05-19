<?php
defined( 'ABSPATH' ) || exit;
global $product;
?>

<div <?php wc_product_class( 'col-lg-2 col-md-3 col-6 product-grid-item', $product ); ?>>
    <div class="product-item">
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