/**
 * Menu icon animation
 * @since 1.0.0
 */
(function($) {
    $('.menu-icn-wrap').on('click', function() {
        $('.site-title,.site-desc').toggle();
        $(this).children().toggleClass('active');
        $('.sm-f').fadeToggle(200);
        $('.sm-nav').fadeToggle(200);
        $('.sm-h .searchform').fadeToggle(0);
    })
})(jQuery);