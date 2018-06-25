<?php
$tdu = get_template_directory_uri();
$today = date( 'Y-m-d' );
$all_events_args = array(
    'post_type' => 'event',
    'posts_per_page' =>  -1,
    'meta_key' => 'date',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    // 'meta_query' => array(  //    ONLY SHOW EVENTS THAT HAVENT FINISHED YET
    //     array(
    //         'key' => 'date',
    //         'value' => $today,
    //         'compare' => '>=',
    //         'type' => 'DATE'
    //     )
    // )
);
?>


<section id="all_events">
    <!-- <h2 id="all_events_title">Saison 2017 - 2018</h2> -->

    <div class="container">
        <div id="events_and_programme">

            <div class="events_container">

                <?php $all_events = new WP_Query( $all_events_args );  ?>
                <?php if ($all_events->have_posts() ) :  while($all_events->have_posts()) : $all_events->the_post();  ?>
                    <?php $event_id = get_the_id(); ?>
                    <?php $image = thumbnail_of_post_url( $event_id,  'large');  ?>
                    <?php $permalink = get_the_permalink(); ?>
                    <?php $category =   get_the_terms( $event_id, 'event_cat' ); ?>
                    <?php $date = get_field('date');  ?>
                    <?php $nice_date =  utf8_encode(strftime("%d %B %Y", strtotime( $date ))); ?>
                    <?php $time = get_field('time'); ?>
                    <?php $familyclass = (get_field('family')) ? 'family ' : '' ; ?>

                    <div class="single_event_container">
                      <div class="<?php echo $familyclass;?>single_event_inner">
                        <div class="single_event_image_container">
                          <a  href="<?php echo $permalink; ?>" class="single_event_image" style="background-image:url(<?php echo $image; ?>);"></a>
                        </div>
                        <?php if ($category AND sizeof($category) > 0) :?><p class="category"><?php echo $category[0]->name; ?></p><?php endif; ?>
                        <h4><a href="<?php echo $permalink; ?>"><?php the_title(); ?></a></h4>
                        <?php if ($date): ?><p class="date"> <?php echo $nice_date; ?>  - <?php echo $time; ?></p><?php endif; ?>
                      </div>
                    </div>

                <?php endwhile;endif;  ?>
                <?php wp_reset_query(); ?>


            </div>
              <!-- <div class="programme_container">
                  <div class="programme_inner">
                          <h4>L’AGENDA</h4>
                          <a href="#">
                              <img src="<?php echo $tdu;?>/img/esplanade.jpg"  alt="programme image" />
                          </a>
                          <p><a href="#" class="button">Télécharger le programme</a></p>

                  </div>

              </div> -->
        </div>
    </div>

</section>
