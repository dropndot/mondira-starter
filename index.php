<?php 
/**
* 
* This file contains the styling for Index page or Home page if no home is defined also for pages which has no templates by default defined.
* 
* @package WordPress
* @subpackage Mondira
* @since version 1.0.0
* @last update: 10 Nov, 2014
*/

get_header();
?>
	<!--BEGIN #content-body -->
    <div id="content-body" class="blog-index-list">
	
        <div class="container">
            <div class="row">
				<div class="col-md-9 col-sm-12">
				<?php 
				if( have_posts() ) { 
					while( have_posts() ) {
						the_post(); 
						
						$format = get_post_format();
						if( empty( $format ) ) {
							$format = 'standard';
						}
							
						$content = 'content';
						$post_type = get_post_type();
						if( $post_type == 'portfolio' ) {
							$content = 'portfolio';
						}
							
						if( is_search() ) {
							get_template_part( 'content-search-archive' );
						} else {
							if( !empty( $format ) ) {
								get_template_part( 'formats/' . $content, $format );
							} else {
								get_template_part( 'content' );
							}                                                         
						}
					}
					get_template_part( 'includes/block', 'post-index-navigation' ); 
				}
				?>
				</div>
				<div class="col-md-3 col-sm-12">
					<div class="page-sidebar">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</div>
		
	<!--END #content-body -->
	</div>
<?php 
get_footer();
