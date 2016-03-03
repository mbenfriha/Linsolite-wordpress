<html <?php language_attributes(); ?>>
<head>
    <title>Linsolite v1.0</title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">


    <?php if (have_posts()):while(have_posts()):the_post(); endwhile; endif;?>
    <!-- the default values -->
    <meta property="fb:app_id" content="683931481746708" />

    <!-- if page is content page -->
    <?php if (is_single()) { ?>
        <meta property="og:url" content="<?php the_permalink() ?>"/>
        <meta property="og:title" content="<?php single_post_title(''); ?>" />
        <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="<?php if (function_exists('wp_get_attachment_thumb_url')) {echo wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false)[0];}?>" />

        <!-- if page is others -->
    <?php } else { ?>
        <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
        <meta property="og:description" content="<?php bloginfo('description'); ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:image" content="http://linsolite.tv/wp-content/uploads/2015/01/trans.png" /> <?php } ?>

</head>
<body>
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({appId: '683931481746708', status: true, cookie: true,
            xfbml: true});
    };
    (function() {
        var e = document.createElement('script'); e.async = true;
        e.src = document.location.protocol +
            '//connect.facebook.net/en_US/all.js';
        document.getElementById('fb-root').appendChild(e);
    }());
</script>

<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.5";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<div class="header-top">

    <nav class="nav color-blue">
        <div class="nav-wrapper mobile">

            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="hide-on-med-and-down menu-c">
                <li class="larg"><a href="<?php echo esc_url( home_url( '/' )); ?>"><i class="material-icons">home</i></a></li>
                <li class="larg"><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons">view_list</i></a></li>
                <li class="logo-nav"><img src="http://linsolite.tv/wp-content/uploads/2015/02/logo-facebook-trans1.png" alt="center linsolite"></li>

                <li class="right blue-search">
                    <form method="get" action="<?php echo esc_url( home_url( '/' )); ?>">
                    <div class="input-field">
                            <input id="search" name="s" type="search" required>
                            <label for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </li>

                <ul id="dropdown1" class="dropdown-content category">
                    <li class="larg"><a href="<?php echo esc_url( home_url( '/' )); ?>">Accueil</a></li>
                    <li class="larg"><a href="<?php echo esc_url( home_url( '/' )); ?>category/categorie/actualite">Actualité</a></li>
                    <li class="larg"><a href="<?php echo esc_url( home_url( '/' )); ?>category/categorie/animaux">Animaux</a></li>
                    <li class="larg"><a href="<?php echo esc_url( home_url( '/' )); ?>category/categorie/bagarre">Bagarre</a></li>
                    <li class="larg"><a href="<?php echo esc_url( home_url( '/' )); ?>category/categorie/choc">Choc</a></li>
                    <li class="larg"><a href="<?php echo esc_url( home_url( '/' )); ?>category/categorie/fail">Fail</a></li>
                    <li class="larg"><a href="<?php echo esc_url( home_url( '/' )); ?>category/categorie/humour">Humour</a></li>
                    <li class="larg"><a href="<?php echo esc_url( home_url( '/' )); ?>category/categorie/insolite">Insolite</a></li>
                    <li class="larg"><a href="<?php echo esc_url( home_url( '/' )); ?>category/categorie/inclassable">Inclassable</a></li>
                    <li class="larg"><a href="<?php echo esc_url( home_url( '/' )); ?>category/categorie/technologie">Technologie</a></li>
                </ul>
            </ul>


            <ul class="side-nav color-blue" id="mobile-demo">
                <li class="blue-search">
                    <form method="get" action="<?php echo esc_url( home_url( '/' )); ?>">
                            <input id="search" name="s" type="search" required>
                            <label for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                    </form>
                </li>
                <li><a class="text-white" href="<?php echo esc_url( home_url( '/' )); ?>">Accueil</a></li>
                <li class="text-white"><a href="<?php echo esc_url( home_url( '/' )); ?>category/categorie/actualite">Actualité</a></li>
                <li class="text-white"><a href="<?php echo esc_url( home_url( '/' )); ?>category/categorie/animaux">Animaux</a></li>
                <li class="text-white"><a href="<?php echo esc_url( home_url( '/' )); ?>category/categorie/bagarre">Bagarre</a></li>
                <li class="text-white"><a href="<?php echo esc_url( home_url( '/' )); ?>category/categorie/choc">Choc</a></li>
                <li class="text-white"><a href="<?php echo esc_url( home_url( '/' )); ?>category/categorie/fail">Fail</a></li>
                <li class="text-white"><a href="<?php echo esc_url( home_url( '/' )); ?>category/categorie/humour">Humour</a></li>
                <li class="text-white"><a href="<?php echo esc_url( home_url( '/' )); ?>category/categorie/insolite">Insolite</a></li>
                <li class="text-white"><a href="<?php echo esc_url( home_url( '/' )); ?>category/categorie/inclassable">Inclassable</a></li>
                <li class="text-white"><a href="<?php echo esc_url( home_url( '/' )); ?>category/categorie/technologie">Technologie</a></li>
                <li class="text-white"><a href="mobile.html">Nous-contacter</a></li>
            </ul>
        </div>
    </nav>
    <div class="col s4 social">
        <ul>
            <a href="http://www.dailymotion.com/Linsolitetv"><li><img src="<?php echo esc_url( home_url( '/' )); ?>wp-content/themes/Linsolite/icon/dailymotion-logo.png" alt="dailymotion"></li></a>
            <a href="https://www.facebook.com/linsolitetv"><li><img src="<?php echo esc_url( home_url( '/' )); ?>wp-content/themes/Linsolite/icon/facebook-logo.png" alt="facebook"></li></a>
            <a href="https://twitter.com/linsolitetv"><li><img src="<?php echo esc_url( home_url( '/' )); ?>wp-content/themes/Linsolite/icon/twitter-social-logotype.png" alt="twitter"></li></a>
            <a href="https://instagram.com/linsolite.tv/"><li><img src="<?php echo esc_url( home_url( '/' )); ?>wp-content/themes/Linsolite/icon/instagram-social-network-logo-of-photo-camera.png" alt="instagram"></li></a>
        </ul>
    </div>

    <div class="col s4 form">
        <ul>
            <a href="<?php echo esc_url( home_url( '/' )); ?>nous-contacter/"><li><img src="<?php echo esc_url( home_url( '/' )); ?>wp-content/themes/Linsolite/icon/new-email-envelope-back-symbol-in-circular-outlined-button.png" title="nous contacter" alt="contact"></li></a>
            <a href="<?php echo esc_url( home_url( '/' )); ?>envoyez-vos-videos/"><li><img src="<?php echo esc_url( home_url( '/' )); ?>wp-content/themes/Linsolite/icon/upload-circular-button-variant.png" title="Envoyer une vidéo" alt="upload"></li></a>
        </ul>
    </div>

    <img class="logo-center" src="http://linsolite.tv/wp-content/uploads/2015/01/trans.png" alt="linsolite">
</div>
