<?php
/**
* This file contained the contents for blog posts footer
*
* @package WordPress
* @subpackage Mondira
* @since version 1.0.0
* @last update: 10 Nov, 2014
*/
?>

<div class="post-meta">
    <ul>
        <li><a href="<?php the_permalink(); ?>"><time datetime="<?php echo the_time( 'Y-m-d h:i:s' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time></a> <span><?php _e("by", "mondira"); ?>:</span> <?php the_author_posts_link(); ?> <?php comments_popup_link(__('<span class="icon"></span> 0 Comments', 'mondira'), __('<span class="icon">Comments</span> 1', 'mondira'), __('<span class="icon"></span> % Comments', 'mondira')); ?> <span><?php _e("Posted In", "mondira"); ?>:</span> <?php the_category(', '); ?> <?php the_tags('<span class="tags-title">' . __("Tags","mondira") . ':</span> ', ', ', ''); ?></li>
    </ul>
</div>

<?php 
if ( is_singular() ) {
    global $current_user;
    $user_level = $current_user->user_level;
    if( !empty( $user_level ) && $user_level > 0 && is_singular() ) { 
    ?>
		<a href="<?php echo get_edit_post_link(); ?>"> <?php _e( "Edit post", "mondira" ); ?></a>
    <?php 
    } 
}
?>

<?php
$args = array(
    'before' => '<nav class="wp-prev-next post-index-navigation" id="blog-pagination-nav-number"><ul class="pagination">',
    'after' => '</ul></nav>',
    'before_link' => '<li>',
    'after_link' => '</li>',
    'current_before' => '<li class="active">',
    'current_after' => '</li>',
    'previouspagelink' => '&#8592; Previous',
    'nextpagelink' => 'Next &#8594;'
);
 
bootstrap_link_pages( $args );
?>