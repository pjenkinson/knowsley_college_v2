<?php
/**
* Template Name: Adults Subject Page
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

<div class="full-width-container secondary-page overview-tiles">

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
<?php get_template_part( 'navigation', 'adults-subject' );?>
</aside>

<section>

<?php if( get_field('tagline') ): ?>

<!-- Homepage tagline and intro paragraph
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'acf', 'homepage-tagline' );?>

<?php endif; ?>





<?php the_content();?>

<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>

<!-- End of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<!-- Subject thumbnails
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'acf', 'subject-thumbs-3col' );?>
	
	</section>

		


	</div>

</div>





</main><!-- #main -->
<?php get_footer(); ?>