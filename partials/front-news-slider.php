
<section id="news_slider">
    <div class="container">
        <div class="carousel">
        <?php $latest_news = new WP_Query(array('post_type' => 'post',   'posts_per_page' =>  3 ));  ?>
        <?php  if ($latest_news->have_posts() ) :  while($latest_news->have_posts()) : $latest_news->the_post();  ?>
            <?php $permalink = get_the_permalink(); ?>
            <div class="single_news_container">
            <div class="single_news_container_inner">
                <div class="news_image"></div>
                <div class="news_text">
                    <p class="category">ACTUALITéS L’Esplanade DU LAC</p>
                    <h3><a href="<?php echo $permalink; ?>"><?php the_title(); ?></a></h3>
                    <p class="date"><?php the_time('F j, Y'); ?></p>
                    <p><?php the_excerpt(); ?></p>
                </div>
            </div>
            </div>

        <?php endwhile;endif;  ?>
        <?php wp_reset_query(); ?>
    </div>
    </div>
</section>
