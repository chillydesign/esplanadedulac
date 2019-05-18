<?php get_header(); ?>




<?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <?php $post_id = get_the_id(); ?>
    <?php $image = thumbnail_of_post_url( $post_id,  'large');  ?>
    <hr style="border-top:5px solid #0e8294;margin-top:-6px;"/>

    <!-- <header class="event_header small_event_header" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/visuel_esplanade_rectangle.jpg');">



        <div class="container">
            <div class="event_header_text">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
        <div class="event_header_text_bg"></div>


    </header> -->


<!-- REMOVE THIS IF YOU PUT HEADER BACK -->
    <div class="container">
        <div class="event_header_text"><br><br><br>
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
    <!-- REMOVE THIS IF YOU PUT HEADER BACK -->






    <!-- article -->
    <article  class="container" >
        <div id="event_details">
            <section class="event_details_section">

                <?php the_content(); // Dynamic Content ?>

                <p><?php edit_post_link(); // Always handy to have Edit Post Links available ?></p>

                <?php // comments_template(); ?>
            </section>
            <aside>
              <img src="<?php echo $image; ?>" alt="">
            </aside>
        </div>
    </article>
    <!-- /article -->

<?php endwhile; ?>

<?php else: ?>

    <!-- article -->
    <article>

        <h1><?php _e( 'Sorry, nothing to display.', 'webfactor' ); ?></h1>

    </article>
    <!-- /article -->

<?php endif; ?>



<?php get_footer(); ?>
