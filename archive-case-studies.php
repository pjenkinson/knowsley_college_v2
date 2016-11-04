<?php
/**
* Alumni Archive
*
* @package knowsley_college
*/
get_header(); ?>

<!-- Scroll to top 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'scroll' );?>

<script>
jQuery(function() {
    jQuery('.profile-block').matchHeight();
});
</script>
	
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



<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'content', 'featured-banner-archive' );?>


<aside>
<!-- Secondary Navigation
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'employers' );?>
</aside>

<section>


	<!-- Content page heading
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="intro-12-col">

<div class="secondary-homepage-intro">

	<!-- Homepage tagline and intro (ACF) -->
	<p class="tagline">The Employer Services Team have successfully worked in partnership with over 500 employers throughout Merseyside and the North West region.</p>

	<p class="intro">We constantly gather feedback from our employers so that we can continue to improve and meet the changing demands of modern businesses.</p>

</div>

</div>

<!-- Alumni Section
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

	<div class="alumni-container">



	<?php
			// Query for displaying Alumni custom posts
			$the_query = new WP_Query( array( 'post_type' => 'case-studies' , 'showposts' => '10'));
?>

<?php
			// The Loop
			while ( $the_query->have_posts() ) :
			$the_query->the_post();
?>

			<article class="alumni-profile the-content">

			<h2><?php the_title(''); ?></h2>

				<div class="alumni-image">
					<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>	
				</div>

				<div class="alumni-excerpt">
				
						<?php the_excerpt(); ?>
						<p><a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">Read case study <i class="fa fa-arrow-circle-right"></i></a></p>
				</div>

			</article>

		<!-- End of Alumni profile-->

			<?php
			endwhile;
			// Restore original Query & Post Data
			wp_reset_query();
			wp_reset_postdata();
?>


	</div> <!-- End of Alumni container-->
	
	</section>

		


	</div>

</div>





</main><!-- #main -->
<?php get_footer(); ?>