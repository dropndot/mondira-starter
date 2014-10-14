/*
---------------------------------------------------------------------------------------
    Theme related all JS custom functions for Admin Users
    @Since Version 1.0
---------------------------------------------------------------------------------------
*/

/*
---------------------------------------------------------------------------------------
    Loading different settings meta block for Page, Post, Portfolio when page template changed on WordPress admin
---------------------------------------------------------------------------------------
*/

jQuery(document).ready( function($) {
    var $page_template = $('#page_template'); 
    $page_template.change(function() {
        if ( $(this).val() == 'default' || $(this).val() == 'templates/name.php' ) {
        } else {
        }
    }).change();
});