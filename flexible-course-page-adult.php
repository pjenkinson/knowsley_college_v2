<?php
/**
* Template Name: Flexible Course Page - Adult
* Filters out level 1
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

<div class="fixed-container">


<aside>
<!-- Secondary Navigation
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'flex-secondary' );?>
</aside>

<section class="course-list">

<?php

// check if the repeater field has rows of data
if( have_rows('subject_info') ):

 	// loop through the rows of data
    while ( have_rows('subject_info') ) : the_row();
?>	

<div class="subject-intro prospectus-subject">
	<div class="subject-description"><p><?php the_sub_field('subject_description');?></p></div>
	<div class="subject-download">
		<a href="<?php the_sub_field('prospectus_download');?>" title="<?php the_sub_field('subject_title');?>"><img src="<?php the_sub_field('subject_image');?>" alt="<?php the_sub_field('subject_title');?>"></a>

	</div>
	<div class="subject-buttons">
	<div class="button-default"><a href="<?php the_sub_field('prospectus_download');?>" title="<?php the_sub_field('subject_title');?>">More information <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></div>
	</div>
</div>

<?php
    endwhile;

else :

    echo 'No Subject Info found';

endif;

?>

<?php 
//the_content();
?>

<?php
$url = $_SERVER['REQUEST_URI'];
$urlSections = explode('/', $url);
$finalBreakdown = explode('-', $urlSections[3]);
$finalCount = count($finalBreakdown) - 1;
$id = $finalBreakdown[$finalCount];

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
         WHERE programmearea = (SELECT programmearea 
								FROM fact_sheets 
								WHERE id = '".$id."')
				AND fact_sheets.id = Offering.CourseInformationID
				AND level != 'Level 1'
		ORDER BY level ASC";

$courses = $wpdb->get_results($sql);

?>

<div id="courses">

<?php

foreach($courses AS $course) {
	?>
	<article class="course-listing the-content">
	<h2><?=$course->factsheetname?></h2>
	<p><?=$course->level?></p>
	<!--Include ID of 16-19 course factsheet page -->
	<div class="button-default"><a href="/<?=$course->course_url?>">Course information</a></div>
  <div class="button-default"><a href="/apply/?courseid=<?=$course->id?>">Apply</a></div>
  </article>
	<?php
}
?>


	
	</section>


	</div>

</div>


</main><!-- #main -->
<?php get_footer(); ?>