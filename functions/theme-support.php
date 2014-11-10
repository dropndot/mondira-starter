<?php
/**
* This file contained theme support functions, filters and actions
*
* @package WordPress
* @subpackage Mondira
* @since version 1.0.0 
* @author Jewel Ahmed <tojibon@gmail.com>
* @author url http://codeatomic.com
* @copyright  Copyright (c) 2014, Jewel Ahmed
* @last update 14 Oct, 2014
*/


/*
*
* Adding theme support for html5 and editor styling
*
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014
*/
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );                               
add_editor_style( 'editor-style.css' );

/*
*
* Add Twitter Bootstrap's standard 'active' class name to the active nav link item
*
* @return updated menu classes
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014
*/
if ( !function_exists( 'mondira_menu_classes' ) ) {
	function mondira_menu_classes( $classes, $item ) {
		if( $item->menu_item_parent == 0 && in_array( 'current-menu-item', $classes ) ) {
			$classes[] = "active";
			if ( ( $key = array_search( 'current-menu-item', $classes ) ) !== false ) {
				unset( $classes[ $key ] );
			}
		}
		
		if( in_array( 'current-menu-parent', $classes ) ) {
			$classes[] = "active";
		} 
		
		if( in_array( 'current_page_item', $classes ) ) {
			$classes[] = "active";
			if ( ( $key = array_search( 'current_page_item', $classes ) ) !== false ) {
				unset( $classes[ $key ] );
			}
		} 
		
		if( in_array( 'menu-item-has-children', $classes ) ) {
			$classes[] = "dropdown";
			if ( ( $key = array_search( 'menu-item-has-children', $classes ) ) !== false ) {
				unset( $classes[ $key ] );
			}
		} 
		
		if( in_array( 'current-menu-ancestor', $classes ) ) {
			$classes[] = "active";
		}
		$classes = array_unique($classes);

		return $classes;
	}
}
add_filter( 'nav_menu_css_class', 'mondira_menu_classes', 10, 2 );


/*
*
* Updating excert of posts to display custom read more button.
*
* @return updated excerpt_more
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014
*/
if ( !function_exists( 'mondira_excerpt_more' ) ) {
	function mondira_excerpt_more( $more ) {
		return '[...] <a class="more-link" href="'. get_permalink( get_the_ID() ) . '">' . __( "Continue Reading", "mondira" ) . '<span></span></a>';
	}
}
add_filter( 'excerpt_more', 'mondira_excerpt_more' );

/*
*
* Adding bootstrap support on menu items by menu walker.
*
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014
*/
if ( !class_exists( 'Mondira_Bootstrap_Walker' ) ) {
	class Mondira_Bootstrap_Walker extends Walker_Nav_Menu {
		function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			
			$class_names = $value = '';
			
			if ( !empty( $args ) && is_object( $args ) && $args->has_children ) {
				$class_names = "dropdown ";
			}

			$classes = empty( $object->classes ) ? array() : (array) $object->classes;

			$class_names .= join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
			$class_names = ' class="'. esc_attr( $class_names ) . '"';

			$output .= $indent . '<li id="menu-item-'. $object->ID . '"' . $value . $class_names .'>';
			$attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
			$attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
			$attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
			$attributes .= ! empty( $object->url )        ? ' href="'   . esc_attr( $object->url        ) .'"' : '';
			
			if ( !empty( $args ) && is_object( $args ) && $args->has_children ) {
				$attributes .= ' class="dropdown-toggle" data-toggle="dropdown"';
			}
			if ( !empty( $args ) && is_object( $args ) && $args->before ) {
				$item_output = $args->before;
			} else {
				$item_output = '';
			}
			
			$item_output .= '<a'. $attributes .'>';
			
			if ( !empty( $args ) && is_object( $args ) && $args->link_before ) {
				$item_output .= $args->link_before;
			}
			
			$item_output .= apply_filters( 'the_title', $object->title, $object->ID );
			
			if ( !empty( $args ) && is_object( $args ) && $args->link_after ) {
				$item_output .= $args->link_after;
			}
			
			if ( !empty( $args ) && is_object( $args ) && $args->has_children ) {
				$item_output .= '<span class="caret"></span></a>';
			} else {
				$item_output .= '</a>';
			}
			
			if ( !empty( $args ) && is_object( $args ) && $args->after ) {
				$item_output .= $args->after;
			}
			
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $object, $depth, $args );
		} 
			
		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<ul class=\"dropdown-menu\"  role=\"menu\">\n";
		}
		  
		function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
			$id_field = $this->db_fields['id'];
			if ( is_object( $args[0] ) ) {
				$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
			}
			return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}        
	}
}

/*
---------------------------------------------------------------------------------------
    Adding wp_nav_menu_container_allowedtags allowed tags for menu container
	
    @since: 1.0.0
	@Author: Jewel Ahmed
	@Author Web: http://codeatomic.com
	@Last Updated: 09 Nov, 2014
---------------------------------------------------------------------------------------
*/
add_filter('wp_nav_menu_container_allowedtags', 'mondira_wp_nav_menu_container_allowedtags', 10, 2 );
function mondira_wp_nav_menu_container_allowedtags(  $tags ) {
	//$allowed_tags = apply_filters( 'wp_nav_menu_container_allowedtags', array( 'div', 'nav' ) );
	//see wp-includes/nav-menu-template.php
	$tags[] = 'ul';
	return $tags;
}

/*
---------------------------------------------------------------------------------------
    Adding wp_page_menu Alternative fallback_cb for default wp_nav_menu
	Thsi fallback_cb is supposed to be used only when no menu already created by the admin user
	THIS one only supposed to work for bootstrap navbar.
	
    @since: 1.0.0
	@Author: Jewel Ahmed
	@Author Web: http://codeatomic.com
	@Last Updated: 09 Nov, 2014
---------------------------------------------------------------------------------------
*/
function mondira_wp_page_menu( $args = array() ) {
	$defaults = array('sort_column' => 'menu_order, post_title', 'menu_class' => 'menu', 'echo' => true, 'link_before' => '', 'link_after' => '');
	$args = wp_parse_args( $args, $defaults );

	$args = apply_filters( 'wp_page_menu_args', $args );
	$menu = '';
	$list_args = $args;

	if ( ! empty($args['show_home']) ) {
		if ( true === $args['show_home'] || '1' === $args['show_home'] || 1 === $args['show_home'] )
			$text = __('Home');
		else
			$text = $args['show_home'];
		$class = '';
		if ( is_front_page() && !is_paged() )
			$class = 'class="active"';
		$menu .= '<li ' . $class . '><a href="' . home_url( '/' ) . '">' . $args['link_before'] . $text . $args['link_after'] . '</a></li>';
		
		if (get_option('show_on_front') == 'page') {
			if ( !empty( $list_args['exclude'] ) ) {
				$list_args['exclude'] .= ',';
			} else {
				$list_args['exclude'] = '';
			}
			$list_args['exclude'] .= get_option('page_on_front');
		}
	}

	$list_args['echo'] = false;
	$list_args['title_li'] = '';
	$menu .= str_replace( array( "\r", "\n", "\t" ), '', wp_list_pages($list_args) );
	$menu = str_replace( array( "current_page_item", "page_item_has_children", "children", "sub-menu" ), array( "active", "dropdown", "dropdown-menu", "dropdown-menu" ), $menu );

	if ( $menu )
		$menu = '<ul class="' . esc_attr($args['menu_class']) . '">' . $menu . '</ul>';

	$menu = apply_filters( 'wp_page_menu', $menu, $args );
	if ( $args['echo'] )
		echo $menu;
	else
		return $menu;
}

/*
---------------------------------------------------------------------------------------
    Body Class filter to add custom classes
    @return array of custom classes
    @since: 1.0.0
	@Author: Jewel Ahmed
	@Author Web: http://codeatomic.com
	@Last Updated: 27 Oct, 2014
---------------------------------------------------------------------------------------
*/
add_filter('body_class', 'mondira_body_classes', 10, 2 );
function mondira_body_classes(  $classes, $extra ) {
        global $post, $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone; 
		
		if ( empty( $classes ) ) {
			$classes = mondira_get_custom_body_classes();
		}
		
		if($is_lynx) $classes[] = 'lynx';
		elseif($is_gecko) $classes[] = 'gecko';
		elseif($is_opera) $classes[] = 'opera';
		elseif($is_NS4) $classes[] = 'ns4';
		elseif($is_safari) $classes[] = 'safari';
		elseif($is_chrome) $classes[] = 'chrome';
		elseif($is_IE) $classes[] = 'ie';
		else $classes[] = 'unknown';
		if($is_iphone) $classes[] = 'iphone';
		
		return $classes;
}


/*
*
* Updating title via filter.
*
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014
*/
if ( !function_exists( "mondira_filter_wp_title" ) ) {
	function mondira_filter_wp_title( $title ) {
		$site_name = get_bloginfo( 'name' );
		$site_description = get_bloginfo( 'description' );
		$filtered_title = trim( str_replace('&raquo;', '', $title) );
		if ( is_front_page() || is_home() ) {
			$filtered_title = $site_description? $site_description: $site_name;
		} else {
			$filtered_title.= " | " . $site_name;
		}
		return $filtered_title;
	}
}
add_filter( 'wp_title', 'mondira_filter_wp_title' );