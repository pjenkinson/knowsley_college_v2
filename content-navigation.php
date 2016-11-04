<?php
/**
*Template Name: Content Navigation
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages
* and that other 'pages' on your WordPress site will use a
* different template.
*
* @package knowsley_college
*/
get_header(); ?>
	
</header>

<!-- Breadcrumbs
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div class="full-width-container primary-breadcrumbs">
	<div class="fixed-container">
		<div id="breadcrumbs">
			<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
				<?php if(function_exists('bcn_display'))
				{
				bcn_display();
				}?>
			</div>
		</div>
	</div>
</div>


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

	<!-- Nav
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<nav class="nav-secondary">
	<?php wp_nav_menu( array( 'theme_location' => 'secondary-menu' ) ); ?>
</nav>

	<section>

	<!-- Content page heading
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php
// Must be inside a loop.

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
		


	</div>


</div>



</main><!-- #main -->
<?php get_footer(); ?>