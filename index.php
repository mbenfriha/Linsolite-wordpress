<?php get_header(); ?>





<div class="newVideo">
    <h1>NO<span>UVEAUT</span>ÉS</h1>


    <div class="slider">
        <ul class="slides">

            <?php
            $args = array( 'numberposts' => get_option( 'slider_number', '3' ) );
            $recent_posts = wp_get_recent_posts( $args );
            foreach( $recent_posts as $recent ){
                echo '
                <li>
                <div class="img-slider">
                     <a href='.get_permalink($recent["ID"]).'> <img src=" '. get_the_post_thumbnail( $recent["ID"], 'full' ) .
                    ' </div></a>

                <div class="caption left-align">
                    <a href='.get_permalink($recent["ID"]).'><h3>'. $recent["post_title"] .'</h3></a>
                    <div class="border-slider-title"></div>
                    <h4 class="light grey-text text-lighten-3">'. wp_trim_words(  $recent['post_content'], 20, ' … <a class="more" href='.get_permalink($recent["ID"]).'>LIRE PLUS</a>' ) . '</h4>
                </div>


                </li> ';
            }
            ?>
        </ul>
    </div>

</div>


<div class="allVideo">

    <h1>LE<span>S AUTR</span>ES</h1>

    <div id="content" class="videos">

        <?php if (have_posts()) : while (have_posts()) : the_post();

            get_template_part( 'content', get_post_format() );

            if( $wp_query->current_post % 4 == 3 ) {

                    echo '<div class="adv-index">
                        <div class="adv">
                            <a href="https://www.facebook.com/linsolitetv/" target="_blank">
                                <img src="'.esc_url( home_url( '/' )).'wp-content/themes/Linsolite-wordpress/inc/img/pub_index.png" alt="linsolite facebook">
                            </a>
                        </div>
                      </div>';
            }

     endwhile; else:
     _e('Sorry, no posts matched your criteria.'); ?>

    <?php endif; ?>

    <?php pressPagination($pages ='', $range = 2); ?>

    </div>

</div>



<?php get_footer(); ?>
