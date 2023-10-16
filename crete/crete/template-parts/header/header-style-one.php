<?php

$logo1x = cs_get_option('main-logo', 'url');
$logooff = cs_get_option('main-offcanvas-logo', 'url');
$logomoboffcanvas = cs_get_option('mobile_offcanvas_logo', 'url');

if ($logooff) {
    $logooff = cs_get_option('main-offcanvas-logo', 'url');
} else {
    $logooff = cs_get_option('main-logo', 'url');
}

$cretephone = cs_get_option('stl_one_phone', '');
$creteaddress = cs_get_option('stl_one_address', '');
$creteemail = cs_get_option('stl_one_email', '');
$cretesocial = cs_get_option('style_one_social', '');
$cretecontacttitle = cs_get_option('stl_contact_title', '');
$cretecontacturl = cs_get_option('stl_contact_url', '');
$offcanvasaddress = cs_get_option('offcanvas_address', '');
$offcanvasgalery = cs_get_option('offcanvas_gallery', '');
$offcgallery_ids = explode(',', $offcanvasgalery);
$offcanvasform = cs_get_option('stl-one-off-form-s', '');
$offcanvasbtntitle = cs_get_option('offcanvas_btn_title', '');
$offcanvasbtnurl = cs_get_option('offcanvas_btn_url', '');


?>
<!--header section start-->
<header class="header-section position-relative z-2 header-sticky">
    <div class="container">
        <div class="infobar py-2 d-none d-lg-block">
            <div class="row g-4 align-items-center justify-content-between">
                <div class="col-xl-6 col-lg-7">
                    <div class="infobar-content d-flex align-items-center">
                        <?php if ($cretephone) { ?>
                            <a href="tel:<?php echo esc_html($cretephone); ?>" class="mb-0 text-white fs-sm fw-semibold"><span class="me-2"><i class="fa-solid fa-phone"></i></span><?php echo esc_html($cretephone); ?></a>
                        <?php } ?>
                        <?php if ($creteaddress) { ?>
                            <p class="text-white fs-sm mb-0 fw-semibold"><span class="me-2"><i class="fa-solid fa-location-dot"></i></span><?php echo esc_html($creteaddress); ?></p>
                        <?php } ?>
                        <?php if ($creteemail) { ?>
                            <a href="mailto:<?php echo esc_html($creteemail); ?>" class="text-white fw-semibold fs-sm"><span class="me-2"><i class="fa-solid fa-envelope"></i></span><?php echo esc_html($creteemail); ?></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5">
                    <div class="d-flex align-items-center justify-content-end gap-5 infobar-right info-small-white">
                        <?php if (is_active_sidebar('header_language_bar')) { ?>
                            <div class="language-switcher">

                                <?php dynamic_sidebar('header_language_bar'); ?>
                            </div>
                        <?php } ?>

                        <?php if ($cretesocial) { ?>
                            <div class="info-social border-left">
                                <?php foreach ($cretesocial as $item) {
                                    $icon = $item['social_icon'];
                                    $url = $item['social_link'];
                                    ?>
                                    <a href="<?php echo esc_url($url); ?>"><i class="<?php echo esc_html($icon); ?>"></i></a>
                                <?php } ?>


                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="crete-navbar bg-white">
            <div class="row align-items-center">
                <div class="col-lg-2 col-6">
                    <div class="logo-wrapper">
                        <?php if ($logo1x) { ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($logo1x); ?>" alt="logo"></a>
                        <?php } else { ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>"> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="logo"></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-9 d-none d-lg-block">
                    <nav class="crete-navmenu text-center ps-xl-5">

                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'main',
                            'menu_id' => 'primary-menu',
                            'container_class' => 'crete-navmenu',
                            'menu_class' => 'crete-main-nav',
                            'container_id' => 'cretemenu',
                            'walker' => new Crete_Nav_walker(),
                            'fallback_cb' => 'Crete_Nav_walker::fallback',
                        ));
                        ?>
                    </nav>
                </div>
                <div class="col-xl-3 col-lg-1 col-6">
                    <div class="text-end d-flex align-items-center justify-content-end header-right gap-3">
                        <?php if ($cretecontacturl) { ?>
                            <a href="<?php echo esc_url($cretecontacturl); ?>" class="template-btn primary-btn d-none d-sm-block d-lg-none d-xl-block"><?php echo esc_html($cretecontacttitle); ?></a>
                        <?php } ?>
                        <button type="button" class="header-toggle offcanvus-toggle d-none d-lg-inline-flex">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <button type="button" class="header-toggle mobile-menu-toggle d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--header section end-->


<!--offcanvus start-->
<div class="offcanvus-box position-fixed bg-white">
    <a href="javascript:void(0)" class="offcanvus-close"><i class="fa-solid fa-xmark"></i></a>
    <div class="content-top">


        <?php if ($logooff) { ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="offcanvus-logo"><img src="<?php echo esc_url($logooff); ?>" alt="logo"></a>
        <?php } else { ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="offcanvus-logo"> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="logo"></a>
        <?php } ?>
        <?php if ($offcanvasaddress) { ?>
            <p class="mb-0 mt-32 fw-light"><?php echo esc_html($offcanvasaddress); ?></p>
        <?php } ?>
    </div>
    <?php if ($offcanvasgalery) { ?>
        <div class="offcanvus-gallery d-flex align-items-center flex-wrap">
            <?php foreach ($offcgallery_ids as $gallery_item_id) { ?>
                <a href="#"><?php echo wp_get_attachment_image($gallery_item_id, 'full'); ?></a>
            <?php } ?>

        </div>
    <?php } ?>
    <?php if ($offcanvasform) { ?>
        <div class="offcanvus-newsletter">

            <?php echo do_shortcode($offcanvasform); ?>
        </div>
    <?php } ?>
    <div class="offcanvus-bottom d-flex align-items-center justify-content-between">
        <?php if (is_active_sidebar('header_language_bar')) { ?>
            <div class="language-switcher">

                <?php dynamic_sidebar('header_language_bar'); ?>
            </div>
        <?php } ?>
        <?php if ($offcanvasbtnurl) { ?>
            <div class="user-links">
                <a href="<?php echo esc_url($offcanvasbtnurl); ?>" class="text-uppercase fw-bold fs-sm"><?php echo esc_html($offcanvasbtntitle); ?></a>
            </div>
        <?php } ?>
    </div>
</div>
<!--offcanvus end-->

<!--mobile menu start-->
<div class="mobile-menu">
    <a href="javascript:void(0)" class="close"><i class="fas fa-xmark"></i></a>

    <?php if ($logomoboffcanvas) { ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo"><img src="<?php echo esc_url($logomoboffcanvas); ?>" alt="logo"></a>
    <?php } else { ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo"> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="logo"></a>
    <?php } ?>

    <?php
    wp_nav_menu(array(
        'theme_location' => 'main',
        'menu_id' => 'primary-menu-mobile',
        'container_id' => 'mayosis-sidemenu',
        'walker' => new Crete_Accordion_Walker(),
    ));
    ?>

</div>
<!--mobile menu end-->