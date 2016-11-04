<?php
/**
* Template Name: How to find us
*
* @package knowsley_college
*/
get_header(); ?>

<!-- Scroll to top 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'scroll' );?>
<?php get_template_part( 'script', 'courseurl' );?>
	
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
<?php get_template_part( 'navigation', 'contact' );?>
</aside>


<section>

	<!-- Content page heading
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php the_content();?>

<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>
knowsley.localhost

<?php endif; ?>

<h2>Campus Map</h2>

<div class="google-map">
	<iframe src="https://www.google.com/maps/d/embed?mid=zGqhfI-IFd1c.kRfUJDua6ldQ" width="100%" height="480"></iframe>
</div>
	
	</section>
		


	</div>

</div>



</main><!-- #main -->
<?php get_footer(); ?>