<?php
/**
* This files contain some function which all are using on widgets
*      
* @package WordPress
* @subpackage Mondira
* @version 1.0
*/

/**
* Enqueuing requried scripts and styles for widget media uploading
*      
* @param empty
* @return void
*/
if( !function_exists( 'mondira_custom_media_uploader' ) ) {
    function mondira_custom_media_uploader() {
        global $pagenow; 
        if( ( $pagenow == 'widgets.php' ) ) {
            wp_enqueue_style( 'thickbox' );
            wp_enqueue_script( 'media-upload' );
            wp_enqueue_script( 'thickbox' );
            wp_enqueue_script( 'mondira-custom-media-uploader', get_template_directory_uri() . '/widgets/js/mondira-custom-widget-media-uploader.js', false, false, true );    
        }
    }
}
add_action( 'admin_enqueue_scripts', 'mondira_custom_media_uploader' );