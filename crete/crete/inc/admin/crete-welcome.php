<?php
function crete_let_to_num( $size ) {
  $l   = substr( $size, -1 );
  $ret = substr( $size, 0, -1 );
  switch ( strtoupper( $l ) ) {
    case 'P':
      $ret *= 1024;
    case 'T':
      $ret *= 1024;
    case 'G':
      $ret *= 1024;
    case 'M':
      $ret *= 1024;
    case 'K':
      $ret *= 1024;
  }
  return $ret;
}
$ssl_check = 'https' === substr( get_home_url(), 0, 5 );
$green_mark = '<mark class="green"><span class="dashicons dashicons-yes"></span></mark>';

$cretetheme = wp_get_theme();

$plugins_counts = (array) get_option( 'active_plugins', array() );

if ( is_multisite() ) {
	$network_activated_plugins = array_keys( get_site_option( 'active_sitewide_plugins', array() ) );
	$plugins_counts            = array_merge( $plugins_counts, $network_activated_plugins );
}
?>

<div class="wrap about-wrap crete-wrap">
    <h1><?php _e( 'Welcome to Crete', 'crete' ); ?></h1>

    <div class="about-text"><?php echo esc_html__( 'Crete theme is now installed and ready to use!', 'crete' ); ?></div>
<div class="crete-badge">
    <img src="<?php echo get_template_directory_uri();?>/assets/images/admin-logo-color.svg" alt="crete admin logo">
    
    <p><?php echo esc_html($cretetheme->get( 'Version' )); ?></p>
</div>
    <h2 class="nav-tab-wrapper">
        <?php
        printf( '<a href="#" class="nav-tab nav-tab-active">%s</a>', __( 'Welcome', 'crete' ) );
      if(class_exists('Crete_Core')){
         printf( '<a href="admin.php?page=crete_options" class="nav-tab">%s</a>', __( 'Theme Options', 'crete' ) );
      }
       
        printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=crete-wizard&step=content' ), __( 'Demo Import', 'crete' ) );
        ?>
    </h2>
    
   
    <div class="crete-section nav-tab-active" id="welcome">
        <p class="about-description">
            <?php printf( __( 'Before you get started, please be sure to always check out documentation Which Included In the theme folder or from <a href="https://docs.teconce.com/tecdocs/crete-landing-page-wordpress-theme/" target="_blank">Website</a>. We outline all kinds of good information and provide you with all the details you need to use crete.', 'crete')); ?>
        </p>
        <p class="about-description">
            <?php printf( __( 'If you are unable to find your answer in our documentation, please contact us via  <a href="https://teconce.ticksy.com/" target="_blank">submit a ticket</a> with your purchase code, site CPanel, and admin login info.', 'crete'), 'mailto:hello@teconce.com'); ?>
        </p>
        <p class="about-description">
            <?php printf( __( 'We are very happy to help you and you will get the reply from us  faster than you expected.', 'crete'), 'https://docs.teconce.com/tecdocs/crete-landing-page-wordpress-theme/'); ?>
        </p>
        
        <p class="about-description">
            <?php printf( __( 'Note: Please Install All Required Plugins Before Install Demo !', 'crete'), 'https://docs.teconce.com/tecdocs/crete-landing-page-wordpress-theme/'); ?>
        </p>
    </div>
    <div class="crete-thanks">
        <p class="description"><?php esc_html_e('Thank you for using','crete');?> <strong><?php esc_html_e('Crete','crete');?></strong> <?php esc_html_e('theme!','crete');?> <?php esc_html_e('Powered by','crete');?> <a href="<?php echo esc_url('https://teconce.com');?>" target="_blank"><?php esc_html_e('Teconce','crete');?></a></p>
    </div>
    
    
    <div class="crete-system-stats">
        <h3>System Status</h3>

    <table class="system-status-table">
        <tbody>
                     <tr>
							<td><?php esc_html_e( 'WP Version', 'crete' ); ?></td>
							<td><?php bloginfo('version'); ?></td>
						</tr>
						
						<tr>
							<td><?php esc_html_e( 'Language', 'crete' ); ?></td>
							<td><?php echo get_locale() ?></td>
						</tr>
						
						<tr>
							<td><?php esc_html_e( 'WP Memory Limit', 'crete' ); ?></td>
							<td><?php
								$memory = crete_let_to_num( WP_MEMORY_LIMIT );

								if ( $memory < 100663296 ) {
									echo '<mark class="error">' . sprintf(esc_html__('%s - We recommend setting memory to at least 96MB. %s.','crete'), size_format( $memory ), '<a href="' . esc_url('https://www.youtube.com/watch?v=bbMtKP7stRI') . '" target="_blank">'.esc_html__('More info','crete').'</a>') . '</mark>';
								} else {
									echo '<mark class="green">' . size_format( $memory ) . '</mark>';
								}
							?></td>
						</tr>
						
						
						
						<tr>
							<td><?php esc_html_e( 'PHP Max Input Vars', 'crete' ); ?></td>
							<td><?php
								$max_input = ini_get('max_input_vars');
								if ( $max_input < 3000 ) {
									echo '<mark class="error">' . sprintf( wp_kses(__( '%s - We recommend setting PHP max_input_vars to at least 3000. See: <a href="%s" target="_blank">Increasing the PHP max vars limit</a>', 'crete' ), array( 'a' => array( 'href' => array(),'target' => array() ) ) ), $max_input, 'https://www.youtube.com/watch?v=bbMtKP7stRI' ) . '</mark>';
								} else {
									echo '<mark class="green">' . $max_input . '</mark>';
								}
							?></td>
						</tr>
						<tr>
						  <td>
						     <?php esc_html_e( 'PHP Version', 'crete' ); ?> 
						  </td>
						  
						  <td>
						 <?php
					
							$mayo_php = phpversion();

						if ( version_compare( $mayo_php, '7.2', '<' ) ) {
								echo sprintf( '<mark class="error"> %s </mark> - We recommend using PHP version 7.2 or above for greater performance and security.', esc_html( $mayo_php ), '' );
							} else {
								echo '<mark class="green">' . esc_html( $mayo_php ) . '</mark>';
							}
						
					?>
						</td>
						</tr>
						
					
						
						<tr>
						    <td>
						        <?php esc_html_e( 'Secure Connection(HTTPS)', 'crete' ); ?> 
						    </td>
						    <td>
						        <?php 
						        echo esc_attr($ssl_check) ? $green_mark : '<mark class="error">Your site is not using secure connection (HTTPS).</mark>'; ?>
						    </td>
						</tr>
						
				</tbody>		
    </table>
        </div>
        
         <div class="crete-system-stats">
        <h3>Theme Information</h3>

    <table class="system-status-table">
        <tbody>
            <tr>
                <td><?php esc_html_e( 'Theme Name', 'crete' ); ?></td>
                <td><?php echo wp_get_theme(); ?></td>
            </tr>
            
             <tr>
                <td><?php esc_html_e( 'Author Name', 'crete' ); ?></td>
                <td><?php echo maybe_unserialize($cretetheme->get( 'Author' )); ?></td>
            </tr>
            
            <tr>
					<td><?php esc_html_e( 'Current Version', 'crete' ); ?></td>
					<td><?php echo esc_html($cretetheme->get( 'Version' )); ?></td>
				</tr>
				
				  <tr>
					<td><?php esc_html_e( 'Text Domain', 'crete' ); ?></td>
					<td><?php echo esc_html($cretetheme->get( 'TextDomain' )); ?></td>
				</tr>
				
				<tr>
				    <td><?php esc_html_e( 'Child Theme', 'crete' ); ?></td>
					<td><?php echo is_child_theme() ? $green_mark : 'No'; ?></td>
				</tr>
				</tbody>
				</table>
	</div>
	
        <div class="crete-system-stats">
            <h3>Active Plugins (<?php echo count( $plugins_counts ); ?>)</h3>
        <table class="system-status-table">
			<tbody>
			<?php
			foreach ( $plugins_counts as $plugin ) {
	
				$plugin_info    = @get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin );
				$dirname        = dirname( $plugin );
				$version_string = '';
				$network_string = '';
	
				if ( ! empty( $plugin_info['Name'] ) ) {
	
					// Link the plugin name to the plugin url if available.
					$plugin_name = esc_html( $plugin_info['Name'] );
	
					if ( ! empty( $plugin_info['PluginURI'] ) ) {
						$plugin_name = '<a href="' . esc_url( $plugin_info['PluginURI'] ) . '" target="_blank">' . $plugin_name . '</a>';
					}
	
					?>
					<tr>
					    <?php
					    $allowed_html = [
                            'a'      => [
                                'href'  => [],
                                'title' => [],
                            ],
                            'br'     => [],
                            'em'     => [],
                            'strong' => [],
                        ];
					    ?>
						<td><?php echo wp_kses($plugin_name,$allowed_html); ?></td>
						<td><?php echo sprintf( 'by %s', $plugin_info['Author'] ) . ' &ndash; ' . esc_html( $plugin_info['Version'] ) . $version_string . $network_string; ?></td>
					</tr>
					<?php
				}
			}
			?>
			</tbody>
		</table>

		</div>
</div>

