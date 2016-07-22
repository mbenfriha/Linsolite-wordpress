

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

});



