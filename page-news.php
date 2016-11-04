<?php
/**
* Template Name: News Page
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

<div class="full-width-container secondary-page news-page">

	<div class="fixed-container">

<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<!-- Start of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>



<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'content', 'featured-banner-has-parent' );?>


<aside>
<!-- Secondary Navigation
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'about' );?>
</aside>

<section>

	<h2>Latest News</h2>
		
		<article class="news-item-full-width">

			<?php
			// Query for displaying the latest post, larger image and main focus of news page.
			$the_query = new WP_Query( array( 'category_name' => 'news' , 'showposts' => '4'));
		?>

		<?php if ( $the_query->have_posts() ) : ?>

		<?php
						// The Loop
					while ( $the_query->have_posts() ) :
							$the_query->the_post();
			?>

			<div class="featured-news-image">

			<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
		  <?php the_post_thumbnail(); ?>
			<span><?php the_title(); ?><i class="fa fa-arrow-circle-right"></i></span>
			</a>
      </div> 


      <?php
			endwhile;
			// Restore original Query & Post Data
			wp_reset_query();
			wp_reset_postdata();
			?>

			<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>


			<?php endif; ?>


		</article>


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