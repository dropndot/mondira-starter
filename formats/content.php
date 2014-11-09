<?php
/**
* 
* This file contains the post content only
* 
* @package WordPress
* @subpackage Mondira
* @since version 1.0.0
* @last update: 10 Nov, 2014
*/    
?>  
    <?php 
	if( !is_singular() ) {
		$blog_index_content_type = mondira_get_option( 'blog', 'blog_index_content_type', 'content' );
		if( $blog_index_content_type == 'content' ) {
			the_content( __( "Continue Reading &#8594;", "mondira" ) . "<span></span>" );    
		} else {
			the_excerpt();     
		}                
	} else {
		the_content( __( "Continue Reading &#8594;", "mondira" ) . "<span></span>" );    
	}
	?>