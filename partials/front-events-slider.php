<section id="latest_events_slider">


    <?php $latest_events = new WP_Query(array('post_type' => 'event',   'posts_per_page' =>  3 ));  ?>
    <?php  if ($latest_events->have_posts() ) :  while($latest_events->have_posts()) : $latest_events->the_post();  ?>
        <?php $event_id = get_the_id(); ?>
        <?php $image = thumbnail_of_post_url( $event_id,  'large');  ?>
        <?php $permalink = get_the_permalink(); ?>
    <div class="single_event_slide" style="background-image:url(<?php echo $image; ?>);">

        <div class="event_slide_text">

            <h2><a href="<?php echo $permalink; ?>"><?php the_title(); ?></a></h2>
            <h5>Cirque Le Roux</h5>
            <p class="date">Vendredi 1er décembre à 20h30 </p>
            <p><a href="<?php echo $permalink; ?>" class="button button_open ">Billetterie</a></p>
        </div>

    </div>

<?php endwhile;endif;  ?>
<?php wp_reset_query(); ?>

</section>
