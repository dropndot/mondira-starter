<?php
/**
* All are unique here for only mondira wordpress theme!
* Register our sidebars and widgetized areas.
*
* @package WordPress
* @subpackage Mondira
* @author Jewel Ahmed <tojibon@gmail.com>
* @copyright http://codeatomic.com
* @since version 1.0.0
* @last modified: 14 Oct, 2014
*/

if ( !function_exists("mondira_widgets_init")){
    function mondira_widgets_init() {
        register_sidebar(array(
            'name' => __( 'Main Sidebar', 'mondira' ),
            'id' => 'main-sidebar',   
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div><div class="widget-divider"></div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3><div class="clearfix"></div>',
        ));
        
		//Registering plugins dependent sidebars.
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
        if ( is_plugin_active( 'plugins-name/index.php' ) ) { 
            //Register plugins dependent sidebars. 
        }
    }
}
add_action( 'widgets_init', 'mondira_widgets_init' );


//Registering Primary Menu
register_nav_menu('primary', 'Primary Menu');


//Loading textdomain 
load_theme_textdomain( 'mondira', get_template_directory() . '/lang' );

/*
---------------------------------------------------------------------------------------
    Loading and initializing theme framework and core files
---------------------------------------------------------------------------------------
*/
require_once( get_template_directory() . '/functions/core/mondira.php' );  
$theme = new Mondira();
$theme->init(array(
    'theme_name' => get_bloginfo( 'name' ),// 'Mondira', 
    'theme_slug' => 'Mondira',
    'settings_available' => true,
    'documentation_available' => true
));
require_once( get_template_directory() . '/widgets/widgets.php' );
require_once( get_template_directory() . '/functions/theme-functions.php' );
require_once( get_template_directory() . '/functions/theme-support.php' );
require_once( get_template_directory() . '/functions/theme-customizations.php' );
require_once( get_template_directory() . '/functions/theme-options.php' );              
require_once( get_template_directory() . '/functions/theme-shortcodes.php' );          
require_once( get_template_directory() . '/functions/lib/required-plugins.php' );            

// enqueue all required styles for mondira
if( !function_exists( "mondira_theme_styles" ) ) {  
    function mondira_theme_styles() { 
        global $wp, $post;
        
        if ( is_admin() ) { return false; }
        
        //registering and enqueing all theme required css
        if ( false ) { //If you have any other conditions to skip default resource loading

        } else {        
            wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/resources/lib/bootstrap/css/bootstrap.css', array(), '1.0', 'all' );
            wp_enqueue_style( 'mondira-styles', get_stylesheet_uri(), array(), '1.0', 'all' );    //Main theme stylesheet
        } 
    }
}
add_action( 'wp_enqueue_scripts', 'mondira_theme_styles' );


// enqueue all required javascript for mondira
if( !function_exists( "mondira_theme_js" ) ) {  
    function mondira_theme_js(){
        global $wp;
        
        if ( is_admin() ) { return false; }
        
        //registering and enqueing all theme required jacvascripts  
        wp_enqueue_script( 'jquery' );
        if ( false ) { //If you have any other conditions to skip default resource loading

        } else {
            wp_enqueue_script( 'jquery-ui-core', false, array('jquery'), '1.0', true );
            wp_enqueue_script( 'jquery-ui-menu', false, array('jquery'), '1.0', true );
            wp_enqueue_script( 'jquery-effects-core', false, array('jquery'), '1.0', true );
            wp_enqueue_script( 'modernizr-js', get_template_directory_uri() . '/resources/lib/modernizr-2.8.0.min.js', array('jquery'), '2.0', true );
            wp_enqueue_script( 'smooth-scroll-js', get_template_directory_uri() . '/resources/lib/smooth-scroll.min.js', array('jquery'), '1.2' );    
            wp_enqueue_script( 'jquery-parallax-js', get_template_directory_uri() . '/resources/lib/jquery.parallax.js', array('jquery'), '1.2' );    
            wp_enqueue_script( 'jquery-nicescroll-js', get_template_directory_uri() . '/resources/lib/jquery.nicescroll.js', array('jquery'), '1.2' );    
            wp_enqueue_script( 'jquery-jquery.sizes-js', get_template_directory_uri() . '/resources/lib/jquery.sizes.js', array('jquery'), '1.2' );    
            wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/resources/lib/bootstrap/js/bootstrap.min.js', array('jquery'), '1.2', true );
            wp_enqueue_script( 'flowtype-js', get_template_directory_uri() .'/resources/lib/flowtype.js', array('jquery'), '2.1', true );
            
			
			wp_enqueue_script( 'mondira-custom-js', get_template_directory_uri() . '/resources/js/custom.js', array('jquery'), '1.3', true ); //Mondira custm javascript
            wp_localize_script( 'mondira-custom-js', 'Mondira', array(
				'ajaxurl' => admin_url('admin-ajax.php')
			));
        }
    }
}
add_action( 'wp_enqueue_scripts', 'mondira_theme_js' );



/**
* Set up the content width value based on the theme's design.
*
* @see mondira_content_width()
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014
* @since Mondira 1.0.0
*/
if ( ! isset( $content_width ) ) {
    $content_width = 1160;
}

/**
* Adjust content_width value for other template.
*
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014
* @since Mondira 1.0.0
*/
function mondira_content_width() {
    global $content_width, $post;
    
    $post_type = get_post_type($post);
    
    if ( is_singular() && $post_type == 'page' ) { //Default Page Layout  like contact, archive etc
        if( mondira_is_wide_layout() ){
            $content_width = 1160;
        } else {
            $content_width = 1160;
        }
    }
}
add_action( 'template_redirect', 'mondira_content_width' );