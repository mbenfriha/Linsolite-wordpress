<?php


class Linsolite_Last_Videos extends WP_Widget
{
    public function __construct(){
        $widget_ops = array(
            'classname' => 'linsolite_last_videos',
            'description' => 'Permet d\'afficher les dernières vidéos',
        );
        parent::__construct( 'linsolite_last_videos', 'Linsolite - Dernières vidéos', $widget_ops );
    }



    public function widget($args, $instance)
    {

        if(!(is_home() || is_front_page())) {
            //Récupération des paramètres
            extract($args);
            $title = apply_filters('widget_title', $instance['title']);
            $nb_posts = $instance['nb_posts'];

            //Récupération des articles
            $lastposts = get_posts(array('numberposts'=>$nb_posts));

            //Affichage
            echo $before_widget;
            if ($title)
                echo $before_title . $title . $after_title;
            else
                echo $before_title . 'Articles Récents' . $after_title;

            echo '<ul>';
            foreach ( $lastposts as $post ) : setup_postdata($post); ?>
                <li> <?php echo get_the_post_thumbnail($post->ID, 'thumbnail')?>
                    <a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a></li>
            <?php endforeach;
            echo '</ul>';
            echo $after_widget;
        }
    }


    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        //Récupération des paramètres envoyés
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['nb_posts'] = $new_instance['nb_posts'];

        return $instance;
    }

    function form($instance)
    {
        $title = esc_attr($instance['title']);
        $nb_posts = esc_attr($instance['nb_posts']);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
                <?php echo 'Titre:'; ?>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('nb_posts'); ?>">
                <?php echo 'Nombre d\'articles:'; ?>
                <input class="widefat" id="<?php echo $this->get_field_id('nb_posts'); ?>" name="<?php echo $this->get_field_name('nb_posts'); ?>" type="text" value="<?php echo $nb_posts; ?>" />
            </label>
        </p>
        <?php
    }

}

function init_last_videos(){
    register_widget("Linsolite_Last_Videos");
}
add_action( 'widgets_init', 'init_last_videos');
