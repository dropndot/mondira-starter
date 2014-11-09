<?php
/**
* This file contained the contents for call to action section on footer
*
* @package WordPress
* @subpackage Mondira
* @since version 1.0.0
* @last update: 10 Nov, 2014                             
*/   

    //$call_to_action_text = mondira_get_option( 'calltoaction', 'call_to_action_text' );
    $call_to_action_text = get_theme_mod( 'call_to_action_text' );
	
    //$call_to_action_button_text = mondira_get_option( 'calltoaction', 'call_to_action_button_text' );
    $call_to_action_button_text = get_theme_mod( 'call_to_action_button_text' );
	
    //$call_to_action_button_link = mondira_get_option( 'calltoaction', 'call_to_action_button_link' );
    $call_to_action_button_link = get_theme_mod( 'call_to_action_button_link' );
	
    //$excluded_pages = mondira_get_option( 'calltoaction', 'excluded_pages' );
    $excluded_pages = mondira_get_option( 'others', 'excluded_pages' );
	
    $excluded_pages = explode( ',', $excluded_pages );
    
    $call_to_action = true;
    if ( !empty( $excluded_pages ) && is_page( $post->ID ) && in_array( $post->ID, $excluded_pages ) ) {
        $call_to_action = false;
    }
?>

    <?php if ( !empty( $call_to_action_text ) && $call_to_action ) { ?>
    <div id="call-to-action" class="call-to-action">
        <div class="action-inner">
            <span class="action-span light"><?php echo $call_to_action_text; ?></span>
            <?php if ( !empty( $call_to_action_button_text ) ) { ?>
            <a class="action-button" href="<?php echo $call_to_action_button_link; ?>"><?php echo $call_to_action_button_text; ?></a>
            <?php } ?>
        </div>
    </div>
    <?php } ?>