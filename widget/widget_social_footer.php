<?php


class Linsolite_Social_Footer extends WP_Widget
{
    public function __construct(){
        $widget_ops = array(
            'classname' => 'linsolite_social_footer',
            'description' => 'Permet d\'afficher les réseaux sociaux',
        );
        parent::__construct( 'linsolite_social_footer', 'Linsolite - social footer', $widget_ops );
    }



    public function widget($args, $instance)
    {

        //Récupération des paramètres
        extract($args);


        //Récupération des articles


        //Affichage
        echo $before_widget;

        echo $args['before_title'];
        echo apply_filters('widget_title', $instance['title']);
        echo $args['after_title'];

        if($instance['facebook'])
        echo '<a target="_blank" href="' . $instance['facebook'] . '"><i class="fa fa-facebook" aria-hidden="true"></i></a> ';
        if($instance['twitter'])
        echo '<a target="_blank" href="' . $instance['snapchat'] . '"><i class="fa fa-snapchat-ghost" aria-hidden="true"></i></a> ';
        if($instance['facebook'])
        echo '<a target="_blank" href="' . $instance['twitter'] . '"><i class="fa fa-twitter" aria-hidden="true"></i></a> ';
        if($instance['instagram'])
        echo '<a target="_blank" href="' . $instance['instagram'] . '"><i class="fa fa-instagram" aria-hidden="true"></i></a> ';
        if($instance['dailymotion'])
        echo '<a target="_blank" href="' . $instance['dailymotion'] . '"><i class="fa fa-youtube" aria-hidden="true"></i></a> ';

        echo $after_widget;
    }


    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        //Récupération des paramètres envoyés

        $instance['title'] = strip_tags($new_instance['title']);

        $instance['facebook'] = strip_tags($new_instance['facebook']);
        $instance['twitter'] = strip_tags($new_instance['twitter']);
        $instance['instagram'] = strip_tags($new_instance['instagram']);
        $instance['dailymotion'] = strip_tags($new_instance['dailymotion']);
        $instance['snapchat'] = strip_tags($new_instance['snapchat']);

        return $instance;
    }

    function form($instance)
    {

        $title = esc_attr($instance['title']);

        $facebook = esc_attr($instance['facebook']);
        $twitter = esc_attr($instance['twitter']);
        $snapchat = esc_attr($instance['snapchat']);
        $instagram = esc_attr($instance['instagram']);
        $dailymotion = esc_attr($instance['dailymotion']);
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
                <?php echo 'Titre:'; ?>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>">
                <?php echo 'Lien Facebook:'; ?>
                <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo $facebook; ?>" />
            </label>

            <label for="<?php echo $this->get_field_id('twitter'); ?>">
                <?php echo 'Lien Twitter:'; ?>
                <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo $twitter; ?>" />
            </label>
            <label for="<?php echo $this->get_field_id('snapchat'); ?>">
                <?php echo 'Lien Snapchat:'; ?>
                <input class="widefat" id="<?php echo $this->get_field_id('snapchat'); ?>" name="<?php echo $this->get_field_name('snapchat'); ?>" type="text" value="<?php echo $snapchat; ?>" />
            </label>
            <label for="<?php echo $this->get_field_id('instagram'); ?>">
            <?php echo 'Lien Instagram:'; ?>
                <input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo $instagram; ?>" />
            </label>

            <label for="<?php echo $this->get_field_id('dailymotion'); ?>">
            <?php echo 'Lien dailymotion:'; ?>
                <input class="widefat" id="<?php echo $this->get_field_id('dailymotion'); ?>" name="<?php echo $this->get_field_name('dailymotion'); ?>" type="text" value="<?php echo $dailymotion; ?>" />
            </label>


        </p>

        <?php
    }

}

function init_social_footer(){
    register_widget("Linsolite_Social_Footer");
}
add_action( 'widgets_init', 'init_social_footer');
