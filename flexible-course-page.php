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
    $array = [];
?>


<?php if( have_rows('add_course') ): ?>
    <?php while( have_rows('add_course') ): the_row(); ?>
 
       <?php  

       $course_id = get_sub_field('course_id');

       $safe_course_id = filter_var($course_id, FILTER_SANITIZE_STRING);

           //The [] syntax tells php to append the value to the existing array
 	   $original_array[] = str_split($safe_course_id, 5);

 	   $result = array();
	   array_walk_recursive($original_array,function($v, $k) use (&$result){ $result[] = $v; });
  	   ?>   
    <?php endwhile; ?>
<?php endif; ?>


<?php if (empty($result)) {
  
  $coursesInString = '00000';

 } else {

 $coursesInString = implode(',', $result);

 }

?>


<?php 

// Query to auto list courses with programme area selected through Wordpress (ACF)

$sql = "SELECT DISTINCT id,
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
				AND fact_sheets.id=Offering.CourseInformationID
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
          FROM fact_sheets_custom 
         WHERE programmearea = '$sectionProgramme'
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
         WHERE id IN ($coursesInString) 
				AND fact_sheets.id = Offering.CourseInformationID
		UNION
		SELECT DISTINCT id,
               programmearea,
               factsheetname, 
               courseabout,
               entryrequirements,
               level,
               course_url
          FROM fact_sheets_custom 
         WHERE id IN ($coursesInString) 
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