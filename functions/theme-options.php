<?php
/**
* This file contained theme posts format options
*
*
* @package WordPress
* @subpackage Mondira
* @version 1.0.0 
* @author Jewel Ahmed <tojibon@gmail.com>
* @author url http://mondira.com
* @copyright  Copyright (c) 2013, Jewel Ahmed
*/

//Blog link post format meta fields
$mconfig = array(
    'title' => 'Link Settings',
    'id' => 'post-link',
    'page' => 'post'
);  

$options = array(
    array(
        "title" => "The URL",
        "desc" => "Insert the URL you wish to link to with http://.",
        "id" => "_the_url",
        "default" => "",
        "class" => "large",
        "type" => "text"
    ),
);
$mondira_post_meta = array( 'config'=>$mconfig, 'options' => $options );
$mondiraPostMeta = new MondiraThemeMetabox( $mondira_post_meta );
$mondiraPostMeta->init();

//Blog quote post format meta fields
$mconfig = array(
    'title' => 'Quote Settings',
    'id' => 'post-quote',
    'page' => 'post'
);

$options = array(
    array(
        "title" => "The Quote",
        "desc" => "Write your quote in this field.",
        "id" => "_the_quote",
        "default" => "",
        "class" => "regular-text",
        "type" => "textarea"
    ),
    array(
        "title" => "Quote Author",
        "desc" => "",
        "id" => "_quote_author",
        "default" => "",
        "class" => "regular-text",
        "type" => "text"
    ),
);
$mondira_post_meta = array( 'config' => $mconfig, 'options' => $options );
$mondiraPostMeta = new MondiraThemeMetabox( $mondira_post_meta );
$mondiraPostMeta->init();


//Blog gallery post format meta fields
$mconfig = array(
    'title' => 'Gallery Settings',
    'id' => 'post-gallery',
    'page' => 'post'
);

$options = array(
    array(
        "title" => "Index Listing Image Height",
        "desc" => "Blog Index listing image height in px. Ex/Default: 400",
        "id" => "_media_image_height",
        "default" => "400",
        "class" => "regular-text",
        "type" => "text"
    ),
    array(
        "title" => "Enable Gallery View",
        "desc" => "Check this to enable the gallery view like Slider view instead of one by one view on post single layout.",
        "id" => "_enable_gallery",
        "default" => "",         
        "type" => "checkbox", 
        "class" => ""
    ),
    array(
        "title" => "Disable Lightbox",
        "desc" => "Check this to disable the default lightbox.",
        "id" => "_disable_lightbox",
        "default" => "",         
        "type" => "checkbox", 
        "class" => ""
    ),
);

$gallery_options = array();
$max_gallery_image = mondira_get_the_number_of_max_gallery_image();
for( $i=1; $i <= $max_gallery_image; $i++ ) {
    $gallery_options[] = array(
        "title" => "Gallery Image " . $i,
        "desc" => "The image file url with http://.",
        "id" => "_gallery_image" . $i,
        "default" => "",         
        "avoid_br" => "no",
        "type" => "upload",
        "upload" => array('title'=>'Upload Image'),
        "class" => "regular-text"
    );
}
$options = array_merge( (array) $options, (array) $gallery_options );

$mondira_post_meta = array( 'config' => $mconfig, 'options' => $options );
$mondiraPostMeta = new MondiraThemeMetabox( $mondira_post_meta );
$mondiraPostMeta->init();

//Blog image post format meta fields
$mconfig = array(
    'title' => 'Image Settings',
    'id' => 'post-image',
    'page' => 'post'
);

$options = array(
    array(
        "title" => "Index Listing Image Height",
        "desc" => "Blog Index listing image height in px. Ex/Default: 400",
        "id" => "_media_image_height",
        "default" => "400",
        "class" => "regular-text",
        "type" => "text"
    ),
    array(
        "title" => "Disable Lightbox",
        "desc" => "Check this to disable the default lightbox.",
        "id" => "_disable_lightbox",
        "default" => "",         
        "type" => "checkbox", 
        "class" => ""
    ),
);
$mondira_post_meta = array( 'config' => $mconfig, 'options' => $options );
$mondiraPostMeta = new MondiraThemeMetabox( $mondira_post_meta );
$mondiraPostMeta->init();

//Audio Meta Settings for Blog Post Posts
$mconfig = array(
    'title' => 'Audio Settings',
    'id' => 'post-audio',
    'page' => 'post'
);

//'mp3', 'm4a', 'ogg', 'wav', 'wma'
$options = array(
    array(
        "title" => "Html",
        "id" => "_audio_html",
        "type" => "html",
        "html" => "<p>Note that for audio, you must supply both MP3 and OGG files to satisfy all browsers.</p>"                      
    ),
    array(
        "title" => "MP3 File URL",
        "desc" => "The URL to the .mp3 audio file",
        "id" => "_audio_mp3",
        "default" => "",                                
        "avoid_br" => "no",
        "type" => "upload_zip",
        "upload_zip" => array('title'=>'Upload .Mp3'),
        "class" => "regular-text"                      
    ),
    array(
        "title" => "OGA File URL",
        "desc" => "The URL to the .oga, .ogg audio file",
        "id" => "_audio_oga",
        "default" => "",         
        "avoid_br" => "no",
        "type" => "upload_zip",
        "upload_zip" => array('title'=>'Upload .Oga'),
        "class" => "regular-text"
    ),
	array(
        "title" => "Html",
        "id" => "_audio_html",
        "type" => "html",
        "html" => "<hr />"                      
    ),                 
    array(
        "title" => "Embeded Code - Soundcloud",
        "desc" => "If you're not using self hosted audio then you can include embeded code here. Ex: Soundcloud Embeded Code.",
        "id" => "_embeded_code",
        "default" => "",         
        "avoid_br" => "no",
        "type" => "textarea",
        "class" => "regular-text"
    ),    
);
$mondira_post_meta = array( 'config' => $mconfig, 'options' => $options );
$mondiraPostMeta = new MondiraThemeMetabox( $mondira_post_meta );
$mondiraPostMeta->init();


//Video Meta Settings for Blog Post Post
$mconfig = array(
    'title' => 'Video Settings',
    'id' => 'post-video',
    'page' => 'post'
);

//'mp4', 'm4v', 'webm', 'ogv', 'wmv', 'flv'
$options = array(
    array(
        "title" => "Html",
        "id" => "_video_html",
        "type" => "html",
        "html" => "<p>Note that for video, you must supply an M4V file to satisfy both HTML5 and Flash solutions. The optional OGV format is used to increase x-browser support for HTML5 browsers such as Firefox and Opera.</p>"                      
    ),
    array(
        "title" => "MP4 File URL",
        "desc" => "The URL to the .mp4 video file",
        "id" => "_video_mp4",
        "default" => "",         
        "avoid_br" => "no",
        "type" => "upload_zip",
        "upload_zip" => array('title'=>'Upload .MP4'),
        "class" => "regular-text"
    ),
    array(
        "title" => "OGV File URL",
        "desc" => "The URL to the .ogv video file",
        "id" => "_video_ogv",
        "default" => "",         
        "avoid_br" => "no",
        "type" => "upload_zip",
        "upload_zip" => array('title'=>'Upload .Ogv'),
        "class" => "regular-text"
    ),
    array(
        "title" => "MOV File URL",
        "desc" => "The URL to the .mov video file",
        "id" => "_video_mov",
        "default" => "",         
        "avoid_br" => "no",
        "type" => "upload_zip",
        "upload_zip" => array('title'=>'Upload .Mov'),
        "class" => "regular-text"
    ),
    array(
        "title" => "Poster Image",
        "desc" => "The preivew image file url with http://.",
        "id" => "_poster_image",
        "default" => "",         
        "avoid_br" => "no",
        "type" => "upload",
        "upload" => array('title'=>'Upload Poster Image'),
        "class" => "regular-text"
    ),
    array(
        "title" => "Html",
        "id" => "_video_html",
        "type" => "html",
        "html" => "<hr />"                      
    ),
    
    array(
        "title" => "Embeded Code",
        "desc" => "If you're not using self hosted video then you can include embeded code here. Best viewed at 754x400 in px.",
        "id" => "_embeded_code",
        "default" => "",         
        "avoid_br" => "no",
        "type" => "textarea",
        "class" => "regular-text"
    ),    
);
//For Blog Post
$mondira_post_meta = array( 'config' => $mconfig, 'options' => $options );
$mondiraPostMeta = new MondiraThemeMetabox( $mondira_post_meta );
$mondiraPostMeta->init();


$mconfig = array(
    'title' => 'Page Header Settings',
    'id' => 'page-header',
    'page' => 'page'
);

$options = array(
     array(
        "title" => "Html",
        "id" => "_page_html",
        "type" => "html",
        "html" => "<p>Note that for each page you can do some customization for header, like choose transparent header, full width for featured image etc. Page featured image is supposed to display as header image, when on top of it you also can display header title and sub title.</p>"                      
    ),
    array(
        "title" => "Enable Transparent Header (Navigation)",
        "desc" => "Check this to make the header transparent.",
        "id" => "_enable_transparent_header",
        "default" => "",         
        "type" => "checkbox", 
        "class" => ""
    ),
    array(
        "title" => "Page Header Image",
        "desc" => "",
        "id" => "_header_image",
        "default" => "",         
        "avoid_br" => "no",
        "type" => "upload",
        "upload" => array( "title" => "Header Image" ),
        "class" => "regular-text"
    ),
    array(
        "title" => "Page Header Background Color",
        "desc" => "Select a custom header background color.",
        "id" => "_header_background_color",
        "default" => "",
        "data-default-color" => "",
        "class" => "regular-text",
        "type" => "color"
    ),
    
    array(
        "title" => "Page Header Text Color",
        "desc" => "Select a custom header text color.",
        "id" => "_header_text_color",
        "default" => "",
        "data-default-color" => "",
        "class" => "regular-text",
        "type" => "color"
    ),
    
    array(
        "title" => "Full Width Page Header",
        "desc" => "Check this to make the page header section with a full width.",
        "id" => "_enable_fullwidth_header_image",
        "default" => "",         
        "type" => "checkbox", 
        "class" => ""
    ),
    array(
        "title" => "Parallax Page Header?",
        "desc" => "If you would like your header to have a parallax scroll effect you can select yes.",
        "id" => "_enable_parallax_header",
        "default" => "",         
        "type" => "checkbox", 
        "class" => ""
    ),
    array(
        "title" => "Page Header Height",
        "desc" => "Don't include \"px\" in the string. e.g. 320",
        "id" => "_page_header_height",
        "default" => "320",
        "class" => "regular-text",
        "type" => "text"
    ),
    array(
        "title" => "Page Header Title",
        "desc" => "Enter in the page header title.",
        "id" => "_page_header_title",
        "default" => "",
        "class" => "regular-text",
        "type" => "text"
    ),
    array(
        "title" => "Page Header Sub Title",
        "desc" => "Enter in the page header sub title.",
        "id" => "_page_header_sub_title",
        "default" => "",
        "class" => "regular-text",
        "type" => "text"
    ),
    array(
        "title" => "Page Header Content Alignment",
        "desc" => "Select a alignment for page header.",
        "id" => "_page_header_content_align",
        "options" => array( 'left'=>'Left Align', 'center'=>'Center Align', 'right'=>'Right Align' ), 
        "class" => "regular-text",
        "default" => "left",
        "type" => "select",
        "avoid_br" => "yes"
    )
);

$mondira_page_meta = array( 'config' => $mconfig, 'options' => $options );
$mondiraPageMeta = new MondiraThemeMetabox( $mondira_page_meta );
$mondiraPageMeta->init();

$mconfig = array(
    'title' => 'Page Other Settings',
    'id' => 'page-other',
    'page' => 'page'
);

$options = array(
     array(
        "title" => "Html",
        "id" => "_page_other_html",
        "type" => "html",
        "html" => "<p>Note that, for each page individually you can apply custom css to adjust the appearance.</p>"
    ),
    array(
        "title" => "Custom CSS",
        "desc" => "",
        "id" => "_custom_css",
        "default" => "",         
        "type" => "textarea", 
        "class" => "large mondiraCSSEditor"
    )
);

$mondira_page_meta = array( 'config' => $mconfig, 'options' => $options );
$mondiraPageMeta = new MondiraThemeMetabox( $mondira_page_meta );
$mondiraPageMeta->init();