<?php
/**
 * Available filters for extending Merlin WP.
 *
 * @package   Merlin WP
 * @version   @@pkg.version
 * @link      https://merlinwp.com/
 * @author    Rich Tabor, from ThemeBeans.com & the team at ProteusThemes.com
 * @copyright Copyright (c) 2018, Merlin WP of Inventionn LLC
 * @license   Licensed GPLv3 for Open Source Use
 */

/**
 * Filter the home page title from your demo content.
 * If your demo's home page title is "Home", you don't need this.
 *
 * @param string $output Home page title.
 */
function crete_merlin_content_home_page_title($output)
{
    return 'Crete front page';
}

add_filter('merlin_content_home_page_title', 'crete_merlin_content_home_page_title');

/**
 * Filter the blog page title from your demo content.
 * If your demo's blog page title is "Blog", you don't need this.
 *
 * @param string $output Index blogroll page title.
 */
function crete_merlin_content_blog_page_title($output)
{
    return 'Blog';
}

add_filter('merlin_content_blog_page_title', 'crete_merlin_content_blog_page_title');

/**
 * Custom content for the generated child theme's functions.php file.
 *
 * @param string $output Generated content.
 * @param string $slug Parent theme slug.
 */
function crete_generate_child_functions_php($output, $slug)
{

    $slug_no_hyphens = strtolower(preg_replace('#[^a-zA-Z]#', '', $slug));

    $output = "
		<?php
		/**
		 * Theme functions and definitions.
		 */
		function {$slug_no_hyphens}_child_enqueue_styles() {
		    wp_enqueue_style( '{$slug}-child-style',
		        get_stylesheet_directory_uri() . '/style.css',
		        array( '{$slug}-style' ),
		        wp_get_theme()->get('Version')
		    );
		}

		add_action(  'wp_enqueue_scripts', '{$slug_no_hyphens}_child_enqueue_styles' );\n
	";

    // Let's remove the tabs so that it displays nicely.
    $output = trim(preg_replace('/\t+/', '', $output));

    // Filterable return.
    return $output;
}

add_filter('merlin_generate_child_functions_php', 'crete_generate_child_functions_php', 10, 2);

/**
 * Add your widget area to unset the default widgets from.
 * If your theme's first widget area is "sidebar-1", you don't need this.
 *
 * @see https://stackoverflow.com/questions/11757461/how-to-populate-widgets-on-sidebar-on-theme-activation
 *
 * @param array $widget_areas Arguments for the sidebars_widgets widget areas.
 * @return array of arguments to update the sidebars_widgets option.
 */
function crete_merlin_unset_default_widgets_args($widget_areas)
{

    $widget_areas = array(
        'sidebar-1' => array(),
    );

    return $widget_areas;
}

add_filter('merlin_unset_default_widgets_args', 'crete_merlin_unset_default_widgets_args');



/**
 * Define the demo import files (local files).
 *
 * You have to use the same filter as in above example,
 * but with a slightly different array keys: local_*.
 * The values have to be absolute paths (not URLs) to your import files.
 * To use local import files, that reside in your theme folder,
 * please use the below code.
 * Note: make sure your import files are readable!
 */
function crete_merlin_local_import_files()
{
    return array(
        array(
            'import_file_name' => 'Home One',
            'categories' => array('Elementor'),
            'import_file_url' => 'https://demo-data.nyc3.digitaloceanspaces.com/crete/home-one/sitecontent.xml',
            'import_widget_file_url' => 'https://demo-data.nyc3.digitaloceanspaces.com/crete/home-one/widgets.wie',
            'local_import_csf' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/admin/import/home-one/themeoption.json',
                    'option_name' => 'crete_options',
                ),
            ),
            'import_preview_image_url' => 'https://teconce.files.wordpress.com/2018/07/01mayo2.jpg',
            'preview_url' => 'https://teconce.com/crete-maindemo/',
            'import_notice' => __
            ('Before Setup Demo Please Install All Plugin Requireds.Intall Elementor as Page Builder.For Import You Need to wait 3-5 Mintues.', '@@textdomain'),
        ),
        
        
        
         array(
            'import_file_name' => 'Home Two',
            'categories' => array('Elementor'),
            'import_file_url' => 'https://demo-data.nyc3.digitaloceanspaces.com/crete/home-two/sitecontents.xml',
            'import_widget_file_url' => 'https://demo-data.nyc3.digitaloceanspaces.com/crete/home-two/widgets.wie',
            'local_import_csf' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/admin/import/home-two/themeoption.json',
                    'option_name' => 'crete_options',
                ),
            ),
            'import_preview_image_url' => 'https://teconce.files.wordpress.com/2018/07/01mayo2.jpg',
            'preview_url' => 'https://teconce.com/crete-maindemo/',
            'import_notice' => __
            ('Before Setup Demo Please Install All Plugin Requireds.Intall Elementor as Page Builder.For Import You Need to wait 3-5 Mintues.', '@@textdomain'),
        ),
        
        array(
            'import_file_name' => 'Home Three',
            'categories' => array('Elementor'),
            'import_file_url' => 'https://demo-data.nyc3.digitaloceanspaces.com/crete/home-three/sitecontents.xml',
            'import_widget_file_url' => 'https://demo-data.nyc3.digitaloceanspaces.com/crete/home-three/widgets.wie',
            'local_import_csf' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/admin/import/home-three/themeoption.json',
                    'option_name' => 'crete_options',
                ),
            ),
            'import_preview_image_url' => 'https://teconce.files.wordpress.com/2018/07/01mayo2.jpg',
            'preview_url' => 'https://teconce.com/crete-maindemo/',
            'import_notice' => __
            ('Before Setup Demo Please Install All Plugin Requireds.Intall Elementor as Page Builder.For Import You Need to wait 3-5 Mintues.', '@@textdomain'),
        ),
        
        
         array(
            'import_file_name' => 'Home Four',
            'categories' => array('Elementor'),
            'import_file_url' => 'https://demo-data.nyc3.digitaloceanspaces.com/crete/home-four/sitecontents.xml',
            'import_widget_file_url' => 'https://demo-data.nyc3.digitaloceanspaces.com/crete/home-four/widgets.wie',
            'local_import_csf' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/admin/import/home-four/themeoption.json',
                    'option_name' => 'crete_options',
                ),
            ),
            'import_preview_image_url' => 'https://teconce.files.wordpress.com/2018/07/01mayo2.jpg',
            'preview_url' => 'https://teconce.com/crete-maindemo/',
            'import_notice' => __
            ('Before Setup Demo Please Install All Plugin Requireds.Intall Elementor as Page Builder.For Import You Need to wait 3-5 Mintues.', '@@textdomain'),
        ),
        
        
        array(
            'import_file_name' => 'Home Five',
            'categories' => array('Elementor'),
            'import_file_url' => 'https://demo-data.nyc3.digitaloceanspaces.com/crete/home-five/sitecontents.xml',
            'import_widget_file_url' => 'https://demo-data.nyc3.digitaloceanspaces.com/crete/home-five/widgets.wie',
            'local_import_csf' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/admin/import/home-five/themeoption.json',
                    'option_name' => 'crete_options',
                ),
            ),
            'import_preview_image_url' => 'https://teconce.files.wordpress.com/2018/07/01mayo2.jpg',
            'preview_url' => 'https://teconce.com/crete-maindemo/',
            'import_notice' => __
            ('Before Setup Demo Please Install All Plugin Requireds.Intall Elementor as Page Builder.For Import You Need to wait 3-5 Mintues.', '@@textdomain'),
        ),
        
        
        
        




    );
}

add_filter('merlin_import_files', 'crete_merlin_local_import_files');

/**
 * Execute custom code before the whole import has finished.
 */
function crete_merlin_before_import_setup()
{
    update_option('elementor_experiment-container', 'active');
    update_option('elementor_unfiltered_files_upload', 1);
}

add_action('import_start', 'crete_merlin_before_import_setup');
/**
 * Execute custom code after the whole import has finished.
 */
function crete_merlin_after_import_setup()
{
    // Assign menus to their locations.
    $main_menu = get_term_by('name', 'Main Menu', 'nav_menu');
    $top_menu = get_term_by('name', 'Top Left Side Menu', 'nav_menu');


    set_theme_mod('nav_menu_locations', array(
            'main-menu' => $main_menu->term_id,
            'top-menu' => $top_menu->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title('Home');
    $blog_page_id = get_page_by_title('Blog');

    update_option('show_on_front', 'page');
    update_option('page_on_front', $front_page_id->ID);
    update_option('page_for_posts', $blog_page_id->ID);

}

add_action('merlin_after_all_import', 'crete_merlin_after_import_setup');
