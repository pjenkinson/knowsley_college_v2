<?php
// Must be inside a loop.

// Displays featured image with page title

if ( has_post_thumbnail() ) {?>

	<div class="featured-banner featured-banner-child"> <div class="banner-heading">
		<div class="fixed-container">
	<h1 class="has-parent">
	 <?php the_title();?>
	</h1>
	<p>
	/
	<?php echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent );?>
	</p>
   </div>
	</div>
		<?php the_post_thumbnail();?>
	</div>
	
<?php } // Displays parent featured image with page title
else {?>
<div class="featured-banner featured-banner-child"> <div class="banner-heading">

	<div class="fixed-container">
	<h1 class="has-parent">
	 <?php the_title();?>
	</h1>
	<p>
	/ 
	<?php echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent );?>
	</p>
  </div>
 </div>
		<?php echo get_the_post_thumbnail($post->post_parent, 'full');?>
	</div>
	
<?php }?>
