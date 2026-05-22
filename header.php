<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <header class="site-header">
        <div class="top-header">
            <div class="container">
                <div class="d-flex justify-content-center align-items-center gap-2">
                    <div class="text-box">
                        <p><?php echo get_theme_mod('top_sale_text'); ?></p>
                    </div>
                    <div class="shop-now">
                        <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" title="">
                            <?php echo get_theme_mod('top_shop_now_text'); ?>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"
                                    fill="none">
                                    <path d="M1 9L9 1M9 1H1.8M9 1V8.2" stroke="#CB2027" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mid-header">
            <div class="container">
                <!-- <ul class="nav justify-content-end help-list">
                    <li>
                        <a href="#" title="">Find Store</a>
                    </li>
                    <li>
                        <a href="#" title="">Chat</a>
                    </li>
                    <li>
                        <a href="#" title="">Help</a>
                    </li>

                    <li>
                        <a href="#" title="">Sign In</a>
                    </li>
                </ul> -->
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'header_menu',
                    'menu_class' => 'nav justify-content-end help-list',
                ))
                ?>
            </div>
        </div>
        <div class="bot-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-8">
                        <div class="site-logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>"><span class="red-text">Polar</span> Shoes</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col">
                        <div class="nav-menu">
                            <div class="nav-list">
                                <div class="hamburger-menu">
                                    <div class="line"></div>
                                </div>
                                <!-- <ul class="primary-menu nav justify-content-between">
                                    <li>
                                        <a href="#" title="">New & featured</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="#" title="">New</a>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="#" title="">Featured</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Featured</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Featured</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Featured</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Featured</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#" title="">New</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">New</a>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="#" title="">Featured</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#" title="">New</a>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="#" title="">Featured</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#" title="">men</a></li>
                                    <li><a href="#" title="">Women</a></li>
                                    <li><a href="#" title="">kids</a></li>
                                    <li><a href="#" title="">Accessories</a></li>
                                    <li><a href="#" title="">Sale</a></li>
                                </ul> -->
                                <?php
                                wp_nav_menu(array(
                                    'theme_location'  => 'primary_menu',
                                    'container'       => false, // This stops WordPress from wrapping your menu in an unwanted <div>
                                    'menu_class'      => 'primary-menu nav justify-content-between', // These are YOUR exact CSS classes!
                                    'fallback_cb'     => false, // Don't show anything if no menu is assigned
                                ));
                                ?>
                            </div>
                            <div class="hamburger-menu">
                                <div class="line"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-2 d-md-block d-none">
                        <div class="navigation">
                            <ul class="nav justify-content-end align-items-center">

                                <!-- 1. SEARCH ICON (Converted to a working search form) -->
                                <li>
                                    <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="woocommerce-product-search">

                                        <input
                                            type="search"
                                            name="s"
                                            placeholder="Search products..."
                                            value="<?php echo get_search_query(); ?>" />

                                        <!-- IMPORTANT: restrict to WooCommerce products -->
                                        <input type="hidden" name="post_type[]" value="product" />
                                        <input type="hidden" name="post_type[]" value="product_category" />

                                        <!-- Your original Search SVG inside a submit button -->
                                        <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                            <div class="search">
                                                <div class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.0392 14.6244C17.2714 13.084 18.0082 11.1301 18.0082 9.00409C18.0082 4.03127 13.9769 0 9.00409 0C4.03127 0 0 4.03127 0 9.00409C0 13.9769 4.03127 18.0082 9.00409 18.0082C11.1301 18.0082 13.084 17.2714 14.6244 16.0392L20.2921 21.707C20.6828 22.0977 21.3163 22.0977 21.707 21.707C22.0977 21.3163 22.0977 20.6828 21.707 20.2921L16.0392 14.6244ZM9.00409 16.0173C5.13079 16.0173 1.99087 12.8774 1.99087 9.00409C1.99087 5.13079 5.13079 1.99087 9.00409 1.99087C12.8774 1.99087 16.0173 5.13079 16.0173 9.00409C16.0173 12.8774 12.8774 16.0173 9.00409 16.0173Z" fill="#2A2A2A" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </button>
                                    </form>
                                </li>

                                <!-- 2. WISHLIST ICON (Ready for a plugin later) -->
                                <li>
                                    <?php if (function_exists('YITH_WCWL')) : ?>
                                        <a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>" title="My Wishlist">
                                            <div class="wishlist" style="position: relative;">
                                                <div class="icon">
                                                    <!-- Your original Figma SVG -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="22" viewBox="0 0 25 22" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0188 3.46318C9.81581 0.839444 6.1345 0.0285975 3.37423 2.43115C0.613948 4.8337 0.225338 8.85061 2.393 11.6921C4.19527 14.0546 9.64955 19.0374 11.4372 20.6502C11.6371 20.8306 11.7371 20.9208 11.8538 20.9562C11.9555 20.9871 12.067 20.9871 12.1688 20.9562C12.2855 20.9208 12.3854 20.8306 12.5855 20.6502C14.3731 19.0374 19.8273 14.0546 21.6296 11.6921C23.7972 8.85061 23.456 4.80843 20.6483 2.43115C17.8406 0.0538712 14.2219 0.839444 12.0188 3.46318Z" stroke="#2A2A2A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </div>

                                                <!-- Dynamic Count Badge -->
                                                <span class="wishlist-count">
                                                    <?php echo function_exists('yith_wcwl_count_products') ? yith_wcwl_count_products() : 0; ?>
                                                </span>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                </li>

                                <!-- 3. DYNAMIC CART ICON -->
                                <li>
                                    <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="xoo-wsc-cart-trigger" title="View Cart">
                                        <div class="cart" style="position: relative;">

                                            <!-- Your original Cart SVG -->
                                            <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="22" viewBox="0 0 25 22" fill="none">
                                                    <path d="M2.8798 19.1931C4.34714 21 7.0781 21 12.5401 21H13.4222C18.8841 21 21.6151 21 23.0824 19.1931M2.8798 19.1931C1.41245 17.3864 1.91574 14.6432 2.92232 9.15712C3.63814 5.25565 3.99605 3.30491 5.35487 2.15245M23.0824 19.1931C24.5497 17.3864 24.0465 14.6432 23.04 9.15712C22.3241 5.25565 21.9662 3.30491 20.6073 2.15245M20.6073 2.15245C19.2485 1 17.3065 1 13.4222 1H12.5401C8.65581 1 6.71369 1 5.35487 2.15245" stroke="#2A2A2A" stroke-width="2" />
                                                    <path d="M9.52075 6.00003C10.0245 7.45652 11.3838 8.50003 12.9815 8.50003C14.5792 8.50003 15.9385 7.45652 16.4422 6.00003" stroke="#2A2A2A" stroke-width="2" stroke-linecap="round" />
                                                </svg>
                                            </div>

                                            <!-- Dynamic Cart Badge (I added inline CSS to make it look like a red badge instantly!) -->
                                            <span class="cart-count" style="position: absolute; top: -8px; right: -12px; background: #E63946; color: #fff; font-size: 11px; font-weight: bold; width: 18px; height: 18px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                <?php echo WC()->cart ? WC()->cart->get_cart_contents_count() : 0; ?>
                                            </span>

                                        </div>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>