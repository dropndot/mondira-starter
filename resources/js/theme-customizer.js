/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {

    // Update the site title in real time...
    wp.customize( 'blogname', function( value ) {
        value.bind( function( newval ) {
            $( '#plain-logo' ).html( newval );
        } );
    } );
    
    //Update the site description in real time...
    wp.customize( 'blogdescription', function( value ) {
        value.bind( function( newval ) {
            $( '#tagline' ).html( newval );
        } );
    } );   
    
     
    //Update site body background color in real time...
    wp.customize( 'background_color', function( value ) {
        value.bind( function( newval ) {
            $('body').css('background-color', newval );
        } );
    } );
    
    //Update site body background image in real time...
    wp.customize( 'background_image', function( value ) {
        value.bind( function( newval ) {
            $('body').css('background-image', 'url(' + newval + ')' );
        } );
    } );
    
    //Update site body background image position in real time...
    wp.customize( 'background_position', function( value ) {
        value.bind( function( newval ) {
            $('body').css('background-position', 'top ' + newval );
        } );
    } );
    
    //Update site body background image repeat in real time...
    wp.customize( 'background_repeat', function( value ) {
        value.bind( function( newval ) {
            $('body').css('background-repeat', newval );
        } );
    } );
    
    //Update site body background image attachment in real time...
    wp.customize( 'background_attachment', function( value ) {
        value.bind( function( newval ) {
            $('body').css('background-attachment', newval );
        } );
    } );   
    
} )( jQuery );
