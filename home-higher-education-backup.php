<?php
/**
* Template Name: Higher Education Homepage
* Content Page
*
* @package knowsley_college
*/
get_header(); ?>

<!-- Scroll to top 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'scroll' );?>

	
</header>




<!-- Main content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<main id="main" class="site-main higher-education" role="main">


<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="full-width-container secondary-home-page">

<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'content', 'featured-banner-he' );?>

<!-- Breadcrumbs
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'breadcrumbs' );?>

<div class="full-width-container body-background">
	<div class="fixed-container">

<!-- Secondary Nav
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'navigation', 'higher-education' );?>
  </div>
</div>

<div class="fixed-container">

<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<!-- Start of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

<section class="full-width-container white-background">
	<!-- Section intros -->


<!-- Section -->

<!-- Why Study at KCC -->


<section class="full-width-container students-section white-background">
<div class="fixed-container">
<div class="two-col-section-main">
<h2 class="section-heading">Why Study Higher Education at Knowlsey University Centre</h2>
<p>Keep costs down by staying local with a great higher education experience that’s right on your doorstep.</p>
<div class="button-default section-margin-top button-he">
<a href="<?php the_field('student_support_page_link', 'option'); ?>" title="<?php the_field('student_support_title', 'option'); ?>">
Find out more
</a>
</div>
</div>
<div class="two-col-section-side two-col-section-image">
	<div class="section-image-container">
		<a title="Student Support" href="<?php the_field('student_support_page_link', 'option'); ?>" title="<?php the_field('student_support_title', 'option'); ?>">
		<img src="<?php the_field('student_support_thumbnail', 'option'); ?>" alt="<?php the_field('student_support_title', 'option'); ?>">
		</a>
	</div>
</div>
</div>
</section>

<hr class="dotted"></hr>

	<div class="fixed-container">
		<!-- Section -->
		<div class="two-col-section-main two-col-section-image">
			<div class="section-image-container">
				<a href="<?php the_field('career_coach_page_link', 'option'); ?>" title="<?php the_field('career_coach_title', 'option'); ?>">
				<img src="<?php the_field('career_coach_thumbnail', 'option'); ?>" alt="<?php the_field('career_coach_title', 'option'); ?>">
				</a>
			</div>
		</div>
			<div class="two-col-section-side right-float">
			<h2 class="section-heading"><?php the_field('career_coach_title', 'option'); ?></h2>
			<p><?php the_field('career_coach_description', 'option'); ?></p>

			<div class="button-default section-margin-top button-he">
			<a title="Careers Coach Knowsley Community College" href="<?php the_field('career_coach_page_link', 'option'); ?>" title="Find out more">
			Find out more
			</a>
			</div>
		</div>
	</div>

	



<!-- WP Content -->

<?php the_content();?>

<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>

</section>


	</div> <!-- End of fixed container -->

	<section class="full-width-container section-panels-bg">
		<section class="fixed-container">


		<!-- Homepage thumbnails
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'acf', 'homepage-thumbs' );?>
		</section>
	</section>

</div> <!-- End of full width container -->



</main><!-- #main -->
<?php get_footer(); ?>