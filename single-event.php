<?php get_header(); ?>




<?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <?php $event_id = get_the_id(); ?>
    <?php $image = thumbnail_of_post_url( $event_id,  'large');  ?>
    <?php $date = get_field('date'); ?>
    <?php $nice_date =  date('jS M', strtotime($date)); ?>
    <?php $time = get_field('time'); ?>
    <?php $gallery = get_field('gallery'); ?>
    <?php $tarifs = get_field('tarifs'); ?>

    <header class="event_header" style="background-image:url(<?php echo $image; ?>);">
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

                <?php if ($gallery) : ?>
                    <h5>Galerie</h5>
                    <div class="gallery_container">
                        <div class="carousel">
                            <?php foreach( $gallery as $image ): ?>
                                <div style="background-image:url(<?php echo $image['sizes']['medium']; ?>);" class="image"></div>
                         <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>


                <h5>Avec</h5>
                <p>Lolita Costet, Grégory Arsenal, Philip Rosenberg, Yannick Thomas - Mise en scène Charlotte Saliou - Concept Cirque Le Roux - Intervenant / Œil extérieur Raymond Raymondson - Chorégraphie Brad Musgrove - Musique originale Alexandra Stréliski - Création costumes Philip Rosenberg, Grégory Arsenal - Costumes Emily Ockenfeels</p>


            </section>

            <aside>


                <?php if ($date): ?>
                <h5>CIRQUE  <br> VE <?php echo $nice_date; ?> <br> <?php echo $time; ?></h5>
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
