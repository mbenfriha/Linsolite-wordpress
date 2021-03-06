<?php

register_nav_menus( array(
    'Top' => 'Main menu',
) );

add_theme_support( 'post-thumbnails' );



add_action( 'admin_init', 'myThemeRegisterSettings' );

function myThemeRegisterSettings( )
{
    register_setting( 'my_theme', 'top_logo' ); // logo top nav
    register_setting( 'my_theme', 'footer_logo' ); // logo footer
    register_setting( 'my_theme', 'slider_number' ); // nombre de slide
    register_setting( 'my_theme', 'slider_active' ); // activer slider
    register_setting( 'my_theme', 'facebook_menu' ); // facebook
    register_setting( 'my_theme', 'twitter_menu' ); // twitter
    register_setting( 'my_theme', 'instagram_menu' ); // instagram
    register_setting( 'my_theme', 'snapchat_menu' ); // snapchat
    register_setting( 'my_theme', 'dailymotion_menu' ); // dailymotion
    register_setting( 'my_theme', 'send_button' ); // send button
    register_setting( 'my_theme', 'contact_button' ); // contact button
}


add_action( 'admin_menu', 'myThemeAdminMenu' );

function myThemeAdminMenu( )
{
    add_menu_page(
        'Options linsolite', // le titre de la page
        'Linsolite',            // le nom de la page dans le menu d'admin
        'administrator',        // le rôle d'utilisateur requis pour voir cette page
        'linsolite-theme',        // un identifiant unique de la page
        'myThemeSettingsPage'   // le nom d'une fonction qui affichera la page
    );
}

function myThemeSettingsPage( )
{
    ?>
    <div class="wrap">
        <h2>Options de mon thème</h2>

        <form method="post" action="options.php">
            <?php
            // cette fonction ajoute plusieurs champs cachés au formulaire
            // pour vous faciliter le travail.
            // elle prend en paramètre le nom du groupe d'options
            // que nous avons défini plus haut.

            settings_fields( 'my_theme' );
            ?>

            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><label for="top_logo">Logo top</label></th>
                    <td>
                        <label for="upload_image">
                            <input class="upload_image" name="top_logo" type="text" size="36" name="ad_image" value="<?php echo get_option( 'top_logo', '' ); ?>" />
                            <input class="upload_image_button" name="top_logo" class="button" type="button" value="Upload Image" />
                            <br />Enter a URL or upload an image (400x200px)
                        </label>
                    </td>
                </tr>
                <tr valign="footer">
                    <th scope="row"><label for="footer_logo">Logo footer</label></th>
                    <td>
                        <label for="upload_image">
                            <input class="upload_image" name="footer_logo" type="text" size="36" name="ad_image" value="<?php echo get_option( 'footer_logo', '' ); ?>" />
                            <input class="upload_image_button" name="footer_logo" class="button" type="button" value="Upload Image" />
                            <br />Enter a URL or upload an image (150x150px)
                        </label>
                    </td>
                </tr>

            </table>

            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><label for="slider_active">Slider nouveauté</label></th>
                    <td><input type="checkbox" id="slider_active" name="slider_active" value="1" <?= checked( get_option('slider_active'), 1, false );?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="slider_number">Nombre de slider</label></th>
                    <td><input type="text" id="slider_number" name="slider_number" class="small-text" value="<?php echo get_option( 'slider_number', '' ); ?>" /></td>
                </tr>

            </table>

            <h1>Reseaux sociaux</h1>
            <table class="form-table">
            <tr valign="top">
                <th scope="row"><label for="facebook_menu">facebook</label></th>
                <td><input type="text" id="facebook_menu" name="facebook_menu" class="text" value="<?php echo get_option( 'facebook_menu', '' ); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="twitter_menu">Twitter</label></th>
                <td><input type="text" id="twitter_menu" name="twitter_menu" class="text" value="<?php echo get_option( 'twitter_menu', '' ); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="instagram_menu">Instagram</label></th>
                <td><input type="text" id="instagram_menu" name="instagram_menu" class="text" value="<?php echo get_option( 'instagram_menu', '' ); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="snapchat_menu">Snapchat</label></th>
                <td><input type="text" id="snapchat_menu" name="snapchat_menu" class="text" value="<?php echo get_option( 'snapchat_menu', '' ); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="dailymotion_menu">Dailymotion</label></th>
                <td><input type="text" id="dailymotion_menu" name="dailymotion_menu" class="text" value="<?php echo get_option( 'dailymotion_menu', '' ); ?>" /></td>
            </tr>
            </table>

            <h1>Custom button</h1>

            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><label for="send_button">Envoyer une vidéo</label></th>
                    <td><input type="text" id="send_button" name="send_button" class="text" value="<?php echo get_option( 'send_button', '' ); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="contact_button">Bouton contacter</label></th>
                    <td><input type="text" id="contact_button" name="contact_button" class="text" value="<?php echo get_option( 'contact_button', '' ); ?>" /></td>
                </tr>

            </table>

            <p class="submit">
                <input type="submit" class="button-primary" value="Mettre à jour" />
            </p>
        </form>
    </div>
    <?php
}


add_action( 'wp_head', 'myThemeCss' );

function myThemeCss( )
{

    if (!get_option( 'slider_active', 'true'))
    echo
    '
    <style type="text/css">

        .newVideo {
            display:none;
        }
    </style>
    ';
}


add_action('admin_enqueue_scripts', 'my_admin_scripts');

function my_admin_scripts() {
    if (isset($_GET['page']) && $_GET['page'] == 'linsolite-theme') {
        wp_enqueue_media();
        wp_register_script('upload-js', get_template_directory_uri ().'/inc/js/upload.js', array('jquery'));
        wp_enqueue_script('upload-js');
    }
}

/*
 *
 * pagination
 *
 */
function pressPagination($pages = '', $range = 2)
{
    global $paged;
    $showitems= ($range * 2)+1;

    if(empty($paged)) $paged = 1;
    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }

    if(1 != $pages)
    {
        echo "<div class='pagination'>";
        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
            }
        }

        if ($paged < $pages && $showitems < $pages) echo "<a id=\"next\" href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";
        echo "</div>";
    }
}


/*
 *
 * widget
 *
 */

if ( function_exists('register_sidebar') ) {
    register_sidebar( array(
        'name' => 'Footer Sidebar 1',
        'id' => 'footer-sidebar-1',
        'description' => 'Appears in the footer area',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => 'Footer Sidebar 2',
        'id' => 'footer-sidebar-2',
        'description' => 'Appears in the footer area',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => 'Footer Sidebar 3',
        'id' => 'footer-sidebar-3',
        'description' => 'Appears in the footer area',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}

/**
 * If we go beyond the last page and request a page that doesn't exist,
 * force WordPress to return a 404.
 * See http://core.trac.wordpress.org/ticket/15770
 */
function custom_paged_404_fix( ) {
    global $wp_query;

    if ( is_404() || !is_paged() || 0 != count( $wp_query->posts ) )
        return;

    $wp_query->set_404();
    status_header( 404 );
    nocache_headers();
}
add_action( 'wp', 'custom_paged_404_fix' );

/*
 *
 * custom field
 *
 */

add_action('wp_insert_post', 'wpc_champs_personnalises_defaut');
function wpc_champs_personnalises_defaut($post_id)
{

    add_post_meta($post_id, 'jtheme_video_code', '', true);
    return true;
}

/*
 *
 *  search menu
 *
 */

function add_search_box($items, $args) {

    ob_start();
    get_search_form();
    $searchform = ob_get_contents();
    ob_end_clean();

    $items =  '<li class="hide-on-large-only">
                    <form id="search-nav">
                        <input type="search" name="s" placeholder="Rechercher" />
                        <button class="btn" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </li>' . $items;

    $items .=
        '<li class="social-nav-mobile hide-on-large-only">' .

             '<a class="left" target="_blank" href="'. get_option( 'dailymotion_menu', '').'"> <i class="fa fa-youtube" aria-hidden="true"></i>  </a>'.

             '<a class="left" target="_blank" href="'. get_option( 'snapchat_menu', '').'"> <i class="fa fa-snapchat-ghost" aria-hidden="true"></i> </a>'.

             '<a class="left" target="_blank" href="'. get_option( 'facebook_menu', '').'"> <i class="fa fa-facebook" aria-hidden="true"></i> </a>'.


            '<a class="left" target="_blank" href="'. get_option( 'twitter_menu', '').'"> <i class="fa fa-twitter" aria-hidden="true"></i> </a>'.

            '<a class="left" target="_blank" href="'. get_option( 'instagram_menu', '').'"> <i class="fa fa-instagram" aria-hidden="true"></i> </a>'


       . '</li>';
    return $items;
}
add_filter('wp_nav_menu_items','add_search_box', 10, 2);

/*
 *
 * widget
 *
 */

require_once( get_template_directory() . '/widget/widget_social_footer.php' );

if ( function_exists('register_sidebar') ) register_sidebar();




?>