<?php
/**
* Single Vacancy Post 
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

<div class="full-width-container single-vacancy-page wp-page">

	<div class="fixed-container">

<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<!-- Start of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>


<aside>

</aside>

<section style="margin-top: 2em;">
<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>

<div class="the-content">

<!-- Vacancies
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

	<article class="vacancy">

		<h1><?php the_title(); ?></h1>
		
		<div class="vacancy-summary">

		<p><i class="fa fa-clock-o"></i> Vacancy posted on: <?php the_date() ?></p>
		<?php
		if( get_field('closing_date') )

		{ ?>
		<p><i class="fa fa-calendar"></i> Closing date: <?php the_field('closing_date'); ?></p>

		<?php } else {

		// Do nothing

	 } ?>
	 <span class='st_sharethis_large_right' displayText='ShareThis'></span>

	 <div class="vacancy-details">
			<ul class="vacancy-details-list">
			<li><strong>Contract Type:</strong> <?php the_field('type'); ?></li>
			<?php
		if( get_field('salary') )

		{ ?>
			<li><strong>Salary:</strong> <?php the_field('salary'); ?></li>
			<?php } else {

		// Do nothing

	 } ?>
			<?php
		if( get_field('interview_date') )

		{ ?>
			<li>Interview scheduled for: <?php the_field('interview_date'); ?></li>
			<?php } else {

		// Do nothing

	 } ?>
		 </ul>
		</div>

	 </div>

		<p><?php the_content(); ?></p>

		<div class="info-section">
			<h2>How to apply</h2>

			<div class="info-section-content">
			<p><?php the_field('how_to_apply'); ?></p>

				<!-- Get vacancy documents -->

		<?php while ( have_posts() ) : the_post(); ?>

		<?php 

		// check for rows (parent repeater)
		if( have_rows('documents') ): ?>

		<?php 

		// loop through rows (parent repeater)
		while( have_rows('documents') ): the_row(); ?>


			<div class="pdf-document">
				<a href="<?php the_sub_field('document'); ?>" title="<?php the_sub_field('document_title'); ?>"><?php the_sub_field('document_title'); ?> <i class="fa fa-file-pdf-o"></i></a>
			</div>
		</div>

		<?php endwhile; ?>

		<?php endif; ?>

		<?php endwhile; ?>

		</div>

		<?php
		if( get_field('benefits') )

		{ ?>

    <div class="info-section">
	    <h2>Benefits of working for KCC</h2>
	    <div class="info-section-content">
				<?php the_field('benefits_content') ?>
			</div>
		</div>
		<?php }

		else
		{
		    echo "";
		}
		?>

	</article>

</div>


	</section>



		


	</div>

</div>



</main><!-- #main -->
<?php get_footer(); ?>