<?php get_header(); ?>




<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php $post_id = get_the_id(); ?>
        <?php $image = thumbnail_of_post_url($post_id,  'large');  ?>
        <header class="event_header " style="background-image:url(<?php echo $image; ?>);">


            <div class="container">
                <div style="height:500px"></div>

                <div class="event_header_text">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
            <div class="event_header_text_bg"></div>


        </header>






        <!-- article -->
        <article class="container">
            <div id="event_details">
                <section class="event_details_section">
                    <p><span class="author"><?php _e('Published by', 'webfactor'); ?> <?php the_author_posts_link(); ?></span> on <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span></p>

                    <?php the_content(); // Dynamic Content 
                    ?>

                    <p><?php edit_post_link(); // Always handy to have Edit Post Links available 
                        ?></p>

                    <?php // comments_template(); 
                    ?>
                </section>
            </div>
        </article>
        <!-- /article -->

    <?php endwhile; ?>

<?php else : ?>

    <!-- article -->
    <article>

        <h1><?php _e('Sorry, nothing to display.', 'webfactor'); ?></h1>

    </article>
    <!-- /article -->

<?php endif; ?>



<?php get_footer(); ?>