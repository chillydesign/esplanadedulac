<?php /* Template Name: Saison Template */ get_header(); ?>


<?php if (have_posts()): while (have_posts()) : the_post(); ?>


<?php

$search = (isset($_GET['search'])) ? $_GET['search'] : false;
$category = (isset($_GET['categorie'])) ? $_GET['categorie'] : false;
$for_families = (isset($_GET['for_families'])) ? $_GET['for_families'] : false;


$events_args = array(  // used for partials/front events all
    'post_type' => 'event',
    'posts_per_page' =>  -1,
    'meta_key' => 'date',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'meta_query' => array(
        'relation' => 'AND',
        array( //    ONLY SHOW EVENTS THAT ARENT RESIDENCE
            'key' => 'residence',
            'value' => 0,
            'compare' => '=',
            'type' => 'numeric'
        )
    )
);

if ($search && $search != '') {
    $events_args['s'] = $search;
}

if ($category && $category != '') {
    $events_args['tax_query'] = array(
		array(
			'taxonomy' => 'event_cat',
			'field'    => 'slug',
			'terms'    => $category
		)
	);
}

if ($for_families && $for_families != '') {
     array_push(
         $events_args['meta_query'],
        array(
            'key' => 'family',
            'value' => 1,
            'compare' => '=',
            'type' => 'numeric'
        )
    );
}

 ?>

<?php //get_template_part('partials/page', 'header'); ?>
<header class="event_header">

    <div class="carousel">
        <?php $top_slider = get_field('top_slider'); ?>
        <?php if($top_slider): ?>
            <?php foreach( $top_slider as $image ): ?>
                <div style="background-image:url(<?php echo $image['sizes']['large']; ?>); background-size:cover; background-repeat:no-repeat; height:500px; width:100%;" class="image"></div>
            <?php endforeach; ?>
        <?php else: ?>
            <div style="background-image:url(<?php echo $image; ?>); background-size:cover; background-repeat:no-repeat; height:500px; width:100%;" class="image"></div>
        <?php endif; ?>
    </div>
    <div class="container">
        <div class="event_header_text">
            <h1> 
              <?php if(isset($_GET['for_families']) AND $_GET['for_families']==1){echo 'À voir en famille';}
              elseif($_GET['categorie']=='theatre'){echo 'Théâtre'; }
              elseif($_GET['categorie']=='danse'){echo 'Danse'; }
              elseif($_GET['categorie']=='musique'){echo 'Musique'; }
              elseif($_GET['categorie']=='cirque'){echo 'Cirque'; }
              elseif($_GET['categorie']=='magie'){echo 'Magie'; }
              elseif($_GET['categorie']=='jeune-public'){echo 'Jeune Public'; }
              else{ the_title(); }?>
              <?php //the_title(); ?>
            </h1>
            <h5><?php echo get_field('subtitle'); ?></h5>
        </div>
    </div>
    <div class="event_header_text_bg"></div>


</header>


<?php //get_template_part('partials/events', 'filters'); ?>
<?php get_template_part('partials/front', 'events-all'); ?>




<?php endwhile; ?>

<?php else: ?>

    <!-- article -->
    <article class="container">

        <h2><?php _e( 'Sorry, nothing to display.', 'webfactor' ); ?></h2>

    </article>
    <!-- /article -->

<?php endif; ?>






<?php get_footer(); ?>
