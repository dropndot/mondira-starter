<?php
/**
* This file contained the contents for blog navigation
*
* @package WordPress
* @subpackage Mondira
* @since version 1.0.0
* @last update: 10 Nov, 2014
*/
?>
<?php 
if ( is_single()) { 

	$mondira_get_next_post_link = mondira_get_next_post_link( __( '%link', 'mondira' ), '&#8592; %title' );
	$mondira_get_previous_post_link = mondira_get_previous_post_link( __( '%link', 'mondira' ), '%title &#8594;' );

	if ( !empty( $mondira_get_next_post_link ) || !empty( $mondira_get_previous_post_link ) ) {
	?>
	<nav class="wp-prev-next post-index-navigation" id="blog-pagination-nav">

		<ul>
			<?php if ( !empty( $mondira_get_next_post_link ) ) { ?>
			<li class="prev-link"><?php echo $mondira_get_next_post_link; ?> ?></li>
			<?php } ?>
			<?php if ( !empty( $mondira_get_previous_post_link ) ) { ?>
			<li class="next-link"><?php echo $mondira_get_previous_post_link; ?></li>
			<?php } ?>
		</ul>
		
	</nav>
	<?php 
	}
} 
?>