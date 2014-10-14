<?php
/**
 * Contains methods for customizing the theme customization screen.
 * 
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since Mondira 1.0
 */
class Mondira_Customize {

	/**
    * This hooks into 'customize_register' (available as of WP 3.4) and allows
    * you to add new sections and controls to the Theme Customize screen.
    * 
    * Note: To enable instant preview, we have to actually write a bit of custom
    * javascript. See live_preview() for more.
    *  
    * @see add_action('customize_register',$func)
    * @param \WP_Customize_Manager $wp_customize
    * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
    * @since Mondira 1.0
    */
    public static function register ( $wp_customize ) {
       
		//Global 	
		$wp_customize->add_section( 'global_options', 
			array(
				'title' => __( 'Site Global', 'mondira' ),
				'priority' => 15, 
				'capability' => 'edit_theme_options', 
				'description' => __('Allows you to change some global design settings.', 'mondira'), 
			) 
		);

		$wp_customize->add_setting( 'background_color', 
			array(
				'default' => '', 
				'type' => 'theme_mod',
				'capability' => 'edit_theme_options', 
				'transport' => 'postMessage', 
				'sanitize_callback' => 'mondira_sanitize_string', 
			) 
		);         
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 
			'mondira_background_color', 
			array(
				'label'          => __( 'Background Color', 'mondira' ),
				'section'        => 'global_options',
				'settings'       => 'background_color',  
				'priority' => 5, 
			) 
		));
	  
		$wp_customize->add_setting( 'background_image',
			array(
				'default' => '',
				'type' => 'theme_mod', 
				'capability' => 'edit_theme_options',
				'transport' => 'postMessage',
				'sanitize_callback' => 'mondira_sanitize_string', 
			) 
		); 
		$wp_customize->add_control( new WP_Customize_Image_Control( 
			$wp_customize, 
			'mondira_background_image', 
			array(
				'label' => __( 'Background Image', 'mondira' ),
				'section' => 'global_options',
				'settings' => 'background_image',
				'priority' => 11
			) 
		));

		$wp_customize->add_setting( 'background_position',
			array(
				'default' => 'center',
				'type' => 'theme_mod', 
				'capability' => 'edit_theme_options',
				'transport' => 'postMessage',
				'sanitize_callback' => 'mondira_sanitize_string', 
			) 
		); 
		$wp_customize->add_control( 
			'mondira_background_position', 
			array(
				'label' => __( 'Background Position', 'mondira' ),
				'section' => 'global_options',
				'settings' => 'background_position',
				'type'    => 'select',
				'choices' => array("center"=>"Center", "left"=>"Left", "right"=>"Right"),
				'priority' => 12
			) 
		);

		$wp_customize->add_setting( 'background_repeat',
			array(
				'default' => 'repeat',
				'type' => 'theme_mod', 
				'capability' => 'edit_theme_options',
				'transport' => 'postMessage',
				'sanitize_callback' => 'mondira_sanitize_string', 
			) 
		); 
		$wp_customize->add_control( 
			'mondira_background_repeat', 
			array(
				'label' => __( 'Background Repeat', 'mondira' ),
				'section' => 'global_options',
				'settings' => 'background_repeat',
				'type'    => 'select',
				'choices' => array("no-repeat"=>"No Repeat", "repeat"=>"Tile", "repeat-x"=>"Tile Horizontally", "repeat-y"=>"Tile Vertically"),
				'priority' => 12
			) 
		);

		$wp_customize->add_setting( 'background_attachment',
			array(
				'default' => 'scroll',
				'type' => 'theme_mod', 
				'capability' => 'edit_theme_options',
				'transport' => 'postMessage',
				'sanitize_callback' => 'mondira_sanitize_string', 
			) 
		); 
		$wp_customize->add_control( 
			'mondira_background_attachment', 
			array(
				'label' => __( 'Background Attachment', 'mondira' ),
				'section' => 'global_options',
				'settings' => 'background_attachment',
				'type'    => 'select',
				'choices' => array( "scroll" => "Scroll", "fixed" => "Fixed" ),
				'priority' => 13
			) 
		);
     
		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

		$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
    }

    /**
    * This will output the custom WordPress settings to the live theme's WP head.
    * 
    * Used by hook: 'wp_head'
    * 
    * @see add_action('wp_head',$func)
    * @since Mondira 1.0
    */
    public static function header_output() {
      ?>
      <!--Customizer CSS--> 
      <style type="text/css">
      
           <?php 
           self::generate_css( 'body', 'background', 'background_color', '' ); 
           self::generate_css( 'body', 'background-color', 'background_color', '' ); 
           self::generate_css( 'body', 'background-image', 'background_image', 'url(', ')' ); 
           self::generate_css( 'body', 'background-position', 'background_position' ); 
           self::generate_css( 'body', 'background-repeat', 'background_repeat' ); 
           self::generate_css( 'body', 'background-attachment', 'background_attachment' ); 
		   ?>
           
      </style> 
      <!--/Customizer CSS-->
      <?php
    }
   
    /**
    * This outputs the javascript needed to automate the live settings preview.
    * Also keep in mind that this function isn't necessary unless your settings 
    * are using 'transport'=>'postMessage' instead of the default 'transport'
    * => 'refresh'
    * 
    * Used by hook: 'customize_preview_init'
    * 
    * @see add_action('customize_preview_init',$func)
    * @since Mondira 1.0
    */
    public static function live_preview() {
       
        // Register the script first.
        wp_register_script( 'mondira-themecustomizer', get_template_directory_uri() . '/resources/js/theme-customizer.js?v=2.0', array(  'jquery', 'customize-preview' ), '', true );

        // Localize the script with template uri.
        $translation_array = array( 'template_directory_uri' => get_template_directory_uri() );
        wp_localize_script( 'mondira-themecustomizer', 'theme', $translation_array );

        // The script can be enqueued now or later.
        wp_enqueue_script( 'mondira-themecustomizer' );
      
    }

    /**
     * This will generate a line of CSS for use in header output. If the setting
     * ($mod_name) has no defined value, the CSS will not be output.
     * 
     * @uses get_theme_mod()
     * @param string $selector CSS selector
     * @param string $style The name of the CSS *property* to modify
     * @param string $mod_name The name of the 'theme_mod' option to fetch
     * @param string $prefix Optional. Anything that needs to be output before the CSS property
     * @param string $postfix Optional. Anything that needs to be output after the CSS property
     * @param bool $echo Optional. Whether to print directly to the page (default: true).
     * @return string Returns a single line of CSS with selectors and a property.
     * @since Mondira 1.0
     */
    public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
		$return = '';
		$mod = get_theme_mod( $mod_name );
		if ( ! empty( $mod ) ) {
			$return = sprintf('%s { %s:%s; }', $selector, $style, $prefix.$mod.$postfix );
			if ( $echo ) {
				echo $return;
			}
		}
		return $return;
    }
}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'Mondira_Customize' , 'register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'Mondira_Customize' , 'header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'Mondira_Customize' , 'live_preview' ) );




/**
* Input string sanitization.
*
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014 
* @since Mondira 1.0
*/
function mondira_sanitize_string($input) {
	return strip_tags( $input );
}

/**
* Input int sanitization.
*
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014 
* @since Mondira 1.0
*/
function mondira_sanitize_int($input) {
	return absint( $input );
}
        