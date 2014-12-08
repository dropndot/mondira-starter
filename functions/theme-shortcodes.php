<?php
/**
* This file contained theme shortcode options
*
*
* @package WordPress
* @subpackage Mondira
* @version 1.0.0 
* @author Jewel Ahmed <tojibon@gmail.com>
* @author url http://codemondira.com
* @copyright  Copyright (c) 2014, Jewel Ahmed
*/

$css3_animation_arr =  array(
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

$css_animation_arr = array(
	'' 				=> __( 'No', 'mondira' ),
	'top-to-bottom' => __( 'Top to bottom', 'mondira' ),
	'bottom-to-top' => __( 'Bottom to top', 'mondira' ),
	'left-to-right' => __( 'Left to right', 'mondira' ),
	'right-to-left' => __( 'Right to left', 'mondira' ),
	'appear' 		=> __( 'Appear from center', 'mondira' )
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

$custom_shortcodes['header_1'] = array( 
	'type'=>'heading', 
	'title'=>__('Columns', 'mondira')
);

$custom_shortcodes['mondira_a_whole_row'] = array( 
	'type'=>'regular', 
	'title'=>__('A Full Row', 'mondira' ), 
	'attr'=>array( 
		'css'=>array(
			'type'=>'css_design', 
			'desc' => __('Design your element with border, padding, margin and background etc css property.', 'mondira'), 
			'title'=>__('Design', 'mondira')
		),
		'row_type' => array(
			'type' => 'select',
			'title' => __( 'Row Type', 'mondira' ),
			'values' => array(
				'' => 'Theme defaults',
				'fullwidth' => 'Full Width Row',
				'fullwidth boxed' => 'Full Width Boxed'
			),
			'desc' => __( '', 'mondira' ),
		),	
		'el_class'=>array(
			'type'=>'text', 
			'desc' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'mondira'), 
			'title'=>__('Extra Class Name', 'mondira')
		),
		'html'=>array(
			'html' => __('<p>It is going to add a responsive row element in your content display, You are supposed to add some columns as content. To add column shortcode just place the curson inside the row shortcode and choose to add some other <strong>Columns Shortcodes</strong>.</p><p>For example: One Whole Column (1/1)</p>', 'mondira')
		),
		
	)
);

$custom_shortcodes['mondira_one_whole'] = array( 
	'type'=>'regular', 
	'title'=>__('One Whole Column (1/1)', 'mondira' ), 
	'attr'=>array( 
		'css'=>array(
			'type'=>'css_design', 
			'desc' => __('Design your element with border, padding, margin and background etc css property.', 'mondira'), 
			'title'=>__('Design', 'mondira')
		),
		'content'=>array('type'=>'textarea', 'title'=>__('Content','mondira'), 'desc' => __('Add some content for One Whole Column. You can customize your content with visual tab and you can use shortcode also as content.', 'mondira'), ),
		'el_class'=>array(
			'type'=>'text', 
			'desc' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'mondira'), 
			'title'=>__('Extra Class Name', 'mondira')
		)
	)
);

$custom_shortcodes['mondira_one_half'] = array( 
	'type'=>'regular', 
	'title'=>__('One Half (1/2)', 'mondira' ), 
	'attr'=>array( 
		'css'=>array(
			'type'=>'css_design', 
			'desc' => __('Design your element with border, padding, margin and background etc css property.', 'mondira'), 
			'title'=>__('Design', 'mondira')
		),
		'content'=>array('type'=>'textarea', 'title'=>__('Content','mondira')),
		'el_class'=>array(
			'type'=>'text', 
			'desc' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'mondira'), 
			'title'=>__('Extra Class Name', 'mondira')
		)
	)
);

$custom_shortcodes['mondira_one_third'] = array( 
	'type'=>'regular', 
	'title'=>__('One Third Column (1/3)', 'mondira' ), 
	'attr'=>array( 
		'css'=>array(
			'type'=>'css_design', 
			'desc' => __('Design your element with border, padding, margin and background etc css property.', 'mondira'), 
			'title'=>__('Design', 'mondira')
		),
		'content'=>array('type'=>'textarea', 'title'=>__('Content','mondira')),
		'el_class'=>array(
			'type'=>'text', 
			'desc' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'mondira'), 
			'title'=>__('Extra Class Name', 'mondira')
		)
	)
);

$custom_shortcodes['mondira_two_thirds'] = array( 
	'type'=>'regular', 
	'title'=>__('Two Thirds Column (2/3)', 'mondira' ), 
	'attr'=>array( 
		'css'=>array(
			'type'=>'css_design', 
			'desc' => __('Design your element with border, padding, margin and background etc css property.', 'mondira'), 
			'title'=>__('Design', 'mondira')
		),
		'content'=>array('type'=>'textarea', 'title'=>__('Content','mondira')),
		'el_class'=>array(
			'type'=>'text', 
			'desc' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'mondira'), 
			'title'=>__('Extra Class Name', 'mondira')
		)
	)
);

$custom_shortcodes['mondira_one_fourth'] = array( 
	'type'=>'regular', 
	'title'=>__('One Fourth Column (1/4)', 'mondira' ), 
	'attr'=>array( 
		'css'=>array(
			'type'=>'css_design', 
			'desc' => __('Design your element with border, padding, margin and background etc css property.', 'mondira'), 
			'title'=>__('Design', 'mondira')
		),
		'content'=>array('type'=>'textarea', 'title'=>__('Content','mondira')),
		'el_class'=>array(
			'type'=>'text', 
			'desc' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'mondira'), 
			'title'=>__('Extra Class Name', 'mondira')
		)
	)
);

$custom_shortcodes['mondira_three_fourths'] = array( 
	'type'=>'regular', 
	'title'=>__('Three Fourths Column (3/4)', 'mondira' ), 
	'attr'=>array( 
		'css'=>array(
			'type'=>'css_design', 
			'desc' => __('Design your element with border, padding, margin and background etc css property.', 'mondira'), 
			'title'=>__('Design', 'mondira')
		),
		'content'=>array('type'=>'textarea', 'title'=>__('Content','mondira')),
		'el_class'=>array(
			'type'=>'text', 
			'desc' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'mondira'), 
			'title'=>__('Extra Class Name', 'mondira')
		)
	)
);


/*
---------------------------------------------------------------------------------------
    Elements WP Editor Shortcode Generator
---------------------------------------------------------------------------------------
*/
$custom_shortcodes['header_6'] = array( 
	'type'=>'heading', 
	'title'=>__( 'Shortcode Elements', 'mondira' )
);

/*
---------------------------------------------------------------------------------------
    Accordion shortcode support for WP Editor Shortcode Generator
---------------------------------------------------------------------------------------
*/
$custom_shortcodes['mondira_accordion'] = array( 
	'type'=>'regular', 
	'title'=>__( 'Accordion', 'mondira' ), 
	'attr'=>array( 
		'title'=>array(
			'type'=>'textfield',
			'desc' => __('Enter text which will be used as widget title. Leave blank if no title is needed.', 'mondira'),
			'title'=> __('Title', 'mondira')
		),
		'active_section'=>array(
			'type'=>'textfield',
			'desc' => __('Enter section number to be active on load or enter false to collapse all sections. Ex: 1', 'mondira'),
			'title'=> __('Active Section', 'mondira')
		),
		'el_class'=>array(
			'type'=>'text', 
			'desc' => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 
			'title'=>__('Extra Class Name', 'mondira')
		),
		'nested_shortcode'=>array( 
			'type'=>'regular', 
			'shortcode'=>'mondira_accordion_section', 
			'title'=>__( 'Section', 'mondira' ), 
			'attr' => array(
				'title'=>array(
					'type'=>'text', 
					'desc' => __('Accordion Section Title.', 'mondira'),
					'title'=>__('Title', 'mondira')
				),
				'content'=>array(
					'type'=>'textarea', 
					'title'=>__('Content', 'mondira')
				)
			)
		)
	)
);

/*
---------------------------------------------------------------------------------------
    FAQ Toggle shortcode support for WP Editor Shortcode Generator
---------------------------------------------------------------------------------------
*/
$custom_shortcodes['mondira_toggle'] = array( 
	'type'=>'regular', 
	'title'=>__( 'Toggle', 'mondira' ), 
	'attr'=>array( 
		'title'=>array(
			'type'=>'textfield',
			'desc' => __('Enter text which will be used as widget title. Leave blank if no title is needed.', 'mondira'),
			'title'=> __('Title', 'mondira')
		),
		'active_section'=>array(
			'type'=>'textfield',
			'desc' => __('Enter section number to be active on load or enter false to collapse all sections. Ex: 1', 'mondira'),
			'title'=> __('Active Section', 'mondira')
		),
		'el_class'=>array(
			'type'=>'text', 
			'desc' => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 
			'title'=>__('Extra Class Name', 'mondira')
		),
		'nested_shortcode'=>array( 
			'type'=>'regular', 
			'shortcode'=>'mondira_toggle_section', 
			'title'=>__( 'Section', 'mondira' ), 
			'attr' => array(
				'title'=>array(
					'type'=>'text', 
					'desc' => __('Toggle Section Title.', 'mondira'),
					'title'=>__('Title', 'mondira')
				),
				'content'=>array(
					'type'=>'textarea', 
					'title'=>__('Content', 'mondira')
				)
			)
		)
	)
);

/*
---------------------------------------------------------------------------------------
	* Icon Shortcode for WP Editor Shortcode Generator
---------------------------------------------------------------------------------------
*/

$custom_shortcodes['mondira_icons'] = array( 
	'type'=>'regular', 
	'title'=>__('Icon', 'mondira' ), 
	'attr'=>array(
		'icon_type'=>array(
			'type'=>'dropdown', 
			'title'=>__('Icon to display', 'mondira' ), 
			'desc' => __('Select any existing font icon. or upload a custom image.', 'mondira' ),
			'values'=>array(
				'font-awesome'=>'Font Awesome Icons',
				'steadysets'=>'Steadysets',
				'linecons'=>'Linecons',
				'custom'=>'Custom Image Icon'
			)
		),
		'font_awesome' => array(
			'type'=>'icon', 
			'title'=>'Icon', 
			'values'=> array(
			      
			),
			'dependency' => array( 'element' => 'icon_type', 'values' => array( 'font-awesome' ) )
		),
		'steadysets' => array(
			'type'=>'icon', 
			'title'=>'Steadysets', 
			'values'=> array(
				  
			),
			'dependency' => array( 'element' => 'icon_type', 'values' => array( 'steadysets' ) )
		),
		'linecons' => array(
			'type'=>'icon', 
			'title'=>'Linecons', 
			'values'=> array(
				  
			),
			'dependency' => array( 'element' => 'icon_type', 'values' => array( 'linecons' ) )
		),
		
		'icon_img' => array(
			'type' => 'attach_image',
			'title' => __( 'Upload Image Icon', 'mondira' ),
			'desc' => __( 'Upload the custom image Icon.', 'mondira' ),
			'dependency' => array( 'element' => 'icon_type', 'values' => array( 'custom' ) )
		),
		'img_width' => array(
			'type' => 'number',
			'title' => __( 'Image Width', 'mondira' ),
			'value' => 48,
			'min' => 16,
			'max' => 512,
			'postfix' => 'px',
			'description' => __( 'Provide Icon Image Width', 'mondira' ),
			'dependency' => array( 'element' => 'icon_type', 'values' => array( 'custom' ) ),
		),
		'icon_size' => array(
			'type' => 'number',
			'title' => __( 'Size of Icon', 'mondira' ),
			'value' => 32,
			'min' => 12,
			'max' => 72,
			'postfix' => 'px',
			'description' => __( 'How big would you like it in pixel?', 'mondira' ),
			'dependency' => array( 'element' => 'icon_type', 'values' => array( 'font-awesome', 'steadysets', 'linecons' ) ),
		),
		'icon_color' => array(
			'type' => 'colorpicker',
			'title' => __( 'Color', 'mondira' ),
			'value' => '#333333',
			'description' => __( 'Give it a nice Paint!', 'mondira' ),
			'dependency' => array( 'element' => 'icon_type', 'values' => array( 'font-awesome', 'steadysets', 'linecons' ) ),
		),
		'icon_style' => array(
			'type' => 'select',
			'title' => __( 'Icon or Image Style', 'mondira' ),
			'value' => array(
				'Simple' => 'none',
				'Circle Background' => 'circle',
				'Square Background' => 'square',
				'Design Your Own' => 'advanced',
			),
			'desc' => __( 'We have given three quick preset if you are in a hurry. Otherwise, create your own with various options.', 'mondira' ),
		),
		'icon_color_bg' => array(
			'type' => 'colorpicker',
			'title' => __( 'Background Color', 'mondira' ),
			'value' => '#ffffff',
			'desc' => __( 'Select Background Color for your Icon.', 'mondira' ),	
			'dependency' => array( 'element' => 'icon_style', 'value' => array( 'circle', 'square', 'advanced' ) )
		),
		'icon_border_style' => array(
			'type' => 'select',
			'title' => __( 'Icon Border Style', 'mondira' ),
			'value' => $border_style_arr,
			'desc' => __( 'Select the Border Style for your Icon.', 'mondira' ),
			'dependency' => array( 'element' => 'icon_style', 'value' => array( 'advanced' ) )
		),
		'icon_color_border' => array(
			'type' => 'colorpicker',
			'title' => __( 'Border Color', 'mondira' ),
			'value' => '#333333',
			'desc' => __( 'Select Border Color for your Icon.', 'mondira' ),	
			'dependency' => array( 'element' => 'icon_border_style', 'not_empty' => true ),
		),
		'icon_border_size' => array(
			'type' => 'number',
			'title' => __( 'Border Width', 'mondira' ),
			'value' => 1,
			'min' => 1,
			'max' => 10,
			'postfix' => 'px',
			'desc' => __( 'Thickness of the border for your Icon.', 'mondira' ),
			'dependency' => array( 'element' => 'icon_border_style', 'not_empty' => true ),
		),
		'icon_border_radius' => array(
			'type' => 'number',
			'title' => __( 'Border Radius', 'mondira'),
			'value' => 500,
			'min' => 1,
			'max' => 500,
			'postfix' => 'px',
			'desc' => __( '0 pixel value will create a square border. As you increase the value, the shape convert in circle slowly. (e.g 500 pixels).', 'mondira' ),
			'dependency' => array( 'element' => 'icon_border_style', 'not_empty' => true ),
		),
		'icon_border_spacing' => array(
			'type' => 'number',
			'title' => __( 'Background Size', 'mondira' ),
			'value' => 50,
			'min' => 30,
			'max' => 500,
			'postfix' => 'px',
			'desc' => __( 'Spacing from center of the icon till the boundary of border / background', 'mondira' ),
			'dependency' => array( 'element' => 'icon_border_style', 'not_empty' => true ),
		),
		'icon_link' => array(
			'type' => 'text',
			'title' => __( 'Link ', 'mondira' ),
			'description' => __( 'Add a custom link or select existing page url. You can remove existing link as well.', 'mondira' )
		),
		'icon_animation' => array(
			'type' => 'select',
			'title' => __( 'Icon Animation', 'mondira' ),
			'value' => $css3_animation_arr,
			'description' => __( 'Like CSS3 Animations? We have several options for your Icon!', 'mondira' )
		),
		'tooltip_disp' => array(
			'type' => 'select',
			'title' => __( 'Tooltip', 'mondira' ),
			'values' => array(
				'' => 'None',
				'left' => 'Tooltip from Left',
				'right' => 'Tooltip from Right',
				'top' => 'Tooltip from Top',
				'bottom' => 'Tooltip from Bottom'
			),
			'desc' => __( 'Select the tooltip position', 'mondira' ),
		),							
		'tooltip_text' => array(
			'type' => 'text',
			'title' => __( 'Tooltip Text', 'mondira' ),
			'desc' => __( 'Enter your Tooltip Text here.', 'mondira' ),
			'dependency' => array( 'element' => 'tooltip_disp', 'not_empty' => true ),
		),
		'icon_align' => array(
			'type' => 'select',
			'title' => __( 'Icon Align', 'mondira' ),
			'value' => $text_alignment_arr
		),
		'el_class' => array(
			'type' => 'text',
			'title' => __( 'Custom CSS Class', 'mondira' ),
			'desc' => __( 'Ran out of options? Need more styles? Write your own CSS and mention the class name here.', 'mondira' )
		)
	) 
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
		'mp3'=>array('type'=>'attach_file', 'title'=>__( 'MP3 File URL', 'mondira' )),
		'oga'=>array('type'=>'attach_file', 'title'=>__( 'OGA File URL', 'mondira' )),
		'wav'=>array('type'=>'attach_file', 'title'=>__( 'WAV File URL', 'mondira' )),
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
		'style'=>array(
			'type'=>'select', 
			'class'=>'', 
			'title'=>__( 'Button Style', 'mondira' ),
			'values'=>array(
				'btn-theme-default'=>'Theme Default',
				'btn-white'=>'Button White'
			)
		),
		'size'=>array(
			'type'=>'select', 
			'class'=>'', 
			'title'=>__( 'Button Size', 'mondira' ),
			'values'=>array(
				'btn-df'=>'Default',
				'btn-xs'=>'Small',
				'btn-sm'=>'Medium',
				'btn-lg'=>'Large',
				'btn-elg'=>'Extra Large'
			)
		),
		'text'=>array(
			'type'=>'text', 
			'desc' => '', 
			'title'=>__( 'Button Text', 'mondira' )
		),
		'icon_class'=>array(
			'type'=>'text', 
			'desc' => __( 'You can get the font awesome icon class <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">from here</a>, just copy and post it here. ', 'mondira' ), 
			'title'=>__( 'Icon Class', 'mondira' )
		),
		'src'=>array(
			'type'=>'text', 
			'class'=>'', 
			'title'=>__( 'Target SRC', 'mondira' ),
			'values'=> '#'
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
$custom_shortcodes['mondira_scroll_top'] = array( 
	'type'=>'regular', 
	'title'=>__( 'Scroll To Top', 'mondira' ), 
	'attr'=>array( 
		'scroll_text'=>array(
			'type'=>'text', 
			'value'=>'Move To Top', 
			'desc' => __( 'Enter the text for scroll to top', 'mondira' ), 
			'title'=> __( 'Scroll To Top Text', 'mondira' )
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
				'alert-success'=>'Success',
				'alert-info'=>'Info',
				'alert-warning'=>'Warning',
				'alert-danger'=>'Danger'
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
		'space_height'=>array(
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
		'icon_class'=>array(
			'type'=>'text', 
			'desc' => __( 'You can get the font awesome icon class <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">from here</a>, just copy and post it here. ', 'mondira' ), 
			'title'=>__( 'Icon Class', 'mondira' )
		),
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
		'html'=>array(
			'html' => __('<p>Only supply the formats you desire, this shortcode is just a shortcut to place the <a href="https://codex.wordpress.org/Video_Shortcode" target="_blank">default WordPress video player</a>.</p>', 'mondira')
		),
		'mp4'=>array('type'=>'attach_file', 'title'=>__( 'MP4 File URL', 'mondira' )), 
		'mov'=>array('type'=>'attach_file', 'title'=>__( 'MOV File URL', 'mondira' )),
		'ogv'=>array('type'=>'attach_file', 'title'=>__( 'OGV FILE URL', 'mondira' )),
		'poster'=>array(
			'type'=>'attach_image', 
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
		'video_id'=>array(
			'type'=>'text', 
			'desc' => 'Vimeo video id only, not the full url. Ex: http://vimeo.com/105255583382 here 105255583382 is the value you need to put as video id.', 
			'title'=>__( 'Video ID', 'mondira' )
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
		'video_id'=>array(
			'type'=>'text', 
			'desc' => 'Youtube video id only, not the full url. Ex: https://www.youtube.com/watch?v=DqVPbEcXXXWtA0 here DqVPbEcXXXWtA0 is the value you need to put as video id.', 
			'title'=>__( 'Video ID', 'mondira' )
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
		$i = 0;
		foreach( $custom_shortcodes as $key => $attr ) {
			if ( $key == 'header_6' ) {
				$i++;	
			}
			$shortcodes_tmp_array[$i][$attr['title']] = $key;
		}
		
		$final_shortcodes = array();
		foreach( $shortcodes_tmp_array as $index=>$values ){
			$tmp = array();
			$tmp1 = array();
			foreach( $values as $key=>$val ) {
				if ( $val == 'header_6' ) {
					$tmp[$key] = $val;	
				} else {
					$tmp1[$key] = $val;
				}
			}
			sort( $tmp1 );
			$tmp_new = array_merge( $tmp, $tmp1 );
			
			
			$final_shortcodes = array_merge( $final_shortcodes, $tmp_new );
		}
		$shortcodes_tmp_array = $final_shortcodes;
		foreach( $shortcodes_tmp_array as $key => $val ) {
			$MondiraThemeShortcodesGenerator->mondira_addshortcode( $val, $custom_shortcodes[$val] );
		}
	} 
}