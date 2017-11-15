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
<main id="main" class="site-main kcc-primary" role="main">


<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="full-width-container single-news-page wp-page">

	<div class="fixed-container">

	<section>

	<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->


<!-- Single post title and featured image
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

<article classs="single-article">

<h1><?php the_title() ?></h1>

<p class="post-date"><i class="fa fa-clock-o"></i><?php the_date() ?></p>

<div class="single-featured-image">
<?php the_post_thumbnail('thumbnail', array('class' => 'lazy')); ?>
</div>

<?php the_content()?>



</article>

	<!-- Content page heading
–––––––––––––––––––––––––––––––––––––––––––––––––– -->



<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>


	</section>

	<aside class="news">

		<h2>More news</h2>

		<div class="aside-news-container">

		<?php if (in_category('employers-news')) : ?>
    	<?php
			// Query for displaying the latest news
			$the_query = new WP_Query( array( 'category_name' => 'employers-news' , 'showposts' => '5' ,'offset' => 1, 'post__not_in' => array($currentID)));
		?>
	<?php endif?>
	<?php if (in_category('news')) : ?>
    	<?php
			// Query for displaying the latest news
			$the_query = new WP_Query( array( 'category_name' => 'news' , 'showposts' => '5' ,'offset' => 1, 'post__not_in' => array($currentID)));
		?>
	<?php endif?>
	<?php if (in_category('new-campus-2016')) : ?>
    	<?php
			// Query for displaying the latest news
			$the_query = new WP_Query( array( 'category_name' => 'new-campus-2016' , 'showposts' => '1' , 'post__not_in' => array($currentID)));
		?>
	<?php endif?>

	

		<?php
						// The Loop
					while ( $the_query->have_posts() ) :
							$the_query->the_post();
			?>

			<div class="latest-news-snippet-container">
			<div class="latest-news-snippet-title">
				<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></p></div>
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