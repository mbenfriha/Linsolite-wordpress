<?php get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="row body">
        <a href="<?php the_permalink(); ?>">
        <div class="col s6 offset-s2 video card card-1 ">
            <div class="col s8 picture"><div class="thumbnail"><?php the_post_thumbnail('full'); ?></div>
                <img class="button-play" src="wp-content/themes/Linsolite/play-button.png" alt=""></div>
            <div class="col s4 infos">
                <div class="titre"><h2><?php the_title(); ?></h2>
            </div>
                <div class="date"><?php the_time('j F Y') ?></div>
            <div class="resum"><?php the_excerpt() ?></div>

        </div>
        </a>
    </div>

<?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>

<?php pressPagination($pages ='', $range = 2); ?>

<?php get_footer(); ?>


