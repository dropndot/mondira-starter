<?php
/**
* 
* Mondira_Flickr Widget Class
* 
* 
* Makes a custom Widget for displaying flickr photos
*
* @package WordPress
* @subpackage Ponom
* @since Ponom 1.0.0
*/
class Mondira_Flickr extends WP_Widget {
	
    function __construct() {
        parent::WP_Widget( 
            'mondira_flickr_widget', 
            THEME_NAME .' Flickr Widget', 
            array( 
                'description' => 'Display Photos from Flickr' 
            ) 
        );
    }
	
    function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '' );
	  	$number = (int) strip_tags( !empty( $instance[ 'number' ] ) ? $instance[ 'number' ] : '' );
	  	$id = strip_tags( !empty( $instance[ 'id' ] ) ? $instance[ 'id' ] : '' );
		echo $before_widget;
             if ( $title )
                 echo $before_title . $title . $after_title; ?>		
				<ul class="mondira-widget-recent-posts mondira-widget-flickr-photos">
					<li class="clear"><script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $id; ?>"></script></li>
				</ul>
		<?php
		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ]  = wp_filter_nohtml_kses( $new_instance[ 'title' ] );
		$instance[ 'number' ] = (int) wp_filter_nohtml_kses( $new_instance[ 'number' ] );
		$instance[ 'id' ]     = wp_filter_nohtml_kses( $new_instance[ 'id' ] );
    	return $instance;
	}
	
	function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => 'Flickr Feed', 'id' => '', 'number'=> 8 ) );
	    $id     = wp_filter_nohtml_kses( $instance[ 'id' ] );
	    $number = wp_filter_nohtml_kses( $instance[ 'number' ] );
	    $title  = wp_filter_nohtml_kses( $instance[ 'title' ] );
	?>

	<p><label for="<?php echo $this->get_field_id( 'title' ); ?>">
	<?php _e( 'Title:', 'mondira_admin' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo
		esc_attr( $title ); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id( 'id' ); ?>">
    <?php $idgettr = "http://www.idgettr.com"; ?>
	<?php _e( 'Flickr ID:', 'mondira_admin' ); ?>(<a href="<?php echo $idgettr; ?>" target="_blank">idGettr</a>):</label>
	<input class="widefat" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name( 'id' ); ?>" type="text" value="<?php echo
		esc_attr( $id ); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id( 'number' ); ?>">
	<?php _e( 'Number:', 'mondira_admin' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo
		esc_attr( $number ); ?>" /></p>

	<?php
	}
}
add_action( 'widgets_init', create_function( '', 'return register_widget("Mondira_Flickr");' ) );	