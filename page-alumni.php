<?php
/**
* Template Name: Alumni Page
* Alumni custo post archive page
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

<div class="full-width-container secondary-page content-page">

	<div class="fixed-container">

<?php if( get_field('tagline') ): ?>

<!-- Homepage tagline and intro paragraph
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'acf', 'homepage-tagline' );?>

<?php endif; ?>

<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'content', 'featured-banner-has-parent' );?>


<aside>
<!-- Secondary Navigation
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'about' );?>
</aside>

<section>




	<!-- Content page heading
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="intro-12-col">

<!-- Homepage tagline and intro paragraph
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'acf', 'homepage-tagline' );?>

</div>

<!-- Alumni Section
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<!-- Section-->
	<div class="alumni-container">



	<?php
			// Query for displaying Alumni custom posts
			$the_query = new WP_Query( array( 'post_type' => 'alumni' , 'showposts' => '10'));
?>

<?php
			// The Loop
			while ( $the_query->have_posts() ) :
			$the_query->the_post();
?>

		
		<div class="profile-block">
			<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
			<div class="profile-image">
				<img src="<?php the_field('alumni_image'); ?>" alt="Mojo">
			</div>
				<div class="profile-description">
					<div class="heading">
						<h2><?php the_field('alumni_name'); ?></h2>
					</div>
			</a>
					<div class="sub-heading">
						<p><?php the_excerpt(); ?></p>
						<p><a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">Read alumni story <i class="fa fa-arrow-circle-right"></i></a></p>
					</div>

			</div>
		</div><!-- End of Alumni profile-->

			<?php
			endwhile;
			// Restore original Query & Post Data
			wp_reset_query();
			wp_reset_postdata();
?>

</div>

<!-- Start of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

<?php the_content();?>


<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>




<!-- End of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	
	</section>

		


	</div>

</div>





</main><!-- #main -->
<?php get_footer(); ?>