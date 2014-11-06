<?php
/**
* 
* Mondira_Custom_Image_Widget Widget Class
* 
* 
* A widget to display custom Image on sidebar widget area.
*
* @package WordPress
* @subpackage Mondira
* @since Mondira 1.0.0
*/    
// Mondira_Custom_Image_Widget
class Mondira_Custom_Image_Widget extends WP_Widget{
    
    public function __construct() {
        parent::__construct(
            'mondira_custom_image_widget', // Base Id
            THEME_NAME . ' Custom Image', // Widge display name
            array( 'description' => __( 'Use this widget to display image with custom link on sidebar', 'mondira' )), // Args
            array( 'width' => 300, 'height' => '')
        );         
         
    }
   
    public function widget( $args, $instance )  {
        extract( $args );
        $title             = apply_filters( 'widget_title', !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '' );
        $image_path        = apply_filters( 'widget_image_path', !empty( $instance[ 'image_path' ] ) ? $instance[ 'image_path' ] : '' );
        $custom_link       = apply_filters( 'widget_custom_link', !empty( $instance[ 'custom_link' ] ) ? $instance[ 'custom_link' ] : '' );
        $custom_class      = apply_filters( 'widget_custom_link', !empty( $instance[ 'custom_class' ] ) ? $instance[ 'custom_class' ] : '' );
        
        
        echo $before_widget;
        if ( !empty( $title ) ) {
            echo $before_title;
            echo $title ; 
            echo $after_title;    
        } 
        ?>
            <div class="textwidget widget-wrap <?php echo $custom_class; ?>">
            <?php if ( $custom_link ){?>
            <a href="<?php echo $custom_link;  ?>" target="_blank">
            <?php } ?>
            <img src="<?php echo $image_path; ?>" alt="<?php echo $title; ?>">
            <?php if ( $custom_link ){?>
            </a>
            <?php } ?>
            </div>
        <?php 
        echo $after_widget;    
    }
    
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance[ 'title' ]          = wp_filter_nohtml_kses( $new_instance[ 'title' ] );
        $instance[ 'image_path' ]     = wp_filter_nohtml_kses( $new_instance[ 'image_path' ] );
        $instance[ 'custom_link' ]    = wp_filter_nohtml_kses( $new_instance[ 'custom_link' ] );
        $instance[ 'custom_class' ]   = wp_filter_nohtml_kses( $new_instance[ 'custom_class' ] );
        return $instance;
    }
  
    public function form( $instance ) {  
      $title        = !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';        
      $image_path   = !empty( $instance[ 'image_path' ] ) ? $instance[ 'image_path' ] : '';        
      $image_url    = !empty( $instance[ 'custom_link' ] ) ? $instance[ 'custom_link' ] : '';        
      $custom_class = !empty( $instance[ 'custom_class' ] ) ? $instance[ 'custom_class' ] : '';        
    ?>     
    <p>    
      <label for="<?php echo $this->get_field_id('title'); ?>">Title</label><br />
      <input class="widefat" type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo !empty($instance['title'])?$instance['title']:''; ?>"  />
    </p>      
    <div class="image-upload">
            <p>             
              <input type="text" class="img" style="width:65%;"  name="<?php echo $this->get_field_name('image_path'); ?>" id="<?php echo $this->get_field_id('image_path'); ?>" value="<?php echo !empty($instance['image_path'])?$instance['image_path']:''; ?>" />
              <input type="button" class="button select-img" data-target="<?php echo $this->get_field_id('image_path'); ?>" value="Upload Image" />
            </p>
            <?php if( !empty( $image_path ) ): ?>  
                <img style="display:block;margin-left:0;border:1px solid #999;margin:10px 10px 10px 0; max-width:100%;" src="<?php echo !empty($image_path)?$image_path:'' ?>" alt="">                    
            <?php else :?>    
                <img class="preview-img" style="display:none;"  alt="">                    
            <?php endif; ?>            
    </div>    
    <p>
      <label for="<?php echo $this->get_field_id('custom_link'); ?>">Image Link</label><br />
      <input class="widefat" type="text" name="<?php echo $this->get_field_name('custom_link'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo !empty($instance['custom_link'])?$instance['custom_link']:''; ?>"  />
    </p>
    
    <p>    
      <label for="<?php echo $this->get_field_id('custom_class'); ?>">Custom Class</label><br />
      <input class="widefat" type="text" name="<?php echo $this->get_field_name('custom_class'); ?>" id="<?php echo $this->get_field_id('custom_class'); ?>" value="<?php echo !empty($instance['custom_class'])?$instance['custom_class']:''; ?>"  />
    </p>   
    <?php
  }
}                 
add_action( 'widgets_init', create_function( '', 'return register_widget("Mondira_Custom_Image_Widget");' ) );

              

// queue up the necessary js
function mondira_widget_custom_image_enqueue() {
    global $pagenow;
        
    if ( $pagenow == 'customize.php' ) {
        
        wp_enqueue_style('mondira-widget-media-uploader', get_template_directory_uri() . '/widgets/css/style.css');
        
        wp_enqueue_script('jquery');
        if (function_exists('add_thickbox')) add_thickbox();
        wp_print_scripts('media-upload');
        wp_enqueue_script('utils');
        
        wp_enqueue_script('mondira-widget-media-uploader', get_template_directory_uri() . '/widgets/js/mondira-custom-widget-media-uploader.js');
    }
}
add_action('admin_enqueue_scripts', 'mondira_widget_custom_image_enqueue');