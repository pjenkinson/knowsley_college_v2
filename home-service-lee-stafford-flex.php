<?php
/**
* Template Name: Lee Stafford Education 
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
<main id="main" class="site-main lee-stafford" role="main">

<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="full-width-container secondary-home-page">

<div class="full-width-container body-background">
	<div class="fixed-container">

<!-- Secondary Nav
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
  </div>
</div>

<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'content', 'featured-banner-lee-staff' );?>

<!-- Service Number
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="fixed-container relative-container">
	<div class="service-number">
		<i class="fa fa-phone" aria-hidden="true"></i> 0151 477 5850
	</div>

</div>

<!-- Breadcrumbs
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'breadcrumbs' );?>



<div class="fixed-container">

<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<!-- Start of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

<section class="full-width-container white-background">

<!-- Content Snippet Sections -->

<?php get_template_part( 'custom-fields/acf', 'homepage-content-flex' );?>

<!-- END Snippet Sections -->

<!-- WP Content -->

<?php the_content();?>

<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>

<!-- END WP Content -->

</section>


	</div> <!-- End of fixed container -->

</div> <!-- End of full width container -->



</main><!-- #main -->
<?php get_footer(); ?>