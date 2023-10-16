<?php
/**
 * Crete functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package crete
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

#-----------------------------------------------------------------#
# Defined Constants
#-----------------------------------------------------------------#/
if( !defined('CRETE_PATH') ) define('CRETE_PATH', get_template_directory() );
if( !defined('CRETE_URL') ) define('CRETE_URL', get_template_directory_uri() );
define('CRETE_THEME_DIR', wp_normalize_path(CRETE_PATH . '/'));
define('CRETE_THEME_URI', preg_replace('/^http(s)?:/', '', CRETE_URL) . '/');

#-----------------------------------------------------------------#
# Site Content Width
#-----------------------------------------------------------------#/
if( !isset($content_width) ) $content_width = 640;

if( !class_exists('Crete_Theme_Setup') ) {

    class Crete_Theme_Setup {

        public function __construct() {

            /* includes_files Theme Files */

            add_action('after_setup_theme', array( $this, 'includes_files' ), 4 );

            /* Main Theme Options */

            add_action('after_setup_theme', array( $this, 'theme_support') );

            /* Register Widget */
            add_action('widgets_init', array( $this, 'crete_widgets_init'));

        }

        public function includes_files(){
            /**
             * Implement the Custom Header feature.
             */
            require CRETE_PATH . '/inc/custom-header.php';

            /**
             * Custom template tags for this theme.
             */
            require CRETE_PATH . '/inc/template-tags.php';

            /**
             * Functions which enhance the theme by hooking into WordPress.
             */
            require CRETE_PATH . '/inc/template-functions.php';
            require CRETE_PATH . '/inc/template-post.php';
            require CRETE_PATH . '/inc/crete-options.php';

            /**
             * Customizer additions.
             */
            require CRETE_PATH . '/inc/customizer.php';

            /**
             * Enqueue.
             */

            require CRETE_PATH . '/inc/crete-enqueue.php';

            /**
             * Navwalker additions.
             */
            require CRETE_PATH . '/inc/bootstrap-navwalker.php';
            require CRETE_PATH . '/inc/crete-nav-walker.php';

            require CRETE_PATH . '/inc/crete-accordion-walker.php';





            /**
             * Comment.
             */
            require CRETE_PATH . '/inc/crete_comment.php';

            /**
             * Admin Page.
             */
            require CRETE_PATH . '/inc/admin/admin.php';
            require CRETE_PATH . '/inc/admin/admin-init.php';

            /**
             * Breadcrumb.
             */
            require CRETE_PATH . '/inc/breadcrumb.php';

            /**
             * Load Jetpack compatibility file.
             */
            if ( defined( 'JETPACK__VERSION' ) ) {
                require CRETE_PATH . '/inc/jetpack.php';
            }
            
            $headerstyle = cs_get_option( 'crete-header-style','');
            if ($headerstyle == 'style-four'){ 
            require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php';
            require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-direct.php';
            }

            /**
             * Load WooCommerce compatibility file.
             */
            if ( class_exists( 'WooCommerce' ) ) {
                require CRETE_PATH . '/inc/woocommerce.php';
                require CRETE_PATH . '/inc/template-product.php';
                require CRETE_PATH . '/inc/vendor/woo-single-product-structure.php';
            }

            if (!is_customize_preview()  && is_admin() ) {
                require_once(CRETE_PATH.'/inc/admin/merlin/vendor/autoload.php');
                require_once(CRETE_PATH.'/inc/admin/merlin/class-merlin.php');
                require_once(CRETE_PATH.'/inc/admin/merlin/merlin-config.php');
                require_once(CRETE_PATH.'/inc/admin/merlin/marlin-demo.php');
            }


        }


        public function theme_support(){
            // Set our theme version.
            if (!defined('CRETE_VERSION')) {
                // Replace the version number of the theme on each release.
                define('CRETE_VERSION', '1.2');
            }
            /*
             * Make theme available for translation.
             * Translations can be filed in the /languages/ directory.
             * If you're building a theme based on Crete, use a find and replace
             * to change 'crete' to the name of your theme in all the template files.
             */
            load_theme_textdomain( 'crete', CRETE_PATH . '/languages' );

            // Add default posts and comments RSS feed links to head.
            add_theme_support( 'automatic-feed-links' );
            
            add_filter( 'wpcf7_autop_or_not', '__return_false' );

            /*
             * Let WordPress manage the document title.
             * By adding theme support, we declare that this theme does not use a
             * hard-coded <title> tag in the document head, and expect WordPress to
             * provide it for us.
             */
            add_theme_support( 'title-tag' );

            /*
             * Enable support for Post Thumbnails on posts and pages.
             *
             * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
             */
            add_theme_support( 'post-thumbnails' );


            add_image_size( 'crete-blog-sthome-one', 648, 708, true );
            add_image_size( 'crete-blog-sthome-two', 430, 300, true );
            add_image_size( 'crete-blog-sthome-three', 370, 417, true );
            add_image_size( 'crete-blog-sthome-four', 384, 300, true );
            add_image_size( 'crete-blog-sthome-five', 570, 400, true );
            add_image_size( 'crete-navigation-image', 80, 80, true );
            add_image_size( 'crete-blog-side-square', 85, 85, true );
            add_image_size( 'crete-single-portfolio-thumbnail', 570, 710, true );
            add_image_size( 'crete-portfolio-style-two', 120,120, true );
            add_image_size( 'crete-portfolio-style-four', 306,340, true );
            add_image_size( 'crete-project-big', 628, 502, true );
            add_image_size( 'crete-project-medium', 410, 504, true );
            add_image_size( 'crete-project-alt', 404, 502, true );
            add_image_size( 'crete-project-filter', 348, 263, true );
            add_image_size( 'crete-project-single', 1400, 650, true );
            add_image_size( 'crete-team-slider', 270, 270, true );
            
            

            // Image Size Cropping When Upload an image smaller than the size
            if(!function_exists('crete_thumbnail_upload_scale')) {
                function crete_thumbnail_upload_scale( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ){

                    if ( !$crop ) return null; // let the wordpress default function handle this

                    $aspect_ratio = $orig_w / $orig_h;
                    $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);

                    $crop_w = round($new_w / $size_ratio);
                    $crop_h = round($new_h / $size_ratio);

                    $s_x = floor( ($orig_w - $crop_w) / 2 );
                    $s_y = floor( ($orig_h - $crop_h) / 2 );

                    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
                }
            }
            add_filter( 'image_resize_dimensions', 'crete_thumbnail_upload_scale', 10, 6 );



            // This theme uses wp_nav_menu() in one location.
            register_nav_menus(
                array(
                    'main' => esc_html__( 'Main Menu', 'crete' ),
                    'footer-menu' => esc_html__( 'Footer Menu', 'crete' ),
                )
            );

            /*
             * Switch default core markup for search form, comment form, and comments
             * to output valid HTML5.
             */
            add_theme_support(
                'html5',
                array(
                    'search-form',
                    'comment-form',
                    'comment-list',
                    'gallery',
                    'caption',
                    'style',
                    'script',
                )
            );

            // Set up the WordPress core custom background feature.
            add_theme_support(
                'custom-background',
                apply_filters(
                    'crete_custom_background_args',
                    array(
                        'default-color' => 'ffffff',
                        'default-image' => '',
                    )
                )
            );

            // Add theme support for selective refresh for widgets.
            add_theme_support( 'customize-selective-refresh-widgets' );





            /**
             * Add support for core custom logo.
             *
             * @link https://codex.wordpress.org/Theme_Logo
             */
            add_theme_support(
                'custom-logo',
                array(
                    'height'      => 250,
                    'width'       => 250,
                    'flex-width'  => true,
                    'flex-height' => true,
                )
            );


            #-----------------------------------------------------------------#
# Gutenberg
#-----------------------------------------------------------------#/
            // Theme supports wide images, galleries and videos.
            add_theme_support( 'align-wide' );
            add_theme_support( 'wp-block-styles' );
            add_theme_support( 'editor-styles' );
            add_theme_support( 'responsive-embeds' );
            add_theme_support( 'custom-units' );

            remove_theme_support( 'widgets-block-editor' );


            add_editor_style('style-editor.css');
            add_editor_style('https://fonts.googleapis.com/css2?family=Open+Sans&family=Quicksand:wght@500;600;700&display=swap');


            // Add custom editor font sizes.
            add_theme_support(
                'editor-font-sizes',
                array(
                    array(
                        'name'      => esc_attr__( 'Small', 'crete' ),
                        'shortName' => esc_attr__( 'S', 'crete' ),
                        'size'      => 16,
                        'slug'      => 'small',
                    ),
                    array(
                        'name'      => esc_attr__( 'Normal', 'crete' ),
                        'shortName' => esc_attr__( 'M', 'crete' ),
                        'size'      => 18,
                        'slug'      => 'normal',
                    ),
                    array(
                        'name'      => esc_attr__( 'Large', 'crete' ),
                        'shortName' => esc_attr__( 'L', 'crete' ),
                        'size'      => 24,
                        'slug'      => 'large',
                    ),
                    array(
                        'name'      => esc_attr__( 'Huge', 'crete' ),
                        'shortName' => esc_attr__( 'XL', 'crete' ),
                        'size'      => 42,
                        'slug'      => 'huge',
                    ),
                )
            );

            // Make specific theme colors available in the editor.
            add_theme_support( 'editor-color-palette', array(
                array(
                    'name'  => __( 'Light gray', 'crete' ),
                    'slug'  => 'light-gray',
                    'color'	=> '#f5f5f5',
                ),
                array(
                    'name'  => __( 'Medium gray', 'crete' ),
                    'slug'  => 'medium-gray',
                    'color' => '#999',
                ),
                array(
                    'name'  => __( 'Dark gray', 'crete' ),
                    'slug'  => 'dark-gray',
                    'color' => '#222a36',
                ),

                array(
                    'name'  => __( 'Purple', 'crete' ),
                    'slug'  => 'purple',
                    'color' => '#5a00f0',
                ),

                array(
                    'name'  => __( 'Dark Blue', 'crete' ),
                    'slug'  => 'dark-blue',
                    'color' => '#28375a',
                ),

                array(
                    'name'  => __( 'Red', 'crete' ),
                    'slug'  => 'red',
                    'color' => '#c44d58',
                ),

                array(
                    'name'  => __( 'Yellow', 'crete' ),
                    'slug'  => 'yellow',
                    'color' => '#ecca2e',
                ),

                array(
                    'name'  => __( 'Green', 'crete' ),
                    'slug'  => 'green',
                    'color' => '#64a500',
                ),

                array(
                    'name'  => __( 'White', 'crete' ),
                    'slug'  => 'white',
                    'color' => '#ffffff',
                ),
            ) );

            add_theme_support( 'editor-font-sizes', array(
                array(
                    'name' => __( 'Small', 'crete' ),
                    'size' => 14,
                    'slug' => 'small'
                ),
                array(
                    'name' => __( 'Normal', 'crete' ),
                    'size' => 16,
                    'slug' => 'normal'
                ),
                array(
                    'name' => __( 'Large', 'crete' ),
                    'size' => 36,
                    'slug' => 'large'
                ),
                array(
                    'name' => __( 'Huge', 'crete' ),
                    'size' => 40,
                    'slug' => 'huge'
                )
            ) );




        }


        public function crete_widgets_init()
        {
            register_sidebar(
                array(
                    'name'          => esc_html__( 'Sidebar', 'crete' ),
                    'id'            => 'crete-sidebar',
                    'description'   => esc_html__( 'Add widgets here.', 'crete' ),
                    'before_widget' => '<section id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</section>',
                    'before_title'  => '<h2 class="widget-title">',
                    'after_title'   => '</h2>',
                )
            );

            register_sidebar(
                array(
                    'name'          => esc_html__( 'Woo Archive', 'crete' ),
                    'id'            => 'crete-woo-sidebar',
                    'description'   => esc_html__( 'Add widgets here.', 'crete' ),
                    'before_widget' => '<section id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</section>',
                    'before_title'  => '<h2 class="widget-title">',
                    'after_title'   => '</h2>',
                )
            );
            
            register_sidebar(
                array(
                    'name'          => esc_html__( 'Header Language Bar', 'crete' ),
                    'id'            => 'header_language_bar',
                    'description'   => esc_html__( 'Add widgets here.', 'crete' ),
                    'before_widget' => '<section id="%1$s" class="header-sidebar %2$s">',
                    'after_widget'  => '</section>',
                    'before_title'  => '<h2 class="widget-title d-none">',
                    'after_title'   => '</h2>',
                )
            );
            
            register_sidebar(
                array(
                    'name'          => esc_html__( 'Service Sidebar', 'crete' ),
                    'id'            => 'service-sidebar',
                    'description'   => esc_html__( 'Add widgets here.', 'crete' ),
                    'before_widget' => '<section id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</section>',
                    'before_title'  => '<h2 class="widget-title">',
                    'after_title'   => '</h2>',
                )
            );
            
            register_sidebar(
                array(
                    'name'          => esc_html__( 'Page Sideber', 'crete' ),
                    'id'            => 'page-sidebar',
                    'description'   => esc_html__( 'Add widgets here.', 'crete' ),
                    'before_widget' => '<section id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</section>',
                    'before_title'  => '<h2 class="widget-title">',
                    'after_title'   => '</h2>',
                )
            );


            register_sidebar(
                array(
                    'name'          => esc_html__( 'Footer Sidebar One', 'crete' ),
                    'id'            => 'footer_sidebar_one',
                    'description'   => esc_html__( 'Add widgets here.', 'crete' ),
                    'before_widget' => '<section id="%1$s" class="footer-sidebar %2$s">',
                    'after_widget'  => '</section>',
                    'before_title'  => '<h2 class="widget-title">',
                    'after_title'   => '</h2>',
                )
            );
            
             register_sidebar(
                array(
                    'name'          => esc_html__( 'Footer Sidebar Two', 'crete' ),
                    'id'            => 'footer_sidebar_two',
                    'description'   => esc_html__( 'Add widgets here.', 'crete' ),
                    'before_widget' => '<section id="%1$s" class="footer-sidebar %2$s">',
                    'after_widget'  => '</section>',
                    'before_title'  => '<h2 class="widget-title">',
                    'after_title'   => '</h2>',
                )
            );
            
            register_sidebar(
                array(
                    'name'          => esc_html__( 'Footer Sidebar Three', 'crete' ),
                    'id'            => 'footer_sidebar_three',
                    'description'   => esc_html__( 'Add widgets here.', 'crete' ),
                    'before_widget' => '<section id="%1$s" class="footer-sidebar %2$s">',
                    'after_widget'  => '</section>',
                    'before_title'  => '<h2 class="widget-title">',
                    'after_title'   => '</h2>',
                )
            );
            
            register_sidebar(
                array(
                    'name'          => esc_html__( 'Footer Sidebar Four', 'crete' ),
                    'id'            => 'footer_sidebar_four',
                    'description'   => esc_html__( 'Add widgets here.', 'crete' ),
                    'before_widget' => '<section id="%1$s" class="footer-sidebar %2$s">',
                    'after_widget'  => '</section>',
                    'before_title'  => '<h2 class="widget-title">',
                    'after_title'   => '</h2>',
                )
            );
        }


    }

    new Crete_Theme_Setup;

}
