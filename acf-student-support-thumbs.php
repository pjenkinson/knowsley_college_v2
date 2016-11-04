<?php
/**
 * ACF Student Support thumbs
 * @package knowsley_college
 */
?>

<div class="page-sections-container">

		<!-- Loop to display homepage thumbnail sections (ACF) -->

		<?php while ( have_posts() ) : the_post(); ?>

		<?php 

				// check for rows (parent repeater)
				if( have_rows('subject_links') ): ?>
		
					<?php 

					// loop through rows (parent repeater)
					while( have_rows('subject_links') ): the_row(); ?>
			
    <!-- Thumbnail page section-->
		<div class="page-sections page-sections-3col">
			<a href="<?php the_sub_field('page_link'); ?>" title="<?php the_sub_field('title'); ?>">
			<div class="page-image">
				<img src="<?php the_sub_field('thumbnail'); ?>" alt="<?php the_sub_field('title'); ?>">
			</div>
				<div class="page-description">
					<div class="heading">
						<h3><?php the_sub_field('title'); ?><i class="fa fa-arrow-circle-o-right link-arrow"></i></h3>
					</div>

			</div>
			</a>
		</div><!-- End of Thumbnail page section-->

	<?php endwhile; ?>

	<?php endif; ?>

	<?php endwhile; ?>


	</div>
