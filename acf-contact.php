<?php
/**
 * ACF Homepage thumbs
 * @package knowsley_college
 */
?>

<div class="page-sections-container">

		<!-- Loop to display homepage thumbnail sections (ACF) -->

		<?php while ( have_posts() ) : the_post(); ?>

		<?php 

				// check for rows (parent repeater)
				if( have_rows('campus') ): ?>
		
					<?php 

					// loop through rows (parent repeater)
					while( have_rows('campus') ): the_row(); ?>
			
    <!-- Thumbnail page section-->
		<div class="contact-sections two-col">
		<div class="page-image">
			<img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>">
			<div class="heading">
					<h3><?php the_sub_field('title'); ?></h3>
				</div>
		</div>
			<div class="page-description">
				<p><i class="fa fa-phone"></i><a href="tel:<?php the_sub_field('telephone'); ?>"><?php the_sub_field('telephone'); ?></a></p>
				<p><i class="fa fa-envelope"></i></i><a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a></p>
				<p><i class="fa fa-map-marker"></i><a href="<?php the_sub_field('map_link'); ?>" target="_blank" title="Map of <?php the_sub_field('title'); ?>">View Map</a></p>
				<address>
					<?php the_sub_field('address'); ?>
				</address>

				<div class="opening-hours">
				
					<ul>
						<?php if( have_rows('opening_hours') ): ?>
						<?php while( have_rows('opening_hours') ): the_row(); ?>
						<li><?php the_sub_field('opening_hours_line'); ?></li>
						<?php endwhile; ?>
						<?php endif; ?>
					</ul>

				</div>

		</div>


		<div class="more-campus">
			<a href="<?php the_sub_field('campus_link'); ?>" title="<?php the_sub_field('title'); ?>">
					<p>Campus details <i class="fa fa-arrow-circle-o-right"></i></p>
			</a>
		</div>
	</div><!-- End of Thumbnail page section-->

	<?php endwhile; ?>

	<?php endif; ?>

	<?php endwhile; ?>


	</div>
