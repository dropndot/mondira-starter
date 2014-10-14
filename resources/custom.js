/*
---------------------------------------------------------------------------------------
    Theme related all JS custom functions                           
    @Since Version 1.0
---------------------------------------------------------------------------------------
*/



/*
---------------------------------------------------------------------------------------
    Top header based layout full width row adjustment
---------------------------------------------------------------------------------------
*/

function full_width_row_for_wide_layout() {
	var $ = jQuery;
    var $window = $(window);
    var $scrollBar = 0;
    var $gutterWidth = 30;
    
    var $windowWidth = $window.width();
	var $contentBodyWidth = parseInt( $('#content-body').outerWidth() ); 
	var $containerWidth = parseInt( $('#container').find('div.container:first').css('width') ); 
	
	$( '.fullwidth' ).each(function() {
        
        $fullwidthContentOutOfSight = Math.ceil( ( ( $contentBodyWidth - $containerWidth ) / 2 ) );
		$fullwidthContentOutOfSight+= Math.ceil( $gutterWidth / 2 );
		
		if ( $windowWidth < $containerWidth || $fullwidthContentOutOfSight < 0 ) {
			$fullwidthContentOutOfSight = 15;
		}
		
		jQuery(this).css({
			'margin-left': - $fullwidthContentOutOfSight,
			'margin-right': - $fullwidthContentOutOfSight,
			'width': 'auto',
			'max-width': '9999px',
			'overflow': 'hidden',
			'visibility': 'visible'
		}); 
		if ( jQuery(this).hasClass('boxed') ) {
			if (jQuery(this).children('div.col-sm-12').length <= 0 ) {
				jQuery(this).wrapInner( "<div class='col-sm-12'><div class='row'></div></div>");
			} else {
				
			}
		} else {
			if (jQuery(this).children('div.col-sm-12').length <= 0 ) {
				jQuery(this).wrapInner( "<div class='col-sm-12'><div class='row'></div></div>");
			} 
			jQuery(this).children('div.col-sm-12').css({
				'padding': '0px',
				'width': 'auto',
				'float': 'none',
				'max-width': '9999px',
			}); 	
		}
        
    });
}

/*
---------------------------------------------------------------------------------------
	Parallax
	@Since Version 1.0
---------------------------------------------------------------------------------------
*/

function parallax_init() {
	var $ = jQuery;
    var $window = $(window);
	
	if ( $window.width() <= 768 ) {
		jQuery(".parallax").parallax("50%", 0.5);
	} else {
		jQuery(".parallax").parallax("50%", 0.5);
	}
}

/*
---------------------------------------------------------------------------------------
    Full width section
---------------------------------------------------------------------------------------
*/

function full_width_row() {
    full_width_row_for_wide_layout();
	parallax_init();
}
full_width_row();
jQuery(window).resize(full_width_row);


/*
---------------------------------------------------------------------------------------
    Applying jQuery Mobile Menu!
---------------------------------------------------------------------------------------
*/

function add_or_remove_non_mobile_menu(){
    if( window.innerWidth < 768 ) {
        jQuery('body').addClass('mobile');
        jQuery('#header nav').hide();
    } else {
        jQuery('body').removeClass('mobile');
        jQuery('#header nav').show();
        jQuery('#mobile-menu').addClass('collapse');
        jQuery('#mobile-menu').removeClass('in');
    }
}
add_or_remove_non_mobile_menu();
jQuery(window).resize(add_or_remove_non_mobile_menu);


/*
---------------------------------------------------------------------------------------
    Adjusting megamenu height
---------------------------------------------------------------------------------------
*/
function adjust_megamenu_height(){
    var $megaWidth, $menuWidth, $menuHeight;
    jQuery('#primary-menu > li.megamenu').each(function(){
        $megaWidth = jQuery( this ).find('.sub-menu').outerWidth();    
        $menuWidth = $megaWidth;
        
        
        if ( jQuery( this ).hasClass('columns-2') ) {
            $menuWidth = Math.floor( $megaWidth / 2 );    
        } else if ( jQuery( this ).hasClass('columns-3') ) {
            $menuWidth = Math.floor( $megaWidth / 3 );    
        } else if ( jQuery( this ).hasClass('columns-4') ) {
            $menuWidth = Math.floor( $megaWidth / 4 );    
        } else if ( jQuery( this ).hasClass('columns-5') ) {
            $menuWidth = Math.floor( $megaWidth / 5 );    
        } else if ( jQuery( this ).hasClass('columns-6') ) {
            $menuWidth = Math.floor( $megaWidth / 6 );    
        }
        
        $menuWidth-= 40;
        
        jQuery( this ).find('.sub-menu > li').css('width', $menuWidth);
        jQuery( this ).find('.sub-menu > li').css('max-width', $menuWidth);
        
    });
    
}
adjust_megamenu_height();
jQuery(window).resize(adjust_megamenu_height);


/*
---------------------------------------------------------------------------------------
    Mobile menu sub item arrow icon event
---------------------------------------------------------------------------------------
*/

jQuery('#mobile-menu .arrow').click(function(){
    jQuery( this ).parent().parent().toggleClass('open');
    jQuery( this ).parent().parent().find('> ul').stop( true, true ).slideToggle();
    return false;
});

    
/*
---------------------------------------------------------------------------------------
    Applying jQuery Non Mobile Menu!
---------------------------------------------------------------------------------------
*/

function mondira_menu() {
	var $window = jQuery( window );
	jQuery( '#primary-menu' ).menu( {
		focus: function( event, ui ) {
			
		}, 
		position: { my: "left top", at: "left top+62" } 
	});  
}


/*
---------------------------------------------------------------------------------------
	Javascript CSS Overwriting Code
	@Since Version 1.0
---------------------------------------------------------------------------------------
*/    
function mondira_css_overwrite_by_js() {
	var $ = jQuery;
	
	$.each($('body div, body h1, body h2, body h3, body h4, body h5, body h6, body a'), function(index){
		/*
		---------------------------------------------------------------------------------------
			Background Color Javascript CSS Overwriting Code
			@Since Version 1.0
		---------------------------------------------------------------------------------------
		*/  
		if ( typeof $(this).data('background-color') !== 'undefined' && $(this).data('background-color') != '') {
			$(this).css('background-color', $(this).data('background-color'));					
		}
		
		/*
		---------------------------------------------------------------------------------------
			Text Align Javascript CSS Overwriting Code
			@Since Version 1.0
		---------------------------------------------------------------------------------------
		*/  
		if ( typeof $(this).data('text-align') !== 'undefined' && $(this).data('text-align') != '') {
			$(this).css('text-align', $(this).data('text-align'));					
		}
		
		/*
		---------------------------------------------------------------------------------------
			Height Javascript CSS Overwriting Code
			@Since Version 1.0
		---------------------------------------------------------------------------------------
		*/  
		if ( typeof $(this).data('height') !== 'undefined' && $(this).data('height') != '') {
			$(this).css('height', $(this).data('height'));					
		}
		
		/*
		---------------------------------------------------------------------------------------
			border-top-color Javascript CSS Overwriting Code
			@Since Version 1.0
		---------------------------------------------------------------------------------------
		*/  
		if ( typeof $(this).data('border-top-color') !== 'undefined' && $(this).data('border-top-color') != '') {
			$(this).css('border-top-color', $(this).data('border-top-color'));					
		}
		
		/*
		---------------------------------------------------------------------------------------
			border-bottom-color Javascript CSS Overwriting Code
			@Since Version 1.0
		---------------------------------------------------------------------------------------
		*/  
		if ( typeof $(this).data('border-bottom-color') !== 'undefined' && $(this).data('border-bottom-color') != '') {
			$(this).css('border-bottom-color', $(this).data('border-bottom-color'));					
		}
		
		/*
		---------------------------------------------------------------------------------------
			border-width Javascript CSS Overwriting Code
			@Since Version 1.0
		---------------------------------------------------------------------------------------
		*/  
		if ( typeof $(this).data('border-width') !== 'undefined' && $(this).data('border-width') != '') {
			$(this).css('border-width', $(this).data('border-width'));					
		}
		
		/*
		---------------------------------------------------------------------------------------
			border-left-width Javascript CSS Overwriting Code
			@Since Version 1.0
		---------------------------------------------------------------------------------------
		*/  
		if ( typeof $(this).data('border-left-width') !== 'undefined' && $(this).data('border-left-width') != '') {
			$(this).css('border-left-width', $(this).data('border-left-width'));					
		}
		
		/*
		---------------------------------------------------------------------------------------
			border-right-width Javascript CSS Overwriting Code
			@Since Version 1.0
		---------------------------------------------------------------------------------------
		*/  
		if ( typeof $(this).data('border-right-width') !== 'undefined' && $(this).data('border-right-width') != '') {
			$(this).css('border-right-width', $(this).data('border-right-width'));					
		}
		
		/*
		---------------------------------------------------------------------------------------
			border-top-width Javascript CSS Overwriting Code
			@Since Version 1.0
		---------------------------------------------------------------------------------------
		*/  
		if ( typeof $(this).data('border-top-width') !== 'undefined' && $(this).data('border-top-width') != '') {
			$(this).css('border-top-width', $(this).data('border-top-width'));					
		}
		
		/*
		---------------------------------------------------------------------------------------
			border-bottom-width Javascript CSS Overwriting Code
			@Since Version 1.0
		---------------------------------------------------------------------------------------
		*/  
		if ( typeof $(this).data('border-bottom-width') !== 'undefined' && $(this).data('border-bottom-width') != '') {
			$(this).css('border-bottom-width', $(this).data('border-bottom-width'));					
		}
		
		/*
		---------------------------------------------------------------------------------------
			Color Javascript CSS Overwriting Code
			@Since Version 1.0
		---------------------------------------------------------------------------------------
		*/  
		if ( typeof $(this).data('color') !== 'undefined' && $(this).data('color') != '') {
			$(this).css('color', $(this).data('color'));					
		}  
		if ( typeof $(this).data('hover-color') !== 'undefined' && $(this).data('hover-color') != '') {
			$(this).hover(function(){
				$(this).css( 'color', $(this).data('hover-color') );
			},function(){
				if ( typeof $(this).data('color') !== 'undefined' && $(this).data('color') != '') {
					$(this).css( 'color', $(this).data('color') );
				} 			
			});			
		}
		
		/*
		---------------------------------------------------------------------------------------
			Color Javascript CSS Overwriting Code
			@Since Version 1.0
		---------------------------------------------------------------------------------------
		*/  
		if ( typeof $(this).data('border-color') !== 'undefined' && $(this).data('border-color') != '') {
			$(this).css('border-color', $(this).data('border-color'));					
		}  
		if ( typeof $(this).data('hover-border-color') !== 'undefined' && $(this).data('hover-border-color') != '') {
			$(this).hover(function(){
				$(this).css( 'border-color', $(this).data('hover-border-color') );
			},function(){
				if ( typeof $(this).data('border-color') !== 'undefined' && $(this).data('border-color') != '') {
					$(this).css( 'border-color', $(this).data('border-color') );
				} 			
			});			
		}
		
		
		/*
		---------------------------------------------------------------------------------------
			Opacity Javascript CSS Overwriting Code
			@Since Version 1.0
		---------------------------------------------------------------------------------------
		*/  
		if ( typeof $(this).data('opacity') !== 'undefined' && $(this).data('opacity') != '') {
			$(this).css('opacity', $(this).data('opacity'));					
		}

	});
}

jQuery(document).ready(function() {
    "use strict";
    
    var $ = jQuery;
    var $body = jQuery('body');
    var $window = jQuery(window); 
    
    /*
    ---------------------------------------------------------------------------------------
        Making the primary menu on large devices to support 2 level dropdown
    ---------------------------------------------------------------------------------------
    */
    mondira_menu();
    $window.smartresize(function() {
        mondira_menu();
        full_width_row();
	});
    
    
    /*
	---------------------------------------------------------------------------------------
		Javascript CSS Overwriting Code
		@Since Version 1.0
	---------------------------------------------------------------------------------------
	*/   
	mondira_css_overwrite_by_js();
});                            


/*
---------------------------------------------------------------------------------------
    Making iframe responsive!
---------------------------------------------------------------------------------------
*/
(function($){ 
    // Find all YouTube videos
    var $allVideos = jQuery("iframe[src^='http://player.vimeo.com'], iframe[src^='//player.vimeo.com'], iframe[src^='http://www.youtube.com'], iframe[src^='//www.youtube.com']"),

    // The element that is fluid width
    $fluidEl = jQuery("body");

    // Figure out and save aspect ratio for each video
    $allVideos.each(function() {
        if(jQuery(this).parents().hasClass('video-container')) {
            
        } else if(jQuery(this).parents().hasClass('embeded-video-wrapper-iframe')) {
            
        } else if(jQuery(this).parents().hasClass('embeded-audio-wrapper-iframe')) {
            
        } else {
            jQuery(this).wrap('<div class="video-container"></div>');
        }

    });
})(jQuery);


jQuery(document).ready(function() {
    "use strict";
    full_width_row();
    jQuery(window).smartresize(function() {
        full_width_row();
    });
});


/*
---------------------------------------------------------------------------------------
    Function Hints
    @Since Version 1.0
---------------------------------------------------------------------------------------
*/

jQuery(window).scroll(function(){
    if (jQuery(this).scrollTop()>100) {
      jQuery(".move-to-top").fadeIn('slow');
      jQuery(".move-to-top").addClass("fixed"); 
    } else {
        jQuery(".move-to-top").hide();
        jQuery(".move-to-top").removeClass("fixed"); 
    }

});

jQuery('.move-to-top').click(function(){
    jQuery('html, body').animate({ scrollTop:0 }, 1000, 'easeOutExpo');
    return false;
});
