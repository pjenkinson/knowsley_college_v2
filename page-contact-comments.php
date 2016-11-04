<?php
/**
* Template Name: Secondary Resource Page
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

<!-- Start of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'content', 'featured-banner' );?>

<aside>
<!-- Secondary Navigation
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'contact' );?>
</aside>


<section>

<div class="the-content">
	

	<div class="two-col-content">

<?php the_content();?>

<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>

	</div>

	<!-- Loop to display homepage thumbnail sections (ACF) -->
	<div class="two-col-aside">

		<h2>Resources</h2>
		<?php while ( have_posts() ) : the_post(); ?>

		<?php 

				// check for rows (parent repeater)
				if( have_rows('resource') ): ?>
		
					<?php 

					// loop through rows (parent repeater)
					while( have_rows('resource') ): the_row(); ?>

				<div class="resources-container">

					<div class="pdf-document">
							<a href="<?php the_sub_field('pdf'); ?>" title="<?php the_sub_field('title'); ?>"><i class="fa fa-file-pdf-o"></i><?php the_sub_field('title'); ?></a>
						</div>

				</div>

	<?php endwhile; ?>

	<?php endif; ?>

	<?php endwhile; ?>

		</div>

</div>


	
	</section>
		


	</div>

</div>



</main><!-- #main -->
<?php get_footer(); ?>