<?php
/**
* 
* Mondira_Video Widget Class
* 
* 
* Makes a custom Widget for displaying video from youtube / vimeo on sidebar
*
* @package WordPress
* @subpackage Mondira
* @since Mondira 1.0.0
*/
class Mondira_Video extends WP_Widget {
    
    public function __construct() {
        parent::__construct(
            'mondira_video_widget', // Base Id
            THEME_NAME . ' Video Widget', // Widge display name
            array( 'description' => __( 'Display video from youtube / vimeo.', 'mondira' ) ), 
            array( 'width' => 300, 'height' => '')
        );         
         
    }
    
    function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters( 'widget_title', !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '' );
		$youtube_video = !empty( $instance[ 'youtube_video' ] ) ? $instance[ 'youtube_video' ] : '';
		$vimeo_video = !empty( $instance[ 'vimeo_video' ] ) ? $instance[ 'vimeo_video' ] : '';
		
		$embed_code = !empty( $instance[ 'embed_code' ] ) ? $instance[ 'embed_code' ] : '';
		$width = 'width="100%"';
		$height = 'height="210"';
		$embed_code = preg_replace( '/width="([3-9][0-9]{2,}|[1-9][0-9]{3,})"/', $width, $embed_code );
		$embed_code = preg_replace( '/height="([0-9]*)"/' , $height , $embed_code );
			
		$width1 = 'width: 100%';
		$height1 = 'height: 210';
		$embed_code = preg_replace( '/width:"([3-9][0-9]{2,}|[1-9][0-9]{3,})"/', $width1, $embed_code);
		$embed_code = preg_replace( '/height: ([0-9]*)/' , $height1 , $embed_code );  
			
		echo $before_widget;
		if ( $title )
			echo $before_title;
			echo $title ; ?>
		<?php echo $after_title; ?>
		
		<?php if ( $embed_code ): echo $embed_code ?>

		<?php elseif ( $youtube_video ):?>
        <div class="post-video-wrapper-iframe">
			<iframe src="http://www.youtube.com/embed/<?php echo $youtube_video ?>?rel=0&wmode=opaque" allowfullscreen></iframe>
        </div>
		<?php elseif ( $vimeo_video ):?>
        <div class="post-video-wrapper-iframe">
			<iframe src="http://player.vimeo.com/video/<?php echo $vimeo_video ?>?wmode=opaque" allowFullScreen></iframe>
        </div>
		<?php endif; ?>                 
	<?php 
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ]          = wp_filter_nohtml_kses( $new_instance[ 'title' ] );
		$instance[ 'embed_code' ]     = $new_instance[ 'embed_code' ];
		$instance[ 'youtube_video' ]  = wp_filter_nohtml_kses( $new_instance[ 'youtube_video' ] );
		$instance[ 'vimeo_video' ]    = wp_filter_nohtml_kses( $new_instance[ 'vimeo_video' ] );
		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' => 'Featured Video', 'embed_code'=>'', 'youtube_video'=>'', 'vimeo_video'=>'' );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
        
        if (!empty( $instance[ 'embed_code' ] ) ) {
            $embed_code = $instance[ 'embed_code' ];    
        } else {
            $embed_code = '';
        }
        
        $example_youtube_video_url = 'http://www.youtube.com/watch?v=xxxxxxxx';
        $example_youtube_vimeo_url = 'https://vimeo.com/xxxxxxxx';
        ?>
        <p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title : ', 'mondira');?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo !empty($instance['title'])?$instance['title']:''; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'embed_code' ); ?>"><?php _e('Embed Code : ', 'mondira');?></label>
			<textarea id="<?php echo $this->get_field_id( 'embed_code' ); ?>" name="<?php echo $this->get_field_name( 'embed_code' ); ?>" class="widefat" ><?php echo $embed_code; ?></textarea>
            <small><?php _e('if embed code then please keep the iframe or object  width="100%" height="210"', 'mondira');?></small>
		</p>
		<em style="display:block; border-bottom:1px solid #CCC; margin-bottom:15px;"><?php _e('OR', 'mondira');?></em>
		<p>
			<label for="<?php echo $this->get_field_id( 'youtube_video' ); ?>"><?php _e('Youtube Video ID : ', 'mondira');?></label>
			<input id="<?php echo $this->get_field_id( 'youtube_video' ); ?>" name="<?php echo $this->get_field_name( 'youtube_video' ); ?>" value="<?php echo !empty($instance['youtube_video'])?$instance['youtube_video']:''; ?>" class="widefat" type="text" />
			<small><?php _e('if video url : ', 'mondira');?><?php echo $example_youtube_video_url; ?>  <?php _e('Enter above', 'mondira');?> <strong><?php _e('xxxxxxxx', 'mondira');?></strong></small>
		</p>
		<em style="display:block; border-bottom:1px solid #CCC; margin-bottom:15px;"><?php _e('OR', 'mondira');?></em>
		<p>
			<label for="<?php echo $this->get_field_id( 'vimeo_video' ); ?>"><?php _e('Vimeo Video ID : ', 'mondira');?></label>
			<input id="<?php echo $this->get_field_id( 'vimeo_video' ); ?>" name="<?php echo $this->get_field_name( 'vimeo_video' ); ?>" value="<?php echo !empty($instance['vimeo_video'])?$instance['vimeo_video']:''; ?>" class="widefat" type="text" />
			<small><?php _e('if video url : ', 'mondira');?><?php echo $example_youtube_vimeo_url; ?>  <?php _e('Enter above', 'mondira');?> <strong><?php _e('xxxxxxxx', 'mondira');?></strong></small>
		</p> 
	<?php
	}
} 
add_action( 'widgets_init', 'Mondira_Video_box' );
function Mondira_Video_box() {
    register_widget( 'Mondira_Video' );
}