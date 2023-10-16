<?php
global $product;
global $post;
$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');

$image_id = get_post_thumbnail_id();
$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);

?>
<div class="crete_home_two_product-content">
    <div class="card h-100 border-0">
        <div class="crete__home_two-carousel-img crete__product__style-three-product-img">
            <img src="<?php echo esc_url($image[0]); ?>" class="card-img-top" alt="<?php echo esc_html($image_alt); ?>">
            <div class="crete__product-additional-hover-info">
                <?php //crete_wishlist_icon_in_product_grid(); ?>
                <?php

                if (class_exists('YITH_WCWL')) {
                    ?>

                    <?php
                    $wishNonce = wp_create_nonce("add_to_wishlist");
                    $like_link = admin_url('admin-ajax.php?nonce=' . $wishNonce);
                    $status = '';
                    $like_classes = 'text-body-default2 text-light-opacity-7';
                    global $yith_wcwl;
                    if (empty($yith_wcwl->details['user_id'])) {
                        $yith_wcwl->details['user_id'] = '';
                    }
                    if ($yith_wcwl->is_product_in_wishlist($post->ID)) {
                        $status = 'remove-item';
                        $like_classes = 'text-red';
                    }
                    ?>
                    <a href="#" data-wishlist-link="<?php echo esc_url($like_link); ?>" data-id="<?php echo esc_attr($post->ID); ?>" class="crete-add-to-wishlist <?php echo esc_attr($status); ?>"><span class="btn-icon <?php echo esc_attr($like_classes); ?> ticon-heart align-self-center"></span></a>
                    <?php
                }
                ?>
                <?php crete_add_quick_view_card(); ?>
            </div>
        </div>
        <div class="crete__home_two-carousel-cart-btn crete__product__style-three-cart-btn">
            <?php woocommerce_template_loop_add_to_cart(); ?>
        </div>
        <div class="crete__home_two-carousel-content align-items-start">
            <div class="crete__home_two-carousel-rating">
                <div class="crete__home_two-ratting-star">
                    <?php crete_get_star_rating(); ?>
                </div>
                <div class="crete__home_two-rating-count crete__product__style-three-rating-count">
                    <?php
                    if ($product->get_review_count() > 1) {
                        echo '(' . $product->get_review_count() . ' Reviews)';
                    } else {
                        echo '(' . $product->get_review_count() . ' Review)';
                    }
                    ?>
                </div>
            </div>
            <p class="crete__home_two-carousel-title crete__product__style-three-title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </p>
            <div class="crete__home_two-carousel-price">
                <?php echo maybe_unserialize($product->get_price_html()); ?>
            </div>
        </div>

    </div>
</div>