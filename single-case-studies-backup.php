<?php
/**
* The template for displaying all single posts.
*
* @package knowsley_college
*/
get_header(); ?>
	
</header>

<?php 
$currentID = get_the_ID();
$currentCategory = get_the_category();
?>

<!-- Breadcrumbs
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'breadcrumbs' );?>


<!-- Main content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<main id="main" class="site-main" role="main">


<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="full-width-container single-news-page">

	<div class="fixed-container">



	<section>

	<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->


<!-- Single post title and featured image
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

<h1><?php the_title() ?></h1>

<?php the_post_thumbnail()?>

	<!-- Content page heading
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php the_content();?>

<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>
	
	</section>

	<aside class="news">

		<h2>More case studies</h2>

		<div class="aside-news-container">

		<?php
			// Query for displaying the latest news
			$the_query = new WP_Query( array( 'post_type' => 'case-studies' , 'showposts' => '5' ,'offset' => 1, 'post_not_in' => array($currentID)));
		?>

		<?php
						// The Loop
					while ( $the_query->have_posts() ) :
							$the_query->the_post();
			?>

			<div class="latest-news-snippet-container">
			<div class="latest-news-snippet-title">
				<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
			</div>
	
		<?php
			endwhile;
			// Restore original Query & Post Data
			wp_reset_query();
			wp_reset_postdata();
			?>
			
		</ul>

	</div>

	</aside>
		


	</div>


</div>



</main><!-- #main -->
<?php get_footer(); ?>