<?php get_header(); ?>




    <section>
        <h1><?php echo sprintf( __( '%s Search Results for ', 'webfactor' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>
    </section>


    <!-- section -->
    <section class="container">

    <?php get_template_part('loop'); ?>

    <?php get_template_part('pagination'); ?>

</section>
<!-- /section -->



<?php get_footer(); ?>
