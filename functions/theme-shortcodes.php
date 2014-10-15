<?php
/**
* This file contained theme shortcode options
*
*
* @package WordPress
* @subpackage Mondira
* @version 1.0.0 
* @author Jewel Ahmed <tojibon@gmail.com>
* @author url http://codeatomic.com
* @copyright  Copyright (c) 2014, Jewel Ahmed
*/

/*
---------------------------------------------------------------------------------------
    Loading WP Editor Mondira Extensions
---------------------------------------------------------------------------------------
*/
$custom_shortcodes['header_6'] = array( 
	'type'=>'heading', 
	'title'=>__('Shortcode Elements', 'atomic' )
);


/*
---------------------------------------------------------------------------------------
    Mondira Divider Shortcode support for WP Editor Shortcode Generator
---------------------------------------------------------------------------------------
*/
$custom_shortcodes['mondira_divider'] = array( 
	'type'=>'regular', 
	'title'=>__('Divider', 'atomic' ), 
	'attr'=>array( 
		'custom_height'=>array(
			'type'=>'text', 
			'desc' => 'If you would like to control the specifc number of pixels your divider is, enter it here. Don\'t enter "px", just the numnber e.g. "20"', 
			'title'=>__('Dividing Height', 'atomic')
		),
		'line_type'=>array(
			'type'=>'select', 
			'title'  => __('Line Type','atomic'),
			'values' => array(
				'No Line' => 'No Line',
				'Full Width Line' => 'Full Width Line',
				'Small Line' => 'Small Line'
			)
		)
	)
);


/*
---------------------------------------------------------------------------------------
    Mondira Centered Heading Shortcode support for WP Editor Shortcode Generator
---------------------------------------------------------------------------------------
*/
$custom_shortcodes['mondira_centered_heading'] = array( 
	'type'=>'regular', 
	'title'=>__('Centered Heading', 'atomic' ), 
	'attr'=>array( 
		'heading'=>array(
			'type'=>'text', 
			'desc' => 'Your heading first line content.', 
			'title'=>__('Heading Text', 'atomic')
		),
		'sub_heading'=>array(
			'type'=>'text', 
			'desc' => 'Your heading second line content.', 
			'title'=>__('Sub Heading Text', 'atomic')
		),
		'el_class'=>array(
			'type'=>'text', 
			'desc' => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 
			'title'=>__('Extra class name', 'atomic')
		)
	)
);


/*
---------------------------------------------------------------------------------------
    Mondira Styling Heading Shortcode support for WP Editor Shortcode Generator
---------------------------------------------------------------------------------------
*/
$custom_shortcodes['mondira_styling_heading'] = array( 
	'type'=>'regular', 
	'title'=>__('Styling Content', 'atomic' ), 
	'attr'=>array( 
		'content'=>array(
			'type'=>'text', 
			'desc' => 'Your styling content.', 
			'title'=>__('Text', 'atomic')
		),
		'content_type'=>array(
			'type'=>'select', 
			'desc' => 'Select your content type.', 
			'title'=>__('Content Type', 'atomic'),
			'values'=>array(
				'p'=>'Paragraph',
				'h1'=>'Heading 1',
				'h2'=>'Heading 2',
				'h3'=>'Heading 3',
				'h4'=>'Heading 4',
				'h5'=>'Heading 5',
				'h6'=>'Heading 6'
			)
		),
		'content_style'=>array(
			'type'=>'select', 
			'desc' => 'Select your content styling.', 
			'title'=>__('Content Style', 'atomic'),
			'values'=>array(
				'light'=>'Light',
				'bold'=>'Bold',
				'extrabold'=>'Extra Bold'
			)
		),
		'content_align'=>array(
			'type'=>'select', 
			'desc' => 'Select your content alignment.', 
			'title'=>__('Content Alignment', 'atomic'),
			'values'=>array(
				'left'=>'Left',
				'right'=>'Right',
				'center'=>'Center',
				'justify'=>'Justified'
			)
		),
		'content_color'=>array(
			'type'=>'color', 
			'class'=>'wp-color-picker', 
			'desc' => 'Your styling content color.', 
			'title'=>__('Content Color', 'atomic')
		),
		'el_class'=>array(
			'type'=>'text', 
			'desc' => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 
			'title'=>__('Extra class name', 'atomic')
		)
	)
);


/*
---------------------------------------------------------------------------------------
    Video Shortcode support for WP Editor Shortcode Generator
---------------------------------------------------------------------------------------
*/
$custom_shortcodes['video'] = array(  
	'type'=>'regular', 
	'title'=>__('Video', 'atomic' ),  
	'attr'=>array( 
		'mp4'=>array('type'=>'text', 'title'=>__('MP4 File URL', 'atomic'), 'desc' => __('Only supply the formats you desire, this shortcode is just a shortcut to place the <a href="https://codex.wordpress.org/Video_Shortcode" target="_blank">default WordPress video player</a>.')),
		'webm'=>array('type'=>'text', 'title'=>__('WEBM File URL', 'atomic')),
		'ogv'=>array('type'=>'text', 'title'=>__('OGV FILE URL', 'atomic')),
		'poster'=>array(
			'type'=>'custom', 
			'title'  => __('Preview Image','atomic'), 
			'desc' => __('The preview image should be the same dimensions as your video.', 'atomic')
		)
	)
);

/*
---------------------------------------------------------------------------------------
    Audio Shortcode support for WP Editor Shortcode Generator
---------------------------------------------------------------------------------------
*/
$custom_shortcodes['audio'] = array( 
	'type'=>'regular', 
	'title'=>__('Audio', 'atomic' ), 
	'attr'=>array( 
		'mp3'=>array('type'=>'text', 'title'=>__('MP3 File URL', 'atomic')),
		'ogg'=>array('type'=>'text', 'title'=>__('OGA File URL', 'atomic'))
	)
);


add_action( 'admin_init', 'mondira_editor_init' );
function mondira_editor_init() {
	global $custom_shortcodes;
	if( is_admin() && !empty( $custom_shortcodes ) ) { 
		$MondiraThemeShortcodesGenerator = new MondiraThemeShortcodesGenerator();
		$MondiraThemeShortcodesGenerator->init();
		foreach( $custom_shortcodes as $key => $attr ) {
			$MondiraThemeShortcodesGenerator->mondira_add_shortcode( $key, $attr );
		}
	} 
}
