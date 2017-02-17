<?php
/**
*
* @package knowsley_college
*/
get_header(); ?>

<!-- Scroll to top 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<script>
jQuery(function() {
    jQuery('.featured-article').matchHeight();
});

jQuery(function() {
    jQuery('.featured-news-heading').matchHeight();
});
</script>

<style>

</style>

<!-- END HEADER
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

</header>



<!-- Main content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<main id="main" class="site-main site-homepage" role="main">
<?php
$currentID = get_the_ID();
$currentCategory = get_the_category();
?>

<!-- SlIDER
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php if( have_rows('homepage_slides', 'option') ): ?>



<section class="full-width-container slider-container">

<div class="main-carousel" style="position:relative;">

<?php while( have_rows('homepage_slides', 'option') ): the_row(); ?>

  <div class="carousel-cell">
  	<div class="fixed-container carousel-content">

  		<div class="carousel-caption">
  			<h2><a href="<?php the_sub_field('slide_link'); ?>" title="<?php the_sub_field('slide_title'); ?>"><?php the_sub_field('slide_title'); ?></a></h2>
  			<p><?php the_sub_field('slide_paragraph'); ?></p><div class="button-default"><a href="<?php the_sub_field('slide_link'); ?>" title="<?php the_sub_field('slide_title'); ?>">Find out more</a></div>
      </div>
    </div>
    <img src="<?php the_sub_field('slide_image'); ?>" alt="<?php the_sub_field('slide_title'); ?>" title="<?php the_sub_field('slide_title'); ?>">


  </div>

<?php endwhile; ?>



</section>

<?php endif; ?>

<!-- Courses section
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<section class="full-width-container courses-section white-background">
<div class="fixed-container">

<div class="learners-container">

	<div class="learner-item">
	<a href="<?php the_field('16_19_permalink', 'option'); ?>">
			<div class="learner-item-image">
			<img alt="School Leavers" src="<?php the_field('16_19_image', 'option'); ?>">
			</div>
			<h3><?php the_field('16_19_title', 'option'); ?><i class="fa fa-arrow-circle-o-right link-arrow"></i></h3>
	</a>
	</div>

	<div class="learner-item">
	<a href="<?php the_field('apprenticeships_permalink', 'option'); ?>">
			<div class="learner-item-image">
			<img alt="Apprenticeships" src="<?php the_field('apprenticeships_image', 'option'); ?>">
			</div>
			<h3><?php the_field('apprenticeships_title', 'option'); ?><i class="fa fa-arrow-circle-o-right link-arrow"></i></h3>
	</a>
	</div>

	<div class="learner-item">
	<a href="<?php the_field('adults_permalink', 'option'); ?>">
			<div class="learner-item-image">
			<img alt="Adults" src="<?php the_field('adults_image', 'option'); ?>">
			</div>
			<h3><?php the_field('adults_title', 'option'); ?><i class="fa fa-arrow-circle-o-right link-arrow"></i></h3>
	</a>
	</div>

	<div class="learner-item">
	<a href="<?php the_field('higher_education_permalink', 'option'); ?>">
			<div class="learner-item-image">
			<img alt="Higher Education" src="<?php the_field('higher_education_image', 'option'); ?>">
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
<p class="content-snippet-intro">Stay up to date with KCC <a href="<?php echo site_url(); ?>/news">News</a> and <a href="<?php echo site_url(); ?>/events">Events</a>.</p>

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
	<div class="featured-post-date">
		<p><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></p>
	</div>
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

// If 0 event posts, display news post

$events = get_posts( array('post_type' => 'events', 'posts_per_page' => -1) );

if($events) {
$the_query = new WP_Query( array( 'post_type' => 'events' , 'showposts' => '1' , 'orderby' => 'date', 'order' => 'ASC' ));
$noevents = 'a';
} 

else { ?>
<?php
$the_query = new WP_Query( array( 'category_name' => 'news' , 'showposts' => '1', 'offset' => '2'));

} 
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

	<?php // If events post, replace news icon with events icon and text
	if ($noevents == 'a') {?>
  <div class="featured-post-date">
	<p>Event  <i class="fa fa-calendar"></i> <?php the_field('event_date', $id); ?></p>
	</div>
	<?php } else {?>
  <div class="featured-post-date">
	<p><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></p>
  </div>
	<?php }?>
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


<!-- Main Campus Video section -->
<section class="full-width-container students-section">
<div class="fixed-container">
<div class="two-col-section-main">
<h2 class="section-heading">Main Campus</h2>
<p>KNOW how to dream big with Knowsley Community College. Our brand new £32 million Main Campus is now open!</p>
<div class="button-default section-margin-top button-primary">
<a href="http://www.knowsleycollege.ac.uk/about/our-campuses/main-campus/" title="Main Campus - KCC">
Find out more
</a>
</div>
</div>
<div class="two-col-section-side two-col-section-image">
	<div class="section-image-container">
	<?php the_field('main_campus_video', 'option'); ?>
	</div>
</div>
</div>
</section>


<section class="full-width-container download-prospectus">

<div class="fixed-container">
	<div class="two-col-section-prospectus-description">
		<h2 class="section-heading">View our 2017-18 Prospectus</h2>
		<p>For a guide to courses available to you, view our School Leavers or Adult Prospectus.</p>
	</div>
	<div class="two-col-section-prospectus-download">
		<?php

// check if the repeater field has rows of data
if( have_rows('download_prospectus', 'option') ):

?>
<?php

 	// loop through the rows of data
    while ( have_rows('download_prospectus', 'option') ) : the_row();
?>

		<div class="prospectus-container">
			<div class="prospectus-cover">
			<a href="<?php the_sub_field('prospectus_pdf', 'option'); ?>" title="">
			<img width="104px" height="140px" src="<?php the_sub_field('prospectus_cover', 'option'); ?>" alt="<?php the_sub_field('title', 'option'); ?> " />
		  </a>
		  </div>
		  <div class="prospectus-description">
		  	<p><?php the_sub_field('title', 'option'); ?></p>
		  	<a href="<?php the_sub_field('prospectus_pdf', 'option'); ?>">
		  		<button class="download-button">View</button></a>
		  </div>
		</div>

<?php
    endwhile;?>
<?php

else :
?>

<p>Download a prospectus from the resources page.</p>

<?php

endif;

?>

</div>

</section>

<!-- Student support section -->
<section class="full-width-container students-section white-background">
<div class="fixed-container">
<div class="two-col-section-main">
<h2 class="section-heading"><?php the_field('student_support_title', 'option'); ?></h2>
<p><?php the_field('student_support_description', 'option'); ?></p>
<div class="button-default section-margin-top button-primary">
<a href="<?php the_field('student_support_page_link', 'option'); ?>" title="<?php the_field('student_support_title', 'option'); ?>">
Find out more
</a>
</div>
</div>
<div class="two-col-section-side two-col-section-image">
	<div class="section-image-container">
		<a title="Student Support" href="<?php the_field('student_support_page_link', 'option'); ?>" title="<?php the_field('student_support_title', 'option'); ?>">
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

			<div class="button-default section-margin-top button-primary">
			<a title="Employers" href="<?php the_field('employers_page_link', 'option'); ?>" title="Find out more">
			Find out more
			</a>
			</div>
		</div>
	</div>
</section>

<!-- Resources section -->
<section class="full-width-container resources-section">
	<div class="fixed-container">

		<div class="home-section-3col">

			<div class="resources">
				<h2><?php the_field('resources_title', 'option'); ?></h2>
				<p><?php the_field('resources_link_description', 'option'); ?> <a title="More <?php the_field('resources_title', 'option'); ?>" href="<?php the_field('resources_page_link', 'option'); ?>" title="<?php the_field('resources_title', 'option'); ?>">More <i class="fa fa-arrow-circle-o-right"></i></a></p>
				<a href="<?php the_field('resources_page_link', 'option'); ?>">
					<img src="<?php the_field('resources_thumbnail', 'option'); ?>" alt="<?php the_field('resources_title', 'option'); ?>">
				</a>
			</div>
			<div class="alumni">
				<h2><?php the_field('alumni_title', 'option'); ?></h2>
				<p><?php the_field('alumni_link_description', 'option'); ?> <a title="More <?php the_field('alumni_title', 'option'); ?>" href="<?php the_field('alumni_custom_link', 'option'); ?>" title="<?php the_field('resources_title', 'option'); ?>">More <i class="fa fa-arrow-circle-o-right"></i></a></p>
				<a href="<?php the_field('alumni_custom_link', 'option'); ?>">
					<img src="<?php the_field('alumni_thumbnail', 'option'); ?>" alt="<?php the_field('alumni_title', 'option'); ?>">
				</a>
			</div>
			<div class="extra">
				<h2><?php the_field('newsletter_title', 'option'); ?></h2>
				<p><?php the_field('newsletter_link_description', 'option'); ?> <a title="More <?php the_field('newsletter_title', 'option'); ?>" href="<?php the_field('newsletter_page_link', 'option'); ?>" title="<?php the_field('resources_title', 'option'); ?>">More <i class="fa fa-arrow-circle-o-right"></i></a></p>
				<a href="<?php the_field('newsletter_page_link', 'option'); ?>">
					<img src="<?php the_field('newsletter_thumbnail', 'option'); ?>" alt="<?php the_field('newsletter_title', 'option'); ?>">
				</a>
			</div>

		</div>

	</div>

</section>

</main>
<?php get_footer(); ?>