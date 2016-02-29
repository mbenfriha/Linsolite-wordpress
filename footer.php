
<script type="text/javascript" src="http://code.jquery.com/jquery-1.12.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

<script>

    $(".dropdown-button").dropdown({
        hover: true
    });


    var win = $(window),
        nav = $('.nav'),
        pos = nav.offset().top,
        sticky = function(){
            win.scrollTop() > pos ? nav.addClass('sticky') : nav.removeClass('sticky')
        };
    win.scroll(sticky);

    $(".button-collapse").sideNav();

    $( ".logo-center" ).click(function() {
        $( "body" ).toggleClass('kon');

    });

    function redimensionnement() {
        if("matchMedia" in window) { // Détection
            if(window.matchMedia("(max-width:992px)").matches) {
                $('.video').removeClass('s6');
                $('.video').addClass('s8');
            } else {
                $('.video').removeClass('s8');
                $('.video').addClass('s6');
            }
        }
    }
    // On lie l'événement resize à la fonction
    window.addEventListener('resize', redimensionnement, false);
</script>

</body>
</html>