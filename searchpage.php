<?php get_header(); ?>

    <div class="row body">
    <div class="all_video col s6 offset-s2 ">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>


            <div class="video card card-1 col s12">
                <a href="<?php the_permalink(); ?>">
                    <div class="col s8 picture"><div class="thumbnail"><?php the_post_thumbnail('full'); ?></div>
                        <img class="button-play" src="<?php echo esc_url( home_url( '/' )); ?>wp-content/themes/Linsolite/play-button.png" alt=""></div>
                    <div class="col s4 infos">
                        <div class="titre"><h2><?php the_title(); ?></h2>
                        </div>
                        <div class="date"><?php the_time('j F Y') ?></div>
                        <div class="resum"><?php the_excerpt() ?></div>

                    </div> </a>

            </div>



        <?php endwhile; else: ?>


            <p>
                <?php _e('Sorry, no posts matched your criteria.'); ?>
            </p>



        <?php endif; ?>
        <?php pressPagination($pages ='', $range = 2); ?>
    </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>