<?php
/**
* This file contained the contents for blog index navigation
*
* @package WordPress
* @subpackage Mondira
* @since version 1.0.0
* @last update: 10 Nov, 2014
*/
?>
<?php
$blog_pagination_style = mondira_get_option( 'blog', 'pagination_type', 'next-prev' );
?>
<div class="post-index-navigation-wrapper">
<?php if ( !empty( $blog_pagination_style ) && $blog_pagination_style == 'number' ) { ?>
	<nav class="wp-prev-next post-index-navigation" id="blog-pagination-nav-number">
		<?php mondira_pagination(); ?>
    </nav>
<?php } else if ( !empty( $blog_pagination_style ) && $blog_pagination_style == 'next-prev' ) { ?>
	<?php 
	$mondira_get_next_posts_link = mondira_get_next_posts_link( __( '&#8592; Older Entries', 'mondira' ) );
	$mondira_get_previous_posts_link = mondira_get_previous_posts_link( __( 'Newer Entries &#8594;', 'mondira' ) );

	if ( !empty( $mondira_get_next_posts_link ) || !empty( $mondira_get_previous_posts_link ) ) {
	?>
    <nav class="wp-prev-next post-index-navigation" id="blog-pagination-nav">
        <ul class="clearfix">
			<?php if ( !empty( $mondira_get_next_posts_link ) ) { ?>
            <li class="prev-link"><?php echo $mondira_get_next_posts_link; ?></li>
			<?php } ?>
			<?php if ( !empty( $mondira_get_previous_posts_link ) ) { ?>
            <li class="next-link"><?php echo $mondira_get_previous_posts_link; ?></li>
			<?php } ?>
        </ul>
    </nav>
	<?php 
	}
	?>
<?php } ?>
</div>