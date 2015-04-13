jQuery(document).ready( function() {
	jQuery('#searchicon').click(function() {
		jQuery('#jumbosearch').fadeIn();
		jQuery('#jumbosearch input').focus();
	});
	jQuery('#jumbosearch .closeicon').click(function() {
		jQuery('#jumbosearch').fadeOut();
	});
	jQuery('body').keydown(function(e){
	    
	    if(e.keyCode == 27){
	        jQuery('#jumbosearch').fadeOut();
	    }
	});
			
	jQuery('#site-navigation ul.menu').slicknav({
		label: 'Menu',
		duration: 1000,
		prependTo:'#slickmenu'
	});	
	
});

jQuery(window).load(function() {
        jQuery('#nivoSlider').nivoSlider({
	        prevText: "<i class='fa fa-chevron-circle-left'></i>",
	        nextText: "<i class='fa fa-chevron-circle-right'></i>",
	        beforeChange: function() {
		        jQuery('.slider-wrapper .nivo-caption').animate({
														opacity: 0,
														marginLeft: -50,
														},500,'linear');
		        
	        },
	        afterChange: function() {
		        jQuery('.slider-wrapper .nivo-caption').animate({
														opacity: 1,
														marginLeft: 0,
														},500,'linear');
	        },
	        animSpeed: 700,
	        
        });
    });    