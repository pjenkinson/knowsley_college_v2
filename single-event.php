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

<div class="full-width-container single-news-page wp-page">

	<div class="fixed-container">



	<section>

<article>

			<? // Event manager plugin tags used to display content / Using the_content will display code from settings set in plugin ?> 

			<h1><?php echo $EM_Event->output('#_EVENTNAME'); ?></h1>

			<div class="event-details">
			<ul>
			 <li><i class="fa fa-calendar"></i> <?php echo $EM_Event->output('#_EVENTDATES'); ?></li>
			 <li><i class="fa fa-clock-o"></i> Starts: <?php echo $EM_Event->output('#_12HSTARTTIME'); ?></li>
			 <li><i class="fa fa-clock-o"></i> Ends: <?php echo $EM_Event->output('#_12HENDTIME'); ?></li>
		  </ul>
			
			</div>



			<div class="event-featured-image">
				<?php echo $EM_Event->output('#_EVENTIMAGE'); ?>
			</div>

			<p><?php echo $EM_Event->output('#_EVENTNOTES'); ?></p>
</article>

<?php echo do_shortcode('[ssbp]'); ?>
	
	</section>

	<aside class="news">

		<h2>Latest news</h2>

		<div class="aside-news-container">

		<?php if (in_category('employers-news')) : ?>
    	<?php
			// Query for displaying the latest news
			$the_query = new WP_Query( array( 'category_name' => 'employers-news' , 'showposts' => '5' ,'offset' => 1, 'post__not_in' => array($currentID)));
		?>
<?php else : ?>
    	<?php
			// Query for displaying the latest news
			$the_query = new WP_Query( array( 'category_name' => 'news' , 'showposts' => '5' ,'offset' => 1, 'post__not_in' => array($currentID)));
		?>
<?php endif; ?>

	

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