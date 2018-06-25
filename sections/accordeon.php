
<?php // $slug = sanitize_title( wp_generate_password(8, false) ); ?>

<div class="accordion_container">

    <?php while ( have_rows('accordeon') ) : the_row(); ?>

        <?php $title =  get_sub_field('title'); ?>
        <?php $content =  get_sub_field('content'); ?>
        <?php // $row_index =  get_row_index(); ?>
        <?php // $row_id = 'accordion_' . $slug  . '_' . $row_index; ?>


        <div class="single_accordion" >
            <h3 class="accordion_title"><?php echo $title; ?></h3>
            <div class="accordion_content">
                <?php echo $content; ?>
            </div>
        </div>

    <?php endwhile; ?>

</div><!--  END OF CONTAINER -->
