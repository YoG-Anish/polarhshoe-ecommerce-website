<!--------------------------------header------------------------------------------>

<?php
/* Template Name: Home */
get_header(); ?>

<!--------------------------------End header-----1------------------------------------->


<section class="main-banner-section">
    <div class="background-image-container">
        <div class="img-holder">
            <?php
            $home_banner = get_field('home_banner');
            if ($home_banner) { ?>
                <img src="<?php echo esc_url($home_banner['url']); ?>" alt="<?php echo esc_attr($home_banner['alt']); ?>">
            <?php } ?>
        </div>
    </div>
    <div class="container">
        <div class="banner-inner">
            <div class="banner-content">
                <div class="text-box">
                    <p><?php the_field('home_hero_tagline'); ?></p>
                </div>
                <div class="main-title">
                    <h1 class="title"><?php the_field('home_hero_title'); ?></h1>
                </div>
                <div class="default-btn">
                    <a href="<?php the_field('home_hero_button_link'); ?>" title=""><?php the_field('home_hero_button_text'); ?> </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bluish-bg section-gaps home-collection">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap row-gap-2">
            <div class="section-head">
                <div class="main-title">
                    <h2 class="title">Hiking Essentialsssss</h2>
                </div>
                <div class="text-box">
                    <p>Rooted in Amsterdam street culture we’ve always supported local initiatives, creatives and athletes from day one.</p>
                </div>
            </div>
            <div class="default-btn dark-bg">
                <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" title="">Shop Collection</a>
            </div>
        </div>

        <div class="product-slider">
            <!-- IMPORTANT: Added ID "hiking-essentials-slider" for your JS -->
            <div id="hiking-essentials-slider" class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php
                        // 1. Define arguments
                        $args = array(
                            'post_type'      => 'product',
                            'posts_per_page' => -1,
                            'post_status'    => 'publish',
                            'tax_query'      => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field'    => 'slug',
                                    'terms'    => 'hiking-essentials', // CHECK THIS SLUG IN DASHBOARD!
                                ),
                            ),
                        );

                        $loop = new WP_Query($args);

                        if ($loop->have_posts()) :
                            while ($loop->have_posts()) : $loop->the_post();
                                // Redefine product just to be safe
                                $product = wc_get_product(get_the_ID());
                        ?>
                                <li class="splide__slide">
                                    <div class="product-item">
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="img-holder">
                                                <?php
                                                if ($product) {
                                                    echo $product->get_image();
                                                }
                                                ?>
                                            </div>
                                            <div class="product-detail">
                                                <div class="product-name">
                                                    <h3><?php the_title(); ?></h3>
                                                </div>
                                                <div class="product-price">
                                                    <span><?php echo $product->get_price_html(); ?></span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                        <?php
                            endwhile;
                        else :
                            // DEBUG: This will show if the query failed to find the category slug
                            echo '<p style="color:red; padding: 20px;">DEBUG: No products found for category slug "hiking-essentials". Please check Products > Categories in your dashboard.</p>';
                        endif;
                        wp_reset_postdata();
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="featured-section section-gaps">
    <div class="container">
        <div class="section-head">
            <div class="main-title">
                <h2 class="title">
                    Featured
                </h2>
            </div>
            <div class="text-box">
                <p>Rooted in Amsterdam street culture we’ve always supported local initiatives, creatives and athletes
                    from day one.</p>
            </div>
        </div>
        <div class="featured-grid-box">
            <div class="grid-item big-box">
                <a href="#">
                    <div class="featured-collection">
                        <div class="background-image-container">
                            <div class="img-holder">
                                <img src="images/collection_1.png" alt="">
                            </div>
                        </div>
                        <div class="content-box">
                            <div class="main-title">
                                <h2 class="title">
                                    Men Collection
                                </h2>
                            </div>
                            <div class="text-box">
                                <p>Every piece is made to last beyond the season</p>
                            </div>
                            <div class="default-btn_v2">
                                <span class="underline">
                                    Shop Collection
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"
                                            fill="none">
                                            <path d="M1 9L9 1M9 1H1.8M9 1V8.2" stroke="#fff" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="grid-item rect-box">
                <a href="#">
                    <div class="featured-collection">
                        <div class="background-image-container">
                            <div class="img-holder">
                                <img src="images/collection_1.png" alt="">
                            </div>
                        </div>
                        <div class="content-box">
                            <div class="main-title">
                                <h2 class="title">
                                    Men Collection
                                </h2>
                            </div>
                            <div class="default-btn_v2">
                                <span class="underline">Shop Collection
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"
                                            fill="none">
                                            <path d="M1 9L9 1M9 1H1.8M9 1V8.2" stroke="#fff" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="grid-item rect-box">
                <a href="#">
                    <div class="featured-collection">
                        <div class="background-image-container">
                            <div class="img-holder">
                                <img src="images/collection_1.png" alt="">
                            </div>
                        </div>
                        <div class="content-box">
                            <div class="main-title">
                                <h2 class="title">
                                    Men Collection
                                </h2>
                            </div>
                            <div class="default-btn_v2">
                                <span class="underline">Shop Collection
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"
                                            fill="none">
                                            <path d="M1 9L9 1M9 1H1.8M9 1V8.2" stroke="#fff" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="grid-item small-box">
                <div class="featured-collection">
                    <div class="product-item">
                        <a href="#" title="">
                            <div class="img-holder">
                                <img src="images/product_1.png" alt="">
                            </div>
                        </a>
                        <div class="product-detail">
                            <div class="product-name">
                                <h3><a href="#">Men's Motion Scramble Mid Lace-Up Waterproof Hiker</a></h3>
                            </div>
                            <div class="product-price">
                                <span><del>$150.00</del> <span class="discounted">$140.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid-item small-box">
                <div class="featured-collection">
                    <div class="product-item">
                        <a href="#" title="">
                            <div class="img-holder">
                                <img src="images/product_1.png" alt="">
                            </div>
                        </a>
                        <div class="product-detail">
                            <div class="product-name">
                                <h3><a href="#">Men's Motion Scramble Mid Lace-Up Waterproof Hiker</a></h3>
                            </div>
                            <div class="product-price">
                                <span><del>$150.00</del> <span class="discounted">$140.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid-item small-box">
                <div class="featured-collection">
                    <div class="product-item">
                        <a href="#" title="">
                            <div class="img-holder">
                                <img src="images/product_1.png" alt="">
                            </div>
                        </a>
                        <div class="product-detail">
                            <div class="product-name">
                                <h3><a href="#">Men's Motion Scramble Mid Lace-Up Waterproof Hiker</a></h3>
                            </div>
                            <div class="product-price">
                                <span><del>$150.00</del> <span class="discounted">$140.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid-item small-box">
                <div class="featured-collection">
                    <div class="product-item">
                        <a href="#" title="">
                            <div class="img-holder">
                                <img src="images/product_1.png" alt="">
                            </div>
                        </a>
                        <div class="product-detail">
                            <div class="product-name">
                                <h3><a href="#">Men's Motion Scramble Mid Lace-Up Waterproof Hiker</a></h3>
                            </div>
                            <div class="product-price">
                                <span><del>$150.00</del> <span class="discounted">$140.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid-item big-box">
                <a href="#">
                    <div class="featured-collection">
                        <div class="background-image-container">
                            <div class="img-holder">
                                <img src="images/shop-this.png" alt="">
                            </div>
                        </div>
                        <div class="content-box">
                            <div class="main-title">
                                <h2 class="title">
                                    Men Collection
                                </h2>
                            </div>
                            <div class="text-box">
                                <p>Every piece is made to last beyond the season</p>
                            </div>
                            <div class="default-btn_v2">
                                <span class="underline">Shop Collection
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"
                                            fill="none">
                                            <path d="M1 9L9 1M9 1H1.8M9 1V8.2" stroke="#fff" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="popular-product-section section-gaps bluish-bg">
    <div class="container">
        <div class="section-head">
            <div class="main-title">
                <h2 class="title">
                    Hiking Essentials
                </h2>
            </div>
            <div class="text-box">
                <p>Rooted in Amsterdam street culture we’ve always supported local initiatives, creatives and athletes
                    from day one.</p>
            </div>
        </div>
        <div class="product-listing">
            <div class="row gy-4 gx-3">
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="product-item">
                        <a href="#" title="">
                            <div class="img-holder">
                                <img src="images/product_1.png" alt="">
                            </div>
                        </a>
                        <div class="product-detail">
                            <div class="product-name">
                                <h3><a href="#">Men's Motion Scramble Mid Lace-Up Waterproof Hiker</a></h3>
                            </div>
                            <div class="product-price">
                                <span><del>$150.00</del> <span class="discounted">$140.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="product-item">
                        <a href="#" title="">
                            <div class="img-holder">
                                <img src="images/product_1.png" alt="">
                            </div>
                        </a>
                        <div class="product-detail">
                            <div class="product-name">
                                <h3><a href="#">Men's Motion Scramble Mid Lace-Up Waterproof Hiker</a></h3>
                            </div>
                            <div class="product-price">
                                <span><del>$150.00</del> <span class="discounted">$140.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="product-item">
                        <a href="#" title="">
                            <div class="img-holder">
                                <img src="images/product_1.png" alt="">
                            </div>
                        </a>
                        <div class="product-detail">
                            <div class="product-name">
                                <h3><a href="#">Men's Motion Scramble Mid Lace-Up Waterproof Hiker</a></h3>
                            </div>
                            <div class="product-price">
                                <span><del>$150.00</del> <span class="discounted">$140.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="product-item">
                        <a href="#" title="">
                            <div class="img-holder">
                                <img src="images/product_1.png" alt="">
                            </div>
                        </a>
                        <div class="product-detail">
                            <div class="product-name">
                                <h3><a href="#">Men's Motion Scramble Mid Lace-Up Waterproof Hiker</a></h3>
                            </div>
                            <div class="product-price">
                                <span><del>$150.00</del> <span class="discounted">$140.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="product-item">
                        <a href="#" title="">
                            <div class="img-holder">
                                <img src="images/product_1.png" alt="">
                            </div>
                        </a>
                        <div class="product-detail">
                            <div class="product-name">
                                <h3><a href="#">Men's Motion Scramble Mid Lace-Up Waterproof Hiker</a></h3>
                            </div>
                            <div class="product-price">
                                <span><del>$150.00</del> <span class="discounted">$140.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="product-item">
                        <a href="#" title="">
                            <div class="img-holder">
                                <img src="images/product_1.png" alt="">
                            </div>
                        </a>
                        <div class="product-detail">
                            <div class="product-name">
                                <h3><a href="#">Men's Motion Scramble Mid Lace-Up Waterproof Hiker</a></h3>
                            </div>
                            <div class="product-price">
                                <span><del>$150.00</del> <span class="discounted">$140.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="product-item">
                        <a href="#" title="">
                            <div class="img-holder">
                                <img src="images/product_1.png" alt="">
                            </div>
                        </a>
                        <div class="product-detail">
                            <div class="product-name">
                                <h3><a href="#">Men's Motion Scramble Mid Lace-Up Waterproof Hiker</a></h3>
                            </div>
                            <div class="product-price">
                                <span><del>$150.00</del> <span class="discounted">$140.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="product-item">
                        <a href="#" title="">
                            <div class="img-holder">
                                <img src="images/product_1.png" alt="">
                            </div>
                        </a>
                        <div class="product-detail">
                            <div class="product-name">
                                <h3><a href="#">Men's Motion Scramble Mid Lace-Up Waterproof Hiker</a></h3>
                            </div>
                            <div class="product-price">
                                <span><del>$150.00</del> <span class="discounted">$140.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="product-item">
                        <a href="#" title="">
                            <div class="img-holder">
                                <img src="images/product_1.png" alt="">
                            </div>
                        </a>
                        <div class="product-detail">
                            <div class="product-name">
                                <h3><a href="#">Men's Motion Scramble Mid Lace-Up Waterproof Hiker</a></h3>
                            </div>
                            <div class="product-price">
                                <span><del>$150.00</del> <span class="discounted">$140.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="product-item">
                        <a href="#" title="">
                            <div class="img-holder">
                                <img src="images/product_1.png" alt="">
                            </div>
                        </a>
                        <div class="product-detail">
                            <div class="product-name">
                                <h3><a href="#">Men's Motion Scramble Mid Lace-Up Waterproof Hiker</a></h3>
                            </div>
                            <div class="product-price">
                                <span><del>$150.00</del> <span class="discounted">$140.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="product-item">
                        <a href="#" title="">
                            <div class="img-holder">
                                <img src="images/product_1.png" alt="">
                            </div>
                        </a>
                        <div class="product-detail">
                            <div class="product-name">
                                <h3><a href="#">Men's Motion Scramble Mid Lace-Up Waterproof Hiker</a></h3>
                            </div>
                            <div class="product-price">
                                <span><del>$150.00</del> <span class="discounted">$140.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="product-item">
                        <a href="#" title="">
                            <div class="img-holder">
                                <img src="images/product_1.png" alt="">
                            </div>
                        </a>
                        <div class="product-detail">
                            <div class="product-name">
                                <h3><a href="#">Men's Motion Scramble Mid Lace-Up Waterproof Hiker</a></h3>
                            </div>
                            <div class="product-price">
                                <span><del>$150.00</del> <span class="discounted">$140.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="default-btn dark-bg">
                <a href="#" title="">View All</a>
            </div>
        </div>
    </div>
</section>

<section class="shop-this-section section-gaps">
    <div class="container">
        <div class="section-head">
            <div class="main-title">
                <h2 class="title">
                    Shop this Look
                </h2>
            </div>
            <div class="text-box">
                <p>Rooted in Amsterdam street culture we’ve always supported local initiatives, creatives and athletes
                    from day one.</p>
            </div>
        </div>
        <div class="masked-bg">
            <div class="background-image-container blur-bg">
                <div class="img-holder">
                    <img src="images/shop-this.png" alt="">
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="masked-img">
                    <div class="img-holder">
                        <img src="images/shop-this.png" alt="">
                    </div>
                    <div class="product-1 masked-product">

                        <div class="vector-line">
                            <span class="line-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="146" height="65" viewBox="0 0 146 65"
                                    fill="none">
                                    <path d="M145.5 64L85 1H0.5" stroke="white" />
                                </svg>
                            </span>
                            <div class="clickable-circle">
                                <span></span>
                            </div>
                        </div>
                        <div class="product-item">

                            <div class="img-holder">
                                <a href="#" title="">
                                    <img src="images/product_1.png" alt="">
                                </a>
                            </div>
                            <div class="product-detail">
                                <div class="product-name">
                                    <h3><a href="#">Men's Motion Scramble</a></h3>
                                </div>
                                <div class="product-price">
                                    <span class="red-text">$160.00</span>
                                </div>
                            </div>
                            <div class="product-modal">
                                <a href="#" title="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 15 10"
                                        fill="none">
                                        <path
                                            d="M7.3212 2.2967C5.81775 2.2967 4.59838 3.51607 4.59838 5.01951C4.59838 6.52296 5.81775 7.74233 7.3212 7.74233C8.82465 7.74233 10.044 6.52342 10.044 5.01951C10.044 3.51561 8.8251 2.2967 7.3212 2.2967ZM7.3212 6.83473C6.32011 6.83473 5.48512 6.00064 5.48512 4.99955C5.48512 3.99846 6.29924 3.18433 7.30033 3.18433C8.30142 3.18433 9.11554 3.99846 9.11554 4.99955C9.11554 6.00064 8.32229 6.83473 7.3212 6.83473ZM14.5285 4.89426C14.5231 4.87157 14.5258 4.84707 14.519 4.82483C14.5162 4.8153 14.5099 4.80986 14.5067 4.80169C14.5017 4.78898 14.5031 4.77355 14.4963 4.7613C13.1762 1.73897 10.3317 0 7.30033 0C4.26892 0 1.36731 1.73625 0.0467417 4.75858C0.0412961 4.77128 0.0422037 4.78444 0.0372118 4.79897C0.0340352 4.80804 0.027682 4.81258 0.0245054 4.8212C0.0176983 4.84389 0.0204211 4.86794 0.0158831 4.89109C0.00771465 4.93193 0 4.97186 0 5.01316C0 5.05446 0.00771465 5.09348 0.0158831 5.13478C0.0204211 5.15747 0.0172445 5.18243 0.0245054 5.20376C0.0272282 5.2142 0.0340352 5.21828 0.0372118 5.22736C0.0417499 5.23961 0.0408423 5.25504 0.0467417 5.26774C1.36731 8.28916 4.24079 10 7.27219 10C10.3036 10 13.1766 8.29279 14.4967 5.27047C14.5035 5.25731 14.5022 5.24415 14.5072 5.22962C14.5103 5.22191 14.5162 5.21601 14.519 5.20693C14.5258 5.1847 14.524 5.16065 14.5285 5.13705C14.5367 5.09621 14.5439 5.05673 14.5439 5.01452C14.5439 4.97459 14.5362 4.93511 14.528 4.89381L14.5285 4.89426ZM7.27219 9.09239C4.7014 9.09239 2.17054 7.73734 0.927119 5.01271C2.15874 2.2976 4.72318 0.907152 7.30033 0.907152C9.87702 0.907152 12.3843 2.29897 13.6164 5.01543C12.3852 7.73008 9.84979 9.09239 7.27219 9.09239Z"
                                            fill="#2A2A2A" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-2 masked-product">
                        <div class="vector-line">
                            <span class="line-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="146" height="65" viewBox="0 0 146 65"
                                    fill="none">
                                    <path d="M145.5 64L85 1H0.5" stroke="white" />
                                </svg>
                            </span>
                            <div class="clickable-circle">
                                <span></span>
                            </div>
                        </div>
                        <div class="product-item">

                            <div class="img-holder">
                                <a href="#" title="">
                                    <img src="images/product_1.png" alt="">
                                </a>
                            </div>
                            <div class="product-detail">
                                <div class="product-name">
                                    <h3><a href="#">Men's Motion Scramble</a></h3>
                                </div>
                                <div class="product-price">
                                    <span class="red-text">$160.00</span>
                                </div>
                            </div>
                            <div class="product-modal">
                                <a href="#" title="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 15 10"
                                        fill="none">
                                        <path
                                            d="M7.3212 2.2967C5.81775 2.2967 4.59838 3.51607 4.59838 5.01951C4.59838 6.52296 5.81775 7.74233 7.3212 7.74233C8.82465 7.74233 10.044 6.52342 10.044 5.01951C10.044 3.51561 8.8251 2.2967 7.3212 2.2967ZM7.3212 6.83473C6.32011 6.83473 5.48512 6.00064 5.48512 4.99955C5.48512 3.99846 6.29924 3.18433 7.30033 3.18433C8.30142 3.18433 9.11554 3.99846 9.11554 4.99955C9.11554 6.00064 8.32229 6.83473 7.3212 6.83473ZM14.5285 4.89426C14.5231 4.87157 14.5258 4.84707 14.519 4.82483C14.5162 4.8153 14.5099 4.80986 14.5067 4.80169C14.5017 4.78898 14.5031 4.77355 14.4963 4.7613C13.1762 1.73897 10.3317 0 7.30033 0C4.26892 0 1.36731 1.73625 0.0467417 4.75858C0.0412961 4.77128 0.0422037 4.78444 0.0372118 4.79897C0.0340352 4.80804 0.027682 4.81258 0.0245054 4.8212C0.0176983 4.84389 0.0204211 4.86794 0.0158831 4.89109C0.00771465 4.93193 0 4.97186 0 5.01316C0 5.05446 0.00771465 5.09348 0.0158831 5.13478C0.0204211 5.15747 0.0172445 5.18243 0.0245054 5.20376C0.0272282 5.2142 0.0340352 5.21828 0.0372118 5.22736C0.0417499 5.23961 0.0408423 5.25504 0.0467417 5.26774C1.36731 8.28916 4.24079 10 7.27219 10C10.3036 10 13.1766 8.29279 14.4967 5.27047C14.5035 5.25731 14.5022 5.24415 14.5072 5.22962C14.5103 5.22191 14.5162 5.21601 14.519 5.20693C14.5258 5.1847 14.524 5.16065 14.5285 5.13705C14.5367 5.09621 14.5439 5.05673 14.5439 5.01452C14.5439 4.97459 14.5362 4.93511 14.528 4.89381L14.5285 4.89426ZM7.27219 9.09239C4.7014 9.09239 2.17054 7.73734 0.927119 5.01271C2.15874 2.2976 4.72318 0.907152 7.30033 0.907152C9.87702 0.907152 12.3843 2.29897 13.6164 5.01543C12.3852 7.73008 9.84979 9.09239 7.27219 9.09239Z"
                                            fill="#2A2A2A" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="subscribe-section">
    <div class="container">
        <div class="subscribe-box">
            <span class="bg-circle"></span>
            <div class="d-flex align-items-center justify-content-center text-center flex-column">
                <div class="main-title">
                    <h2 class="title">BECOME PART<br /> OF THE Polar shoes DISTRICT</h2>
                </div>
                <div class="text-box">
                    <p>Promotions, new products and sales. Directly to your inbox.</p>
                </div>
                <div class="subscribe-form">
                    <div class="d-flex">
                        <div class="input-field">
                            <input type="email" placeholder="Enter email address">
                        </div>
                        <div class="submit-field">
                            <input type="submit" value="Subscribe">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-------------------------------Footer--------------------------------------------->

<?php get_footer(); ?>

<!-------------------------------Footer--------------------------------------------->