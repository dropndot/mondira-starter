<?php 
/**
* 
* Theme default footer
* 
* @package WordPress
* @subpackage Mondira
* @since version 1.0.0
* @last update: 10 Nov, 2014
*/
?>
			
			<?php get_template_part( 'includes/call-to-action', 'footer' ); ?>

		<!-- END #container -->
		</div>
		
		<div id="footer-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
		
						<footer id="footer" class="container-background footer">
						
							<div id="footer-sidebars" class="box-sizing footer-sidebars clearfix">
							
								<?php if ( is_active_sidebar( 'footer1' ) ) : ?>
								<div id="footer-sidebars-1" class="footer-sidebars footer-sidebars-1">
									<div class="container">
										<div class="row">
											<div class="col-lg-12">
												<?php if ( is_active_sidebar( 'footer1' ) ) : ?>
												<div class="footer-sidebars-inner-widgets">
													<?php dynamic_sidebar( 'footer1' ); ?>
												</div>    
												<?php endif; ?>
											</div>    
										</div>    
									</div>    
								</div>    
								<?php endif; ?>
								
								
								<?php if ( is_active_sidebar( 'footer21' ) || is_active_sidebar( 'footer22' ) || is_active_sidebar( 'footer23' ) || is_active_sidebar( 'footer24' ) ) : ?>
								<div id="footer-sidebars-2" class="footer-sidebars footer-sidebars-2">
									<div class="container">
										<div class="row">
											<?php if ( is_active_sidebar( 'footer21' ) ) : ?>
											<div class="footer-sidebars-inner-widgets col-lg-3 col-md-3 col-sm-6 col-xs-12">
												<?php dynamic_sidebar( 'footer21' ); ?><!--Footer 2 Column 1-->
											</div>    
											<?php endif; ?>
											
											<?php if ( is_active_sidebar( 'footer22' ) ) : ?>
											<div class="footer-sidebars-inner-widgets col-lg-3 col-md-3 col-sm-6 col-xs-12">
												<?php dynamic_sidebar( 'footer22' ); ?><!--Footer 2 Column 2-->
											</div>
											<?php endif; ?>
											
											<?php if ( is_active_sidebar( 'footer23' ) ) : ?>
											<div class="footer-sidebars-inner-widgets col-lg-3 col-md-3 col-sm-6 col-xs-12">
												<?php dynamic_sidebar( 'footer23' ); ?><!--Footer 2 Column 3-->
											</div>
											<?php endif; ?>
											
											<?php if ( is_active_sidebar( 'footer24' ) ) : ?>
											<div class="footer-sidebars-inner-widgets col-lg-3 col-md-3 col-sm-6 col-xs-12">
												<?php dynamic_sidebar( 'footer24' ); ?><!--Footer 2 Column 4-->
											</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
								<?php endif; ?>
								
								<?php if ( is_active_sidebar( 'footer3' ) ) : ?>
								<div id="footer-sidebars-3" class="footer-sidebars footer-sidebars-3">
									<div class="container">
										<div class="row">
											<div class="footer-sidebars-inner-widgets col-lg-12">
												<?php dynamic_sidebar( 'footer3' ); ?>
											</div>    
										</div>    
									</div>    
								</div>
								<?php endif; ?>
									
							</div>
						
							<div class="copyright clearfix">
							<?php 
							$footer_copyright_text = mondira_get_option( 'general', 'footer_copyright_text', '' );
							if( !empty( $footer_copyright_text ) ) {
								echo do_shortcode( $footer_copyright_text ); 
							} else {
								$footer_copyright_text = 'Powered by <a href="http://www.wordpress.org" class="global-color">WordPress</a><br /> '.get_bloginfo( 'name' ).' by <a href="http://mondira.com" class="global-color">Mondira</a>';
								?>
								<p>&copy; <?php echo date( "Y" ); ?> <?php bloginfo( 'name' ); ?></p>
								<p><?php echo $footer_copyright_text; ?><p>
								<?php 
							}
							?>
							</div>
							
						</footer> 
						
					</div>
				</div>
			</div>
		</div>
	

    <?php if ( mondira_get_option( 'general', 'is_boxed' ) == 'yes' ) {  ?>
    <!-- END #boxed -->
    </div>
    <?php } ?>

    <a id="move-to-top" href="#" class="move-to-top">&nbsp;</a>
	
	<!-- Theme Hook -->
	<?php wp_footer(); ?>
	
<!-- END html -->			
</html>