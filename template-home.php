<?php /* Template Name: Home Page Template */ get_header(); ?>


<?php if (have_posts()): while (have_posts()) : the_post(); ?>


<?php get_template_part('partials/front', 'events-slider'); ?>
<?php get_template_part('partials/front', 'events-all'); ?>
<?php get_template_part('partials/front', 'news-slider'); ?>



<?php endwhile; ?>

<?php else: ?>

    <!-- article -->
    <article class="container">

        <h2><?php _e( 'Sorry, nothing to display.', 'webfactor' ); ?></h2>

    </article>
    <!-- /article -->

<?php endif; ?>






<?php get_footer(); ?>
