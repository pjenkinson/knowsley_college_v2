<?php
/**
 * ACF Services Archive
 * @package knowsley_college
 */
?>

<?php while ( have_posts() ) : the_post(); ?>

<?php 

	// check for rows (parent repeater)
	if( have_rows('services_archive') ): ?>
		
	<?php 

	// loop through rows (parent repeater)
	while( have_rows('services_archive') ): the_row(); ?>


<!-- Service -->
<div class="fixed-container service-section mojo-section">
<div class="two-col-section-main">
<h2 class="section-heading"><?php the_sub_field('title'); ?></h2>
<p><?php the_sub_field('description'); ?></p>
<div class="button-default section-margin-top">
<a href="<?php the_sub_field('page_link'); ?><?php the_sub_field('custom_link'); ?>" title="<?php the_sub_field('title'); ?>">
Find out more
</a>
</div>
</div>
<div class="two-col-section-side">
<a href="<?php the_sub_field('page_link'); ?><?php the_sub_field('custom_link'); ?>" title="<?php the_sub_field('title'); ?>">
<img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>">
</a>
</div>
</div>

	<?php endwhile; ?>

	<?php endif; ?>

	<?php endwhile; ?>

</div>
