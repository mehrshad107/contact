<?php
/**
 * Merlin WP configuration file.
 *
 * @package   Merlin WP
 * @version   @@pkg.version
 * @link      https://merlinwp.com/
 * @author    Rich Tabor, from ThemeBeans.com & the team at ProteusThemes.com
 * @copyright Copyright (c) 2018, Merlin WP of Inventionn LLC
 * @license   Licensed GPLv3 for Open Source Use
 */

if ( ! class_exists( 'Merlin' ) ) {
	return;
}

/**
 * Set directory locations, text strings, and settings.
 */
$wizard = new Merlin(

	$config = array(
		'directory'            => 'inc/admin/merlin', // Location / directory where Merlin WP is placed in your theme.
		'merlin_url'           => 'crete-wizard', // The wp-admin page slug where Merlin WP loads.
		'parent_slug'          => 'crete-admin-menu', // The wp-admin parent page slug for the admin menu item.
		'capability'           => 'manage_options', // The capability required for this menu to be displayed to the user.
		'child_action_btn_url' => 'https://codex.wordpress.org/child_themes', // URL for the 'child-action-link'.
		'dev_mode'             => true, // Enable development mode for testing.
		'license_step'         => false, // EDD license activation step.
		'license_required'     => false, // Require the license activation step.
		'license_help_url'     => '', // URL for the 'license-tooltip'.
		'edd_remote_api_url'   => '', // EDD_Theme_Updater_Admin remote_api_url.
		'edd_item_name'        => '', // EDD_Theme_Updater_Admin item_name.
		'edd_theme_slug'       => '', // EDD_Theme_Updater_Admin item_slug.
		'ready_big_button_url' => '', // Link for the big button on the ready step.
	),
	$strings = array(
		'admin-menu'               => esc_html__( 'Crete Setup', 'crete' ),

		/* translators: 1: Title Tag 2: Theme Name 3: Closing Title Tag */
		'title%s%s%s%s'            => esc_html__( '%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', 'crete' ),
		'return-to-dashboard'      => esc_html__( 'Return to the dashboard', 'crete' ),
		'ignore'                   => esc_html__( 'Disable crete wizard', 'crete' ),

		'btn-skip'                 => esc_html__( 'Skip', 'crete' ),
		'btn-next'                 => esc_html__( 'Next', 'crete' ),
		'btn-start'                => esc_html__( 'Start', 'crete' ),
		'btn-no'                   => esc_html__( 'Cancel', 'crete' ),
		'btn-plugins-install'      => esc_html__( 'Install', 'crete' ),
		'btn-child-install'        => esc_html__( 'Install', 'crete' ),
		'btn-content-install'      => esc_html__( 'Install', 'crete' ),
		'btn-import'               => esc_html__( 'Import', 'crete' ),
		'btn-license-activate'     => esc_html__( 'Activate', 'crete' ),
		'btn-license-skip'         => esc_html__( 'Later', 'crete' ),

		/* translators: Theme Name */
		'license-header%s'         => esc_html__( 'Activate %s', 'crete' ),
		/* translators: Theme Name */
		'license-header-success%s' => esc_html__( '%s is Activated', 'crete' ),
		/* translators: Theme Name */
		'license%s'                => esc_html__( 'Enter your license key to enable remote updates and theme support.', 'crete' ),
		'license-label'            => esc_html__( 'License key', 'crete' ),
		'license-success%s'        => esc_html__( 'The theme is already registered, so you can go to the next step!', 'crete' ),
		'license-json-success%s'   => esc_html__( 'Your theme is activated! Remote updates and theme support are enabled.', 'crete' ),
		'license-tooltip'          => esc_html__( 'Need help?', 'crete' ),

		/* translators: Theme Name */
		'welcome-header%s'         => esc_html__( 'Welcome to %s', 'crete' ),
		'welcome-header-success%s' => esc_html__( 'Hi. Welcome back', 'crete' ),
		'welcome%s'                => esc_html__( 'This wizard will set up crete theme, install plugins, and import content. It is optional & should take only a few minutes.', 'crete' ),
		'welcome-success%s'        => esc_html__( 'You may have already run crete theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', 'crete' ),

		'child-header'             => esc_html__( 'Install Crete Child Theme', 'crete' ),
		'child-header-success'     => esc_html__( 'You\'re good to go!', 'crete' ),
		'child'                    => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', 'crete' ),
		'child-success%s'          => esc_html__( 'Your child theme has already been installed and is now activated, if it wasn\'t already.', 'crete' ),
		'child-action-link'        => esc_html__( 'Learn about child themes', 'crete' ),
		'child-json-success%s'     => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', 'crete' ),
		'child-json-already%s'     => esc_html__( 'Awesome. Your child theme has been created and is now activated.', 'crete' ),

		'plugins-header'           => esc_html__( 'Install Plugins', 'crete' ),
		'plugins-header-success'   => esc_html__( 'You\'re up to speed!', 'crete' ),
		'plugins'                  => esc_html__( 'Let\'s install some essential WordPress plugins to get your site up to speed.', 'crete' ),
		'plugins-success%s'        => esc_html__( 'The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', 'crete' ),
		'plugins-action-link'      => esc_html__( 'Advanced', 'crete' ),

		'import-header'            => esc_html__( 'Import Demo Content', 'crete' ),
		'import'                   => esc_html__( 'Let\'s import content to your website, to help you get familiar with the theme.Choose Your Preferred demo from below.', 'crete' ),
		'import-action-link'       => esc_html__( 'Advanced', 'crete' ),

		'ready-header'             => esc_html__( 'All done. Have fun!', 'crete' ),

		/* translators: Theme Author */
		'ready%s'                  => esc_html__( 'Your theme has been all set up. Enjoy your new theme by %s.', 'crete' ),
		'ready-action-link'        => esc_html__( 'Extras', 'crete' ),
		'ready-big-button'         => esc_html__( 'View your website', 'crete' ),
		'ready-link-1'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://wordpress.org/support/', esc_html__( 'Explore WordPress', 'crete' ) ),
		'ready-link-2'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://teconce.com/support/', esc_html__( 'Get Theme Support', 'crete' ) ),
		'ready-link-3'             => sprintf( '<a href="%1$s">%2$s</a>', admin_url( 'customize.php' ), esc_html__( 'Start Customizing', 'crete' ) ),
	)
);
