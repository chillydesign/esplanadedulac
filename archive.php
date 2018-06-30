<?php get_header(); ?>

<header class="event_header">

    <div class="carousel">
                <div style="background-image:url('<?php echo get_site_url(); ?>/wp-content/uploads/2018/06/Esplanade-fauteuil-1-1600x1131.jpg'); background-size:cover; background-repeat:no-repeat; height:500px; width:100%;" class="image"></div>
    </div>
    <div class="container">
        <div class="event_header_text">
            <h1><?php echo single_term_title(); ?></h1>
            <h5></h5>
        </div>
    </div>
    <div class="event_header_text_bg"></div>


</header>

		<!-- section -->
		<section>

			<section id="all_events">
			    <!-- <h2 id="all_events_title">Saison 2017 - 2018</h2> -->

			    <div class="container">
			        <div id="events_and_programme">

			            <div class="events_container">

			<?php get_template_part('loop'); ?>
		</div>
			<!-- <div class="programme_container">
					<div class="programme_inner">
									<h4>L’AGENDA</h4>
									<a href="#">
											<img src="<?php echo $tdu;?>/img/esplanade.jpg"  alt="programme image" />
									</a>
									<p><a href="#" class="button">Télécharger le programme</a></p>

					</div>

			</div> -->
</div>
</div>


			<?php //get_template_part('pagination'); ?>

		</section>
		<!-- /section -->


<?php //get_sidebar(); ?>

<?php get_footer(); ?>
