<?php
$latest_events_args = array(
    'post_type' => 'event',
    'posts_per_page' =>  -1,
    'meta_key' => 'date',
    'orderby' => 'meta_value',
    'order' => 'ASC'
);


?>


<section id="latest_events_slider">

    <div class="carousel">
        <?php $latest_events = new WP_Query( $latest_events_args );  ?>
        <?php if ($latest_events->have_posts() ) :  while($latest_events->have_posts()) : $latest_events->the_post();  ?>
            <?php $event_id = get_the_id(); ?>
            <?php $image = thumbnail_of_post_url( $event_id,  'large');  ?>
            <?php $permalink = get_the_permalink(); ?>
            <?php $date = get_field('date');  ?>
            <?php $nice_date =  strftime("%A %d %B, %Y", strtotime( $date )); ?>

            <?php $time = get_field('time'); ?>
            <div class="single_event_slide">
                <div class="single_event_slide_inner" style="background-image:url(<?php echo $image; ?>);">
                    <div class="event_slide_text">
                        <h2><a href="<?php echo $permalink; ?>"><?php the_title(); ?></a></h2>
                        <h5>Cirque Le Roux</h5>
                        <?php if ($date): ?><p class="date"><?php echo $nice_date; ?> à <?php echo $time; ?> </p><?php endif; ?>
                        <p><a href="<?php echo $permalink; ?>" class="button button_open ">Billetterie</a></p>
                    </div>
                </div>

            </div>

        <?php endwhile;endif;  ?>
        <?php wp_reset_query(); ?>
    </div>
</section>
