<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
function crete_welcome_page(){
    require_once 'crete-welcome.php';
}

function crete_admin_menu(){
    if ( current_user_can( 'edit_theme_options' ) ) {
        add_menu_page( 'Crete', 'Crete', 'administrator', 'crete-admin-menu', 'crete_welcome_page',  CRETE_URL .'/assets/images/admin-logo.svg', 4 );
        add_submenu_page( 'crete-admin-menu', 'crete', esc_html__('Welcome','crete'), 'administrator', 'crete-admin-menu', 'crete_welcome_page',0 );
      
        
        
     
    }
}

add_action( 'admin_menu', 'crete_admin_menu' );
