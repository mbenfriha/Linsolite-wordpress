<?php get_header(); ?>

    <div class="row body">
        <div class="single col s6 offset-s2 ">
            <div class="card card-1">
                <div class="title-single">
                    <div class="nav-single">
                        <div class="next next-single"> <?php next_post_link('%link', 'Vidéo suivante    '); ?>  </div>
                        <div class="prev previous-single"> <?php previous_post_link('%link', '      Vidéo précedente'); ?> </div>
                    </div>
                    <h1><?php the_title(); ?></h1>
                </div>

                <div class="social-share">

                    <a href="http://www.facebook.com/share.php?u=<?php echo urlencode(get_the_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>" target="_blank" class="facebook">Partager sur Facebook</a>
                    <a href="//twitter.com/share?url=<?php echo urlencode(get_the_permalink()); ?>" target="_blank" class="twitter">Twitter la vidéo</a>
                </div>
                    <div class="video-single">
                        <?php echo get_post_meta(get_the_ID(), 'jtheme_video_code')[0] ?>
                    </div>


                <div class="resum-single">
                    <?php the_content() ?>
                    <div class="social-share">

                        <a href="http://www.facebook.com/share.php?u=<?php echo urlencode(get_the_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>" class="facebook">Partager sur Facebook</a>
                        <a href="//twitter.com/share?url={URL}" class="twitter">Twitter la vidéo</a>
                    </div>
                    <div class="date-cat">le <?php the_time('j F Y') ?> dans <?php echo the_category(', ')?></div>
                </div>



                <div class="comments-single"> <?php comments_template(); ?> </div>
            </div>
        </div>

        <?php get_sidebar(); ?>
    </div>


<?php get_footer(); ?>