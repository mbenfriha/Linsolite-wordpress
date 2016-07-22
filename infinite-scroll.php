<?php

 /* Template Name: infinite scroll  */
?>

<?php get_header(); ?>


    <div id="content" role="main">
<?php
/*
 Show only Pages on  infinite scroll!
Here is the secret:
    You can set post_type for what you need, it's simple!
    Some post_types could be: portfolio, project, product
    We could add as many post types as we want, separating them by commas, like 'post', 'page', 'product'
*/
$args = array(       // set up arguments
    'post_type' => 'post', // Only Pages
);
query_posts($args);   // load posts
?>

        <div class="allVideo">

            <h1>LE<span>S AUTR</span>ES</h1>

            <div class="videos">

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="video post">

                        <a href="<?php the_permalink(); ?>"><div class="thumb">
                                <?php the_post_thumbnail('full'); ?>
                            </div></a>

                        <div class="excerpt">
                            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                            <span class="infos">Mise en ligne le <?php the_time('j F Y') ?> dans la catégorie animaux</span>

                            <p><?php the_excerpt() ?></p>

                        </div>
                    </div>
                <?php endwhile; else: ?>
                    <?php _e('Sorry, no posts matched your criteria.'); ?>

                <?php endif; ?>

                <?php pressPagination($pages ='', $range = 2); ?>


            </div>



        </div>



        <?php get_footer(); ?>
