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

<div class="full-width-container secondary-page alumni-page">

	<div class="fixed-container">



<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'content', 'featured-banner-archive' );?>


<aside>
<!-- Secondary Navigation
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'about' );?>
</aside>

<section>


	<!-- Content page heading
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="intro-12-col">

<div class="secondary-homepage-intro">

	<!-- Homepage tagline and intro (ACF) -->
	<p class="tagline">Keep in touch and share your memories</p>

	<p class="intro">KCC Alumni is a dedicated resource for past students to keep in touch with the college, share memories and get involved. If you have a story to share, please get in touch by emailing <a href="mailto:marketing@knowsleycollege.ac.uk">marketing@knowsleycollege.ac.uk</a>.</p>

</div>

</div>

<!-- Alumni Section
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

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

			<article class="content-block alumni-profile the-content">

			<h2><?php the_field('alumni_name'); ?></h2>
			<p><?php the_field('alumni_profession'); ?></p>

				<div class="alumni-image">
					<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
						<img src="<?php the_field('alumni_image'); ?>" alt="Mojo">
					</a>	
				</div>

				<div class="alumni-excerpt">
				
						<?php the_excerpt(); ?>
						<p><a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">Read alumni story <i class="fa fa-arrow-circle-right"></i></a></p>
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