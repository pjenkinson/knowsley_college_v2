<?php
/**
* Template Name: Flexible Homepage
* @package knowsley_college
*/
get_header(); ?>

<script>
  jQuery( function() {
    jQuery( "#accordion" ).accordion();
  } );
  </script>

<!-- Scroll to top 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'scroll' );?>
</header>

<!-- Main content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'branding-flex' );?>


<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="full-width-container secondary-home-page">



<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'flexible-homepage-banner' );?>



<?php if( get_field('toggle_service_info') )
{?>
    <!-- Service Number
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="fixed-container relative-container">
	<div class="service-number">
		<a href="tel:<?php the_field('tel'); ?>"><i class="fa fa-phone" aria-hidden="true"></i><?php the_field('telephone'); ?></a>
	</div>

</div>
<?php }?>


<!-- Breadcrumbs
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'breadcrumbs' );?>

<div class="full-width-container body-background">
	<div class="fixed-container">

<!-- Flexible Navigation
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'navigation', 'flex' );?>
  </div>
</div>


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

</div> <!-- End of full width container -->



</main><!-- #main -->
<?php get_footer(); ?>