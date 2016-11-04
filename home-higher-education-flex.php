<?php
/**
* Template Name: Homepage Higher Education Flex (Backup)
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

<div class="full-width-container body-background">
	<div class="fixed-container">

<!-- Flexible Navigation
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'navigation', 'flex' );?>
  </div>
</div>

<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'content', 'featured-banner-he-new' );?>

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

	<!-- End of full width container -->

	<section class="full-width-container section-panels-bg">
		<section class="fixed-container">
		<?php get_template_part( 'custom-fields/acf', 'homepage-page-grid' );?>
		</section>
	</section>

</div> <!-- End of full width container -->



</main><!-- #main -->
<?php get_footer(); ?>