// Custom js 
var image_field;
var widget_container;
jQuery( function( $ ) {
  $( document ).on( 'click', '.select-img', function( evt ) {          
    image_field = $( this ).siblings( '.img' );    
    image_link = $( this ).parents( '.image-upload' ).find( 'img' );    
    widget_container = $( this ).parents( '.widget' ).find( '.widget-inside' );
    
    tb_show( '', 'media-upload.php?type=image&amp;TB_iframe=true' );
    return false;
  } );
  
  window.send_to_editor = function( html ) {
    imgurl = $( 'img', html ).attr( 'src' );
    image_field.val( imgurl );
    image_link.css( {
        'display':'block',
        'border':'1px solid #999',
        'margin':'10px',
        'margin-left':0,
        } ).attr( 'src', imgurl );    
    widget_container.css( { 'top' : '0px' } );         
    
    tb_remove();
    
    //Fix for WordPress customize interface as the container get heigher then it was before using an image
    top = widget_container.css( 'top' );
    if ( top!= '' ) {
        top = widget_container.css( { 'top' : '', 'bottom' : '0px' } );    
    }
  }
});