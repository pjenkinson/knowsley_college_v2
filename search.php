<?php get_header(); ?>

<!-- Scroll to top 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'scroll' );?>
	
</header>

<!-- Breadcrumbs
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'breadcrumbs' );?>


<!-- Main content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<main id="main" class="site-main kcc-primary" role="main">


<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="full-width-container one-col-page content-page">


<div class="fixed-container">


<section class="search-page full-width-container">
<article>

<h1>Search Results</h1>

<div class="search-results-pages full-width-container">


<?php if ( have_posts() ) : ?>

				<p><?php printf( __( 'Search Results for: %s', 'knowsley_college' ), '<span>' . get_search_query() . '</span>' ); ?></p>



			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
				?>


					

						






			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

		<!--
		If no results
		-->
		
		<?php endif; ?>
</div>

</article>

	
</section>

		


	</div>

</div>





</main><!-- #main -->
<?php get_footer(); ?>