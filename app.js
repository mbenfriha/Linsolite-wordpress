

$(document).ready(function(){
    $('.slider').slider({full_width: false});


    $('.slider').slider('next');
// Previous slide
    $('.slider').slider('prev');

    $(".button-collapse").sideNav();

    $( "#active-menu" ).click(function() {
        $( "#menu" ).slideToggle( "slow", function() {
            // Animation complete.
        });
    });

    $('iframe').next().next().css('display', 'none');
    $('iframe').next().next().next().css('display', 'none');


    if (window.matchMedia("(max-width: 640px)").matches) {

        $('#menu-menu-top').prepend($('.search'));

        $('.search').css({'width' : '100%!'});
        $('.search').removeClass("right");

    } else {

    }

});


(function($){
    $(document).ready(function(){

        var offset = $(".nav").offset().top + 1;
        $(document).scroll(function () {
            if (window.matchMedia("(max-width: 1024px)").matches) {

            } else {
                var scrollTop = $(document).scrollTop();
                if (scrollTop > offset) {
                    $(".nav").css({
                        "position": "fixed",
                        'width': '100%',
                        'z-index': '99',
                        'margin-top': '-4.3%'
                    });
                    $(".logo img").css({'width': '180px', 'transition-duration': '0.4s'});
                    $(".logo").css({'width': '180px', 'margin-top': '-0.7%', 'transition-duration': '0.4s'});
                    $(".menu").css({'width': '100%', 'position': 'fixed', 'margin-top': '-1%', 'z-index': 98})
                }
                else {
                    $(".nav").css({"position": "relative", 'margin-top': '0%', 'z-index': '2'});
                    $(".logo img").css({'width': '400px'});
                    $(".logo").css({'width': '400px', 'margin-top': '-5.7%'});
                    $(".menu").css({'width': '100%', 'position': 'none', 'margin-top': '0%', 'z-index': 0})
                }
            }
        });

    });
})(jQuery);


