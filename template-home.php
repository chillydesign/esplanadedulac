<?php /* Template Name: Home Page Template */ get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php


        $events_args = array(  // used for partials/front events all
            'post_type' => 'event',
            'posts_per_page' =>  -1,
            'meta_key' => 'date_repeater_0_date',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'meta_query' => array(
                'relation' => 'AND',
                array( //    ONLY SHOW EVENTS THAT ARENT RESIDENCE
                    'key' => 'residence',
                    'value' => 0,
                    'compare' => '=',
                    'type' => 'numeric'
                ),
                // array(  //    ONLY SHOW EVENTS THAT HAVENT FINISHED YET
                //     'key' => 'date',
                //     'value' => date( 'Y-m-d' ),  // today
                //     'compare' => '>=',
                //     'type' => 'DATE'
                // )


                array(
                    'key'     => 'date_repeater_0_date',
                    'value'   => $today,
                    'compare' => '>=',
                    'type' => 'DATE'
                )



            )

        );

        ?>

        <?php get_template_part('partials/front', 'events-slider'); ?>
        <?php get_template_part('partials/front', 'events-all'); ?>
        <?php get_template_part('partials/front', 'news-slider'); ?>



    <?php endwhile; ?>

<?php else : ?>

    <!-- article -->
    <article class="container">

        <h2><?php _e('Sorry, nothing to display.', 'webfactor'); ?></h2>

    </article>
    <!-- /article -->

<?php endif; ?>






<?php get_footer(); ?>