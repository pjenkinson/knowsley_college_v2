<?php 
if ( has_post_thumbnail() ) {?>

<div class="featured-banner"> 
	<div class="banner-heading">
		<div class="featured-banner-bg fixed-container">
				<div class="sub-brand-logo">
					<img alt="<?php the_title();?>" src="<?php the_field('tagline_banner_image');?>">
				</div>
				<div class="sub-brand-headline">
				<h1>
				<?php the_title();?>
				</h1>
				<p class="featured-banner-strapline">
				<?php the_field('tagline');?>
				</p>
				</div>

				<div class="fixed-container relative-container">

			<?php if( get_field('toggle_service_info') )
			{?>
			    <!-- Service Number
			–––––––––––––––––––––––––––––––––––––––––––––––––– -->

				<div class="service-number">
					<a href="tel:<?php the_field('tel'); ?>"><i class="fa fa-phone" aria-hidden="true"></i><?php the_field('telephone'); ?></a>
				</div>


			<?php }?>

			<?php if( get_field('toggle_service_website') )
			{?>

			    <!-- Service Website
			–––––––––––––––––––––––––––––––––––––––––––––––––– -->

				<div class="service-number">
					<a href="<?php the_field('website_link'); ?>" target="_blank"><i class="fa fa-external-link-square" aria-hidden="true"></i><?php the_field('website_title'); ?></a>
				</div>


			<?php }?>

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
