<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action('woocommerce_before_single_product_summary');
	?>

	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action('woocommerce_single_product_summary');
		?>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action('woocommerce_after_single_product_summary');
	?>
	<section class="main-product-section">
		<div class="container">
			<div class="row gx-0">
				<div class="col-md-6">
					<div class="main-product-img">
						<div class="product-single-slider">
							<div class="splide">
								<div class="splide__track">
									<ul class="splide__list">
										<?php
										// We fetch the Main Image + All Gallery Images
										$main_image_id  = $product->get_image_id();
										if ($main_image_id) :
											$main_image_url = wp_get_attachment_url($main_image_id);
											$main_image_alt = get_post_meta($main_image_id, '_wp_attachment_image_alt', true);
										?>
											<li class="splide__slide">
												<div class="img-holder">
													<a href="<?php echo $main_image_url; ?>" data-fancybox="gallery">
														<img src="<?php echo $main_image_url; ?>" alt="<?php echo $main_image_alt; ?>">
													</a>
												</div>
											</li>
										<?php else : ?>
											<!-- Fallback: Show WooCommerce Placeholder if the client forgot to upload an image -->
											<li class="splide__slide">
												<div class="img-holder">
													<img src="<?php echo esc_url(wc_placeholder_img_src('full')); ?>" alt="Placeholder Image">
												</div>
											</li>
										<?php endif; ?>
									</ul>
								</div>
							</div>
						</div>
						<div class="thumbnail-slider">
							<div class="splide">
								<div class="splide__track">
									<ul class="splide__list">
										<?php
										$gallery_images = $product->get_gallery_image_ids();
										foreach ($gallery_images as $gallery_image_id) {
											$gallery_image_url = wp_get_attachment_url($gallery_image_id);
											$gallery_image_alt = get_post_meta($gallery_image_id, '_wp_attachment_image_alt', true);
										?>
											<li class="splide__slide">
												<div class="img-holder">
													<a href="<?php echo $gallery_image_url; ?>" data-fancybox="gallery">
														<img src="<?php echo $gallery_image_url; ?>" alt="<?php echo $gallery_image_alt; ?>">
													</a>
												</div>
											</li>
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="main-product-info">
						<div class="product-item">
							<div class="product-title">
								<h2 class="title">
									<?php the_title(); ?>
								</h2>
							</div>
							<div class="product-price">
								<span><?php echo $product->get_price_html(); ?></span>
							</div>
							<div class="text-box">
								<p><?php the_excerpt(); ?></p>
							</div>
							<div class="add-to-cart">
								<!-- This replaces Color, Size, Quantity, and Add to Cart -->
								<div class="product-variations-wrapper">
									<?php
									if ($product->is_type('variable')) {
										// This hook triggers the Variation Swatches plugin
										woocommerce_variable_add_to_cart();
									} else {
										woocommerce_simple_add_to_cart();
									}
									?>

									<div class="wishlist">
										<div class="icon">
											<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
										</div>
									</div>
								</div>
							</div>

							<div class="service-list">
								<div class="d-flex justify-content-between align-items-sm-center flex-sm-row flex-column flex-wrap row-gap-3">
									<div class="service-item">
										<a href="#">
											<div class="icon">
												<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
													viewBox="0 0 26 26" fill="none">
													<path
														d="M13 0C5.83556 0 0 5.83556 0 13C0 20.1644 5.83556 26 13 26C20.1644 26 26 20.1644 26 13C26 5.83556 20.1644 0 13 0ZM13 23.8333C7.02 23.8333 2.16667 18.98 2.16667 13C2.16667 7.02 7.02 2.16667 13 2.16667C18.98 2.16667 23.8333 7.02 23.8333 13C23.8333 18.98 18.98 23.8333 13 23.8333ZM16.3222 6.78889C17.2033 7.67 17.6944 8.85444 17.6944 10.1111C17.6944 11.3678 17.2033 12.5378 16.3222 13.4333C15.7011 14.0544 14.9211 14.4878 14.0833 14.6756V15.1667C14.0833 15.7589 13.5922 16.25 13 16.25C12.4078 16.25 11.9167 15.7589 11.9167 15.1667V13.7222C11.9167 13.13 12.4078 12.6389 13 12.6389C13.6789 12.6389 14.3144 12.3789 14.7911 11.9022C15.2678 11.4256 15.5278 10.79 15.5278 10.1111C15.5278 9.43222 15.2678 8.79667 14.7911 8.32C13.8378 7.36667 12.1767 7.36667 11.2233 8.32C10.7467 8.79667 10.4867 9.43222 10.4867 10.1111C10.4867 10.7033 9.99556 11.1944 9.40333 11.1944C8.81111 11.1944 8.32 10.7033 8.32 10.1111C8.32 8.85444 8.81111 7.68444 9.69222 6.78889C11.4689 5.01222 14.56 5.01222 16.3367 6.78889H16.3222ZM14.4444 19.1389C14.4444 19.9333 13.7944 20.5833 13 20.5833C12.2056 20.5833 11.5556 19.9333 11.5556 19.1389C11.5556 18.3444 12.2056 17.6944 13 17.6944C13.7944 17.6944 14.4444 18.3444 14.4444 19.1389Z"
														fill="#2A2A2A" />
												</svg>
											</div>
											<div class="service-name">
												Ask a question
											</div>
										</a>
									</div>
									<div class="service-item">
										<a href="#">
											<div class="icon">
												<svg xmlns="http://www.w3.org/2000/svg" width="28" height="21"
													viewBox="0 0 28 21" fill="none">
													<path
														d="M7.61173 16.2322H17.1415C17.414 16.2322 17.6753 16.1239 17.868 15.9312C18.0607 15.7385 18.1689 15.4772 18.1689 15.2047V2.02746C18.1689 1.75496 18.0607 1.49362 17.868 1.30094C17.6753 1.10825 17.414 1 17.1415 1H2.02746C1.75496 1 1.49362 1.10825 1.30094 1.30094C1.10825 1.49362 1 1.75496 1 2.02746V15.1944C1 15.4669 1.10825 15.7283 1.30094 15.9209C1.49362 16.1136 1.75496 16.2219 2.02746 16.2219H3.36317"
														stroke="#2A2A2A" stroke-width="2" />
													<path
														d="M20.3421 16.2322H18.2152V5.5979H23.2549C23.3291 5.5979 23.4025 5.61397 23.4699 5.64501C23.5373 5.67604 23.5971 5.72132 23.6454 5.77771L26.8819 9.65638C26.9585 9.74881 27.0003 9.86514 27 9.98517V16.2322H24.7961"
														stroke="#2A2A2A" stroke-width="2" />
													<path
														d="M5.5466 19.2118C6.80634 19.2118 7.82757 18.1768 7.82757 16.9C7.82757 15.6233 6.80634 14.5882 5.5466 14.5882C4.28685 14.5882 3.26562 15.6233 3.26562 16.9C3.26562 18.1768 4.28685 19.2118 5.5466 19.2118Z"
														stroke="#2A2A2A" stroke-width="2" />
													<path
														d="M22.5254 19.2118C23.7851 19.2118 24.8063 18.1768 24.8063 16.9C24.8063 15.6233 23.7851 14.5882 22.5254 14.5882C21.2656 14.5882 20.2444 15.6233 20.2444 16.9C20.2444 18.1768 21.2656 19.2118 22.5254 19.2118Z"
														stroke="#2A2A2A" stroke-width="2" />
												</svg>
											</div>
											<div class="service-name">
												Delivery & Return
											</div>
										</a>
									</div>
									<div class="service-item">
										<a href="#">
											<div class="icon">
												<svg xmlns="http://www.w3.org/2000/svg" width="21" height="24"
													viewBox="0 0 21 24" fill="none">
													<path
														d="M7.20513 12C7.20513 13.6875 5.81606 15.0555 4.10256 15.0555C2.38907 15.0555 1 13.6875 1 12C1 10.3125 2.38907 8.94443 4.10256 8.94443C5.81606 8.94443 7.20513 10.3125 7.20513 12Z"
														stroke="#2A2A2A" stroke-width="2" />
													<path d="M13.4101 5.27774L7.20496 9.55552" stroke="#2A2A2A" stroke-width="2"
														stroke-linecap="round" />
													<path d="M13.4101 18.7222L7.20496 14.4444" stroke="#2A2A2A" stroke-width="2"
														stroke-linecap="round" />
													<path
														d="M19.6154 19.9444C19.6154 21.6319 18.2263 23 16.5128 23C14.7994 23 13.4103 21.6319 13.4103 19.9444C13.4103 18.2569 14.7994 16.8889 16.5128 16.8889C18.2263 16.8889 19.6154 18.2569 19.6154 19.9444Z"
														stroke="#2A2A2A" stroke-width="2" />
													<path
														d="M19.6154 4.05556C19.6154 5.74309 18.2263 7.11111 16.5128 7.11111C14.7994 7.11111 13.4103 5.74309 13.4103 4.05556C13.4103 2.36802 14.7994 1 16.5128 1C18.2263 1 19.6154 2.36802 19.6154 4.05556Z"
														stroke="#2A2A2A" stroke-width="2" />
												</svg>
											</div>
											<div class="service-name">
												Share
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- SECTION 2: DESCRIPTION TABS -->
	<section class="main-product-description section-gaps">
		<div class="container">
			<div class="description-tabs-container">
				<?php
				/**
				 * We call the function manually here.
				 * This displays the Description, Additional Info, and Reviews.
				 */
				woocommerce_output_product_data_tabs();
				?>
			</div>
		</div>
	</section>

	<!-- SECTION 3: PEOPLE ALSO BOUGHT -->
	<section class="related-products-section section-gaps pt-0">
		<div class="container">
			<?php
			/**
			 * Automatically pulls products from the same category.
			 */
			woocommerce_output_related_products();
			?>
		</div>
	</section>

</div> <!-- #product-<?php the_ID(); ?> -->

<?php do_action('woocommerce_after_single_product'); ?>
</div>