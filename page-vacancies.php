<?php
/**
* Template Name: Vacancies
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

<div class="full-width-container secondary-page">

	<div class="fixed-container">

<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->



<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'content', 'featured-banner' );?>

<aside>
<!-- Secondary Navigation
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'vacancies' );?>
</aside>

<section>


<!-- Vacancies
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<h2>Current Vacancies</h2>

<?php
			// Query for displaying the latest post, larger image and main focus of news page.
			$the_query = new WP_Query( array( 'post_type' => 'vacancies' , 'showposts' => '1'));
?>

<?php
			// The Loop
			while ( $the_query->have_posts() ) :
			$the_query->the_post();
?>


	<article class="vacancies">
		<div class="title">
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<p><strong><?php the_field('type'); ?></strong></p>
		<p><strong>Salary:</strong> <?php the_field('salary'); ?></p>
		<p><strong>Closing date:</strong><?php the_field('closing_date'); ?></p>

		<p class="apply"><a href="<?php the_permalink(); ?>">Apply</a></p>

		</div>

		

		<div class="description">
			<p><?php the_excerpt(); ?></p>
		</div>


	</article>


	<?php
			endwhile;
			// Restore original Query & Post Data
			wp_reset_query();
			wp_reset_postdata();
?>

<!-- Start of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

<div class="the-content">	

<?php the_content();?>

</div>

<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>


	</section>



		


	</div>

</div>



</main><!-- #main -->
<?php get_footer(); ?>