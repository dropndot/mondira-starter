<?php
/**
* 
* This file contains the link contents for posts
* 
* @package WordPress
* @subpackage Mondira
* @since version 1.0.0
* @last update: 10 Nov, 2014
*/    
?>  
    <!-- BEGIN #post-<?php the_ID(); ?> -->
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post-item' ); ?> role="article">
        
        <?php get_template_part( 'includes/article-post', 'slider' ); ?>    
        
        <?php 
        $url = get_post_meta( get_the_ID(), 'post-link_the_url', true ); 
        if( !empty( $url ) ) {
            ?>
            <blockquote class="quote-post-blockquote"> 
                <a href="<?php echo $url; ?>" target="_blank" class="post-format-ext-link"><?php echo $url; ?></a>
            </blockquote>
            <?php    
        }  
        ?>
        <section class="article-content">
            
            <h2 class="article-header"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            
            <?php get_template_part( 'formats/content-with', 'footer' );  ?>
            
        </section>
        <?php get_template_part( 'includes/block', 'blog-navigation' );  ?>
        <?php 
        if( is_singular() ) {
            get_template_part( 'includes/content', 'comment-form' );  
        }
        ?> 
    
    <!-- END #post-<?php the_ID(); ?> -->        
    </article> 