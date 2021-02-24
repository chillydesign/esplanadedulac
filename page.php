<?php get_header(); ?>


<?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <?php get_template_part('partials/page', 'header'  ); ?>
    <!-- article -->
    <article id="post-<?php the_ID(); ?>" class="container">

        <div id="event_details">

            <section class="event_details_section">
              <?php the_content(); ?>
                <?php include('section-loop.php'); ?>



            </section>
            <aside>
              <?php echo get_field('sidebar'); ?>
            </aside>

        </div>



    </article>
    <!-- /article -->

<?php endwhile; ?>

<?php else: ?>

    <!-- article -->
    <article class="container">

        <h2><?php _e( 'Sorry, nothing to display.', 'webfactor' ); ?></h2>

    </article>
    <!-- /article -->

<?php endif; ?>






<?php get_footer(); ?>
