<?php 
/**
* 
* Theme default sidebar
* 
* @package WordPress
* @subpackage Mondira
* @since version 1.0.0
* @last update: 10 Nov, 2014
*/

$is_sidebar_widgets_loaded = false;
?>
<?php if( !is_page() && !mondira_is_portfolio_template() && !is_tax( 'portfolio_category' ) && !is_tax( 'portfolio_tag' ) && get_post_type() != 'portfolio' && ( function_exists( 'dynamic_sidebar' ) && is_active_sidebar( 'main-sidebar' ) )) { ?>

        <!--BEGIN Main Sidebar-->  
        <?php dynamic_sidebar( 'main-sidebar' ); ?>
        <!--END Main Sidebar-->  
        
        <?php $is_sidebar_widgets_loaded = true; ?>

 <?php } else if(is_page() && !mondira_is_portfolio_template() && ( function_exists( 'dynamic_sidebar' ) && is_active_sidebar( 'page-sidebar' ) ) ) { ?>

        <!--BEGIN Page Sidebar-->  
        <?php dynamic_sidebar( 'page-sidebar' ); ?>
        <!--END Page Sidebar-->
        
        <?php $is_sidebar_widgets_loaded = true; ?>

<?php } else if( mondira_is_portfolio_template() || is_tax( 'portfolio_category' ) || is_tax( 'portfolio_tag' ) || get_post_type() == 'portfolio'  && !is_page_template( 'template-portfolio.php' ) && ( function_exists( 'dynamic_sidebar' ) && is_active_sidebar( 'portfolio-sidebar' ) ) ) { ?>

        <!--BEGIN Portfolio Sidebar-->  
        <?php dynamic_sidebar( 'portfolio-sidebar' ); ?>
        <!--END Portfolio Sidebar--> 
        
        <?php $is_sidebar_widgets_loaded = true; ?>

<?php } else if ( ( function_exists( 'dynamic_sidebar' ) && is_active_sidebar( 'main-sidebar' ) ) ) { ?>

        <!--BEGIN Main Sidebar-->  
        <?php dynamic_sidebar( 'main-sidebar' ); ?>
        <!--END Main Sidebar-->
        
        <?php $is_sidebar_widgets_loaded = true; ?>
        
<?php } 
      
      if( !$is_sidebar_widgets_loaded ) { ?>

        <!--BEGIN Static Sidebar Widgets-->  
        <?php 
        //Widgets general settings
        $args = array( 
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div><div class="widget-divider"></div>',
            'before_title' => '<h3 class="widget-title widetext">',
            'after_title' => '</h3><div class="clearfix"></div>' 
        ); 
        ?>
        <?php the_widget( 'WP_Widget_Recent_Posts', array(), $args ); ?><div class="clearfix"></div>
        <?php the_widget( 'WP_Widget_Recent_Comments', array(), $args ); ?><div class="clearfix"></div>
        <?php the_widget( 'WP_Widget_Archives', array(), $args ); ?><div class="clearfix"></div>
        <?php the_widget( 'WP_Widget_Categories', array(), $args ); ?><div class="clearfix"></div>
        <?php the_widget( 'WP_Widget_Meta', array(), $args ); ?><div class="clearfix"></div>
        <!--END Static Sidebar Widgets-->
        
<?php }?>