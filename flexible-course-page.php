<?php
/**
* Template Name: Flexible Course Page
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
<?php get_template_part( 'branding-flex' );?>


<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="full-width-container secondary-page">


<div class="full-width-container">
<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'content', 'featured-banner-has-parent' );?>
</div>

<div class="fixed-container course-page-content">


<aside>
<!-- Secondary Navigation
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'flex-secondary' );?>
</aside>

<section class="course-list">

<?php 
	  $sectionProgramme = get_field( "programme_area" ); // Get programme area from ACF input
?>

<? $level = get_field('exclude_levels');

// Get excluded levels from ACF input

$exclude1 = $level['exclude_level_1']; 
$exclude2 = $level['exclude_level_2']; 
$exclude3 = $level['exclude_level_3']; ?>



<?php 

// Query to auto list courses with programme area selected through Wordpress (ACF)

$sql = 	 "SELECT DISTINCT id,
               programmearea,
               factsheetname, 
               courseabout,
               entryrequirements,
               level,
               course_url
          FROM fact_sheets 
          INNER JOIN Offering
         	   On Offering.CourseInformationID=fact_sheets.id
         WHERE programmearea = '$sectionProgramme'
				AND fact_sheets.id = Offering.CourseInformationID
				/* Exclude levels using ACF */
				AND level != '$exclude1' 
				AND level != '$exclude2'
				AND level != '$exclude3'
		UNION
		SELECT DISTINCT id,
               programmearea,
               factsheetname, 
               courseabout,
               entryrequirements,
               level,
               course_url
          FROM fact_sheets 
          INNER JOIN Offering
         	   On Offering.CourseInformationID=fact_sheets.id
         WHERE id = 15200
				AND fact_sheets.id = Offering.CourseInformationID
		ORDER BY level ASC";

$courses = $wpdb->get_results($sql);

?>

<?php if( get_field('toggle_programme_pdf') ): ?>
	
	<div class="subject-intro prospectus-subject">
	<div class="subject-description">
	<?php the_field('programme_description');?>
	</div>
	<div class="subject-download">
		<a href="<?php the_field('programme_prospectus_pdf');?>" title="<?php echo $sectionProgramme;?> Programme"><img src="<?php the_field('programme_prospectus_cover');?>" alt=""></a>

	</div>
	<div class="subject-buttons">
	<div class="button-default"><a href="<?php the_field('programme_prospectus_pdf');?>" title="">Programme information <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></div>
	</div>
</div>
	
<?php endif; ?>




<?php 
//the_content();
?>



<div id="courses">

<?php

foreach($courses AS $course) {
	?>
	<article class="course-listing the-content">
	<h2><?=$course->factsheetname?></h2>
	<p><?=$course->level?></p>
	<!--Include ID of 16-19 course factsheet page -->
	<div class="course-buttons">
		<div class="button-default"><a href="/<?=$course->course_url?>">Course information</a></div>
  		<div class="button-default"><a href="/apply/?courseid=<?=$course->id?>">Apply</a></div>
  	</div>
  </article>
	<?php
}
?>

	
	</section>

		


	</div>

</div>





</main><!-- #main -->
<?php get_footer(); ?>