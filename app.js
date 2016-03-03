$(".dropdown-button").dropdown({
    hover: true
});


var win = $(window),
    nav = $('.nav'),
    pos = nav.offset().top,
    sticky = function(){
        win.scrollTop() > pos ? nav.addClass('sticky') : nav.removeClass('sticky');
        win.scrollTop() > pos ? $('.logo-nav img').fadeIn() : $('.logo-nav img').fadeOut();
        if(window.matchMedia("(min-width:992px)").matches) {
            win.scrollTop() > pos ? $('.sidebar').addClass('sticky-sidebar') : $('.sidebar').removeClass('sticky-sidebar');
        }
    };
win.scroll(sticky);

$(".button-collapse").sideNav();

$( ".logo-center" ).click(function() {
    $( "body" ).toggleClass('kon');

});

if(window.matchMedia("(max-width:992px)").matches) {
    $('.all_video').removeClass('s6');
    $('.all_video').addClass('s8');
    $('.sidebar').removeClass('s3 offset-s4');
    $('.sidebar').addClass('s5 offset-s4');
    $('.single').removeClass('s6 offset-s2');
    $('.single').addClass('s12');
    $('.sidebar').removeClass('sticky-sidebar');


} else {
    $('.all_video').removeClass('s8');
    $('.all_video').addClass('s6');
    $('.sidebar').addClass('s3');
    $('.sidebar').removeClass('s5 offset-s4');
    $('.single').addClass('s6 offset-s2');
    $('.single').removeClass('s12')
}

function redimensionnement() {
    if("matchMedia" in window) { // Détection
        if(window.matchMedia("(max-width:992px)").matches) {
            $('.all_video').removeClass('s6');
            $('.all_video').addClass('s8');
            $('.sidebar').removeClass('s3 offset-s4');
            $('.sidebar').addClass('s5 offset-s4');
            $('.single').removeClass('s6 offset-s2');
            $('.single').addClass('s12');
            $('.sidebar').removeClass('sticky-sidebar');

        } else {
            $('.all_video').removeClass('s8');
            $('.all_video').addClass('s6');
            $('.sidebar').addClass('s3');
            $('.sidebar').removeClass('s5 offset-s4');
            $('.single').addClass('s6 offset-s2');
            $('.single').removeClass('s12');
        }
    }
}
// On lie l'événement resize à la fonction
window.addEventListener('resize', redimensionnement, false);



$('iframe').attr('width', '100%');
$('iframe').attr('height', '100%');


(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.5";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));