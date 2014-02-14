( function( $ ) {

	//$('#site-navigation').removeAttr("onclick");
	//
	//$( '#site-navigation' ).on( 'click', '.sub-menu-parent > a', function(e) {
	//	return true;
	//} );
	//
	
	//$( '#site-navigation' ).on( 'hover', '.sub-menu-parent > a', function(e) {
	//	//$( '.sub-menu-parent' ).not( $(this).parents() ).removeClass( 'open' );
	//	$(this).parent().toggleClass( 'open', 500);
	//} );

	// Works except does not clear when hovering on other top-level, non-parental links.	
	//$( '#site-navigation' ).on( 'hover', '.sub-menu-parent > a', function(e) {
	//	$( '.sub-menu-parent' ).not( $(this).parents() ).removeClass( 'open' );
	//	$(this).parent().addClass( 'open', 500);
	//} );
	//
	//$( '#site-navigation' ).on( 'hover', '.sub-menu-parent > a', function(e) {
	//	$( '.sub-menu-parent' ).not( $(this).parents() ).removeClass( 'open' );
	//	$(this).parent().addClass( 'open', 500);
	//} );
	
	if ( $(window).width() > 768) {     
		//Add your javascript for large screens here
		$( '#site-navigation' ).on( 'mouseenter', '.sub-menu-parent > a', function(e) {
		  $( '.sub-menu-parent' ).not( $(this).parents() ).removeClass( 'open');
		  $(this).parent().addClass( 'open');
	  } );
	  
	  $( '#site-navigation' ).on( 'mouseleave', '', function(e) {
		  $( '.sub-menu-parent' ).not( $(this).parents() ).removeClass( 'open' );
		  $(this).parent().removeClass( 'open');
	  } );
	  
	  $( '#site-navigation' ).on( 'click', '.sub-menu-parent > a', function(e) {
		  location.href = $(this).attr('href'); 
	  } );
	}
	else {
	  //Add your javascript for small screens here
		// No overrides yet, but need something to allow clicking on top level page
	}



} )( jQuery );
