<?php
/**
* This file contains the styling for comments display. 
*      
* @package WordPress
* @subpackage Mondira
* @since version 1.0.0
* @last update: 10 Nov, 2014
*/

if ( !empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( _( 'Please do not load this page directly. Thanks!', 'mondira' ) );
}

if ( post_password_required() ) { 
    ?>
        <div class="alert alert-info"><?php _e( "This post is password protected. Enter the password to view comments.", "mondira" ); ?></div>
    <?php 
    return;
}
?>

<?php if ( have_comments() ) : ?>

	<?php if ( !empty( $comments_by_type['comment'] ) ) : ?>
    
	    <h3 id="comments"><?php comments_number( '<span>' . __( "No", "mondira" ) . '</span> ' . __( "Responses", "mondira" ) . '', '<span>' . __( "One", "mondira" ) . '</span> ' . __( "Response", "mondira" ) . '', '<span>%</span> ' . __( "Comments", "mondira" ) );?></h3>

		<?php 
		$mondira_get_previous_comments_link = mondira_get_previous_comments_link( __( "Older comments", "mondira" ) );
		$mondira_get_next_comments_link = mondira_get_next_comments_link( __( "Newer comments", "mondira" ) );
		if ( !empty( $mondira_get_previous_comments_link ) || !empty( $mondira_get_next_comments_link ) ) {
		?>
	    <nav class="comment-nav">
		    <ul class="clearfix">
				<?php if ( !empty( $mondira_get_previous_comments_link ) ) { ?>
	  		    <li><?php echo $mondira_get_previous_comments_link; ?></li>
				<?php } ?>
				<?php if ( !empty( $mondira_get_next_comments_link ) ) { ?>
	  		    <li><?php echo $mondira_get_next_comments_link; ?></li>
				<?php } ?>
	 	    </ul>
	    </nav>
		<?php 
		}
		?>
	    
        <ol class="commentlist"><?php wp_list_comments( array( 'avatar_size' => '60', 'type' => 'comment' ) ); ?></ol>
	
	<?php endif; ?>
	
	<?php if ( ! empty( $comments_by_type['pings'] ) ) : ?>
    
		<h3 id="pings"><?php _e( "Trackbacks/Pingbacks", "mondira" ); ?></h3>
		
		<ol class="pinglist"><?php wp_list_comments( 'type=pings' ); ?></ol>
        
	<?php endif; ?>
	
		<?php 
		$mondira_get_previous_comments_link = mondira_get_previous_comments_link( __( "Older comments", "mondira" ) );
		$mondira_get_next_comments_link = mondira_get_next_comments_link( __( "Newer comments", "mondira" ) );
		if ( !empty( $mondira_get_previous_comments_link ) || !empty( $mondira_get_next_comments_link ) ) {
		?>
		<nav class="comment-nav">
			<ul class="clearfix">
				<?php if ( !empty( $mondira_get_previous_comments_link ) ) { ?>
				<li><?php echo $mondira_get_previous_comments_link; ?></li>
				<?php } ?>
				<?php if ( !empty( $mondira_get_next_comments_link ) ) { ?>
				<li><?php echo $mondira_get_next_comments_link; ?></li>
				<?php } ?>
			</ul>
		</nav>
		<?php 
		}
		?>
  
	<?php else : ?>

	    <?php if ( comments_open() ) : ?>

	    <?php else : ?>
	
	        <?php
            $suppress_comments_message = mondira_get_option( 'others', 'suppress_comments_message' );
		    $suppress_comments_message_portfolio = mondira_get_option( 'portfolio', 'suppress_comments_message' );
		    if( ( is_page() && !empty( $suppress_comments_message ) && $suppress_comments_message=='yes' ) || ( get_post_type( get_the_ID() ) == 'portfolio' && !empty( $suppress_comments_message_portfolio ) && $suppress_comments_message_portfolio == 'yes' ) ) : ?>
        
            <?php else : ?>

			    <p class="alert alert-info"><?php _e( "Comments are closed.", "mondira" ); ?>.</p>
			
		    <?php endif; ?>

	<?php endif; ?>

<?php endif; ?>


<?php 
$enable_jetpack_comments = mondira_get_option( 'blog', 'enable_jetpack_comments' );

if(class_exists( 'Jetpack', false ) && !empty( $enable_jetpack_comments ) && $enable_jetpack_comments=='yes' ) : //If Jetpack Comment enabled

    comment_form();

elseif ( comments_open() ) : ?>

    <section id="respond" class="respond-form">

	    <h3 id="comment-form-title"><?php comment_form_title( __("Leave a Reply", "mondira" ), __( "Leave a Reply to", "mondira" ) . ' %s' ); ?></h3>

	    <div id="cancel-comment-reply">
		    <p class="small"><?php cancel_comment_reply_link( __("Cancel", "mondira") ); ?></p>
	    </div>

	    <?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
  	    <div class="help">
  		    <p><?php _e( "You must be", "mondira" ); ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e( "logged in", "mondira" ); ?></a> <?php _e( "to post a comment", "mondira" ); ?>.</p>
  	    </div>
	    <?php else : ?>

	    <form action="<?php echo get_option( 'siteurl' ); ?>/wp-comments-post.php" method="post" class="form-horizontal" id="commentform" role="form">

	    <?php if ( is_user_logged_in() ) : ?>

	    <p class="comments-logged-in-as"><?php _e( "Logged in as", "mondira" ); ?> <a href="<?php echo get_option( 'siteurl' ); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="<?php _e( "Log out of this account", "mondira" ); ?>"><?php _e( "Log out","mondira" ); ?> &raquo;</a></p>

	    <?php else : ?>
	    <div  id="comment-form-elements">
	        <div class="form-group">
                <label for="author" class="col-sm-3 col-xs-12 control-label"><?php _e( 'Name:', 'mondira' ) ?> <?php if ( $req ) _e( '(required)', 'mondira' ); ?></label>
                <div class="col-sm-9 col-xs-12">
                  <input type="text" name="author" value="<?php echo esc_attr( $comment_author ); ?>" class="form-control" id="author" placeholder="Name"  tabindex="1" <?php if ( $req ) echo "aria-required='true'"; ?> />
                </div>
            </div>
            
            <div class="form-group">
                <label for="email" class="col-sm-3 col-xs-12 control-label"><?php _e( 'Mail:', 'mondira' ) ?> <?php if ( $req ) _e( '(required)', 'mondira' ); ?></label>
                <div class="col-sm-9 col-xs-12">
                  <input type="text" name="email" value="<?php echo esc_attr( $comment_author_email ); ?>" class="form-control" id="email" placeholder="Email" tabindex="2" <?php if ( $req ) echo "aria-required='true'"; ?> />
                </div>
            </div>
            
            <div class="form-group">
                <label for="url" class="col-sm-3 col-xs-12 control-label"><?php _e( 'Website:', 'mondira' ) ?> </label>
                <div class="col-sm-9 col-xs-12">
                  <input type="text" name="url" value="<?php echo esc_attr( $comment_author_url ); ?>" class="form-control" id="url" placeholder="http://" tabindex="3" />
                </div>
            </div>
            
            
        </div>      
	    <?php endif; ?>
	    
        <div class="form-group">
            <label for="comment" class="col-sm-3 col-xs-12 control-label"><?php _e( 'Comment:', 'mondira' ) ?></label>
            <div class="col-sm-9 col-xs-12">
              <textarea name="comment" class="form-control" rows="10" cols="30" id="comment" tabindex="4"></textarea>
            </div>
          </div>
          
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9 col-xs-12">
              <button type="submit" name="submitted" class="btn btn-primary" tabindex="5"><?php _e( 'Submit Comment', 'mondira' ) ?></button>
            </div>
          </div>
          
        <?php comment_id_fields(); ?>
	    
	    <?php 
		    do_action( 'comment_form()', $post->ID ); 
	    ?>
	    
	    </form>
	    
	    <?php endif; ?>
    </section>

<?php else : ?>

    <p class="alert alert-info"><?php _e( "Comments are closed.", "mondira" ); ?>.</p>

<?php endif; ?>