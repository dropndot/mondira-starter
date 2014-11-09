<?php
/**
* This file contained the contents for comment form
*
* @package WordPress
* @subpackage Mondira
* @since version 1.0.0
* @last update: 10 Nov, 2014
*/
?>
<?php 
$suppress_comments_message = mondira_get_option( 'others', 'suppress_comments_message' );  
$suppress_comments_message_portfolio = mondira_get_option( 'portfolio', 'suppress_comments_message' );

$comments_currently_viewing_post_type = get_post_type( get_the_ID() );    

if ( !comments_open() && $comments_currently_viewing_post_type == 'page' && !empty( $suppress_comments_message ) && $suppress_comments_message == 'yes' ) {
?>
    
<?php 
} else if ( !comments_open() && $comments_currently_viewing_post_type == 'portfolio' && !empty( $suppress_comments_message_portfolio ) && $suppress_comments_message_portfolio == 'yes' ) {
?>
    
<?php 
} else if ( ( !comments_open() ) ) {
?>

    <?php 
    if ( $comments_currently_viewing_post_type == 'page') {
    ?>
        <div class="article-wrapper comment-article-wrapper">
            <div class="post-wrapper-inner comment-content-wrapper">
                <div class="comment-content">
                    <div class="alert alert-info"><?php _e( "Comments are closed.", "mondira" ); ?></div>
		        </div>
            </div>
        <!-- END .article-wrapper .comment-article-wrapper -->
        </div>
    <?php 
    } else {
	?>
		<div class="alert alert-info"><?php _e( "Comments are closed.", "mondira" ); ?></div>
	<?php 
    }
    ?>
<?php 
} else {
?>

    <div class="article-wrapper comment-article-wrapper">
        <div class="post-wrapper-inner comment-content-wrapper">
            <div class="comment-content">
                <?php comments_template( '', true ); ?>
            </div>
        </div>
    <!-- END .article-wrapper .comment-article-wrapper -->
    </div>
    
<?php } ?>