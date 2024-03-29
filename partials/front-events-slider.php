<?php

global $events_args;

$latest_events_args =  $events_args;
$latest_events_args['posts_per_page'] = 3;


?>


<section id="latest_events_slider">

    <div class="carousel">
        <?php $latest_events = new WP_Query($latest_events_args);  ?>
        <?php if ($latest_events->have_posts()) :  while ($latest_events->have_posts()) : $latest_events->the_post();  ?>
                <?php $event_id = get_the_id(); ?>
                <?php $permalink = get_the_permalink(); ?>
                <?php // $date = get_field('date');  
                ?>
                <?php // $nice_date =  strftime("%a %d %B", strtotime($date)); 
                ?>
                <?php // $time = get_field('time'); 
                ?>
                <?php $date_repeater = get_field('date_repeater');  ?>
                <?php
                $color_overlay = get_field('color_overlay');
                $color_overlay_class = '';
                if ($color_overlay) {
                    $color_overlay_class = "color_overlay_" . $color_overlay;
                };
                $top_slider = get_field('top_slider');
                if ($top_slider) {
                    $image = $top_slider[0]['sizes']['large'];
                } else {
                    $image = thumbnail_of_post_url($event_id,  'large');
                }
                ?>

                <div class="single_event_slide">
                    <div class="single_event_slide_inner" style="background-image:url(<?php echo $image; ?>);">
                        <div class="event_slide_text <?php echo $color_overlay_class; ?>">
                            <a style="color:white;" href="<?php echo $permalink; ?>">
                                <h2><?php if (get_field('mention', $event_id)) {
                                        echo get_field('mention', $event_id) . ' / ';
                                    } ?><?php the_title(); ?></h2>
                                <h5><?php echo get_field('subtitle'); ?></h5>

                                <?php if ($date_repeater) : ?>
                                    <p class="date"><?php echo nice_event_dates_from_repeater($date_repeater, true); ?></p>
                                <?php endif; ?>


                            </a>
                            <?php if (!get_field('hide_ticketing', $event_id)) : ?>
                                <p><a href="<?php echo get_field('booking_link'); ?>" class="button button_open " target="_blank">Billetterie</a></p>
                            <?php endif; ?>




                        </div>

                    </div>

                </div>

        <?php endwhile;
        endif;  ?>
        <?php wp_reset_query(); ?>
    </div>
</section>