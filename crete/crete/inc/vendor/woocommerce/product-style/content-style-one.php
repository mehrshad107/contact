<?php
 global $product;
$product_id = get_the_ID();
 ?>
 <div class="crete__product-style crete__product-style-one">
     <div class="crete__product_img">
         <div class="crete__product_img-add-to-cart">
             <?php woocommerce_template_loop_add_to_cart();?>
         </div>
         <a href="<?php the_permalink();?>" class="crete-hover-thumb-woo">
             <?php
             /**
              *
              * @hooked crete_woo_thumbnail - 11
              */
             do_action( 'crete_woocommerce_shop_loop_images' );
             ?>
            <div class="crete__product_img-quick-view-and-wishlist">
                <?php crete_add_quick_view_card();?>
                <?php crete_wishlist_icon_in_product_grid(); ?>
            </div>
         </a>
     </div>
     <div class="crete__product_content">
         <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
         <div class="sell-pro-price">
             <?php echo maybe_unserialize($product->get_price_html()); ?>
         </div>
     </div>
 </div>
