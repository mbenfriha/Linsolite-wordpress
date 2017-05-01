<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Linsolite
 * @since Linsolite.tv 2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post video'); ?>>

    <a href="<?php the_permalink(); ?>"><div class="thumb">
            <?php the_post_thumbnail('full'); ?>
        </div></a>

    <div class="excerpt">
        <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
        <span class="infos">Mise en ligne le <?php the_time('j F Y') ?> dans la catégorie <?php the_category( ', ' ); ?></span>

        <p><?php the_excerpt() ?></p>

        <footer class="entry-footer">
            </footer>

    </div>
</article>