<?php $titre =  get_sub_field('titre'); ?>
<?php $partenaires =  get_sub_field('partenaires'); ?>


<?php if($titre) : ?>
    <h2 class="partenaires_h2"><?php echo  $titre; ?></h2>
<?php endif; ?>
<ul class="partenaires">
	<?php  foreach ($partenaires as $partenaire) : ?>
	<li  class="gallery_partenaires">

		 <a class=""  target ="_blank" href="<?php echo  esc_url($partenaire['url']); ?>">
            <img src="<?php echo $partenaire['logo']['url']; ?>" alt ="<?php echo $partenaire['nom']; ?>">
         </a>
	</li>
    <li  class="gallery_partenaires">

		 <a class=""  target ="_blank" href="<?php echo  esc_url($partenaire['url']); ?>">
            <img src="<?php echo $partenaire['logo']['url']; ?>" alt ="<?php echo $partenaire['nom']; ?>">
         </a>
	</li>
    <li  class="gallery_partenaires">

		 <a class=""  target ="_blank" href="<?php echo  esc_url($partenaire['url']); ?>">
            <img src="<?php echo $partenaire['logo']['url']; ?>" alt ="<?php echo $partenaire['nom']; ?>">
         </a>
	</li>
    <li  class="gallery_partenaires">

		 <a class=""  target ="_blank" href="<?php echo  esc_url($partenaire['url']); ?>">
            <img src="<?php echo $partenaire['logo']['url']; ?>" alt ="<?php echo $partenaire['nom']; ?>">
         </a>
	</li>
	<?php endforeach; ?>
</ul>
