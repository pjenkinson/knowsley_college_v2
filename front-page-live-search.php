<?php
/**
*
* @package knowsley_college
*/
get_header(); ?>

<!-- Scroll to top 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'script', 'owlcarousel' );?>
<?php get_template_part( 'navigation', 'scroll' );?>

<!-- Slider
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<section class="full-width-container slider-container">
<div class="fixed-container">
<div class="slider">
<?php 
    echo do_shortcode("[metaslider id=1536]"); 
?>
</div>

<script>
jQuery(function() {
    jQuery('.featured-article').matchHeight();
});

jQuery(function() {
    jQuery('.featured-news-heading').matchHeight();
});
</script>

<script>
if(isset($_GET['term'])) {
 $searchTerm = filter_var($_GET['term'], FILTER_SANITIZE_STRING);

     $sql = "SELECT id, factsheetname as name
               FROM fact_sheets_live
              WHERE factsheetname LIKE '%".$searchTerm."%'
              LIMIT 20";

     $courses = $wpdb->get_results($sql);

     foreach ($courses as $courses) {
          $results[] = array('id' => $courses->id, 
                              'label' => $courses->name, 
                              'value' => $courses->name);
     }

     echo json_encode($results);

     exit;
} 
</script>

</header>
</div>
</section>
<!-- Main content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<main id="main" class="site-main site-homepage" role="main">
<?php
$currentID = get_the_ID();
$currentCategory = get_the_category();
?>

<!--
<section class="full-width-container">

	<div class="fixed-container">


	<?php // get_template_part( 'script', 'livesearch' );?>

	</div>

</section>
-->
<!-- Courses section
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<section class="full-width-container courses-section">
<div class="fixed-container">
<h2 class="section-heading">Courses</h2>
<p class="content-snippet-intro">Choose a course that's right for you.</p>

<div class="learners-container">

	<div class="learner-item">
	<a href="<?php the_field('16_19_permalink', 'option'); ?>">
			<div class="learner-item-image">
			<img src="<?php the_field('16_19_image', 'option'); ?>">
			</div>
			<h3><?php the_field('16_19_title', 'option'); ?><i class="fa fa-arrow-circle-o-right link-arrow"></i></h3>
	</a>
	</div>

	<div class="learner-item">
	<a href="<?php the_field('apprenticeships_permalink', 'option'); ?>">
			<div class="learner-item-image">
			<img src="<?php the_field('apprenticeships_image', 'option'); ?>">
			</div>
			<h3><?php the_field('apprenticeships_title', 'option'); ?><i class="fa fa-arrow-circle-o-right link-arrow"></i></h3>
	</a>
	</div>

	<div class="learner-item">
	<a href="<?php the_field('adults_permalink', 'option'); ?>">
			<div class="learner-item-image">
			<img src="<?php the_field('adults_image', 'option'); ?>">
			</div>
			<h3><?php the_field('adults_title', 'option'); ?><i class="fa fa-arrow-circle-o-right link-arrow"></i></h3>
	</a>
	</div>

	<div class="learner-item">
	<a href="<?php the_field('higher_education_permalink', 'option'); ?>">
			<div class="learner-item-image">
			<img src="<?php the_field('higher_education_image', 'option'); ?>">
			</div>
			<h3><?php the_field('higher_education_title', 'option'); ?><i class="fa fa-arrow-circle-o-right link-arrow"></i></h3>
	</a>
	</div>
		
</div>

</section>


<!-- News section -->
<section class="full-width-container news-section">
<div class="fixed-container">
<?php
// Query for displaying the latest post, larger image and main focus of news page.
$the_query = new WP_Query( array( 'category_name' => 'news' , 'showposts' => '2'));
?>
<div class="featured-news-container">
<h2 class="section-heading">Latest News and Events</h2>
<p class="content-snippet-intro">Stay up to date with KCC News and Events. <a href="<?php echo site_url(); ?>/news">More News</a></p>

<div class="featured-news">
<?php
// The Loop
while ( $the_query->have_posts() ) :
$the_query->the_post();
?>

<div class="featured-news-snippet featured-article">
	<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
	<div class="featured-news-snippet-details">
	<div class="featured-news-heading">
	<h3><?php the_title(); ?></h3>
	</div>
	<div class="homepage-featured-news-image">
	<?php if ( has_post_thumbnail() ) {
the_post_thumbnail();
} else { ?>
<img src="<?php echo site_url(); ?>/wp-content/uploads/2015/06/the-latest.png" alt="<?php the_title(); ?>" />
<?php } ?>
	</div>
	<p><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></p>
	</div>
	</a>
</div>

<?php
endwhile;
// Restore original Query & Post Data
wp_reset_query();
wp_reset_postdata();
?>

<?php
// Query for displaying the latest post, larger image and main focus of news page.
$the_query = new WP_Query( array( 'post_type' => 'events' , 'showposts' => '1'));
?>

<?php
// The Loop
while ( $the_query->have_posts() ) :
$the_query->the_post();
?>

<?php // Get the Event ID
$id = get_the_ID(); ?>

<div class="featured-news-snippet featured-events-snippet featured-article">
	<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
	<div class="featured-news-snippet-details">
	<div class="featured-news-heading">
	<h3><?php the_title(); ?></h3>
	</div>
	<div class="homepage-featured-news-image">
		<?php the_post_thumbnail();?>
	</div>
	<p><i class="fa fa-calendar"></i> Event <?php the_field('event_date', $id); ?></p>
	</div>
	</a>
</div>

<?php
endwhile;
// Restore original Query & Post Data
wp_reset_query();
wp_reset_postdata();
?>

</div>

</section>


<!-- Student support section -->
<section class="full-width-container students-section">
<div class="fixed-container">
<div class="two-col-section-main">
<h2 class="section-heading"><?php the_field('student_support_title', 'option'); ?></h2>
<p><?php the_field('student_support_description', 'option'); ?></p>
<div class="button-default section-margin-top">
<a href="<?php the_field('student_support_page_link', 'option'); ?>" title="<?php the_field('student_support_title', 'option'); ?>">
Find out more
</a>
</div>
</div>
<div class="two-col-section-side two-col-section-image">
	<div class="section-image-container">
		<a href="<?php the_field('student_support_page_link', 'option'); ?>" title="<?php the_field('student_support_title', 'option'); ?>">
		<img src="<?php the_field('student_support_thumbnail', 'option'); ?>" alt="<?php the_field('student_support_title', 'option'); ?>">
		</a>
	</div>
</div>
</div>
</section>


<!-- Employers section -->
<section class="full-width-container employers-section">
	<div class="fixed-container">

		<div class="two-col-section-main two-col-section-image">
			<div class="section-image-container">
				<a href="<?php the_field('employers_page_link', 'option'); ?>" title="<?php the_field('employers_title', 'option'); ?>">
				<img src="<?php the_field('employers_thumbnail', 'option'); ?>" alt="<?php the_field('employers_title', 'option'); ?>">
				</a>
			</div>
		</div>
			<div class="two-col-section-side right-float">
			<h2 class="section-heading"><?php the_field('employers_title', 'option'); ?></h2>
			<p><?php the_field('employers_description', 'option'); ?></p>

			<div class="button-default section-margin-top">
			<a href="<?php the_field('employers_page_link', 'option'); ?>" title="Find out more">
			Find out more
			</a>
			</div>
		</div>
	</div>
</section>


<!-- College services carousel -->
<section class="full-width-container services-section">
<div class="fixed-container">
<h2 class="section-heading">College Services</h2>
<p class="section-sub-heading">Knowsley Community College has a range of services at our campuses available to the public.</p>
<div id="owl-demo">
<div class="item">
<a href="<?php the_field('carousel_one', 'option'); ?>"><img src="<?php echo get_bloginfo('template_directory');?>/images/services/mojo.png" alt="Mojo">
</a></div>
<div class="item">
<a href="<?php the_field('carousel_two', 'option'); ?>"><img src="<?php echo get_bloginfo('template_directory');?>/images/services/studio-115.png" alt="Studio 115">
</a></div>
<div class="item">
<a href="<?php the_field('carousel_three', 'option'); ?>"><img src="<?php echo get_bloginfo('template_directory');?>/images/services/bistro-36.png" alt="Bistro 36">
</a></div>
<div class="item">
<a href="<?php the_field('carousel_four', 'option'); ?>"><img src="<?php echo get_bloginfo('template_directory');?>/images/services/radio.png" alt="Owl Image">
</a></div>
</div>
</div>
</section>

<!-- Resources section -->
<section class="full-width-container resources-section">
	<div class="fixed-container">

		<div class="home-section-3col">

			<div class="resources">
				<h2><?php the_field('resources_title', 'option'); ?></h2>
				<p><?php the_field('resources_link_description', 'option'); ?> <a href="<?php the_field('resources_page_link', 'option'); ?>" title="<?php the_field('resources_title', 'option'); ?>">More <i class="fa fa-arrow-circle-o-right"></i></a></p>
				<a href="<?php the_field('resources_page_link', 'option'); ?>">
					<img src="<?php the_field('resources_thumbnail', 'option'); ?>" alt="<?php the_field('resources_title', 'option'); ?>">
				</a>
			</div>
			<div class="alumni">
				<h2><?php the_field('alumni_title', 'option'); ?></h2>
				<p><?php the_field('alumni_link_description', 'option'); ?> <a href="<?php the_field('alumni_custom_link', 'option'); ?>" title="<?php the_field('resources_title', 'option'); ?>">More <i class="fa fa-arrow-circle-o-right"></i></a></p>
				<a href="<?php the_field('alumni_custom_link', 'option'); ?>">
					<img src="<?php the_field('alumni_thumbnail', 'option'); ?>" alt="<?php the_field('alumni_title', 'option'); ?>">
				</a>
			</div>
			<div class="extra">
				<h2><?php the_field('newsletter_title', 'option'); ?></h2>
				<p><?php the_field('newsletter_link_description', 'option'); ?> <a href="<?php the_field('newsletter_page_link', 'option'); ?>" title="<?php the_field('resources_title', 'option'); ?>">More <i class="fa fa-arrow-circle-o-right"></i></a></p>
				<a href="<?php the_field('newsletter_page_link', 'option'); ?>">
					<img src="<?php the_field('newsletter_thumbnail', 'option'); ?>" alt="<?php the_field('newsletter_title', 'option'); ?>">
				</a>
			</div>

		</div>

	</div>

</section>

</main>
<?php get_footer(); ?>