<?php
$copyright = cs_get_option('copyright_text');
$topelement = cs_get_option('footer_top_element');
$ctapos = cs_get_option('cta_bar_position');
$slidepos = cs_get_option('social_slider_position');

$cta_title = cs_get_option('cta_title');
$cta_desc = cs_get_option('cta_desc');
$cta_btn_text = cs_get_option('cta_btn_text');
$cta_btn_url= cs_get_option('cta_btn_url');

$sslider = cs_get_option('footer_social_slider');

$footer_box_main = cs_get_option('footer_main_element');
?>
<?php if ($topelement=="social_slide" || $topelement=="both" ){ ?>

<?php
$hypslide = true;
if ($slidepos =="other") {
    $hypslide = !is_front_page();
} elseif ($slidepos =="home"){
    $hypslide = is_front_page();
}
if($hypslide) {

    ?>
<!--brand section start-->
<div class="cr2-footer-brands overflow-hidden">
    <div class="container">
        <?php if ($sslider) { ?>
        <div class="cr2-footer-brand-slider">
            <?php foreach ($sslider as $slide){
                $name= $slide['social_name'];
                $url= $slide['social_url'];
                ?>
            <a href="<?php echo esc_url($url);?>" target="_blank"><span class="text-white fs-sm text-uppercase fw-bold"><?php echo esc_html($name);?></span></a>
            <?php } ?>

        </div>
    <?php } ?>
    </div>
</div>
<!--brand section end-->
<?php } } ?>

<?php if ($footer_box_main=="full"){?>
 <!--footer section start-->
    <footer class="footer-section  position-relative z-1 overflow-hidden">
        <?php if ($topelement=="cta-bar" || $topelement=="both" ){ ?>

                <?php
            $hypcta = true;
            if ($ctapos =="other") {
                $hypcta = !is_front_page();
            } elseif ($ctapos =="home") {
                $hypcta = is_front_page();
            }
                if($hypcta) {

                    ?>
         <div class="footer-top mb-100">
            <div class="container position-relative z-1">
                <span class="rectangle-shape-1 position-absolute z--1"></span>
                <span class="rectangle-shape-2 position-absolute z--1"></span>
                <div class="row justify-content-center mb-100">
                    <div class="col-xl-7">
                        <div class="text-center">
                            <h2 class="text-white mb-4"><?php echo esc_html($cta_title);?></h2>
                            <?php if ($cta_desc) { ?>
                            <p class="mb-32"><?php echo esc_html($cta_desc);?></p>
                            <?php } ?>
                            <?php if ($cta_btn_url){ ?>
                            <a href="<?php echo esc_url($cta_btn_url);?>" class="template-btn primary-btn"><?php echo esc_html($cta_btn_text);?></a>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
         </div>

                    <span class="circle-shape-1 position-absolute z--1 rounded-circle"></span>
                    <span class="circle-shape-2 position-absolute z--1 rounded-circle"></span>
        <?php } }?>
        <?php if ( is_active_sidebar( 'footer_sidebar_one' ) ) { ?>
        <div class="footer-bottom">
            <div class="container position-relative z-1">
                <div class="row g-4">
                    <div class="col-xl-3 col-lg-4">
                      <?php dynamic_sidebar('footer_sidebar_one'); ?>
                    </div>
                     <?php if ( is_active_sidebar( 'footer_sidebar_two' ) ) { ?>
                      <div class="col-xl-2 col-lg-4">
                           <?php dynamic_sidebar('footer_sidebar_two'); ?>
                      </div>
                     <?php } ?>
                     
                     <?php if ( is_active_sidebar( 'footer_sidebar_three' ) ) { ?>
                      <div class="col-xl-3 col-lg-4">
                           <?php dynamic_sidebar('footer_sidebar_three'); ?>
                      </div>
                     <?php } ?>
                     
                     <?php if ( is_active_sidebar( 'footer_sidebar_four' ) ) { ?>
                      <div class="col-xl-4 col-lg-4">
                           <?php dynamic_sidebar('footer_sidebar_four'); ?>
                      </div>
                     <?php } ?>
                    
                    
                  
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="footer-copyright mt-60 py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="copyright-text">
                            <p class="mb-0 text-white"> <?php echo maybe_unserialize($copyright);?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="copyright-links">
                            <?php wp_nav_menu(
                            array(
                            'theme_location' => 'footer-menu',
                            'menu_class' => 'crete-footer-nav'
                            )
                            );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!--footer section end-->
<?php } elseif($footer_box_main=="copyright"){?>
    <footer class="hm4-copyright footer-copyright position-relative">
        <div class="container">
            <div class="row g-3">
                <div class="col-xl-6">
                    <div class="copyright-text">
                        <p class="mb-0 text-white"> <?php echo maybe_unserialize($copyright);?></p>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="copyright-links justify-content-start justify-content-xl-end">
                        <?php wp_nav_menu(
                            array(
                                'theme_location' => 'footer-menu',
                                'menu_class' => 'crete-footer-nav'
                            )
                        );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php } ?>
