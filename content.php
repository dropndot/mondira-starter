<?php
/**
* This file contains the styling for standard post content display. 
*      
* @package WordPress
* @subpackage Mondira
* @since version 1.0.0
* @last update: 10 Nov, 2014
*/  
?>    
    <article id="post-<?php the_ID(); ?>" <?php post_class( ' blog-post-item ' ); ?> role="article">
        
        <?php get_template_part( 'includes/article-post', 'slider' ); ?>    
            
        <section class="article-content">
            
            <h2 class="article-header"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            
            <?php get_template_part( 'fotmats/content-with', 'footer' );  ?>
            
        </section>
        <?php get_template_part( 'includes/block', 'blog-navigation' );  ?>
        <?php 
        if( is_singular() ){
            get_template_part( 'includes/content', 'comment-form' );  
        }
        ?>  
            
    </article> 