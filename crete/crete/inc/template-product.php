<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */

if ( ! function_exists( 'crete_woo_sidebar_prone' ) ) {
	function crete_woo_sidebar_prone() { 
	global $post , $product;
	
	?>
	    <div class="pivo-product-sidebar-asd row">
            <div class="pivo-product-img col-12 col-md-4 ">
              <div class="position-relative">
                <a href="<?php the_permalink();?>"> <?php if ( has_post_thumbnail() ) {
					the_post_thumbnail('crete-woo-sidebar-alt');
				} ?></a>
				<div class="psv-woo-overlay-d">
				    <?php

echo apply_filters( 'woocommerce_loop_add_to_cart_link',
    sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button %s product_type_%s"><i class="zil zi-cart-ii"></i></a>',
        esc_url( $product->add_to_cart_url() ),
        esc_attr( $product->get_id() ),
        esc_attr( $product->get_sku() ),
        $product->is_purchasable() ? 'add_to_cart_button' : '',
        esc_attr( $product->get_type() ),
        esc_html( $product->add_to_cart_text() )
    ),
$product );
				    ?>
				    
				</div>
                </div>
            </div>
            <div class="crete-rcp-product-info col-12 col-md-8">
               
                <h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
                
                <p><?php echo maybe_unserialize($product->get_price_html()); ?></p>
               
               
        
            </div>
        </div>

<?php } }
