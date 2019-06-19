<?php get_header(); ?>




<?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <?php $event_id = get_the_id(); ?>
    <?php $image = thumbnail_of_post_url( $event_id,  'large');  ?>
    <?php $date = get_field('date'); ?>
    <?php $nice_date =  utf8_encode(strftime("%a %d %B", strtotime( $date ))); ?>
    <?php $time = get_field('time'); ?>
    <?php $top_slider = get_field('top_slider'); ?>
    <?php $gallery = get_field('gallery'); ?>
    <?php $videos = get_field('videos'); ?>
    <?php $family = get_field('family'); ?>
    <?php $family_image =  get_field('logo_voir_famille','option');   // returns url of the image ?>
    <?php $tarifs = get_field('tarifs'); ?>
    <?php $masterclass = get_field('masterclass'); ?>
    <?php $booking_link = get_field('booking_link'); ?>
  



    <!-- <header class="event_header" style="background-image:url(<?php echo $image; ?>);"> -->
    <header class="event_header">

          <div class="carousel">
            <?php if($top_slider): ?>
            <?php foreach( $top_slider as $image ): ?>
                <div style="background-image:url(<?php echo $image['sizes']['large']; ?>); background-size:cover; background-repeat:no-repeat; height:500px; width:100%;" class="image"></div>
            <?php endforeach; ?>
          <?php else: ?>
              <div style="background-image:url(<?php echo $image; ?>); background-size:cover; background-repeat:no-repeat; height:500px; width:100%;" class="image"></div>
            <?php endif; ?>
              </div>


        <div class="container">
            <div class="event_header_text <?php if(  $family ) { echo 'voir_en_famille';} ?>">
                <h1><?php the_title(); ?></h1>
                <h5><?php echo get_field('subtitle'); ?></h5>
                <h6 style="color: #373737; margin: 5px 0 0;">
                  <?php $terms_count = 1;
                  $terms = get_the_terms( $post->id, 'event_cat' );
                  if($terms){
                    $count = count($terms); if ( $count > 0 ){ foreach ( $terms as $term ) { if($terms_count<2) {echo $term->name . ' - '; $terms_count++;} } } } ?>
                  <?php $date = get_field('date');  ?>
                  <?php if($date) {echo $nice_date . ' - ';} ?>
                  <?php echo get_field('time'); ?>
                </h6>
                <?php if ($family) : ?>
                  <div class="voir_en_famille_inside" style="background-image: url(<?php echo $family_image; ?>);"></div>
                <?php endif; ?>
            </div>
        </div>
        <div class="event_header_text_bg"></div>

    </header>


    <article class="container" >
        <div id="event_details">
                <section class="event_details_section">
                <?php the_field('main'); ?>
                <?php if(!empty(get_field('english'))): ?>
                  <div class="english_version">
                    <div class="english_show"><span class="english_plus">+</span><span class="english_minus">-</span>English version</div>
                    <div class="english_text"><?php the_field('english'); ?></div>
                  </div>
                <?php endif; ?>
                <?php if ($booking_link) { ?>
                  <h6 class="showonlyonsmall"><a href="<?php echo $booking_link;?>" target="_blank" class="book_button">Réserver</a></h6>
                <?php } ?>

                <?php if ($gallery || $videos) : ?>
                    <h5 class="gallery_title">Galerie</h5>
                    <div class="gallery_container ">
                        <div class="carousel">

                            <?php if ($videos): ?>
                              <?php $vv = 0; foreach( $videos as $video ):   ?>
                              <div>
                              <?php video_url_to_iframe($video['video']); ?>
                                </div>
                            <?php $vv++; endforeach; ?>
                          <?php endif; ?>
                            <?php foreach( $gallery as $image ): ?>
                              <div>
                                  <img src="<?php echo $image['sizes']['medium']; ?>" alt="" />
                                  </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                <?php endif; ?>



                <?php if(get_field('avec')): ?>
                  <h5>Avec</h5>
                  <?php echo get_field('avec'); ?>
                <?php endif; ?>

                <?php if(get_field('first_part_title')): ?>
                  <h2 class="first_part"><?php echo get_field('first_part_title'); ?></h2>
                  <h5>Première partie</h5>

                  <?php if(get_field('first_part_text')): ?>
                    <?php echo get_field('first_part_text'); ?>
                  <?php endif; ?>

                  <?php if (get_field('gallery_first_part') || get_field('videos_first_part')) : ?>
                      <div class="gallery_container">
                          <div class="carousel">

                              <?php if (get_field('videos_first_part')): ?>
                                <?php $vvv = 0; foreach( get_field('videos_first_part') as $video ):   ?>
                                <div>
                                     <?php video_url_to_iframe($video['video']); ?>
                                  </div>
                              <?php $vvv++; endforeach; ?>
                            <?php endif; ?>
                              <?php foreach( get_field('gallery_first_part') as $image ): ?>
                                <div>
                                  <img src="<?php echo $image['sizes']['medium']; ?>" alt="" />
                                  </div>
                              <?php endforeach; ?>
                          </div>
                      </div>
                  <?php endif; ?>
                  <?php if(get_field('first_part_avec')): ?>
                    <h5>Avec</h5>
                    <?php echo get_field('first_part_avec'); ?>
                  <?php endif; ?>





                <?php endif; ?>


                <?php if(get_field('retour')): ?>
                  <h2 class="first_part gallery_title">RETOUR EN IMAGES</h2>
                  <?php $retour = get_field('retour'); ?>
                  <div class="gallery_container">
                    <div class="carousel">
                      <?php if( have_rows('retour') ): while ( have_rows('retour') ) : the_row(); ?>

                          <div class="image_container">
                              <img src="<?php echo get_sub_field('image')['sizes']['medium']; ?>" alt="" />
                              <div class="caption">
                                  <?php the_sub_field('text'); ?>
                              </div>
                          </div>

                        <?php endwhile; endif; ?>
                      </div>
                    </div>
                  <?php endif; ?>

                  <?php if ($booking_link) { ?>
                    <h6 class="showonlyonbig"><a href="<?php echo $booking_link;?>" target="_blank" class="book_button">Réserver</a></h6>
                  <?php } ?>

                  <?php if(get_field('mentions')): ?>
                    <div class="mentions">
                      <h5>Mentions obligatoires*</h5>
                      <?php echo get_field('mentions'); ?>
                    </div>
                  <?php endif; ?>


            </section>

            <aside>

                <?php if ($booking_link) { ?>
                  <h6><a href="<?php echo $booking_link;?>" target="_blank" class="book_button">Réserver</a></h6>
                <?php } ?>

                <?php if ($tarifs): ?>
                    <div><?php echo $tarifs; ?></div>
                <?php endif; ?>

                <?php if(get_field('voltaire') OR get_field('passedanse') OR get_field('culture')): ?>
                  <h5>Partenariat</h5>
                  <br><br>
                <?php endif; ?>
                <?php if(get_field('voltaire')): ?>
                  <div class="event_partner">
                    <a href="https://www.ferney-voltaire.fr/agendas/presentation-saison-voltaire" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/voltaire.jpg"><span>Saison Voltaire</span></a>
                  </div>
                  <?php endif; ?>
                <?php if(get_field('passedanse')): ?>
                  <div class="event_partner">
                    <a href="http://www.passedanse.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/passedanse.jpg"><span>Passe Danse</span></a>
                  </div>
                <?php endif; ?>
                <?php if(get_field('culture')): ?>
                  <div class="event_partner">
                    <a href="<?php echo get_home_url(); ?>/autour-des-spectacles/#culture-pour-tous" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/culture.jpg" style="width:200px;"></a>
                  </div>
                  <?php endif; ?>

                <?php if ($masterclass): ?>
                    <h5 class="masterclass"><span class="plus">+</span> MASTERCLASS</h5>
                    <div><?php echo $masterclass; ?></div>
                    <p>
                      <?php $email = get_field('masterclass_email','option'); ?>
                      <?php $name = get_the_title(); ?>
                      <?php $subject = rawurlencode('Inscription à la Masterclass ' . $name  ); ?>
                      <?php  $mailto = "mailto:" . $email . "?subject=". $subject . "&body=Bonjour%2C%20%0A%0AJe%20souhaite%20m'inscrire%20%C3%A0%20la%20Masterclass%20" .  $name . ".%0A%0A%0ABien%20cordialement%2C"; ?>
                    </p>
                    <h6><a target="_blank" href="<?php echo $mailto; ?>" style="margin-top:-30px;">S'inscrire</a></h6>
                <?php endif; ?>



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
