<section id="news_slider">
  <h3 class="news_title">Actualités</h3>
  <div class="container">
    <div class="carousel">
      <?php $latest_news = new WP_Query(array('post_type' => 'post',   'posts_per_page' =>  3));  ?>
      <?php if ($latest_news->have_posts()) :  while ($latest_news->have_posts()) : $latest_news->the_post();  ?>
          <?php $permalink = get_the_permalink(); ?>
          <?php $post_id = get_the_id(); ?>
          <?php $image = thumbnail_of_post_url($post_id,  'large');  ?>
          <div class="single_news_container">
            <div class="single_news_container_inner">
              <?php if (get_field('video')) : ?>
                <div class="news_image"><?php the_field('video'); ?></div>
              <?php else : ?>
                <a href="<?php echo $permalink; ?>">
                  <div class="news_image" style="background-image:url(<?php echo $image; ?>);"></div>
                </a>
              <?php endif; ?>
              <div class="news_text">

                <h3><a href="<?php echo $permalink; ?>"><?php the_title(); ?></a></h3>
                <!-- <p class="date"><?php the_time('F j, Y'); ?></p> -->
                <p><?php the_excerpt(); ?></p>
              </div>
            </div>
          </div>

      <?php endwhile;
      endif;  ?>
      <?php wp_reset_query(); ?>
    </div>
  </div>
</section>