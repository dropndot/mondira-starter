<?php 
/**
* 
* Theme default header area with logo and main navigation
* 
* @package WordPress
* @subpackage Mondira
* @since version 1.0.0
* @last update: 10 Nov, 2014
*/

global $header_enable_transparent_header;

$logo_height = mondira_get_option( 'general', 'logo_height', '32' );
$header_padding = mondira_get_option( 'general', 'header_padding', '30' );
$header_resize_on_scroll = mondira_get_option( 'general', 'header_resize_on_scroll', 'no' );
?>

<div id="header-space"></div>

<div id="header-wrapper" data-resize-header-on-scroll="<?php echo $header_resize_on_scroll; ?>" data-logo-height="<?php echo $logo_height; ?>" data-header-padding="<?php echo $header_padding; ?>">

    <header id="header">
	
		<div class="container">
		
			<div class="row">
				<div class="col-lg-4 pull-left">
					
					<div class="logo">
						<?php 
						if( mondira_get_option( 'general', '_use_image_logo' ) != 'yes' ) { 
						?>
							<h2><a href="<?php echo home_url(); ?>" class="plain-logo" id="plain-logo"><?php bloginfo( 'name' ); ?></a></h2>
						<?php 
						} else if ( mondira_get_option( 'general', 'logo_image' ) ) { 
						?>
							<a href="<?php echo home_url(); ?>"><img  data-sticky-logo="<?php echo mondira_get_option( 'general', 'logo_image_sticky' ); ?>" src="<?php echo mondira_get_option('general', 'logo_image'); ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
						<?php 
						} else { 
						?>    
							<a href="<?php echo home_url(); ?>"><img data-sticky="<?php echo get_template_directory_uri(); ?>/resources/images/logo.png" src="<?php echo get_template_directory_uri(); ?>/resources/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
						<?php 
						} 
						?>
						
						<?php 
						$tagline = get_bloginfo( 'description' ); 
						if( $tagline != '' ) { 
						?>
							<p id="tagline" class="global-header-text-color tagline"><?php echo stripslashes( $tagline ); ?></p>
						<?php 
						} 
						?>
					</div>
					
				</div>
				<div class="col-lg-8 pull-right">
					<!-- BEGIN .header-inner -->
					<div class="header-inner">
						
						<div class="navbar-header">
							<!-- Brand and toggle get grouped for better mobile display -->
							<button type="button" class="navbar-toggle btn btn-primary btn-menu-primary hide-on-large-devices" data-toggle="collapse" data-target="#mobile-menu">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>  
						
						<nav class="navigation" role="navigation">
							
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="main-primary-menu">
								<?php 
								$has_enabled_main_menu = false; 
								$menu_location = 'primary';
								$menu_locations = get_nav_menu_locations();
								$menu_object = ( isset( $menu_locations[ $menu_location ] ) ? wp_get_nav_menu_object( $menu_locations[ $menu_location ] ) : null );
								if( $menu_object ) {
									$has_enabled_main_menu = true;
								}
								
								if( $has_enabled_main_menu ) { 
									wp_nav_menu( 
										array( 
											'theme_location' => 'primary',
											'container' => '',
											'menu_id' => 'primary-menu',
											'fallback_cb' => 'wp_page_menu',
											'walker' => new mondira_add_span_bottom_walker,
											'depth' => '3',
										)
									);
								} else {
									wp_nav_menu( 
										array( 
											'theme_location' => 'primary',
											'container' => '',
											'menu_id' => 'primary-menu',
											'depth' => '3',
										)
									);
								}
								?>
							</div><!-- /.navbar-collapse -->
						
						</nav>
						
					<!-- END .header-inner -->    
					</div>
				</div>
			</div>
			
		</div>
   
    </header>

</div>


<div id="mobile-menu" class="collapse">
    
    <div class="container">
        
        <?php 
        $has_enabled_main_menu = false; 
        $menu_location = 'primary';
        $menu_locations = get_nav_menu_locations();
        $menu_object = ( isset( $menu_locations[ $menu_location ] ) ? wp_get_nav_menu_object( $menu_locations[ $menu_location ] ) : null );
        if( $menu_object ) {
            $has_enabled_main_menu = true;
        }
        
        if( $has_enabled_main_menu ) { 
            wp_nav_menu( 
                array( 
                    'theme_location' => 'primary',
                    'menu' => 'Primary', 
                    'container' => '',
                    'menu_id' => 'mobile-primary-menu',
                    'fallback_cb' => 'wp_page_menu',
                    'walker' => new mondira_add_span_bottom_walker,
                    'depth' => '3',
                )
            );
        } else {
            wp_nav_menu( 
                array( 
                    'theme_location' => 'primary',
                    'menu' => 'Primary', 
                    'container' => '',
                    'menu_id' => 'mobile-primary-menu',
                    'depth' => '3',
                )
            );
        }   
        ?> 
        
    </div>
    
</div>	