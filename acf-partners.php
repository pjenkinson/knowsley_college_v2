<?php
/**
* ACF Partners
* @package knowsley_college
*/
?>

<?php while ( have_posts() ) : the_post(); ?>

<?php 

// check for rows (parent repeater)
if( have_rows('partner') ): ?>

<?php 

// loop through rows (parent repeater)
while( have_rows('partner') ): the_row(); ?>


<!-- Partner section -->
<div class="partner-section">

	<div class="partner-info">
		<h2 class="section-heading"><?php the_sub_field('title'); ?></h2>
			<div class="partners-image">
			<a href="<?php the_sub_field('link'); ?>" title="<?php the_sub_field('title'); ?>">
			<img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>">
			</a>
		</div>
	</div>

	<div class="partner-info">
		<p><?php the_sub_field('description'); ?></p>
		<p>Website: <a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('website'); ?></a></p>
	</div>


</div> <!-- End of Partner Section -->

<?php endwhile; ?>

<?php endif; ?>

<?php endwhile; ?>

</section>


