<?php
/**
* The template for displaying all single posts.
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

<div class="full-width-container single-news-page">

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

	<aside>

		<h2>Latest news</h2>



		<?php
			// Query for displaying the latest news
			$the_query = new WP_Query( array( 'category_name' => 'news' , 'showposts' => '3' ,'offset' => 1));
		?>

		<?php
						// The Loop
					while ( $the_query->have_posts() ) :
							$the_query->the_post();
			?>

			<div class="latest-news-snippet-container">
			<div class="latest-news-snippet-image">		
			<a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			</div>
			<div class="latest-news-snippet-title"><h3><?php the_title(); ?></h3>
				<p><?php the_date(); ?></p></div>
			</div>
	

		<?php
			endwhile;
			// Restore original Query & Post Data
			wp_reset_query();
			wp_reset_postdata();
			?>
			
		</ul>

	</aside>
		


	</div>


</div>



</main><!-- #main -->
<?php get_footer(); ?>