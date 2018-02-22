<?php get_header(); ?>




<?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <?php $event_id = get_the_id(); ?>
    <?php $image = thumbnail_of_post_url( $event_id,  'large');  ?>

    <header class="event_header" style="background-image:url(<?php echo $image; ?>);">
        <div class="container">

            <div class="event_header_text">
                <h1><?php the_title(); ?></h1>
                <h5>Cirque Le Roux</h5>
            </div>
            <div class="event_header_text_bg"></div>
        </div>

    </header>


    <div class="container" >
        <div id="event_details">

            <section>
                <p><strong>Cirque, danse, théâtre, humour, cinéma muet... ce spectacle mené tambour battant par quatre artistes talentueux vous embarque dans une ambiance années 30 entre exploits et excentricité !</strong></p>

                <p>Dans un boudoir cosy où le champagne coule à  ots, trois hommes plutôt dandys et une mariée hystérique entretiennent des relations mystérieuses, font irruption et tentent de protéger un coupable secret : « The Elephant in the room ». Expression utilisée lorsqu’un problème est évident pour tout le monde mais que personne n’ose l’aborder.</p>
                <p>Leurs confrontations se muent alors en un tour d’acrobaties de haut vol où ces personnages, en tenue chic et glamour, volent, virevoltent et se projettent avec une énergie débordante et une folie contagieuse !</p>


                <h5>Galerie</h5>

                    <div class="gallery_container"></div>


                    <h5>Avec</h5>
                <p>Lolita Costet, Grégory Arsenal, Philip Rosenberg, Yannick Thomas - Mise en scène Charlotte Saliou - Concept Cirque Le Roux - Intervenant / Œil extérieur Raymond Raymondson - Chorégraphie Brad Musgrove - Musique originale Alexandra Stréliski - Création costumes Philip Rosenberg, Grégory Arsenal - Costumes Emily Ockenfeels</p>


            </section>

            <aside>


                <h5>CIRQUE  <br>
                    VE 1ER DÉC <br>
                    20H30</h5>

                <p>Spectacle à voir chez nos voisins
                      au Théâtre du Bordeau à Saint-Genis-Pouilly</p>

                <h5>INFOS</h5>
                <p>À voir en famille  <br>
                À partir de 10 ans<br>
                Durée 1h20</p>

                <h5>TARIFS</h5>
                <p>Plein 25 €<br>
                Réduit 22 € Abonné 20 € Abonné Jeune 15 € Enfant 12 €</p>

                <p>Navette gratuite au départ de
                L’Esplanade du lac à 19h30 en direction de Saint-Genis-Pouilly.
                Retour à la fin du spectacle.</p>


                <p><a href="<?php echo $permalink; ?>" class="button  ">Réserver en ligne</a></p>


            </aside>

        </div>

    </div>


    <?php endwhile; ?>

<?php else: ?>

    <!-- article -->
    <article>

        <h1><?php _e( 'Sorry, nothing to display.', 'webfactor' ); ?></h1>

    </article>
    <!-- /article -->

<?php endif; ?>



<?php get_footer(); ?>
