<?php
/**
* Template Name: Flexible Course Page - Adult (Access)
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
<?php get_template_part( 'branding-flex-secondary' );?>


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

<section>

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
	<div class="button-default"><a href="#courses" title="View courses">View courses</a></div>
	<div class="button-default"><a href="<?php the_sub_field('prospectus_download');?>" title="<?php the_sub_field('subject_title');?>">Download subject information <i class="fa fa-arrow-circle-o-down"></i></a></div>
	</div>
</div>

<?php
    endwhile;

else :'';

endif;

?>

<?php 
//the_content();
?>

<?php
$url = $_SERVER['REQUEST_URI'];
$urlSections = explode('/', $url);
$finalBreakdown = explode('-', $urlSections[2]);
$finalCount = count($finalBreakdown) - 1;
$id = $finalBreakdown[$finalCount];

      $sql = 	"SELECT DISTINCT id,
               programmearea,
               factsheetname, 
               courseabout,
               entryrequirements,
               level
          FROM fact_sheets 
          INNER JOIN Offering
         	   On Offering.CourseInformationID=fact_sheets.id
         WHERE level != 'Level 1' /* Level 1 Courses not included for Adults */ AND programmearea = (SELECT programmearea 
								FROM fact_sheets 
								WHERE id = '".$id."')
				AND fact_sheets.id = Offering.CourseInformationID	
		ORDER BY level ASC";

$courses = $wpdb->get_results($sql);

?>


<?php

foreach($courses AS $course) {
	?>
	<article class="course-listing the-content">
	<h2><?=$course->factsheetname?></h2>
	<div class="course-level"><?=$course->level?></div>
	<p><?=$course->courseabout?></p>
	<!--Include ID of 16-19 course factsheet page -->
	<div class="button-default"><a href="/?page_id=1789&factsheet=<?=$course->id?>">Course information</a></div>
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