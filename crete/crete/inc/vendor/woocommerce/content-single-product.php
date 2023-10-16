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
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

?>
    <div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
    <div class="pivoo-single-product-box">
    <div class="crete-product-container">

    
<?php

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
$pbredcmglobal = get_post_meta ( get_the_ID(), 'woo_breadcrumb', true );

if ($pbredcmglobal == true ){
    $title_hide_box = get_post_meta ( get_the_ID(), 'metas_title_hide_woo', true );
    $singmetaclss = "crete-single-woo-breadcrumbs";
    
} else {
$title_hide_box = cs_get_option('bd_title_hide_woo');
 $singmetaclss = "";
}



$title_hide_wd = cs_get_option('x_bd_width_set');
$productglobalmeta = get_post_meta ( get_the_ID(), 'woo_Gallery_option_global', true );

if ($productglobalmeta == true ){
    $cs_style_layout = get_post_meta ( get_the_ID(), 'meta_s_woo_layout', true );
    
} else {
$cs_style_layout = cs_get_option('main_s_woo_layout');
}

 if ($title_hide_wd == true) {
      $containerxpc = 'container crete-extended-container';
 } else {
     $containerxpc = 'w-100';
 }
?>


	
	<?php if($cs_style_layout == 'style_two'){
	 wc_get_template_part( 'single-product/single-layout', 'two' );
	 } else { 
	 wc_get_template_part( 'single-product/single-layout', 'one' );
     } ?>

</div>
<?php do_action( 'woocommerce_after_single_product' ); ?>
</div>
</div>
<div class="clearfix"></div>
