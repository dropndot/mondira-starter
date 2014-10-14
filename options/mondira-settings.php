<?php
/*
* 
* $mondira_theme_settings is must be a global variable as we are using it from theme mondira framework
* 
* @package WordPress
* @subpackage Mondira
* @version 1.0
*/

global $mondira_theme_settings; 

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );   
$settings_general = array(
        "name" => __( 'General', 'mondira' ),
        "section" => 'general',
    );
$settins_blog = array(
        "name" => __( 'Blog', 'mondira' ),   
        "section" => 'blog',
    );     
$settins_others = array(
        "name" => __( 'Others', 'mondira' ),   
        "section" => 'others',
    );    
$mondira_settings = array();    
$mondira_settings[] = $settings_general;

if ( is_plugin_active( 'plugins-name/index.php' ) ) {           
    //$mondira_settings[] = $plugins-related-settings;
}
$mondira_settings[] = $settins_blog;
$mondira_settings[] = $settins_others;

$mondira_theme_settings = array(
	'title' => THEME_NAME . ' ' . __( 'Settings', 'mondira' ),
	'list' => $mondira_settings,
);

return $mondira_theme_settings;