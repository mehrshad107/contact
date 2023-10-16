<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
if (!class_exists('Crete_Theme_Script')) {

    class Crete_Theme_Script
    {


        public function __construct()
        {


            add_action('wp_enqueue_scripts', array($this, 'crete_scripts'));

            add_action('admin_enqueue_scripts', array($this, 'crete_register_admin_styles'));


        }



#-----------------------------------------------------------------#
# Enqueue Styles & scripts
#-----------------------------------------------------------------#/

        public function crete_scripts()
        {

            wp_enqueue_style('bootstrap', CRETE_URL . '/assets/css/bootstrap.min.css', false, CRETE_VERSION, 'all');
            
           wp_enqueue_style('fontawesome', CRETE_URL . '/assets/css/all.css', false, CRETE_VERSION, 'all');
           
           wp_enqueue_style('slick', CRETE_URL . '/assets/css/slick.css', false, CRETE_VERSION, 'all');
           
           wp_enqueue_style('jquery-ui', CRETE_URL . '/assets/css/jquery-ui.css', false, CRETE_VERSION, 'all');
           
           wp_enqueue_style('niceselect', CRETE_URL . '/assets/css/nice-select.css', false, CRETE_VERSION, 'all');
           
           wp_enqueue_style('fancybox', CRETE_URL . '/assets/css/fancybox.css', false, CRETE_VERSION, 'all');
           
           wp_enqueue_style('animate', CRETE_URL . '/assets/css/animate.css', false, CRETE_VERSION, 'all');
           
           wp_enqueue_style('magneticpopup', CRETE_URL . '/assets/css/magnific-popup.css', false, CRETE_VERSION, 'all');
    
            wp_enqueue_style('crete-default', CRETE_URL . '/assets/css/theme-default.css', false, CRETE_VERSION, 'all');

           
            wp_enqueue_style('crete-style', CRETE_URL . '/assets/css/crete-style.css', false, CRETE_VERSION, 'all');
            wp_style_add_data('crete-style', 'rtl', 'replace');


            wp_enqueue_style('crete-google-fonts', crete_fonts_url(), array(), null);

            wp_enqueue_script('bootstrap', CRETE_URL . '/assets/js/bootstrap.bundle.min.js', array('jquery'), CRETE_VERSION, true);
            
            wp_enqueue_script('slick', CRETE_URL . '/assets/js/slick.js', array('jquery'), CRETE_VERSION, true);
            
            wp_enqueue_script('jquery-ui', CRETE_URL . '/assets/js/jquery-ui.js', array('jquery'), CRETE_VERSION, true);
            
            
            wp_enqueue_script('niceselect', CRETE_URL . '/assets/js/nice-select.js', array('jquery'), CRETE_VERSION, true);
            
            wp_enqueue_script('fancybox', CRETE_URL . '/assets/js/fancybox.js', array('jquery'), CRETE_VERSION, true);
            
            wp_enqueue_script('countdown', CRETE_URL . '/assets/js/countdown.min.js', array('jquery'), CRETE_VERSION, true);
            
            
            wp_enqueue_script('wow', CRETE_URL . '/assets/js/wow.js', array('jquery'), CRETE_VERSION, true);
            
            
            wp_enqueue_script('progressbar', CRETE_URL . '/assets/js/progress-bar.js', array('jquery'), CRETE_VERSION, true);
            wp_enqueue_script('parallax', CRETE_URL . '/assets/js/parallax.js', array('jquery'), CRETE_VERSION, true);

            wp_enqueue_script('tilt', CRETE_URL . '/assets/js/tilt-js.js', array('jquery'), CRETE_VERSION, true);
            
            wp_enqueue_script('magneticpopup', CRETE_URL . '/assets/js/magnific-popup.js', array('jquery'), CRETE_VERSION, true);
            
            wp_enqueue_script('waypoints', CRETE_URL . '/assets/js/waypoints.js', array('jquery'), CRETE_VERSION, true);
            
            wp_enqueue_script('counterup', CRETE_URL . '/assets/js/counterup.min.js', array('jquery'), CRETE_VERSION, true);
            
            wp_enqueue_script('typer', CRETE_URL . '/assets/js/typer.js', array('jquery'), CRETE_VERSION, true);
            
            wp_enqueue_script('preloader', CRETE_URL . '/assets/js/preloader.js', array('jquery'), CRETE_VERSION, true);
            
            wp_enqueue_script('isotope', CRETE_URL . '/assets/js/isotop.min.js', array('jquery'), CRETE_VERSION, true);
            
            
            wp_enqueue_script('crete-theme', CRETE_URL . '/assets/js/crete-theme.js', array('jquery'), CRETE_VERSION, true);
            




            if (class_exists('Crete_Core')) {
                if (class_exists('WooCommerce')) {
                    wp_enqueue_script('crete-woo', CRETE_URL . '/assets/js/crete-wc.js', array('jquery'), CRETE_VERSION, true);

                }
            }


            if (is_singular() && comments_open() && get_option('thread_comments')) {
                wp_enqueue_script('comment-reply');
            }

            
            if (class_exists('WooCommerce')) {
                wp_enqueue_style('crete-flickity', CRETE_URL . '/assets/css/flickity.css', false, CRETE_VERSION, 'all');
                wp_enqueue_script('crete-flickity', CRETE_URL . '/assets/js/flickity.pkgd.min.js', array(), CRETE_VERSION, true);
                
        
            }
        }




#-----------------------------------------------------------------#
# Register/Enqueue JS/CSS In Admin Panel
#-----------------------------------------------------------------#

        public function crete_register_admin_styles()
        {

            wp_enqueue_style('crete-admin-css', CRETE_URL . '/assets/css/admin.css');
        }


    }

    new Crete_Theme_Script;
}