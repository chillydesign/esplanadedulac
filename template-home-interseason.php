<?php /* Template Name: Accueil intersaison */ get_header(); ?>


<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<hr style="border-top:5px solid #0e8294;margin-top:-6px;"/>
<div class="container">
<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" style="max-width:1600px; margin:auto; display:block;">
</div>
<hr style="border-top:5px solid #0e8294;"/>
<?php //get_template_part('partials/front', 'events-slider'); ?>

<section style="background: #f5f5f5; padding: 50px; margin-top: -5px; text-align: center;">

    <div class="container temporary_container">
    <?php the_content(); ?>

      <!-- <h6><a href="#">Réservez dès maintenant!</a></h6> -->
    </div>
</section>
<?php //get_template_part('partials/front', 'events-all'); ?>
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
