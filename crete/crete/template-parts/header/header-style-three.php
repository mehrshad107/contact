  <?php

$logo1x= cs_get_option('main-logo','url');
$logooff= cs_get_option('main-offcanvas-logo','url');
$logomoboffcanvas= cs_get_option('mobile_offcanvas_logo','url');
 if ($logooff){
     $logooff= cs_get_option('main-offcanvas-logo','url');
 } else {
     $logooff= cs_get_option('main-logo','url');
 }

 $cretephone= cs_get_option('stl_two_phone','');
 $creteemail= cs_get_option('stl_two_email','');

?>
   <!--canvus menu start-->
        <div class="canvus-menu">
             <?php if ($logo1x){ ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo"><img src="<?php echo esc_url($logo1x);?>" alt="logo"></a>
                    <?php } else {?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo"> <img src="<?php echo get_template_directory_uri();?>/assets/images/logo.svg" alt="logo"></a>
                    <?php }?>
        <?php
    wp_nav_menu( array(
        'theme_location' => 'main',
        'menu_id'        => 'primary-menu-mobile',
        'menu_class'        => 'canvus-nav-menu',
        'container_id' => 'mayosis-sidemenu',
        'walker' => new Crete_Accordion_Walker(),
    ) );
    ?>
            <div class="canvus-icon-box mt-5">
              <?php if ($cretephone){ ?>
                <div class="single-icon">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/icon-7.svg" alt="icon" class="img-fluid">
        
        
                        <a href="tel:<?php echo esc_html($cretephone);?>"><?php echo maybe_unserialize($cretephone);?></a>
        
                </div>
                <?php } ?>
                <?php if ($creteemail){?>
                <div class="single-icon">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/icon-8.svg" alt="icon" class="img-fluid">
                    <a href="mailto:<?php echo esc_html($creteemail);?>"><?php echo esc_html($creteemail);?></a>
                </div>
                <?php } ?>
            </div>
        </div>
        <!--canvus menu end-->

        <!--header section start-->
        <header class="hm4-header-section d-md-none header-sticky">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-6">
                        <div class="logo">
                            <?php if ($logo1x){ ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" ><img src="<?php echo esc_url($logo1x);?>" alt="logo"></a>
                    <?php } else {?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" > <img src="<?php echo get_template_directory_uri();?>/assets/images/logo.svg" alt="logo"></a>
                    <?php }?>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="header-right text-end">
                            <button class="hm4-header-toggle"><i class="fas fa-bars"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--header section end-->