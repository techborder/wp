( function( $ ) {

	//$('#site-navigation').removeAttr("onclick");
	//
	//$( '#site-navigation' ).on( 'click', '.sub-menu-parent > a', function(e) {
	//	return true;
	//} );
	//
	
	$( '#site-navigation' ).on( 'hover', '.sub-menu-parent > a', function(e) {
		$( '.sub-menu-parent' ).not( $(this).parents() ).removeClass( 'open' );
		$(this).parent().toggleClass( 'open' );
	} );
	
	$( '#site-navigation' ).on( 'click', '.sub-menu-parent > a', function(e) {
		location.href = $(this).attr('href'); 
	} );

} )( jQuery );