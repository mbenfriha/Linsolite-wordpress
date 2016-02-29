<?php get_header(); ?>


<?php the_title(); ?>

<div class="card card-1">
<?php echo get_post_meta(get_the_ID(), 'jtheme_video_code')[0] ?>
</div>
