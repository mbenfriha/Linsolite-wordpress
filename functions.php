<?php

function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
    if(empty($first_img)){
        //Defines a default image
        $first_img = "/images/default.jpg";
    }
    return $first_img;
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
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
            }
        }

        if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
        echo "</div>";
    }





}

/*
 *
 *  function excerpt
 *
 */
function new_excerpt_length($length) {
    return 26;
}
add_filter('excerpt_length', 'new_excerpt_length');

function the_titlesmall($before = '', $after = '', $echo = true, $length = false) { $title = get_the_title();

    if ( $length && is_numeric($length) ) {
        $title = substr( $title, 0, $length );
    }

    if ( strlen($title)> 0 ) {
        $title = apply_filters('the_titlesmall', $before . $title . $after, $before, $after);
        if ( $echo )
            echo $title;
        else
            return $title;
    }
}

/*
 *
 *image a la une
 *
 */
add_theme_support( 'post-thumbnails' );


/*
 *
 * widget
 *
 */

require_once( get_template_directory() . '/inc/widget_last_video.php' );
require_once( get_template_directory() . '/inc/widget_facebook_likebox.php' );

if ( function_exists('register_sidebar') ) register_sidebar();



/*
 *
 * menu
 *
 */

function register_menu() {
    register_nav_menu('primary-menu', __('Primary Menu'));
}
add_action('init', 'register_menu');

/*
 *
 *  comments
 *
 */

function dsq_identifier_for_post($post) {
    return get_the_ID() . ' ' . get_the_guid();
}

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

?>