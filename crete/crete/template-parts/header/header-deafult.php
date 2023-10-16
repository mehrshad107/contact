<?php

$logo1x= cs_get_option('main-logo','url');
$logo2x= cs_get_option('main-logo-retina','url');
if ($logo2x){
    $logo2x= cs_get_option('main-logo-retina','url');
} else {
     $logo2x= cs_get_option('main-logo','url');
}
?>
<div class="crete-main-header">
<div class="crete--header--container">
	<div class="row align-items-center">
		<div class="col-8 col-md-2">
		
				<div class="crete---site---branding">
					
					<?php if ($logo1x){ ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($logo1x);?>" srcset="<?php echo esc_url($logo1x);?> 1x, <?php echo esc_url($logo2x);?> 2x" alt="logo" class="has-retina"></a>
                    <?php } else {?>
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img src="<?php echo get_template_directory_uri();?>/assets/images/Logo.svg" alt="logo"></a>
                  <?php }?>
				
				</div><!-- .site-branding -->
            </div>
            
            <div class="col-4 col-md-10 d-flex justify-content-end">
                <div class="crete---desktop---nav d-none d-lg-block">
				<nav id="site-navigation" class="main-navigation">
	
					
					 <?php
			wp_nav_menu( array(
				'theme_location' => 'main',
				'menu_id'        => 'primary-menu',
                'container_class'        => 'primary-menu inline-block',
				'menu_class'        => 'crete-main-nav page-dropdown-menu d-flex align-items-center',
                'container_id' => 'cretemenu',
                'walker' => new Crete_Nav_walker(),
                'fallback_cb'    => 'Crete_Nav_walker::fallback',
			) );
			?>
				</nav><!-- #site-navigation -->
				</div>
				
				<div class="crete---mob---nav d-block d-lg-none">
				  <nav  class="mobile----nav---menu pivoo-accordion">
       
                        <?php
        			wp_nav_menu( array(
        				'theme_location' => 'main',
        				'menu_id'        => 'primary-menu-mobile',
                        'container_id' => 'cretemenu',
                        'walker' => new Crete_Accordion_Walker(),
                         'fallback_cb'    => 'Crete_Accordion_Walker::fallback',
                        
        			) );
        			?>
               
                    </nav>
                    
                     <div class="overlaymobile"></div>
                 <div  class="mobile-nav">
                 <span class="burger"><span></span></span>
                 </div >
				</div>
		
		</div>
	</div>
</div>
</div>