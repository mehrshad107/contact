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
<!--header section start-->
<header class="header-style-3 position-relative z-2 header-sticky">
    <div class="container">
        <div class="row justify-content-between align-items-center g-4">
            <div class="col-xl-3 col-5">
                <div class="logo-wrapper">
                    <?php if ($logo1x){ ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($logo1x);?>" alt="logo"></a>
                    <?php } else {?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img src="<?php echo get_template_directory_uri();?>/assets/images/logo.svg" alt="logo"></a>
                    <?php }?>
                </div>
            </div>
            <div class="col-xl-3 col-7">
                <div class="hm3-header-right d-flex align-items-center justify-content-end gap-4">
                    <?php if ($cretephone){ ?>
                        <a href="tel:<?php echo esc_html($cretephone);?>" class="header-tel d-none d-sm-inline-block"><?php echo esc_html($cretephone);?></a>
                    <?php } ?>
                    <button class="canvus-menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
<!--header section end-->

<!--canvus menu start-->
<div class="canvus-menu">
    <?php if ($logooff){ ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo"><img src="<?php echo esc_url($logooff);?>" alt="logo"></a>
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


                <a href="tel:<?php echo esc_html($cretephone);?>"><?php echo esc_html($cretephone);?></a>

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