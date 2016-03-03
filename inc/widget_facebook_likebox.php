<?php


class Linsolite_Facebook_Like extends WP_Widget
{
    public function __construct(){
        $widget_ops = array(
            'classname' => 'linsolite_facebook_like',
            'description' => 'Permet d\'afficher une likebox facebook',
        );
        parent::__construct( 'linsolite_facebook_like', 'Linsolite - facebook likebox', $widget_ops );
    }



    public function widget($args, $instance)
    {

            //Récupération des paramètres
            extract($args);
            $link=  apply_filters('widget_title',  $instance['link']);

            //Récupération des articles


            //Affichage
            echo $before_widget;

            echo '<div class="fb-page" data-href="'.$link.'" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="'.$link.'"><a href="'.$link.'">Widget Linsolite</a></blockquote></div></div>';
            echo $after_widget;
    }


    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        //Récupération des paramètres envoyés
        $instance['link'] = strip_tags($new_instance['link']);

        return $instance;
    }

    function form($instance)
    {
        $link = esc_attr($instance['link']);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('link'); ?>">
                <?php echo 'Lien Facebook:'; ?>
                <input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $link; ?>" />
            </label>
        </p>

        <?php
    }

}

function init_facebook_like(){
    register_widget("Linsolite_Facebook_Like");
}
add_action( 'widgets_init', 'init_facebook_like');
