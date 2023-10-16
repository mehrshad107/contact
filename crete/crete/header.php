<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Crete
 */
$stickybarenable = cs_get_option('sticky_bar_enable');
$ldrebl = cs_get_option('enable_dbl_loader');
$favicon = cs_get_option('crete-favicon', 'url');
$headerstyle = cs_get_option('crete-header-style', '');
$magic_cursor = cs_get_option('crete_magic_cursor', '');

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php
    if (!function_exists('has_site_icon') || !has_site_icon()) {
        if (!empty($favicon)) {
            ?>
            <link rel="shortcut icon" href="<?php echo esc_url($favicon); ?>" type="image/x-icon"/>
            <?php
        }
        ?>

        <?php

    }
    ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ($magic_cursor == "magic") { ?>
    <div class='cursor' id="cursor"></div>
    <div class='cursor2' id="cursor2">
        <div class="ball"></div>
    </div>
    <div class='cursor3' id="cursor3"></div>
<?php } ?>
<?php if ($ldrebl == "enabled") { ?>
    <!--prealoder start-->
    <div class="preloader">
        <div class="loader">
            <svg class="pl" viewBox="0 0 128 128" width="128px" height="128px" xmlns="http://www.w3.org/2000/svg">
                <g fill="none" stroke-linecap="round" stroke-width="16" transform="rotate(-90,64,64)">
                    <circle class="pl__ring" r="56" cx="64" cy="64" stroke="#ddd"/>
                    <circle class="pl__worm pl__worm--moving" r="56" cx="64" cy="64" stroke="currentColor" stroke-dasharray="22 307.86 22" data-worm/>
                </g>
                <g data-particles></g>
            </svg>
        </div>
    </div>
    <!--prealoder end-->

<?php } ?>
<?php wp_body_open(); ?>
<?php
if ($stickybarenable == 'enabled') {
    get_template_part('template-parts/header/header', 'sticky-notification');
}

?>
<?php if ($headerstyle == 'style-three'){ ?>
<main class="hm4-main">
    <?php }elseif ($headerstyle == 'style-four'){ ?>
    <main class="hm5-main-section" data-background="" style="background-image: url();">
        <?php } ?>
        <?php
        if ($headerstyle == 'style-two') {
            get_template_part('template-parts/header/header', 'style-two');

        } elseif ($headerstyle == 'style-three') {
            get_template_part('template-parts/header/header', 'style-three');


        } elseif ($headerstyle == 'style-four') {
            get_template_part('template-parts/header/header', 'style-four');
        } else {
            get_template_part('template-parts/header/header', 'style-one');
        }

        ?>


