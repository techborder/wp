( function( $ ) {
	// Responsive videos
	var all_videos = $( '.entry-content' ).find( 'iframe[src*="player.vimeo.com"], iframe[src*="youtube.com"], iframe[src*="youtube-nocookie.com"], iframe[src*="dailymotion.com"],iframe[src*="kickstarter.com"][src*="video.html"], object, embed' ),
		f_height;

	all_videos = all_videos.not( 'object object' );

	all_videos.each( function() {
		var video = $(this);

		if ( video.parents( 'object' ).length ) {
			return;
		}

		if ( ! video.prop( 'id' ) ) {
			video.attr( 'id', 'rvw' + Math.floor( Math.random() * 999999 ) );
		}

		video
			.wrap( '<div class="responsive-video-wrapper" style="padding-top: ' + ( video.attr( 'height' ) / video.attr( 'width' ) * 100 ) + '%" />' )
			.removeAttr( 'height' )
			.removeAttr( 'width' );
	} );

	// Mobile menu
	$( '#header' ).on( 'click', '#mobile-menu a', function() {
		if ( $(this).hasClass( 'left-menu' ) ) {
			$( '#nav-wrapper' ).toggleClass( 'menu-open' );
		} else {
			$( '#drop-down-search' ).slideToggle( 'fast' );
			$( '#nav-wrapper' ).removeClass( 'menu-open' );
		}
	} );

	$( '#site-navigation' ).on( 'click', '.sub-menu-parent > a', function(e) {
		e.preventDefault();
		e.stopPropagation();
		$( '.sub-menu-parent' ).not( $(this).parents() ).removeClass( 'open' );
		$(this).parent().toggleClass( 'open' );
	} );

	// Footer height
	$(window)
		.resize( function() {
			footer_height();
		} )
		.load( function() {
			footer_height();
		} );

	function footer_height() {
		f_height = $( '#footer-content' ).height() + 20;
		$( '#footer' ).css({ height: f_height + 'px' });
		$( '#page' ).css({ marginBottom: -f_height + 'px' });
		$( '#main' ).css({ paddingBottom: f_height  + 'px' });
	}

	$( 'a[href="#"]' ).click( function(e) {
		e.preventDefault();
	});
} )( jQuery );