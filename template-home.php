<?php /* Template Name: Home Page Template */ get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php


        $meta_date_queries = ['relation' => 'OR'];
        $today = date("Ymd");
        for ($i = 0; $i < 5; $i++) {
            $key = 'date_repeater_' . $i . '_date';
            $arr =   array('key' => $key, 'value'  => $today, 'compare' => '>=', 'type' => 'DATE');
            array_push($meta_date_queries, $arr);
        }



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
                $meta_date_queries
            )

        );

        ?>

        <?php get_template_part('partials/front', 'events-slider'); ?>
        <?php get_template_part('partials/front', 'news-slider'); ?>
        <?php get_template_part('partials/front', 'events-all'); ?>




    <?php endwhile; ?>

<?php else : ?>

    <!-- article -->
    <article class="container">

        <h2><?php _e('Sorry, nothing to display.', 'webfactor'); ?></h2>

    </article>
    <!-- /article -->

<?php endif; ?>






<?php get_footer(); ?>