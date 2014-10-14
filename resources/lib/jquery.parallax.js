/*
Plugin: jQuery Parallax
Version 1.1.3
Author: Ian Lunn
Twitter: @IanLunn
Author URL: http://www.ianlunn.co.uk/
Plugin URL: http://www.ianlunn.co.uk/plugins/jquery-parallax/

Dual licensed under the MIT and GPL licenses:
http://www.opensource.org/licenses/mit-license.php
http://www.gnu.org/licenses/gpl.html
*/

(function( $ ){
	var $window = $(window);
	var windowHeight = $window.height();
	var windowWidth = $window.width();
	
	$window.resize(function () {
		windowHeight = $window.height();
		windowWidth = $window.width();
	});

	$.fn.parallax = function(xpos, speedFactor, outerHeight) {
		var $this = $(this);
		var getHeight;
		var firstTop;
		var paddingTop = 0;
		
		
		//get the starting position of each element to have parallax applied to it		
		$this.each(function(){
		    firstTop = $this.offset().top;
		});
		

		if (outerHeight) {
			getHeight = function(jqo) {
				return jqo.outerHeight(true);
			};
		} else {
			getHeight = function(jqo) {
				return jqo.height();
			};
		}
			
		// setup defaults if arguments aren't specified
		if (arguments.length < 1 || xpos === null) xpos = "50%";
		if (arguments.length < 2 || speedFactor === null) speedFactor = 0.1;
		if (arguments.length < 3 || outerHeight === null) outerHeight = true;
		
		// function to be called whenever the window is scrolled or resized
		function update(){
			var pos = $window.scrollTop();				

			$this.each(function(){
				var $element = $(this);
				var top = $element.offset().top;
				var height = getHeight($element);

				// Check if totally above or totally below viewport
				if (top + height < pos || top > pos + windowHeight) {
					return;
				}
                //Overwritten by Jewel Ahmed with below codes for opacity and content positioning control
                //$this.css('backgroundPosition', xpos + " " + Math.round((firstTop - pos) * speedFactor) + "px");
                
                /*
                *                                    
                * Additional fix for Visual Composer 
                * by Jewel Ahmed                                                        
                */
                var color_str = $this.css('background-color');
                var image_str = $this.css('background-image');
                if ( image_str != "" ) {
                    var css = $this.attr('style');
					if ( typeof css == 'undefined' || css == '') {
						css = '';
					}
                    $this.css('cssText', css + 'background: '+image_str+'  no-repeat fixed ' + xpos + " " + Math.round((firstTop - pos) * speedFactor) + "px rgba(0, 0, 0, 0) !important;");
                } else {
                    $this.css('backgroundPosition', xpos + " " + Math.round((firstTop - pos) * speedFactor) + "px");
                }
				
				if ( windowWidth <= 1000 ) {
					if ( jQuery('#header-wrapper').length > 0 ) {
						var $parallaxHeaderWrapperHeight = jQuery('#header-wrapper').outerHeight(); 
					} else {
						var $parallaxHeaderWrapperHeight = jQuery('#header').outerHeight(); 
					}
					if ( pos <= $parallaxHeaderWrapperHeight ) {
						pos = 0;
					} else {
						pos-= $parallaxHeaderWrapperHeight;
					}
				}
				
				var $height3of2 = ( height / 3 ) * 2;
				var $calculatedOpacity = ( 1 / $height3of2 ) * ((height-firstTop)-pos);
				
				
				var $contentHeight = parseInt($this.find( '.parallax-content' ).css('height'));
				var $calculatedTop = ((height-$contentHeight)/2);
				if ( jQuery('.default-layout').length > 0 ) {
					speedFactor = 0.63;
				}
				$calculatedTop+= (pos*speedFactor);
				
				if ( jQuery('.header-trasparent').length > 0 && windowWidth >= 1000 ) {
					var $parallaxHeaderWrapperHeight = jQuery('#header-wrapper').outerHeight(); 
					$calculatedTop+= $parallaxHeaderWrapperHeight;					
				} 
				
				$this.find( '.parallax-content' ).stop(true,true).animate( { 'opacity' : $calculatedOpacity, 'top' : $calculatedTop + 'px' }, 0, 'swing' );
			});
		}	

		$window.bind('scroll', update).resize(update);
		update();
	};
})(jQuery);