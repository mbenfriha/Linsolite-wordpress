<?php get_header(); ?>



    <div class="allVideo">

        <h1>LE<span>S AUTR</span>ES</h1>

        <div id="content" class="videos">

            <?php if (have_posts()) : while (have_posts()) : the_post();

                get_template_part( 'content', get_post_format() );

            endwhile; else:
                _e('Sorry, no posts matched your criteria.'); ?>

            <?php endif; ?>

            <?php pressPagination($pages ='', $range = 2); ?>

        </div>



    </div>




<?php get_sidebar(); ?>
<?php get_footer(); ?>