<?php get_header(); ?>

<section class="woocommerce-search-results container">

    <h2>
        Search Results for: "<?php echo get_search_query(); ?>"
    </h2>

    <?php if (have_posts()) : ?>

        <div class="products-grid">

            <?php while (have_posts()) : the_post(); ?>

                <?php if ('product' === get_post_type()) : ?>

                    <div class="product-card">

                        <a href="<?php the_permalink(); ?>">

                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium'); ?>
                            <?php endif; ?>

                            <h3><?php the_title(); ?></h3>

                        </a>

                        <div class="price">
                            <?php echo wc_get_product(get_the_ID())->get_price_html(); ?>
                        </div>

                    </div>

                <?php endif; ?>

            <?php endwhile; ?>

        </div>

        <!-- Pagination -->
        <div class="pagination">
            <?php echo paginate_links([
                'total' => $GLOBALS['wp_query']->max_num_pages
            ]); ?>
        </div>

    <?php else : ?>

        <p>No products found.</p>

    <?php endif; ?>

</section>

<?php get_footer(); ?>