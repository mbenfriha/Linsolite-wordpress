<?php get_header(); ?>



<div class="single col s12">
    <div class="single-video">
        <div class="post-video">
            <div class="prev-next">

                <div id="prev">  <?php previous_post_link('%link', '<i class="fa fa-caret-left" aria-hidden="true"></i> Vidéo précedente'); ?></div>

                <div id="next"><?php next_post_link('%link', 'Vidéo suivante <i class="fa fa-caret-right" aria-hidden="true"></i>'); ?> </div>

            </div>
            <?php echo get_post_meta(get_the_ID(), 'jtheme_video_code')[0] ?>

            <div class="info-video"> le <?php the_time('j F Y') ?> dans <?php echo the_category(', ')?> </div>
        </div>
    </div>

    <div class="sub-video">
        <div class="first-sub-video">
            <div class="content">
                <h1><?php the_title(); ?></h1>
                <?php the_content() ?>
            </div>
            <div class="share">
                <ul>
                    <li> <a href="http://www.facebook.com/share.php?u=<?php echo urlencode(get_the_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>" target="_blank"><div class="facebook-share">PARTAGER <i class="fa fa-facebook" aria-hidden="true"></i> </div> <a/> </li>
                    <li> <a href="//twitter.com/share?url=<?php echo urlencode(get_the_permalink()); ?>" target="_blank"><div class="tweeter-share">TWEETER <i class="fa fa-twitter" aria-hidden="true"></i> </div> </a> </li>
                    <li> <a href="#comment"><div class="comment">COMMENTER <i class="fa fa-commenting-o" aria-hidden="true"></i> </div> </a> </li>
                </ul>
            </div>
        </div>

        <div class="ad-single">
            <div class="adv-index">
                <div class="adv">
                    <a href="https://www.facebook.com/linsolitetv/" target="_blank">
                        <img src="<?= esc_url( home_url( '/' )) ?>wp-content/themes/Linsolite-wordpress/inc/img/pub_index.png" alt="linsolite facebook">
                    </a>
                </div>
            </div>
        </div>
        <div class="seconde-sub-video">
            <div class="more-video"><h2>le<span>s autr</span>es</h2>
                <ul>
                    <?php

                    // The Query
                    query_posts('orderby=rand&posts_per_page=5&cat='. get_the_category(get_the_ID())[0]->term_id);

                    // The Loop
                    while ( have_posts() ) : the_post();
                        echo
                               '<li>

                               <a href="'. get_permalink(get_the_ID()) .'">' . get_the_post_thumbnail(get_the_ID(), 'small') . '</a>

                                <span class="title-more"> <a href="'. get_permalink(get_the_ID()) .'">' . get_the_title(get_the_ID()). ' </a></span>

                               </li>';


                    endwhile;

                    // Reset Query
                    wp_reset_query();
                    ?>

                </ul>

            </div>


        </div>

        <div id="comment" class="third-sub-video">
            <?php comments_template(); ?>
        </div>
    </div>
</div>




<?php get_footer(); ?>
