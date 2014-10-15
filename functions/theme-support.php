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
		}
		
		if( in_array( 'current-menu-parent', $classes ) ) {
			$classes[] = "active";
			$classes[] = "current-menu-item";
			$classes[] = "current_page_item";
		} else if( in_array( 'current-menu-ancestor', $classes ) ) {
			$classes[] = "active";
			$classes[] = "current-menu-item";
			$classes[] = "current_page_item";
		}
		
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
* Adding a span for submenus on menu items by menu walker.
*
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014
*/
if ( !class_exists( 'mondira_add_span_walker' ) ) {
	class mondira_add_span_walker extends Walker_Nav_Menu {
		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			$class_names = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $class_names .'>';

			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

			if ( 'primary' == $args->theme_location ) {
				$submenus = 0 == $depth || 1 == $depth ? get_posts( array( 'post_type' => 'nav_menu_item', 'numberposts' => 1, 'meta_query' => array( array( 'key' => '_menu_item_menu_item_parent', 'value' => $item->ID, 'fields' => 'ids' ) ) ) ) : false;
				$item_output .= ! empty( $submenus ) ? ( 0 == $depth ? '<span class="arrow glyphicon glyphicon-play"></span>' : '<span class="arrow sub-arrow glyphicon glyphicon-play"></span>' ) : '';
			}
			$item_output .= '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
}


/*
*
* Adding a span for submenus on menu items by menu walker.
*
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014
*/
if ( !class_exists( 'mondira_add_span_bottom_walker' ) ) {
	class mondira_add_span_bottom_walker extends Walker_Nav_Menu {
		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			$class_names = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $class_names .'>';

			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

			if ( 'primary' == $args->theme_location ) {
				$submenus = 0 == $depth || 1 == $depth ? get_posts( array( 'post_type' => 'nav_menu_item', 'numberposts' => 1, 'meta_query' => array( array( 'key' => '_menu_item_menu_item_parent', 'value' => $item->ID, 'fields' => 'ids' ) ) ) ) : false;
				$item_output .= ! empty( $submenus ) ? ( 0 == $depth ? '<span class="arrow glyphicon glyphicon-chevron-down"></span>' : '<span class="arrow sub-arrow glyphicon glyphicon-chevron-down"></span>' ) : '';
			}
			$item_output .= '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
}


/*
*
* Adding a span for submenus on menu items by menu walker.
*
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014
*/
if ( !class_exists( 'mondira_add_span_sm_walker' ) ) {
	class mondira_add_span_sm_walker extends Walker_Nav_Menu {
		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			$class_names = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $class_names .'>';

			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

			if ( 'primary' == $args->theme_location ) {
				$submenus = 0 == $depth || 1 == $depth ? get_posts( array( 'post_type' => 'nav_menu_item', 'numberposts' => 1, 'meta_query' => array( array( 'key' => '_menu_item_menu_item_parent', 'value' => $item->ID, 'fields' => 'ids' ) ) ) ) : false;
				$item_output .= ! empty( $submenus ) ? ( 0 == $depth ? '<span class="arrow glyphicon glyphicon-play"></span>' : '<span class="arrow sub-arrow glyphicon glyphicon-play"></span>' ) : '';
			}
			$item_output .= '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
}


/*
*
* Removing theme editor menu.
*
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014
*/
if ( !function_exists( "mondira_remove_editor_menu" ) ) {
    function mondira_remove_editor_menu() {
        remove_action( 'admin_menu', '_add_themes_utility_last', 101 );
    }
}                                                         
add_action( 'admin_menu', 'mondira_remove_editor_menu', 1 );

/*
*
* Removing theme editor menu.
*
* @Author: Jewel Ahmed
* @Author Web: http://codeatomic.com
* @Last Updated: 14 Oct, 2014
*/
if ( !function_exists( "mondira_remove_menu_elements" ) ) {
    function mondira_remove_menu_elements() {
        remove_submenu_page( 'themes.php', 'theme-editor.php' );
    }
}  
add_action( 'admin_init', 'mondira_remove_menu_elements', 102 );


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