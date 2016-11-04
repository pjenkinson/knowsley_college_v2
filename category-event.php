<?php
/**
* Template Name: Events Category Page
* Displays posts for News, Events and Press Releases*
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
<?php 

$currentID = get_the_ID();
$currentCategory = get_the_category();

?>

<!-- Main content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<main id="main" class="site-main" role="main">
<!-- Page content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div class="full-width-container default-page">
<div class="fixed-container">

	<section>

		<h1>Upcoming Events</h1>


		
		<article class="news-item-full-width">

			<?php
			// Query for displaying the latest event post, larger image and main focus of events page.
			$the_query = new WP_Query( array( 'category_name' => 'event' , 'showposts' => '10',));
		?>

		<?php
						// The Loop
					while ( $the_query->have_posts() ) :
							$the_query->the_post();
			?>

			<h2><?php the_title(''); ?><span class="event-date-right"><i class="fa fa-calendar"></i><?php
							if( date('Yz') == get_the_time('Yz') ) {
							echo 'Today';
							} else {
							the_time('F jS, Y');
							};
							?></span></h2>

			<a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail(); ?>
                </a>

      <p>Article excerpt for latest article. <a href="<?php echo get_permalink(); ?>" title="">Read more</a></p>

      <?php
			endwhile;
			// Restore original Query & Post Data
			wp_reset_query();
			wp_reset_postdata();
			?>


		</article>

		
	</section>
	<aside>

		<?php
			// Query
			$the_query = new WP_Query( array( 'category_name' => 'open-evening' , 'showposts' => '6', 'post__not_in' => array($currentID)));
		?>
		
		<h3>Open Days</h3>
		<ul>
			<?php
						// The Loop
					while ( $the_query->have_posts() ) :
							$the_query->the_post();
			?>
			<li><a href="<?php the_permalink() ?>"><?php the_title() ?><?php the_post_thumbnail(); ?></a>
				<span><i class="fa fa-calendar"></i><?php the_date(); ?></span>
			</li>

			<?php
			endwhile;
			// Restore original Query & Post Data
			wp_reset_query();
			wp_reset_postdata();
			?>
			
		</ul>

		<?php
			// Query
			$the_query = new WP_Query( array( 'category_name' => 'taster-event' , 'showposts' => '6'));
		?>

		<h3>Taster Events</h3>
		<ul>
			<?php
						// The Loop
					while ( $the_query->have_posts() ) :
							$the_query->the_post();
			?>
			<li><a href="<?php the_permalink() ?>"><?php the_title() ?><?php the_post_thumbnail(); ?></a>
						<span><i class="fa fa-calendar"></i><?php
							if( date('Yz') == get_the_time('Yz') ) {
							echo 'Today';
							} else {
							the_time('F jS, Y');
							};
							?>
						</span>
			</li>
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