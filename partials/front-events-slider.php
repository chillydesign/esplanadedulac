<?php

$latest_events_args = array(
    'post_type' => 'event',
    'posts_per_page' =>  3,
    'meta_key' => 'date',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'meta_query' => array(  //    ONLY SHOW EVENTS THAT ARENT RESIDENCE
        'relation' => 'AND',
        array( //    ONLY SHOW EVENTS THAT ARENT RESIDENCE
            'key' => 'residence',
            'value' => 0,
            'compare' => '=',
            'type' => 'numeric'
        ),
        array(  //    ONLY SHOW EVENTS THAT HAVENT FINISHED YET
            'key' => 'date',
            'value' => date( 'Y-m-d' ),  // today
            'compare' => '>=',
            'type' => 'DATE'
        )
    )
);


?>


<section id="latest_events_slider">

    <div class="carousel">
        <?php $latest_events = new WP_Query( $latest_events_args );  ?>
        <?php if ($latest_events->have_posts() ) :  while($latest_events->have_posts()) : $latest_events->the_post();  ?>
            <?php $event_id = get_the_id(); ?>
            <?php $permalink = get_the_permalink(); ?>
            <?php $date = get_field('date');  ?>
            <?php $nice_date =  utf8_encode(strftime("%a %d %B", strtotime( $date ))); ?>
            <?php $time = get_field('time'); ?>

            <?php
            $top_slider = get_field('top_slider');
            if ($top_slider) {
                $image = $top_slider[0]['sizes']['large'];
            } else {
                $image = thumbnail_of_post_url( $event_id,  'large');
            }
            ?>

            <div class="single_event_slide">
                <div class="single_event_slide_inner" style="background-image:url(<?php echo $image; ?>);">
                    <div class="event_slide_text">
                      <a style="color:white;" href="<?php echo $permalink; ?>">
                          <h2><?php the_title(); ?></h2>
                        <h5><?php echo get_field('subtitle'); ?></h5>
                        <?php if ($date): ?><p class="date"><?php echo $nice_date; ?> à <?php echo $time; ?> </p><?php endif; ?>
                        </a>
                        <p><a href="<?php echo get_field('booking_link'); ?>" class="button button_open " target="_blank">Billetterie</a></p>
                    </div>
                </div>

            </div>

        <?php endwhile;endif;  ?>
        <?php wp_reset_query(); ?>
    </div>
</section>
