<?php
global $current_user;
wp_get_current_user();
$logo1x = cs_get_option('main-logo', 'url');
$logo2x = cs_get_option('main-logo-retina', 'url');
if ($logo2x) {
    $logo2x = cs_get_option('main-logo-retina', 'url');
} else {
    $logo2x = cs_get_option('main-logo', 'url');
}

?>
<div class="block lg:hidden">
    <div class="crete-mobile-menu d-block d-customL-none">

        <nav class="mobile--nav-menu crete-accordion-box">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main',
                'menu_id' => 'primary-menu-mobile',
                'container_id' => 'cretemenu',
                'walker' => new Crete_Accordion_Walker(),
            ));
            ?>
        </nav>

        <div class="overlaymobile"></div>
        <div class="mobile-nav">
            <span class="burger"><span></span></span>
        </div>
    </div>
</div>

<div class="d-none d-customL-block navbar navbar-expand-lg">

    <?php
    wp_nav_menu(array(
        'theme_location' => 'main',
        'menu_id' => 'primary-menu',
        'container_class' => 'primary-menu inline-block',
        'menu_class' => 'crete-main-nav page-dropdown-menu d-flex align-items-center',
        'container_id' => 'cretemenu',
        'walker' => new Crete_Nav_walker(),
        'fallback_cb' => 'Crete_Nav_walker::fallback',
    ));
    ?>


</div>