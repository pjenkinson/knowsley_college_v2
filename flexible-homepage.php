<?php
/**
* Template Name: Flexible Homepage
*/
get_header(); ?>

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


</div>

<!-- Breadcrumbs
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'breadcrumbs' );?>

<div class="full-width-container body-background secondary-nav">
	<div class="fixed-container">

<!-- Flexible Navigation
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'navigation', 'flex' );?>
  </div>
</div>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

<section class="full-width-container white-background">

<div class="fixed-container">
<!-- WP Content -->

<?php the_content();?>
</div>

<div class="fixed-container">
<?php get_template_part( 'custom-fields/acf', 'homepage-content-flex' );?>
</div>


<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>

<!-- END WP Content -->

</section>


</div>



</main><!-- #main -->
<?php get_footer(); ?>