<?php
/**
* Template Name: Static Front Page
*/
get_header(); ?>

<!-- Scroll to top 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<script>
jQuery(document).ready(function() {
	
jQuery(function() {
    jQuery('.featured-article').matchHeight();
});

jQuery(function() {
    jQuery('.featured-news-heading').matchHeight();
});

});
</script>

 <!-- Factsheet section -->

  <?php
  $factsheetID = filter_var($_GET['factsheet'], FILTER_SANITIZE_NUMBER_INT);

  $sql = "SELECT id, 
                 factsheetname AS name, 
                 courseabout,
                 cost,
                 equipment,
                 entryrequirements,
                 duration,
                 assessment,
                 level,
                 progression, 
                 programmearea,
                 location,
                 unit1,
                 unit2,
                 unit3,
                 unit4,
                 kiscode
            FROM fact_sheets
           WHERE id = '".$factsheetID."'";

  $factsheet = $wpdb->get_results($sql);

  $factsheet = $factsheet[0];


  $sql = "SELECT unit
            FROM fact_sheet_units
           WHERE CourseInformationID = '".$factsheetID."'";


  $units = $wpdb->get_results($sql);         

  ?>



<!-- END HEADER
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

</header>



<!-- Main content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<main id="main" class="site-main site-homepage site-static" role="main">
<?php
$currentID = get_the_ID();
$currentCategory = get_the_category();
?>

<!-- SlIDER
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php if( have_rows('homepage_slides') ): ?>



<section class="full-width-container slider-container">

<div class="main-carousel" style="position:relative;">

<?php while( have_rows('homepage_slides') ): the_row(); ?>

  <div class="carousel-cell">
  	<div class="fixed-container carousel-content">

  		<div class="carousel-caption">
  			<h2><a href="<?php if(get_sub_field('slide_link_custom')) { the_sub_field('slide_link_custom'); } else { the_sub_field('slide_link'); }?>" title="<?php the_sub_field('slide_title'); ?>"><?php the_sub_field('slide_title'); ?></a></h2>
  			<p><?php the_sub_field('slide_paragraph'); ?></p><div class="button-default"><a href="<?php if(get_sub_field('slide_link_custom')) { the_sub_field('slide_link_custom'); } else { the_sub_field('slide_link'); }?>" title="<?php the_sub_field('slide_title'); ?>">Find out more</a></div>
      </div>
    </div>
    <img src="<?php the_sub_field('slide_image'); ?>" alt="<?php the_sub_field('slide_title'); ?>" title="<?php the_sub_field('slide_title'); ?>">


  </div>

<?php endwhile; ?>



</section>

<?php endif; ?>

<!-- SEARCH -->

<section class="full-width-container homepage-live-search" style="padding-top: 2em;">

	<h2 class="section-heading" style="text-align: center; border-bottom: none; color: white;">Search for a course <i class="fa fa-search" aria-hidden="true"></i></h2>

	<div class="fixed-container homepage-live-search-container">
		<select id="search-box" style="width:100%;">
		</select>

	<ul class="live-search-browse-list">
		<li><a href="/school-leavers/study-programmes/">School Leaver Courses</a></li>
		<li><a href="/adults/vocational/">Adult Vocational Courses</a></li>
		<li><a href="/apprenticeships/">Apprenticeships</a></li>
		<li><a href="/higher-education/courses-14915/">Higher Education Courses</a></li>
		<li><a href="/northern-logistics-academy/courses/">Logistics Courses</a></li>
		<li><a href="/adults/workworld/short-courses/">WorkWorld Courses</a></li>
	</ul>

	</div>

	

</section>

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

<div class="featured-news-container">
<h2 class="section-heading">Latest News and Events</h2>
<p class="content-snippet-intro">Stay up to date with KCC <a href="<?php echo site_url(); ?>/news">News</a> and <a href="<?php echo site_url(); ?>/events">Events</a>.</p>

<div class="featured-news">

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

<!-- EVENT -->

<div class="featured-news-snippet featured-events-snippet featured-article">
	<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
	<div class="featured-news-snippet-details">
	
	<div class="homepage-featured-news-image">
		<?php the_post_thumbnail();?>
	</div>
	<div class="featured-news-heading event-featured-heading">
	<h3><?php the_title(); ?></h3>
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

<!-- NEWS -->

<?php
// Query for displaying the latest post, larger image and main focus of news page.
$the_query = new WP_Query( array( 'category_name' => 'news' , 'showposts' => '3'));
?>

<?php
// The Loop
while ( $the_query->have_posts() ) :
$the_query->the_post();
?>

<div class="featured-news-snippet featured-article">
	<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
	<div class="featured-news-snippet-details">
	
	<div class="homepage-featured-news-image">
	<?php if ( has_post_thumbnail() ) {
the_post_thumbnail();
} else { ?>
<img src="<?php echo site_url(); ?>/wp-content/uploads/2015/06/the-latest.png" alt="<?php the_title(); ?>" />
<?php } ?>
	</div>
	<div class="featured-news-heading">
	<h3><?php the_title(); ?></h3>
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



</div>

</section>

<!-- Flexible Content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'custom-fields/acf', 'frontpage-content-flex' );?>

 <!-- Partners -->

  <div class="college-info-partnerships full-width-container">
    <div class="fixed-container fixed-margin-both">

      <img src="<?php echo get_bloginfo('template_directory');?>/images/partners-footer.png" alt="KCC Partners">
    </div>
    </div>
  <!-- End of partners -->
</main>
<?php get_footer(); ?>