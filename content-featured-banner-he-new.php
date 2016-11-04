<?php 
if ( has_post_thumbnail() ) {?>

<div class="featured-banner"> 
<div class="banner-heading">
<div class="featured-banner-bg fixed-container">
<div class="sub-brand-logo">
	<img class="sub-brand-logo-img" src="<?php echo get_bloginfo('template_directory');?>/images/kuc.svg" alt="Knowsley Community College">
</div>
<div class="sub-brand-headline">
<h1>
<?php the_title();?>
</h1>
<p class="featured-banner-strapline">
<?php the_field('tagline');?>
</p>
</div>
</div>
</div>
	<?php the_post_thumbnail();?>
</div>


<?php } else {?>

	<div class="featured-banner">
	<div class="banner-heading">
	<div class="featured-banner-bg fixed-container">
	<div class="sub-brand-logo-he">
	</div>
	<div class="sub-brand-headline">
	<h1>
	 <?php the_title();?>
	</h1>
  </div>
	<p class="featured-banner-strapline">
	 <?php the_field('tagline');?>
	</p>
 </div>
</div>
<?php  get_the_post_thumbnail($post->post_parent, 'full');?>
</div>


<?php } ?>
