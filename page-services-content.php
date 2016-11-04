<?php
/**
* Template Name: Services Content
* Services Content Page
*
* @package knowsley_college
*/
get_header(); ?>

<!-- Quick links navigation trigger -->

<?php get_template_part( 'navigation', 'quicklinks' );?>

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

<div class="full-width-container single-news-page services-content-page">

	<div class="fixed-container">

<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<!-- Start of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

<?php
// Must be inside a loop.

if ( has_post_thumbnail() ) {

	echo '<div class="featured-banner">' . '<div class="banner-heading">' ;
	echo '<h1>';
	 the_title();
	echo '</h1>';
	echo '</div>';
		the_post_thumbnail();
	echo '</div>';
	}
else {
	// Displays page without featured image
}
?>


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


<?php endif; ?>
	
	</section>

	<aside>

		<h2>Contact</h2>

		<ul class="services-contact">
			<li>Contact number</li>
			<li>Contact email:</li>
		</ul>

		<h2>Price List</h2>

		<ul class="services-price-list">
			<li>item</li>
			<li>item</li>
			<li>item</li>
			<li>item</li>
			<li>item</li>
		</ul>

		

	</aside>
		


	</div>

</div>



</main><!-- #main -->
<?php get_footer(); ?>