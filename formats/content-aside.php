<?php
/**
* 
* This file contains the aside contents for posts
* 
* @package WordPress
* @subpackage Mondira
* @since version 1.0.0
* @last update: 10 Nov, 2014
*/    
?>   
    <!-- BEGIN #post-<?php the_ID(); ?> --> 
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post-item' ); ?> role="article">
        
        <section class="article-content">
        
            <?php get_template_part( 'formats/content' );  ?> 
            
        </section>
        <?php get_template_part( 'includes/block', 'blog-navigation' );  ?>
        <?php 
        if( is_singular() ) {
            get_template_part( 'includes/content', 'comment-form' );  
        }
        ?> 
    
    <!-- END #post-<?php the_ID(); ?> -->        
    </article> 
    
                            
                                
            