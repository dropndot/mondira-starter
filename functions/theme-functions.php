<?php 
/**
* This file contained a set of functions for this theme.
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
Arial, Arial, Helvetica, sans-serif
Arial Black, Arial Black, Gadget, sans-serif
Comic Sans MS, Comic Sans MS5, cursive
Courier New, Courier New, monospace
Georgia1, Georgia, serif
Impact, Impact5, Charcoal6, sans-serif
Lucida Console, Monaco5, monospace
Lucida Sans Unicode, Lucida Grande, sans-serif
Palatino Linotype, Book Antiqua3, Palatino, serif
Tahoma, Geneva, sans-serif
Times New Roman, Times New Roman, Times, serif
Trebuchet MS1, Trebuchet MS, sans-serif
Verdana, Verdana, Geneva, sans-serif
*/
if ( !function_exists( 'get_mondira_available_fonts' ) ) {
    function get_mondira_available_fonts() {
        $availablefonts = array(
            'default' => array(
                'name' => 'default',
                'import' => '',
                'css' => "font-family: Arial, sans-serif !important;"
            ),
            'open-sans' => array(
                'name' => 'Open Sans',
                'import' => '@import url(http://fonts.googleapis.com/css?family=Open+Sans);',
                'css' => "font-family: 'Open Sans', sans-serif !important;"
            ),
            'lato' => array(
                'name' => 'Lato',
                'import' => '@import url(http://fonts.googleapis.com/css?family=Lato);',
                'css' => "font-family: 'Lato', sans-serif !important;"
            ),
            'arial' => array(
                'name' => 'Arial',
                'import' => '',
                'css' => "font-family: Arial, Helvetica, sans-serif !important;"
            ),
            'arial-black' => array(
                'name' => 'Arial Black',
                'import' => '',
                'css' => "font-family: 'Arial Black', Gadget, sans-serif !important;"
            ),
            'comic-sans-ms' => array(
                'name' => 'Comic Sans MS',
                'import' => '',
                'css' => "font-family: 'Comic Sans MS', 'Comic Sans MS5', cursive !important;"
            ),
            'courier-new' => array(
                'name' => 'Courier New',
                'import' => '',
                'css' => "font-family: 'Courier New', monospace !important;"
            ),
            'georgia1' => array(
                'name' => 'Georgia1',
                'import' => '',
                'css' => 'font-family: Georgia1, Georgia, serif !important;'
            ),
            'impact' => array(
                'name' => 'Impact',
                'import' => '',
                'css' => 'font-family: Impact, Impact5, Charcoal6, sans-serif !important;'
            ),
            'lucida-console' => array(
                'name' => 'Lucida Console',
                'import' => '',
                'css' => 'font-family: Lucida Console, Monaco5, monospace !important;'
            ),
            'palatino-linotype' => array(
                'name' => 'Palatino Linotype',
                'import' => '',
                'css' => "font-family: 'Palatino Linotype', 'Book Antiqua3', Palatino, serif !important;"
            ),
            'tahoma' => array(
                'name' => 'Tahoma',
                'import' => '',
                'css' => 'font-family: Tahoma, Geneva, sans-serif !important;'
            ),
            'geneva' => array(
                'name' => 'Geneva',
                'import' => '',
                'css' => 'font-family: Geneva, Tahoma, sans-serif !important;'
            ),
            'times-new-roman' => array(
                'name' => 'Times New Roman',
                'import' => '',
                'css' => "font-family: 'Times New Roman', Times, serif !important;"
            ),
            'trebuchet-ms1' => array(
                'name' => 'Trebuchet MS1',
                'import' => '',
                'css' => "font-family: 'Trebuchet MS1', 'Trebuchet MS', sans-serif !important;"
            ),
            'verdana' => array(
                'name' => 'Verdana',
                'import' => '',
                'css' => 'font-family: Verdana, Verdana, Geneva, sans-serif !important;'
            ),
            'cursive' => array(
                'name' => 'Cursive',
                'import' => '',
                'css' => "font-family: Cursive, Arial, sans-serif !important;"
            )
        );

        return apply_filters( 'mondira_available_fonts', $availablefonts );
    }
}


/*
* Generate RGB colors from given HEX color.
*
* @function: mondira_hex2rgb()
* @Since: 1.0.0
* @param: $hex - HEX color value
* 		  $opecaty - Opacity in float value
* @returns: value with rgba(r,g,b,opacity);
*/
if ( !function_exists( 'mondira_hex2rgb' ) ) {
	function mondira_hex2rgb( $hex, $opacity = 1 ) {
	   $hex = str_replace( "#", "", $hex );
	   if ( strlen( $hex ) == 3 ) {
		  $r = hexdec( substr( $hex, 0, 1 ).substr( $hex, 0, 1 ) );
		  $g = hexdec( substr( $hex, 1, 1 ).substr( $hex, 1, 1 ) );
		  $b = hexdec( substr( $hex, 2, 1 ).substr( $hex, 2, 1 ) );
	   } else {
		  $r = hexdec( substr( $hex, 0, 2) );
		  $g = hexdec( substr( $hex, 2, 2) );
		  $b = hexdec( substr( $hex, 4, 2) );
	   }
	   $rgba = 'rgba('.$r.','.$g.','.$b.','.$opacity.')';
	   return $rgba; // returns an array with the rgb values
	}
}

/*
*
* Color select options array for theme settings or custom post type meta fields.
*
* @return (array) of color list
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014
*/
if ( !function_exists( 'mondira_color_select_options' ) ) {
	function mondira_color_select_options() {
		$colors = array( 
			'mondira_color_blue'=>'Blue', 
			'mondira_color_turquoise'=>'Turquoise', 
			'mondira_color_pink'=>'Pink', 
			'mondira_color_violet'=>'Violet', 
			'mondira_color_peacoc'=>'Peacoc', 
			'mondira_color_chino'=>'Chino', 
			'mondira_color_mulled_wine'=>'Mulled Wine', 
			'mondira_color_vista_blue'=>'Vista Blue', 
			'mondira_color_black'=>'Black', 
			'mondira_color_grey'=>'Gray', 
			'mondira_color_orange'=>'Orange', 
			'mondira_color_sky'=>'Sky', 
			'mondira_color_green'=>'Green', 
			'mondira_color_juicy_pink'=>'Juicy Pink', 
			'mondira_color_sandy_brown'=>'Sandy Brown', 
			'mondira_color_purple'=>'Purple', 
			'mondira_color_white'=>'White', 
			'custom'=>'Custom', 
		);		
		return $colors;
	}
}
         
/*
*
* Mondira color codes hex value.
* With returning color value you can convert that hex value to rgba with mondira_hex2rgb( $hex, $opacity );
*
* @return hex value for a given color
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014
*/
if ( !function_exists( 'mondira_color_hex' ) ) {
	function mondira_color_hex( $mondira_color_name = 'custom' ) {
		$colors = array( 
			'mondira_color_blue'=>'#1e73be', 
			'mondira_color_turquoise'=>'#00c1cf', 
			'mondira_color_pink'=>'#fe6c61', 
			'mondira_color_violet'=>'#8d6dc4', 
			'mondira_color_peacoc'=>'#4cadc9', 
			'mondira_color_chino'=>'#cec2ab', 
			'mondira_color_mulled_wine'=>'#50485b', 
			'mondira_color_vista_blue'=>'#75d69c', 
			'mondira_color_black'=>'#2a2a2a', 
			'mondira_color_grey'=>'#ebebeb', 
			'mondira_color_orange'=>'#f7be68', 
			'mondira_color_sky'=>'#5aa1e3', 
			'mondira_color_green'=>'#6dab3c', 
			'mondira_color_juicy_pink'=>'#f4524d', 
			'mondira_color_sandy_brown'=>'#f79468', 
			'mondira_color_purple'=>'#b97ebb', 
			'mondira_color_white'=>'#ffffff', 
			//'custom'=>'Custom', 
		);		
		// foreach( $colors as $k=>$v) {
			// echo '
			// .mondira-slide-content-inner .text-color-'.$k.' {
				// color: '.mondira_hex2rgb( $v, 1 ).'; 
			// }
			// ';
		// }
		if ( empty( $colors[ $mondira_color_name ] ) || $colors[ $mondira_color_name ] == 'Custom' ) {
			return '';
		} else {
			return $colors[ $mondira_color_name ];
		}
	}
}
         

/**
*
* Filter to replace demo media base url for demo initializer on general theme options.
*
* @return text URL content for demo media base url
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014
* */
if ( !function_exists( 'mondira_media_demo_base_url_filter' ) ) {
    add_filter( 'media_demo_base_url', 'mondira_media_demo_base_url_filter', 10 , 3 );
    function mondira_media_demo_base_url_filter(  ) {
        $media_demo_base_url = 'http://demo-source-domain.com/wp-content/uploads/sites/2/'; //Not it should have a / at the end of url
        return $media_demo_base_url;
    }
}
         

/**
*
* Is the site left sidebar based to header top based layout.
*
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014
* */
if ( !function_exists( 'mondira_site_header_layout' ) ) {
    function mondira_site_header_layout() {
        $site_layout = mondira_get_option( 'general', 'website_layout', 'top' );
        return $site_layout;
    }
}


/**
*
* Is the site based on header top layout
*
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014
* */
if ( !function_exists( 'mondira_is_wide_layout' ) ) {
    function mondira_is_wide_layout() {
        if ( mondira_site_header_layout() == 'top' ) {
            return true;
        } 
        return false;
    }
}

/**
*
* Is the site global loading enabled?
* 
* @since 1.0.0
* */
if ( !function_exists( 'mondira_is_global_loading' ) ) {
    function mondira_is_global_loading() {
		global $post;
		$enable_global_page_loading = get_post_meta( $post->ID, 'page-other_enable_global_page_loading', TRUE );
		
		
		$p_category = get_query_var( 'portfolio_category' );
        if ( mondira_get_option( 'general', 'global_loading' ) == 'yes' ) {
            return true;
        } else if ( get_post_type( $post ) == 'page' && !empty( $enable_global_page_loading ) && $enable_global_page_loading == 'yes' ) {
            return true;
        } else if ( is_page_template( 'templates/template-portfolio1.php' ) ) {
			return true;
		} else if ( !is_singular() && ( get_post_type() == 'portfolio' || is_archive( 'portfolio' ) ) ) {
			return true;
		} else if ( !empty( $p_category ) ) {
			return true;
		} else if ( is_post_type_archive( 'portfolio' ) ) {
			return true;
		} else if ( is_front_page() && is_home() ) {
			return true;
		} elseif ( is_front_page() ) {
			return true;
		} elseif ( is_home() ) {
			return true;
		}
		
        return false;
    }
}

/**
*
* Adding favicon on theme head jquery.nicescroll.350beta5.
*
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014
* */
if ( !function_exists( 'mondira_nicescroll' ) ) {
    function mondira_nicescroll() {
        $enable_nicescroll = mondira_get_option( 'others', 'enable_nicescroll', 'no' );      
        if ( $enable_nicescroll == 'yes' ) {   
        ?>
        <!-- NiceScroll -->
        <script type="text/javascript">
            /* <![CDATA[ */
            jQuery(document).ready(function() { 
                jQuery("html").niceScroll({cursorwidth:"10px", cursorborder:"0px"});
            });
            /* ]]> */
        </script>
        <?php 
        }
    }
}
if ( !is_admin() ) {
    add_action('wp_head', 'mondira_nicescroll');
}


/**
*
* Adding Open Graph Content.
*
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014
* */
if ( !function_exists( 'mondira_add_opengraph' ) ) {
    function mondira_add_opengraph() {
        global $post; 
        if ( empty( $post ) ) {
            return "";
        }
        
        echo "\n<!-- " . get_bloginfo( 'name' ) . " Open Graph Tags -->\n";
        
        echo "<meta property='og:site_name' content='". get_bloginfo( 'name' ) ."'/>\n"; 
        echo "<meta property='og:url' content='" . get_permalink() . "'/>\n"; 

        if ( is_singular() ) { 
            echo "<meta property='og:title' content='" . get_the_title() . "'/>\n"; 
            echo "<meta property='og:type' content='article'/>\n"; 
            
            $content = ( !empty( $post->post_excerpt ) ) ?
                            wp_trim_words( strip_shortcodes( $post->post_excerpt ), 30 ) :
                                wp_trim_words( strip_shortcodes( $post->post_content ), 30 ); 
            if ( empty( $content ) ) {
                $content = "Visit the post for more.";
            }
            echo "<meta property='og:description' content='" . $content . "' />\n";
        } elseif( is_front_page() or is_home() ) { 
            echo "<meta property='og:title' content='" . get_bloginfo( "name" ) . "'/>\n"; 
            echo "<meta property='og:type' content='website'/>\n"; 
        }

        if( has_post_thumbnail( $post->ID ) ) { 
            $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
            echo "<meta property='og:image' content='" . esc_attr( $thumbnail[0] ) . "'/>\n";
        }
        echo "\n";
    }
}
if ( !defined('WPSEO_VERSION') && !class_exists('NY_OG_Admin')) {
    add_action( 'wp_head', 'mondira_add_opengraph', 5 );
}


/**
*
* Adding favicon on theme head.
*
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014
* */
if ( !function_exists( 'mondira_favicon' ) ) {
    function mondira_favicon() {
        $custom_favicon = mondira_get_option( 'others', 'favicon_url', '' );      
        ?>
        <!-- FavIcon -->
        <?php 
        $custom_favicon = mondira_get_option( 'others', 'favicon_url', '' );  
        if ( !empty( $custom_favicon ) ) { ?>
			<link rel="shortcut icon" href="<?php echo $custom_favicon; ?>" type="image/x-icon">
			<link rel="icon" href="<?php echo $custom_favicon; ?>" type="image/x-icon">
        <?php } else { ?>
            <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
            <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
        <?php }
    }
}
add_action( 'wp_head', 'mondira_favicon' ); 
 
 
/**
*
* Adding typography css which is changable by theme settings.
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014
* */
if ( !function_exists( 'mondira_theme_options_custom_css' ) ) {
	function mondira_theme_options_custom_css(){
		global $post;

		$theme_typography_styles = '';
		wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/resources/css/custom_css.css' );

		$additional_css = mondira_get_option( 'others', 'custom_css', '' );
		if ( $additional_css ) {
			$theme_typography_styles .= $additional_css;
		}
			
		$theme_typography_styles = apply_filters( 'theme_shortcode_typography_styles', $theme_typography_styles );    
		if ( $theme_typography_styles ){
			wp_add_inline_style( 'custom-style', $theme_typography_styles );
		} 
	} 
} 
add_action( 'wp_enqueue_scripts', 'mondira_theme_options_custom_css', 21 );


/*
*
* Show analytics code in footer.
* 
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014
*/
if ( !function_exists( 'mondira_footer_analytics' ) ) {
    function mondira_footer_analytics() {
        $google_analytics = mondira_get_option( 'others', 'google_analytics', '' );      
        if ( $google_analytics <> '' ) {
            echo stripslashes( $google_analytics ) . "\n";
        }
    }
}
add_action( 'wp_footer', 'mondira_footer_analytics' );


/*
* 
* Return custom_post_type/post items first image if it is a gallery post format.
* 
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014
*/
if ( !function_exists( 'mondira_post_gallery_first_image' ) ) {
    function mondira_post_gallery_first_image( $postid ) {
        $post_type = get_post_type( $postid );   
        $mondira_post_gallery_first_image = '';
        $max_gallery_image = ponom_get_the_number_of_max_gallery_image();
        for( $i=1; $i <= $max_gallery_image; $i++ ) {
            $tmp_image = get_post_meta( $postid, $post_type . '-gallery_gallery_image'.$i, TRUE );
            
            if ( empty( $tmp_image ) || ( filter_var( $tmp_image, FILTER_VALIDATE_URL ) === FALSE ) ) {
                continue;
            } else {
                $mondira_post_gallery_first_image = $tmp_image;
                break;
            }
        }
        return $mondira_post_gallery_first_image;
    }
}


/*
*
* Removing all unwanted shortcodes from specific custom page templates.
* 
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014
*/
if ( !function_exists( 'mondira_remove_shortcodes' ) ) {    
    function mondira_remove_shortcodes( $content ) {
        global $shortcode_tags;
		
		return $content;
    }
}
add_filter( 'the_content', 'mondira_remove_shortcodes', 6);     
    

/*
*
* return the number of max gallery images to show.
* 
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014
*/
if (!function_exists('mondira_get_the_number_of_max_gallery_image')) {    
    function mondira_get_the_number_of_max_gallery_image() {
        $max_number_of_gallery_image = mondira_get_option( 'blog', 'max_number_of_gallery_image', 10 );  
        return $max_number_of_gallery_image;
    }
}


/*
*
* return the number of max gallery images to show.
* 
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014
*/
if ( !function_exists( 'mondira_get_the_attachments_id_by_url' ) ) {
    function mondira_get_the_attachments_id_by_url( $image_src ) {
        global $wpdb;
        $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
        $id = $wpdb->get_var( $query );
        return $id;
    }
}


/*
*
* Return the of next_post_link WordPress default function.
* 
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 09 Nov, 2014
*/
if ( !function_exists( 'mondira_get_next_post_link' ) ) {
	function mondira_get_next_post_link( $link, $title ) {
		ob_start();
		next_post_link( $link, $title );
		$buffer = ob_get_contents();
		ob_end_clean();
		
		return $buffer;
	}
}

/*
*
* Return the of previous_post_link WordPress default function.
* 
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 09 Nov, 2014
*/
if ( !function_exists( 'mondira_get_previous_post_link' ) ) {
	function mondira_get_previous_post_link( $link, $title ) {
		ob_start();
		previous_post_link( $link, $title );
		$buffer = ob_get_contents();
		ob_end_clean();
		
		return $buffer;
	}
}


/*
*
* Return the of previous_posts_link WordPress default function.
* 
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 09 Nov, 2014
*/
if ( !function_exists( 'mondira_get_previous_posts_link' ) ) {
	function mondira_get_previous_posts_link( $title ) {
		ob_start();
		previous_posts_link( $title );
		$buffer = ob_get_contents();
		ob_end_clean();
		
		return $buffer;
	}
}

/*
*
* Return the of next_posts_link WordPress default function.
* 
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 09 Nov, 2014
*/
if ( !function_exists( 'mondira_get_next_posts_link' ) ) {
	function mondira_get_next_posts_link( $title ) {
		ob_start();
		next_posts_link( $title );
		$buffer = ob_get_contents();
		ob_end_clean();
		
		return $buffer;
	}
}


/*
*
* Return the of previous_comments_link WordPress default function.
* 
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 09 Nov, 2014
*/
if ( !function_exists( 'mondira_get_previous_comments_link' ) ) {
	function mondira_get_previous_comments_link( $title ) {
		ob_start();
		previous_comments_link( $title );
		$buffer = ob_get_contents();
		ob_end_clean();
		
		return $buffer;
	}
}

/*
*
* Return the of next_comments_link WordPress default function.
* 
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 09 Nov, 2014
*/
if ( !function_exists( 'mondira_get_next_comments_link' ) ) {
	function mondira_get_next_comments_link( $title ) {
		ob_start();
		next_comments_link( $title );
		$buffer = ob_get_contents();
		ob_end_clean();
		
		return $buffer;
	}
}
