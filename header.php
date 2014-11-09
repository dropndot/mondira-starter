<?php 
/**
* 
* Theme default header
* 
* @package WordPress
* @subpackage Mondira
* @since version 1.0.0
* @last update: 10 Nov, 2014
*/
?>
<!doctype html>  
<!-- WordPress Theme Mondira by Mondira (http://mondira.com) -->

<!-- BEGIN html -->
<html <?php language_attributes(); ?>>

<!-- BEGIN head -->
<head>
    
    <!-- Meta Tags -->
    <meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Title -->
    <title><?php wp_title(); ?></title>
    
    <!-- RSS & Pingbacks -->
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    
    <!-- BEGIN Wordpress Head -->
    <?php if ( is_single() ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>  
    <!-- END Wordpress Head -->
    
<!-- END head -->
</head>

<!-- BEGIN body -->
<body <?php body_class(); ?>>
    
	<?php if ( mondira_is_global_loading() ) {  ?>
    <div id="global_loading"></div>
    <?php } ?>
	
	
    <?php if ( mondira_get_option( 'general', 'is_boxed' ) == 'yes' ) {  ?>
    <div id="boxed">
    <?php } ?>
    
		<?php get_header( 'nav' ); ?>
		
		<!-- BEGIN #container -->
		<div id="container" class="page-container">
	