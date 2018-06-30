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
            <h1><?php the_title(); ?></h1>
            <h5><?php echo get_field('subtitle'); ?></h5>
        </div>
    </div>
    <div class="event_header_text_bg"></div>


</header>
