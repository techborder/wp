 /**
 * This demo was prepared for you by Petr Tichy - Ihatetomatoes.net
 * Want to see more similar demos and tutorials?
 * Help by spreading the word about Ihatetomatoes blog.
 * Facebook - https://www.facebook.com/ihatetomatoesblog
 * Twitter - https://twitter.com/ihatetomatoes
 * Google+ - https://plus.google.com/u/0/109859280204979591787/about
 * Article URL: http://ihatetomatoes.net/simple-parallax-scrolling-tutorial/
 */
 jQuery(document).ready(function($){
	// Setup variables
	$window = $(window);
	$slide = $('.home');
	$body = $('body');
	
	//var s = skrollr.init();
	// Resize sections
	adjustWindow();
		
	function adjustWindow(){
		
		
		// Get window size
		winH = $window.height();
		
		winW = $window.width();
		
		// Keep minimum height 550
		if(winH <= 550) {
			winH = 550;
		} 
		
		if (winW >= 768 && !isMobile()) {
			// Init Skrollr
			var s = skrollr.init({
				forceHeight: false
			});
			// Resize our slides
			$slide.height(winH);
			
			// Refresh Skrollr after resizing our sections
			s.refresh($('body'));
		} else {
			// Init Skrollr
			var s = skrollr.init();
			s.destroy();
		}

	}
	
	function isMobile() { 
		if( navigator.userAgent.match(/Android/i)
		|| navigator.userAgent.match(/webOS/i)
		|| navigator.userAgent.match(/iPhone/i)
		|| navigator.userAgent.match(/iPad/i)
		|| navigator.userAgent.match(/iPod/i)
		|| navigator.userAgent.match(/BlackBerry/i)
		|| navigator.userAgent.match(/Windows Phone/i)
		){
			return true;
		}
		else {
			return false;
		}
	}
});
