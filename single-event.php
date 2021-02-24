<?php get_header(); ?>




<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php $event_id = get_the_id(); ?>
    <?php $image = thumbnail_of_post_url($event_id,  'large');  ?>
    <?php // $date = get_field('date'); 
    ?>
    <?php // $nice_date = nice_date( $date ); 
    ?>
    <?php // $time = get_field('time'); 
    ?>
    <?php $date_repeater = get_field('date_repeater');  ?>
    <?php $top_slider = get_field('top_slider'); ?>
    <?php $gallery = get_field('gallery'); ?>
    <?php $videos = get_field('videos'); ?>
    <?php $tarifs = get_field('tarifs'); ?>
    <?php $masterclass = get_field('masterclass'); ?>
    <?php $booking_link = get_field('booking_link'); ?>
    <?php $booking_link_html = ''; ?>
    <?php if ($date_repeater) :
      if (count($date_repeater) == 1) :
        $booking_link_html  .= '<h6 ><a href="' .  $date_repeater[0]['booking_link'] . '" target="_blank" class="book_button">Réserver</a></h6>';
      else :
        $booking_link_html  .= ' <h5 class="gallery_title">Réserver</h5>';
        foreach ($date_repeater as $d) :
          $booking_link_html  .= '<a href="' . $date_repeater[0]['booking_link'] . '" target="_blank" class="book_button  book_button_small">' . nice_date($d['date']) . ' - ' .   $d['heure'] . '</a>';
        endforeach;
        $booking_link_html  .= '<br><br>';
      endif;
    endif; ?>



    <!-- <header class="event_header" style="background-image:url(<?php echo $image; ?>);"> -->
    <header class="event_header">

      <div class="carousel">
        <?php if ($top_slider) : ?>
          <?php foreach ($top_slider as $image) : ?>
            <div style="background-image:url(<?php echo $image['sizes']['large']; ?>); background-size:cover; background-repeat:no-repeat; height:500px; width:100%;" class="image"></div>
          <?php endforeach; ?>
        <?php else : ?>
          <div style="background-image:url(<?php echo $image; ?>); background-size:cover; background-repeat:no-repeat; height:500px; width:100%;" class="image"></div>
        <?php endif; ?>
      </div>


      <div class="container">
        <div class="event_header_text<?php if (get_field('family')) {
                                        echo ' voir_en_famille';
                                      } ?>">
          <h1><?php the_title(); ?></h1>
          <h5>

            <?php echo get_field('subtitle'); ?>
            <?php $terms_count = 1;
            $terms = get_the_terms($post->id, 'event_cat');
            if ($terms) {
              $count = count($terms);
              if ($count > 0) {

                foreach ($terms as $term) {
                  if ($terms_count < 2) {
                    echo ' - '  . $term->name;
                    $terms_count++;
                  }
                }
              }
            } ?>
          </h5>




          <h6 style="color: #373737; margin: 5px 0 0;">


            <?php if ($date_repeater) : ?>
              <?php foreach ($date_repeater as $d) : ?>
                <?php echo nice_date($d['date']); ?> - <?php echo $d['heure']; ?>
                <br>
              <?php endforeach; ?>
            <?php endif; ?>

          </h6>
        </div>
      </div>
      <div class="event_header_text_bg"></div>

    </header>


    <article class="container">
      <div id="event_details">

        <section class="event_details_section">
          <?php the_field('main'); ?>






          <?php if ($gallery || $videos) : ?>
            <h5 class="gallery_title">Galerie</h5>
            <div class="gallery_container ">
              <div class="carousel">

                <?php if ($videos) : ?>
                  <?php $vv = 0;
                  foreach ($videos as $video) :   ?>
                    <div id="video_<?php echo $vv; ?>"></div>
                  <?php $vv++;
                  endforeach; ?>
                <?php endif; ?>
                <?php foreach ($gallery as $image) : ?>
                  <img src="<?php echo $image['sizes']['medium']; ?>" alt="" />
                <?php endforeach; ?>
              </div>
            </div>

            <?php if ($videos) : ?>
              <script>
                var $video_urls = <?php echo json_encode($videos); ?>;
              </script>
            <?php endif; ?>
          <?php endif; ?>



          <?php if (get_field('avec')) : ?>
            <h5>Avec</h5>
            <?php echo get_field('avec'); ?>
          <?php endif; ?>

          <?php if (get_field('first_part_title')) : ?>
            <h2 class="first_part"><?php echo get_field('first_part_title'); ?></h2>
            <h5>Première partie</h5>

            <?php if (get_field('first_part_text')) : ?>
              <?php echo get_field('first_part_text'); ?>
            <?php endif; ?>

            <?php if (get_field('gallery_first_part') || get_field('videos_first_part')) : ?>
              <div class="gallery_container">
                <div class="carousel">

                  <?php if (get_field('videos_first_part')) : ?>
                    <?php $vv = 0;
                    foreach (get_field('videos_first_part') as $video) :   ?>
                      <div id="video_<?php echo $vv; ?>"></div>
                    <?php $vv++;
                    endforeach; ?>
                  <?php endif; ?>
                  <?php foreach (get_field('gallery_first_part') as $image) : ?>
                    <img src="<?php echo $image['sizes']['medium']; ?>" alt="" />
                  <?php endforeach; ?>
                </div>
              </div>

              <?php if (get_field('videos_first_part')) : ?>
                <script>
                  var $video_urls = <?php echo json_encode(get_field('videos_first_part')); ?>;
                </script>
              <?php endif; ?>
            <?php endif; ?>
            <?php if (get_field('first_part_avec')) : ?>
              <h5>Avec</h5>
              <?php echo get_field('first_part_avec'); ?>
            <?php endif; ?>





          <?php endif; ?>


          <?php if (get_field('retour')) : ?>
            <h2 class="first_part gallery_title">RETOUR EN IMAGES</h2>
            <?php $retour = get_field('retour'); ?>
            <div class="gallery_container">
              <div class="carousel">
                <?php if (have_rows('retour')) : while (have_rows('retour')) : the_row(); ?>

                    <div class="image_container">
                      <img src="<?php echo get_sub_field('image')['sizes']['medium']; ?>" alt="" />
                      <div class="caption">
                        <?php the_sub_field('text'); ?>
                      </div>
                    </div>

                <?php endwhile;
                endif; ?>
              </div>
            </div>
          <?php endif; ?>

          <?php echo $booking_link_html; ?>

          <?php if (get_field('mentions')) : ?>
            <div class="mentions">
              <h5>Mentions obligatoires*</h5>
              <?php echo get_field('mentions'); ?>
            </div>
          <?php endif; ?>


        </section>

        <aside>


          <?php echo $booking_link_html; ?>

          <?php if ($tarifs) : ?>
            <div><?php echo $tarifs; ?></div>
          <?php endif; ?>

          <?php if (get_field('voltaire')) : ?>
            <div class="event_partner">
              <img src="<?php echo get_template_directory_uri(); ?>/wp-content/img/voltaire.jpg">
            <?php endif; ?>

            <?php if ($masterclass) : ?>
              <h5 class="masterclass"><span class="plus">+</span> MASTERCLASS</h5>
              <div><?php echo $masterclass; ?></div>
              <p>
                <?php $email = get_field('masterclass_email', 'option'); ?>
                <?php $name = get_the_title(); ?>
                <?php $subject = rawurlencode('Inscription à la Masterclass ' . $name); ?>
                <?php $mailto = "mailto:" . $email . "?subject=" . $subject . "&body=Bonjour%2C%20%0A%0AJe%20souhaite%20m'inscrire%20%C3%A0%20la%20Masterclass%20" .  $name . ".%0A%0A%0ABien%20cordialement%2C"; ?>
              </p>
              <h6><a target="_blank" href="<?php echo $mailto; ?>" style="margin-top:-30px;">S'inscrire</a></h6>
            <?php endif; ?>



        </aside>

      </div>

    </article>


  <?php endwhile; ?>

<?php else : ?>

  <!-- article -->
  <article>

    <h1><?php _e('Sorry, nothing to display.', 'webfactor'); ?></h1>

  </article>
  <!-- /article -->

<?php endif; ?>



<?php get_footer(); ?>