<?php $images =  get_sub_field('images'); ?>
<?php $tdu = get_template_directory_uri(); ?>
<?php $image_array = []; ?>
<?php
foreach( $images as $image ):
    $str = '<li  class="grid_item">';
    $str .= '<a data-featherlight="image"  class="gallery"  href="'. $image['sizes']['large'] . '">';
    $str .= '<img width="' . $image['sizes']['medium-width'] . '" height="' . $image['sizes']['medium-height'] . '" src="' . $image['sizes']['medium'] . '"  alt="" />';
    $str .= '</a>';
    $str .= '</li>';
    array_push($image_array, $str);
endforeach;


shuffle($image_array);

?>



<div class="container">

    <ul class="masonry_gallery ">
        <?php echo implode($image_array, " "); ?>
    </ul>

</div>
