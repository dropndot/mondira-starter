<?php
/**
* This file contained theme shortcode options
*
*
* @package WordPress
* @subpackage Mondira
* @version 1.0.0 
* @author Jewel Ahmed <tojibon@gmail.com>
* @author url http://mondira.com
* @copyright  Copyright (c) 2014, Jewel Ahmed
*/

$css3_animation_arr = array(
	'' 				=> __( 'Animation','mondira' ),
	'swing' 		=> __( 'Swing','mondira' ),
	'pulse' 		=> __( 'Pulse','mondira' ),
	'fadeIn' 		=> __( 'Fade In','mondira' ),
	'fadeInUp' 		=> __( 'Fade In Up','mondira' ),
	'fadeInDown' 	=> __( 'Fade In Down','mondira' ),
	'fadeInLeft' 	=> __( 'Fade In Left','mondira' ),
	'fadeInRight' 	=> __( 'Fade In Right','mondira' ),
	'fadeInUpBig' 	=> __( 'Fade In Up Long','mondira' ),
	'fadeInDownBig' => __( 'Fade In Down Long','mondira' ),
	'fadeInLeftBig' => __( 'Fade In Left Long','mondira' ),
	'fadeInRightBig' => __( 'Fade In Right Long','mondira' ),
	'slideInDown' 	=> __( 'Slide In Down','mondira' ),
	'slideInLeft' 	=> __( 'Slide In Left','mondira' ),
	'slideInLeft' 	=> __( 'Slide In Left','mondira' ),
	'bounceIn' 		=> __( 'Bounce In','mondira' ),
	'bounceInUp' 	=> __( 'Bounce In Up','mondira' ),
	'bounceInDown' 	=> __( 'Bounce In Down','mondira' ),
	'bounceInLeft' 	=> __( 'Bounce In Left','mondira' ),
	'bounceInRight' => __( 'Bounce In Right','mondira' ),
	'rotateIn' 		=> __( 'Rotate In','mondira' ),
	'lightSpeedIn' 	=> __( 'Light Speed In','mondira' ),
	'rollIn' 		=> __( 'Roll In','mondira' ),
);

$border_style_arr = array(
	''		=> __( 'None', 'mondira' ),
	'solid'	=> __( 'Solid', 'mondira' ),
	'dashed'=> __( 'Dashed', 'mondira' ),
	'dotted'=> __( 'Dotted', 'mondira' ),
	'double'=> __( 'Double', 'mondira' ),
	'inset'	=> __( 'Inset', 'mondira' ),
	'outset'=> __( 'Outset', 'mondira' )
);

$text_alignment_arr = array(
	'center' 	=> __( 'Align Center', 'mondira' ),
	'left' 		=> __( 'Align Left', 'mondira' ),
	'right' 	=> __( 'Align Right', 'mondira' )
);

$image_style_arr = array(
	''					=> __( 'Default', 'mondira' ),
	'rounded'			=> __( 'Rounded', 'mondira' ),
	'border'			=> __( 'Border', 'mondira' ),
	'outline'			=> __( 'Outline', 'mondira' ),
	'shadow'			=> __( 'Shadow', 'mondira' ),
	'shadow_border'		=> __( 'Bordered shadow', 'mondira' ),
	'shadow_3d'			=> __( '3D Shadow', 'mondira' ),
	'circle'			=> __( 'Circle', 'mondira' ),
	'border_circle'		=> __( 'Circle Border', 'mondira' ),
	'outline_circle'	=> __( 'Circle Outline', 'mondira' ),
	'shadow_circle'		=> __( 'Circle Shadow', 'mondira' ),
	'shadow_border_circle'=> __( 'Circle Border Shadow', 'mondira' )
);

$target_arr = array(
	'_self' 	=> __( 'Same window', 'mondira' ),
	'_blank'	=> __( 'New window', 'mondira' )
);

/*
---------------------------------------------------------------------------------------
    Loading WP Editor mondira Extensions
---------------------------------------------------------------------------------------
*/
$custom_shortcodes['header_6'] = array( 
	'type'=>'heading', 
	'title'=>__( 'Shortcode Elements', 'mondira' )
);


/*
---------------------------------------------------------------------------------------
	* Audio Shortcode for WP Editor Shortcode Generator
---------------------------------------------------------------------------------------
*/
$custom_shortcodes['mondira_audio'] = array( 
	'type'=>'regular', 
	'title'=>__( 'Audio', 'mondira' ), 
	'attr'=>array( 
		'mp3'=>array('type'=>'text', 'title'=>__( 'MP3 File URL', 'mondira' )),
		'ogg'=>array('type'=>'text', 'title'=>__( 'OGA File URL', 'mondira' )),
		'el_class'=>array(
			'type'=>'text', 
			'desc' => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 
			'title'=>__( 'Extra Class Name', 'mondira' )
		)
	)
);

/*
---------------------------------------------------------------------------------------
	* Button Shortcode for WP Editor Shortcode Generator
---------------------------------------------------------------------------------------
*/
$custom_shortcodes['mondira_button'] = array( 
	'type'=>'regular', 
	'title'=>__( 'Button', 'mondira' ), 
	'attr'=>array( 
		'buttontype'=>array(
			'type'=>'select', 
			'class'=>'', 
			'title'=>__( 'Button Type', 'mondira' ),
			'values'=>array(
				'btn-default'=>'Default',
				'btn-primary'=>'Primary',
				'btn-success'=>'Success',
				'btn-warning'=>'Warning',
				'btn-info'=>'Info'
			)
		),
		'size'=>array(
			'type'=>'select', 
			'class'=>'', 
			'title'=>__( 'Button Size', 'mondira' ),
			'values'=>array(
				''=>'Default',
				'btn-xs'=>'Small',
				'btn-sm'=>'Medium',
				'btn-lg'=>'Large'
			)
		),
		'src'=>array(
			'type'=>'text', 
			'class'=>'', 
			'title'=>__( 'Target SRC', 'mondira' ),
			'values'=> '#'
		),
		'content'=>array(
			'type'=>'text', 
			'desc' => '', 
			'title'=>__( 'Button Text', 'mondira' )
		),
		'el_class'=>array(
			'type'=>'text', 
			'desc' => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 
			'title'=>__( 'Extra Class Name', 'mondira' )
		)
	)
);

/*
---------------------------------------------------------------------------------------
	* Divider Shortcode for WP Editor Shortcode Generator
---------------------------------------------------------------------------------------
*/
$custom_shortcodes['mondira_divider'] = array( 
	'type'=>'regular', 
	'title'=>__( 'Divider', 'mondira' ), 
	'attr'=>array( 
		'scroll_text'=>array(
			'type'=>'text', 
			'desc' => "Enter the text for scroll to top", 
			'title'=>__( 'Scroll To Top Text', 'mondira' )
		),
		'el_class'=>array(
			'type'=>'text', 
			'desc' => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 
			'title'=>__( 'Extra Class Name', 'mondira' )
		)
	)
);

/*
---------------------------------------------------------------------------------------
	* Dropcap Shortcode for WP Editor Shortcode Generator
---------------------------------------------------------------------------------------
*/
$custom_shortcodes['mondira_dropcap'] = array( 
	'type'=>'regular', 
	'title'=>__( 'Dropcap', 'mondira' ), 
	'attr'=>array( 
		'color'=>array(
			'type'=>'color', 
			'class'=>'wp-color-picker', 
			'title'=>__( 'Dropcap Color', 'mondira' )
		),
		'background'=>array(
			'type'=>'color', 
			'class'=>'wp-color-picker', 
			'title'=>__( 'Dropcap Background', 'mondira' )
		),
		'type'=>array(
			'type'=>'select', 
			'class'=>'', 
			'title'=>__( 'Type', 'mondira' ),
			'values'=>array(
				'circle'=>'Circle',
				'ractangle'=>'Ractangle'
			)
		),
		'content'=>array(
			'type'=>'textarea', 
			'desc' => '', 
			'title'=>__( 'Message Text', 'mondira' )
		),
		'el_class'=>array(
			'type'=>'text', 
			'desc' => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 
			'title'=>__( 'Extra Class Name', 'mondira' )
		)
	)
);

/*
---------------------------------------------------------------------------------------
    Google Map shortcode support for WP Editor Shortcode Generator
---------------------------------------------------------------------------------------
*/
$custom_shortcodes['vc_gmaps'] = array(  
	'type'=>'regular', 
	'title'=>__( 'Google Map', 'mondira' ),  
	'attr'=>array( 
		
		'width' => array(
			'type' => 'number',
			'heading' => __( 'Map Width', 'mondira' ),
			'value' => 100,
			'min' => 25,
			'max' => 100,
			'postfix' => '%'
		),
		
		'height' => array(
			'type' => 'number',
			'heading' => __( 'Map Heigh', 'mondira' ),
			'value' => 320,
			'min' => 300,
			'max' => 700,
			'postfix' => 'px'
		),
		
		'map_type' => array(
			'type' => 'dropdown',
			'class' => '',
			'heading' => __( 'Map Type', 'mondira' ),
			'value' => array(
				'ROADMAP' => __( 'Roadmap', 'mondira' ), 
				'SATELLITE' => __( 'Satellite', 'mondira' ), 
				'HYBRID' => __( 'Hybrid', 'mondira' ), 
				'TERRAIN' => __( 'Terrain', 'mondira' )
			)
		),
		
		'lat' => array(
			'type' => 'textfield',
			'class' => '',
			'heading' => __( 'Location Latitude', 'mondira' ),
			'value' => '48.89364',
			'description' => __( '<a href=\'http://universimmedia.pagesperso-orange.fr/geo/loc.htm\' target=\'_blank\'>Click here</a> to find Latitude & Longitude value of your location.', 'mondira' ),
		),
		
		'lng' => array(
			'type' => 'textfield',
			'class' => '',
			'heading' => __( 'Location Longitude', 'mondira' ),
			'value' => '2.33739',
			'description' => __( '<a href=\'http://universimmedia.pagesperso-orange.fr/geo/loc.htm\' target=\'_blank\'>Click here</a> to find Latitude & Longitude value of your location.', 'mondira' ),
		),
		
		'zoom' => array(
			'type' => 'number',
			'value' => 17,
			'min' => 1,
			'max' => 20,
			'heading' => __( 'Map Zoom Level', 'mondira' )
		),
		
		'scrollwheel' => array(
			'type' => 'checkbox',
			'heading' => __( '', 'mondira' ),
			'value' => array( 
				'false' => __( 'Disable google map zooming on mouse wheel scroll', 'mondira' ) 
			)
		),
		
		'streetviewcontrol' => array(
			'type' => 'checkbox',
			'heading' => __( '', 'mondira' ),
			'value' => array( 
				'true' => __( 'Show street view control', 'mondira' ) 
			)
		),
		
		'maptypecontrol' => array(
			'type' => 'checkbox',
			'heading' => __( '', 'mondira' ),
			'value' => array( 
				'true' => __( 'Show map type control', 'mondira' ) 
			)
		),
		
		'pancontrol' => array(
			'type' => 'checkbox',
			'heading' => __( '', 'mondira' ),
			'value' => array( 
				'true' => __( 'Show map pan control', 'mondira' ) 
			)
		),
		
		'zoomcontrol' => array(
			'type' => 'checkbox',
			'heading' => __( '', 'mondira' ),
			'value' => array( 
				'true' => __( 'Show map zoom control', 'mondira' ) 
			)
		),
		
		'zoomcontrolsize' => array(
			'type' => 'dropdown',
			'class' => '',
			'heading' => __( 'Zoom Control Size', 'mondira' ),
			'value' => array(
				'SMALL' => __( 'Small', 'mondira' ), 
				'LARGE' => __('Large', 'mondira' )
			),
			'dependency' => array(
				'element' => 'zoomControl',
				'value' => array( 'true' ) 
			)
		),
		
		'marker_icon' => array(
			'type' => 'dropdown',
			'class' => '',
			'heading' => __( 'Marker/Point Icon', 'mondira' ),
			'value' => array(
				'default' => __( 'Google Default', 'mondira' ), 
				'default_self' => __( 'Theme Default', 'mondira' ), 
				'custom' => __( 'Upload Custom', 'mondira' )
			)
		),
		
		'icon_img' => array(
			'type' => 'attach_image',
			'class' => '',
			'heading' => __( 'Upload Image Icon', 'mondira' ),
			'description' => __( 'Upload the custom image icon.', 'mondira' ),
			'dependency' => array(
				'element' => 'marker_icon',
				'value' => array( 'custom' ) 
			)
		),
		
		'marker_content' => array(
			'type' => 'textarea_html',
			'class' => '',
			'heading' => __( 'Info Window Text', 'mondira' )
		),
		
		'map_style' => array(
			'type' => 'textarea',
			'class' => '',
			'heading' => 'Google Styled Map JSON',
			'value' => '',
			'description' => __( '<a target=\'_blank\' href=\'http://gmaps-samples-v3.googlecode.com/svn/trunk/styledmaps/wizard/index.html\'>Click here</a> to get the style JSON code for styling your map.', 'mondira')
		),
		
		'el_class' => array(
			'type' => 'textfield',
			'heading' => __( 'Extra Class Name', 'mondira' ),
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'mondira' )
		)
	)
);

/*
---------------------------------------------------------------------------------------
	* Message Shortcode for WP Editor Shortcode Generator
---------------------------------------------------------------------------------------
*/
$custom_shortcodes['mondira_message'] = array( 
	'type'=>'regular', 
	'title'=>__( 'Message', 'mondira' ), 
	'attr'=>array( 
		'title'=>array(
			'type'=>'text', 
			'desc' => '', 
			'title'=>__( 'Message Title', 'mondira' )
		),
		'color'=>array(
			'type'=>'select', 
			'desc' => '', 
			'title'=>__( 'Message Color', 'mondira' ),
			'values'=>array(
				'bs-callout-success'=>'Success',
				'bs-callout-info'=>'Info',
				'bs-callout-warning'=>'Warning',
				'bs-callout-danger'=>'Danger'
			)
		),
		'content'=>array(
			'type'=>'textarea', 
			'desc' => '', 
			'title'=>__( 'Message Text', 'mondira' )
		),
		'el_class'=>array(
			'type'=>'text', 
			'desc' => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 
			'title'=>__( 'Extra Class Name', 'mondira' )
		)
	)
);

/*
---------------------------------------------------------------------------------------
	* Empty Space Shortcode for WP Editor Shortcode Generator
---------------------------------------------------------------------------------------
*/
$custom_shortcodes['mondira_empty_space'] = array( 
	'type'=>'regular', 
	'title'=>__( 'Empty Space', 'mondira' ), 
	'attr'=>array( 
		'height'=>array(
			'type'=>'number', 
			'desc' => '', 
			'min' => '10', 
			'value' => '20', 
			'max' => '100', 
			'postfix' => 'px', 
			'title'=>__( 'Space Height', 'mondira' ),
			'description' => __( 'Enter empty space height.', 'mondira' ),
		),
		'el_class'=>array(
			'type' => 'textfield',
			'heading' => __( 'Extra Class Name', 'mondira' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'mondira' ),
		)
	)
);

/*
---------------------------------------------------------------------------------------
    Separator With Text shortcode support for WP Editor Shortcode Generator
---------------------------------------------------------------------------------------
*/
$custom_shortcodes['mondira_text_separator'] = array(  
	'type'=>'regular', 
	'title'=>__( 'Separator With Text', 'mondira' ),  
	'attr'=>array( 
		
		'title'=>array(
			'type'=>'text', 
			'values'=> __( 'Separator Title', 'mondira' ),
			'title'=>__( 'Title', 'mondira' )
		),
		'title_align'=>array(
			'type' => 'select',
			'title' => __( 'Text Align', 'mondira' ),
			'values' => $text_alignment_arr
		),	
		'color'=>array(
			'type' => 'color',
			'title' => __( 'Color', 'mondira' ),
			'desc' => __( 'Separator color.', 'mondira' )
		),
		'style'=>array(
			'type' => 'select',
			'title' => __( 'Style', 'mondira' ),
			'values' => $border_style_arr,
			'desc' => __( 'Separator style.', 'mondira' )
		),
			
		'text_background_color'=>array(
			'type'=>'color',
			'desc' => 'Select text background color for your element.', 
			'title'=>__( 'Content Color', 'mondira' )
		),
		'el_class'=>array(
			'type' => 'textfield',
			'title' => __( 'Extra Class Name', 'mondira' ),
			'desc' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'mondira' )
		)
	)
);


/*
---------------------------------------------------------------------------------------
    Single Image Shortcode for WP Editor Shortcode Generator
---------------------------------------------------------------------------------------
*/
$custom_shortcodes['mondira_single_image'] = array( 
	'type'=>'custom', 
	'title'=>__( 'Single Image', 'mondira' ), 
	'attr'=>array( 
		'image'	=>	array(
			'type'	=>	'attach_image', 
			'title' => 	__( 'Image', 'mondira' ),
			'desc' 	=> 	__( 'Select image from media library.', 'mondira' )
		),
		'css_animation'=>array(
			'type'=>	'select', 
			'title' => 	__( 'Image CSS Animation', 'mondira' ),
			'values'=> 	$css3_animation_arr 
		),
		'img_size' => array(
			'type' => 'textfield',
			'heading' => __( 'Image Size', 'mondira' ),
			'description' => __( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'mondira' )
		),
		'alignment' => array(
			'type' => 'select',
			'title' => __( 'Image Alignment', 'mondira' ),
			'values' => $text_alignment_arr,
			'desc' => __( 'Select image alignment.', 'mondira' )
		),
		'style' => array(
			'type' => 'select',
			'heading' => __( 'Image Style', 'mondira' ),
			'values' => $image_style_arr
		),
		'border_color' => array(
			'type' => 'color',
			'heading' => __( 'Border Color', 'mondira' ),
			'dependency' => array(
				'element' => 'style',
				'values' => array( 'border', 'border_circle', 'outline', 'outline_circle' )
			)
		),
		'delay'=>array(
			'type'	=> 	'text', 
			'title'	=> 	__( 'Delay', 'mondira' ),
			'desc' 	=> 	__( 'Enter delay (in milliseconds) if needed e.g. 150. This parameter comes in handy when creating the animate in "one by one" effect in horizontal columns. ', 'mondira' ),
		),		
		'img_link_large' => array(
			'type' => 'checkbox',
			'title' => __( 'Link to large image?', 'mondira' ),
			'desc' => __( 'If selected, image will be linked to the larger image.', 'mondira' ),
			'value' => array( 'yes' => __( 'Yes, please', 'mondira' ) )
		),
		'link' => array(
			'type' => 'text',
			'title' => __( 'Image link', 'mondira' ),
			'desc' => __( 'Enter URL if you want this image to have a link.', 'mondira' ),
			'dependency' => array(
				'element' => 'img_link_large',
				'is_empty' => true
			)
		),
		'img_link_target' => array(
			'type' => 'select',
			'title' => __( 'Link Target', 'mondira' ),
			'values' => $target_arr,
			'dependency' => array(
				'element' => 'link',
				'not_empty' => true
			)
		),
		'el_class' => array(
			'type' => 'text',
			'title' => __( 'Extra Class Name', 'mondira' ),
			'desc' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'mondira' )
		),
	)
);

/*
---------------------------------------------------------------------------------------
    Milestone shortcode support for WP Editor Shortcode Generator
---------------------------------------------------------------------------------------
*/
$custom_shortcodes['mondira_milestone'] = array( 
	'type'=>'regular', 
	'title'=>__( 'Milestone', 'mondira' ), 
	'attr'=>array( 
		'number'=>array(
		  'type' => 'textfield',
		  'heading' => __( 'Milestone Number', 'mondira' ),
		  'description' => __( 'The number/count of your milestone e.g. "1300"', 'mondira' )
		),
		'symbol'=>array(
		  'type' => 'textfield',
		  'heading' => __( 'Milestone Symbol', 'mondira' ),
		  'description' => __( 'An optional symbol to place next to the number counted to. e.g. "%" or "+"', 'mondira' )
		),
		'symbol_position'=>array(
		  'type' => 'dropdown',
		  'heading' => __( 'Milestone Symbol Position', 'mondira' ),
		  'values' => array(
			 'after' => 'After Number',
			 'before' => 'Before Number'
		   ),
		  'description' => __( 'Please select the position you would like for your symbol.', 'mondira' ),
		  'dependency' => Array('element' => 'symbol', 'not_empty' => true)
		),
		'subject'=>array(
		  'type' => 'textfield',
		  'heading' => __( 'Milestone Subject', 'mondira' ),
		  'description' => __( 'The subject of your milestones e.g. "Total Projects"', 'mondira' )
		),
		'color'=>array(
		  'type' => 'color',
		  'heading' => 'Color',
		  'value' => '',
		  'description' => __( 'Please select the color you wish for your milestone to display in.', 'mondira' )
		),
		'el_class'=>array(
			'type'=>'text', 
			'desc' => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 
			'title'=>__( 'Extra Class Name', 'mondira' )
		)
	)
);

/*
---------------------------------------------------------------------------------------
    Progress Bar shortcode support for WP Editor Shortcode Generator
---------------------------------------------------------------------------------------
*/
$custom_shortcodes['mondira_progress_bar'] = array( 
	'type'=>'regular', 
	'title'=>__( 'Progress Bar', 'mondira' ), 
	'attr'=>array( 
		'values' => array(
			'type' => 'textarea',
			'heading' => __( 'Graphic values', 'mondira' ),
			'description' => __( 'Input graph values, titles and color here. Divide values with comma (,). Example: 90|Development,80|Design,70|Marketing', 'mondira' ),
			'value' => '90|Development,80|Design,70|Marketing'
		),
		'units' => array(
			'type' => 'textfield',
			'value' => '%',
			'heading' => __( 'Units', 'mondira' ),
			'description' => __( 'Enter measurement units (if needed) Eg. %, px, points, etc. Graph value and unit will be appended to the graph title.', 'mondira' )
		),
		'color' => array(
			'type' => 'colorpicker',
			'heading' => __( 'Bar Color', 'mondira' ),
			'description' => __( 'Select custom color for bars.', 'mondira' )
		),
		'options' => array(
			'type' => 'checkbox',
			'heading' => __( 'Options', 'mondira' ),
			'values' => array(
				'striped' => __( 'Add Stripes? Will be visible with striped bars.', 'mondira' ),
				'animated' => __( 'Add animation?', 'mondira' )
			)
		),
		'text_color' => array(
			'type' => 'colorpicker',
			'class' => '',
			'heading' => __( 'Text Color', 'mondira' ),
			'value' => '',
			'description' => __( 'Select bar text color.', 'mondira' )
		),
		'background_color' => array(
			'type' => 'colorpicker',
			'class' => '',
			'heading' => __( 'Background Color', 'mondira' ),
			'value' => '',
			'description' => __( 'Select bar background color.', 'mondira' )
		),
		'el_class' => array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'mondira' ),
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'mondira' )
		)
	)
);


/*
---------------------------------------------------------------------------------------
	* Video Shortcode for WP Editor Shortcode Generator
---------------------------------------------------------------------------------------
*/
$custom_shortcodes['mondira_video'] = array(  
	'type'=>'regular', 
	'title'=>__( 'Video', 'mondira' ),  
	'attr'=>array( 
		'mp4'=>array('type'=>'text', 'title'=>__( 'MP4 File URL', 'mondira' ), 'desc' => __( 'Only supply the formats you desire, this shortcode is just a shortcut to place the <a href="https://codex.wordpress.org/Video_Shortcode" target="_blank">default WordPress video player</a>.')),
		'webm'=>array('type'=>'text', 'title'=>__( 'WEBM File URL', 'mondira' )),
		'ogv'=>array('type'=>'text', 'title'=>__( 'OGV FILE URL', 'mondira' )),
		'poster'=>array(
			'type'=>'custom', 
			'title'  => __( 'Preview Image','mondira' ), 
			'desc' => __( 'The preview image should be the same dimensions as your video.', 'mondira' )
		),
		'el_class'=>array(
			'type'=>'text', 
			'desc' => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 
			'title'=>__( 'Extra Class Name', 'mondira' )
		)
	)
);

/*
---------------------------------------------------------------------------------------
	* Vimeo Shortcode for WP Editor Shortcode Generator
---------------------------------------------------------------------------------------
*/
$custom_shortcodes['mondira_vimeo'] = array(  
	'type'=>'regular', 
	'title'=>__( 'Vimeo', 'mondira' ),  
	'attr'=>array( 
		'content'=>array(
			'type'=>'text', 
			'desc' => 'Vimeo full video url.', 
			'title'=>__( 'Video URL', 'mondira' )
		),
		'el_class'=>array(
			'type'=>'text', 
			'desc' => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 
			'title'=>__( 'Extra Class Name', 'mondira' )
		)
	)
);

/*
---------------------------------------------------------------------------------------
	* Word Highlight Shortcode for WP Editor Shortcode Generator
---------------------------------------------------------------------------------------
*/
$custom_shortcodes['mondira_whighlight'] = array( 
	'type'=>'regular', 
	'title'=>__( 'Word Highlight', 'mondira' ), 
	'attr'=>array( 
		'labeltype'=>array(
			'type'=>'select', 
			'class'=>'', 
			'title'=>__( 'Word Type', 'mondira' ),
			'values'=>array(
				'label-default'=>'Default',
				'label-primary'=>'Primary',
				'label-success'=>'Success',
				'label-info'=>'Info',
				'label-warning'=>'Warning',
				'label-danger'=>'Danger'
			)
		),
		'src'=>array(
			'type'=>'text', 
			'class'=>'', 
			'title'=>__( 'Target SRC', 'mondira' ),
			'values'=> '#'
		),
		'content'=>array(
			'type'=>'text', 
			'desc' => '', 
			'title'=>__( 'Word Text', 'mondira' )
		),
		'el_class'=>array(
			'type'=>'text', 
			'desc' => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 
			'title'=>__( 'Extra Class Name', 'mondira' )
		)
	)
);

/*
---------------------------------------------------------------------------------------
	* Youtube Shortcode for WP Editor Shortcode Generator
---------------------------------------------------------------------------------------
*/
$custom_shortcodes['mondira_youtube'] = array(  
	'type'=>'regular', 
	'title'=>__( 'Youtube', 'mondira' ),  
	'attr'=>array( 
		'content'=>array(
			'type'=>'text', 
			'desc' => 'Youtube full video url.', 
			'title'=>__( 'Video URL', 'mondira' )
		),
		'el_class'=>array(
			'type'=>'text', 
			'desc' => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 
			'title'=>__( 'Extra Class Name', 'mondira' )
		)
	)
);

add_action( 'admin_init', 'mondira_editor_init' );
function mondira_editor_init() {
	global $custom_shortcodes;
	if( is_admin() && !empty( $custom_shortcodes ) ) { 
		$MondiraThemeShortcodesGenerator = new MondiraThemeShortcodesGenerator();
		$MondiraThemeShortcodesGenerator->init();
		$shortcodes_tmp_array = array();
		foreach( $custom_shortcodes as $key => $attr ) {
			$shortcodes_tmp_array[$attr['title']] = $key;
		}
		sort( $shortcodes_tmp_array );
		
		foreach( $shortcodes_tmp_array as $key => $val ) {
			$MondiraThemeShortcodesGenerator->mondira_addshortcode( $val, $custom_shortcodes[$val] );
		}
	} 
}