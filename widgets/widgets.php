<?php
/**
* The page contain the list of theme widgets and it required files
*      
* @package WordPress
* @subpackage Mondira
* @version 1.0.0
*/
include_once( get_template_directory() . '/widgets/functions.php' ); 
include_once( get_template_directory() . '/widgets/classes/mondira_flickr_widget.php' ); 
include_once( get_template_directory() . '/widgets/classes/mondira_video_widget.php' ); 
include_once( get_template_directory() . '/widgets/classes/mondira_custom_image_widget.php' ); 
include_once( get_template_directory() . '/widgets/classes/mondira_twitter_tweets.php' );

//Registering plugins dependent widgets.
include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
if ( is_plugin_active( 'plugins-name/index.php' ) ) { 
    //Register plugins dependent widgets. 
}
