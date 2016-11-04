<?php
/**
* Template Name: Apprenticeship Vacancies
* Content Page
*
* @package knowsley_college
*/
get_header(); ?>

<!-- Scroll to top 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'scroll' );?>
	
</header>

<!-- Breadcrumbs
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'breadcrumbs' );?>


<!-- Main content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<main id="main" class="site-main" role="main">


<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="full-width-container secondary-page">

	<div class="fixed-container">

<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<!-- Start of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'content', 'featured-banner-has-parent' );?>

<aside>
<!-- Secondary Navigation
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'apprenticeships' );?>
</aside>

<section>

<?php the_content();?>

<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>

<?php if( get_field('tagline') ): ?>

<!-- Homepage tagline and intro paragraph
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'acf', 'homepage-tagline' );?>

<?php endif; ?>

<!-- Vacancies
–––––––––––––––––––––––––––––––––––––––––––––––––– -->



	<div class="vacancies-container">

		<!-- Loop to display homepage thumbnail sections (ACF) -->

		<?php while ( have_posts() ) : the_post(); ?>

		<?php 

				// check for rows (parent repeater)
				if( have_rows('apprenticeship_vacancy') ): ?>
		
					<?php 

					// loop through rows (parent repeater)
					while( have_rows('apprenticeship_vacancy') ): the_row(); ?>

		<article class="vacancy-detail the-content">
			<div class="title">
				<h1><?php the_sub_field('title'); ?></h1>
				<p>Level: <?php the_sub_field('level'); ?></p>
				<p><i class="fa fa-map-marker"></i> Location: <?php the_sub_field('location'); ?></p>
			</div>
			<div class="detail">
				<p>Number of vacancies: <?php the_sub_field('vacancies'); ?></p>
				<p>Reference: <?php the_sub_field('reference'); ?></p>
				<p><?php the_sub_field('hours'); ?> hours per week</p>
			</div>
		</article>


		<?php endwhile; ?>

	<?php endif; ?>

	<?php endwhile; ?>

	</section>



		


	</div>

</div>



</main><!-- #main -->
<?php get_footer(); ?>