<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php $event_id = get_the_id(); ?>
		<?php $image = thumbnail_of_post_url($event_id,  'large');  ?>
		<?php $permalink = get_the_permalink(); ?>
		<?php $category =   get_the_terms($event_id, 'event_cat'); ?>
		<?php $date_repeater = get_field('date_repeater');  ?>
		<?php $mention = get_field('mention');  ?>

		<?php // $date = get_field('date');  
		?>
		<?php // $nice_date = nice_date( $date ); 
		?>
		<?php // $time = get_field('time'); 
		?>
		<?php $familyclass = (get_field('family')) ? 'family ' : ''; ?>

		<div class="single_event_container">
			<div class="<?php echo $familyclass; ?>single_event_inner">
				<div class="single_event_image_container">
					<a href="<?php echo $permalink; ?>" class="single_event_image" style="background-image:url(<?php echo $image; ?>);"></a>
				</div>
				<?php if ($category and sizeof($category) > 0) : ?><p class="category"><?php echo $category[0]->name; ?></p><?php endif; ?>
				<h4><a href="<?php echo $permalink; ?>"><?php the_title(); ?></a></h4>

				<?php if ($date_repeater) : ?> <p class="date"><?php echo nice_event_dates_from_repeater($date_repeater, false); ?></p><?php endif; ?>
			</div>
			<?php if ($mention) : ?>
				<span class="pill"><?php echo $mention; ?></span>
			<?php endif; ?>

		</div>


		<?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php 
		?>



		</article>
		<!-- /article -->

	<?php endwhile; ?>

<?php else : ?>

	<!-- article -->
	<article>
		<h2><?php _e('Sorry, nothing to display.', 'webfactor'); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>