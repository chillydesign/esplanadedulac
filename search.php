<?php get_header(); ?>




    <section class="section_welcome_paragraph"  <?php echo $background_image; ?>   >
        <h1><?php echo sprintf( __( '%s Search Results for ', 'webfactor' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>
        <div class="sheep"></div>
    </section>


    <!-- section -->
    <section class="container">

    <?php get_template_part('loop'); ?>

    <?php get_template_part('pagination'); ?>

</section>
<!-- /section -->



<?php get_footer(); ?>
