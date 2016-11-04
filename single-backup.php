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
<div class="full-width-container default-page">
<div class="fixed-container">
	<section>
		<?php while ( have_posts() ) : the_post(); ?>
		
		<h1><?php single_post_title(''); ?></h1>
		<p><?php the_date ();  ?> | <span><?php the_category(' | ') ?></span></p>
		
		<?php the_post_thumbnail('large'); ?>

		<?php the_content();?>

		<?php endwhile; ?>
		
	</section>
	<aside>

		<?php
			// Query to display More posts of current category (e.g News)
			$currentID = get_the_ID();
			$currentCategory = get_the_category();
			$the_query = new WP_Query( array( 'category_name' => array($currentCategory) , 'showposts' => '6', 'post__not_in' => array($currentID)));
		?>

		
		<h2>More News</h2>
		<ul>
			<?php
						// The Loop
					while ( $the_query->have_posts() ) :
							$the_query->the_post();
			?>
			<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a><span class="more-news-date"><?php the_date ();  ?></span></li>

			<?php
			endwhile;
			// Restore original Query & Post Data
			wp_reset_query();
			wp_reset_postdata();
			?>
			
		</ul>

		<?php
			// Query to display More posts of current category (e.g News)
			$currentID = get_the_ID();
			$currentCategory = get_the_category();
			$the_query = new WP_Query( array( 'category_name' => $currentCategory[0]->cat_name , 'showposts' => '6', 'post__not_in' => array($currentID)));
		?>

		
		<h2>Upcoming <?php echo $currentCategory[0]->cat_name?></h2>
		<ul>
			<?php
						// The Loop
					while ( $the_query->have_posts() ) :
							$the_query->the_post();
			?>
			<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a><span class="more-news-date"><?php the_date ();  ?></span></li>

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