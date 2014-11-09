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
	
		<!-- Fixed navbar -->
		<nav class="navbar navbar-default" role="navigation">
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>

				<div class="logo">
					<a href="<?php echo home_url(); ?>" class="navbar-brand">
					<?php 
					if( mondira_get_option( 'general', '_use_image_logo' ) != 'yes' ) { 
					?>
						<?php bloginfo( 'name' ); ?>
					<?php 
					} else if ( mondira_get_option( 'general', 'logo_image' ) ) { 
					?>
						<img  data-sticky-logo="<?php echo mondira_get_option( 'general', 'logo_image_sticky' ); ?>" src="<?php echo mondira_get_option('general', 'logo_image'); ?>" alt="<?php bloginfo( 'name' ); ?>"/>
					<?php 
					} else { 
					?>    
						<img data-sticky="<?php echo get_template_directory_uri(); ?>/resources/images/logo.png" src="<?php echo get_template_directory_uri(); ?>/resources/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" />
					<?php 
					} 
					?>
					</a>
				</div>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
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
							'theme_location'  => 'primary',
							'menu_class'      => 'nav navbar-nav navbar-right',
							'menu_id'         => 'primary-menu',
							'walker' 		  => new Mondira_Bootstrap_Walker,
							'depth'           => 3
						)
					);
				} else {
					wp_nav_menu( 
						array( 
							'menu_class'      => 'nav navbar-nav navbar-right',
							'menu_id'         => 'primary-menu',
							'fallback_cb'     => 'mondira_wp_page_menu',
							'depth'           => 3
						)
					);
				}
				?>
				  <!--/ <ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
					<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
					  <ul class="dropdown-menu" role="menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li class="divider"></li>
						<li class="dropdown-header">Nav header</li>
						<li><a href="#">Separated link</a></li>
						<li><a href="#">One more separated link</a></li>
					  </ul>
					</li>
				  </ul> -->
			</div><!--/.nav-collapse -->
		  </div>
		</nav>
		
    </header>

</div>