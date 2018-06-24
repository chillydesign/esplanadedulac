<?php get_header(); ?>

<header class="event_header">

      <div class="carousel">
          <?php $top_slider = get_field('top_slider'); ?>
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
            <h5><?php echo get_field('subtitle'); ?></h5>
        </div>
        <div class="event_header_text_bg"></div>
    </div>

</header>



<?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <!-- article -->
    <article id="post-<?php the_ID(); ?>" class="container">

        <?php include('section-loop.php'); ?>


        <div class="container">
            <?php the_content(); ?>
        </div>



    </article>
    <!-- /article -->

<?php endwhile; ?>

<?php else: ?>

    <!-- article -->
    <article class="container">

        <h2><?php _e( 'Sorry, nothing to display.', 'webfactor' ); ?></h2>

    </article>
    <!-- /article -->

<?php endif; ?>






<?php get_footer(); ?>
