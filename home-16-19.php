<?php
/**
* Template Name: 16-19 Homepage
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

<div class="full-width-container secondary-page secondary-home-page">

	<div class="fixed-container">

<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<!-- Start of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'content', 'featured-banner' );?>

<aside>
<!-- Secondary Navigation
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', '16-19' );?>
</aside>


<section>

	<!-- Content page heading
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php
// Must be inside a loop. Displays title of page if a featured image has not been selected.

	if ( has_post_thumbnail() ) {
	 // Do nothing
	}
	else {
		echo '<h1>';
	 the_title();
	 echo '</h1>';
	}
?>

<?php the_content();?>

<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>
knowsley.localhost

<?php endif; ?>

<!-- Secondary homepage tagline and intro
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'acf', 'homepage-tagline' );?>


<!-- Homepage thumbnails
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'acf', 'homepage-thumbs' );?>
	
	</section>
		


	</div>

</div>



</main><!-- #main -->
<?php get_footer(); ?>