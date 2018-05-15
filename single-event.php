<?php get_header(); ?>




<?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <?php $event_id = get_the_id(); ?>
    <?php $image = thumbnail_of_post_url( $event_id,  'large');  ?>
    <?php $date = get_field('date'); ?>
    <?php $nice_date =  strftime("%a %d %b", strtotime( $date )); ?>
    <?php $time = get_field('time'); ?>
    <?php $top_slider = get_field('top_slider'); ?>
    <?php $gallery = get_field('gallery'); ?>
    <?php $videos = get_field('videos'); ?>
    <?php $tarifs = get_field('tarifs'); ?>


    </div>

    <!-- <header class="event_header" style="background-image:url(<?php echo $image; ?>);"> -->
    <header class="event_header">

          <div class="carousel">
            <?php if($top_slider): ?>
            <?php foreach( $top_slider as $image ): ?>
                <div style="background-image:url(<?php echo $image['sizes']['medium']; ?>); background-size:cover; background-repeat:no-repeat; height:500px; width:100%;" class="image"></div>
            <?php endforeach; ?>
          <?php else: ?>
              <div style="background-image:url(<?php echo $image; ?>); background-size:cover; background-repeat:no-repeat; height:500px; width:100%;" class="image"></div>
            <?php endif; ?>
              </div>


        <div class="container">

            <div class="event_header_text">
                <h1><?php the_title(); ?></h1>
                <h5>Cirque Le Roux</h5>
            </div>
            <div class="event_header_text_bg"></div>
        </div>

    </header>


    <article class="container" >
        <div id="event_details">

            <section>
                <?php the_content(); ?>

                <?php if ($gallery || $videos) : ?>
                    <h5>Galerie</h5>
                    <div class="gallery_container">
                        <div class="carousel">

                            <?php if ($videos): ?>
                              <?php $vv = 0; foreach( $videos as $video ):   ?>
                                <div id="video_<?php echo $vv; ?>"></div>
                            <?php $vv++; endforeach; ?>
                          <?php endif; ?>
                            <?php foreach( $gallery as $image ): ?>
                                <div style="background-image:url(<?php echo $image['sizes']['medium']; ?>);" class="image"></div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <?php if ($videos) : ?>
                        <script>
                            var $video_urls = <?php echo json_encode( $videos); ?>;
                        </script>
                    <?php endif; ?>
                <?php endif; ?>



                <?php if(get_field('avec')): ?>
                  <h5>Avec</h5>
                  <?php echo get_field('avec'); ?>
                <?php endif; ?>

                <?php if(get_field('retour')): ?>
                  <h5>Retour en images</h5>
                  <?php $retour = get_field('retour'); ?>
                  <div class="gallery_container">
                    <div class="carousel">
                      <?php if( have_rows('retour') ): while ( have_rows('retour') ) : the_row(); ?>
                        <div style="background-image:url(<?php echo get_sub_field('image')['sizes']['medium']; ?>);" class="image">
                          <div class="caption"><?php the_sub_field('text'); ?></div>
                          </div>

                        <?php endwhile; endif; ?>
                      </div>
                    </div>
                  <?php endif; ?>


            </section>

            <aside>


                <?php if ($date): ?>
                    <h5>CIRQUE  <br> <?php echo $nice_date; ?> <br> <?php echo $time; ?></h5>
                <?php endif; ?>

                <p>Spectacle à voir chez nos voisins
                    au Théâtre du Bordeau à Saint-Genis-Pouilly</p>

                    <h5>INFOS</h5>
                    <p>À voir en famille  <br>
                        À partir de 10 ans<br>
                        Durée 1h20</p>



                        <?php if ($tarifs): ?>
                            <h5>TARIFS</h5>
                            <p><?php echo $tarifs; ?></p>
                        <?php endif; ?>

                        <p>Navette gratuite au départ de
                            L’Esplanade du lac à 19h30 en direction de Saint-Genis-Pouilly.
                            Retour à la fin du spectacle.</p>


                            <p><a href="<?php echo $permalink; ?>" class="button">Réserver en ligne</a></p>


                        </aside>

                    </div>

                </article>


            <?php endwhile; ?>

        <?php else: ?>

            <!-- article -->
            <article>

                <h1><?php _e( 'Sorry, nothing to display.', 'webfactor' ); ?></h1>

            </article>
            <!-- /article -->

        <?php endif; ?>



        <?php get_footer(); ?>
