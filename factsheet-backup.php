<?php
/**
* Template Name: New Factsheet
* Content Page
*
* @package knowsley_college
*/
get_header(); ?>

<!-- Scroll to top 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'scroll' );?>

<script>
jQuery(function() {
    jQuery( "#tabs" ).tabs();
  }); 
</script>
	
</header>

<!-- Breadcrumbs
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'breadcrumbs' );?>


<!-- Main content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<main id="main" class="site-main" role="main">


<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="full-width-container factsheet-page content-page">

	<div class="fixed-container">

<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<!-- Start of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>


<section>

<?php if( get_field('tagline') ): ?>

<!-- Homepage tagline and intro paragraph
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'acf', 'homepage-tagline' );?>

<?php endif; ?>

<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>

<!-- End of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

 <!-- Factsheet section -->

  <?php
  $factsheetID = filter_var($_GET['factsheet'], FILTER_SANITIZE_NUMBER_INT);

  $sql = "SELECT id, 
                 factsheetname AS name, 
                 courseabout,
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
                 unit4
            FROM fact_sheets
           WHERE id = '".$factsheetID."'";

  $factsheet = $wpdb->get_results($sql);

  $factsheet = $factsheet[0];

  $sql = "SELECT unit
            FROM fact_sheet_units
           WHERE CourseInformationID = '".$factsheetID."'";

  $units = $wpdb->get_results($sql);

  $units = $units[0];
  ?>


  <div class="factsheet-header">

  <div class="factsheet-feature">

  <img src="<?php echo get_bloginfo('template_directory');?>/images/course-factsheets/music.jpg" alt=""></img>

  <div class="factsheet-title">
    <h1><?=$factsheet->name?></h1>
    <p><?=$factsheet->level?></p>
  </div>

  </div>

   <div class="share-bar">



    <ul>
      <li><a href="#">Share this page</a></li>
      <li><a href="#"><i class="fa fa-print"></i></a></li>
      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
      <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
    </ul>

  </div>


  </div>

  <!-- Factsheet tabs -->

  <div id="tabs"> 

  <div class="tab-links">  
  <ul class="tab-links-list">
    <li><a href="#about">Course information</a></li>
    <li><a href="#units">Units</a></li>
  </ul>
  </div>

  <div id="about" class="tab-section">
    <h3>About</h3>
    <p><?=$factsheet->courseabout?></p>

    <?php if ($factsheet->programmearea == 'Apprenticeships') {?>

        <?php 
} else {?>

    <h3>Entry requirements</h3>
    <p><?=$factsheet->entryrequirements?></p>
<?php }?>

    <?php if ($factsheet->programmearea == 'Apprenticeships') {?>

        <?php 
} else {?>

    <h3>Duration</h3>
    <p><?=$factsheet->duration?></p>
<?php }?>

    <h3>Assessment</h3>
    <p><?=$factsheet->assessment?></p>

    <?php if ($factsheet->programmearea == 'Apprenticeships') {?>


    <?php 
} else {?>

  <h3>Progression and Careers</h3>
    <p><?=$factsheet->progression?></p>
  
<?php }?>

<?php if ($factsheet->programmearea == 'Apprenticeships') {?>


    <?php 
} else {?>

    <h3>Study location</h3>
    <p><?=$factsheet->location?></p>
<?php }?>

  </div>

  <div id="units" class="tab-section">

  <h3>Units</h3>
  
  <ul>
    <li><?=$factsheet->unit1?></li>
    <li><?=$factsheet->unit2?></li>
    <li><?=$factsheet->unit3?></li>
    <li><?=$factsheet->unit4?></li>
  </ul>

  </div>

  </div> 
  <!-- End of tabbed content -->

  <?php if ($factsheet->programmearea == 'Apprenticeships') {?>

  <div class="factsheet-content-apply">
    <a href="<?php the_field('enquiry'); ?>" title="Apply for <?=$factsheet->name?>">Apply</a>
  </div>

   <?php 
} else {?>

  <div class="factsheet-content-apply">
    <a href="/apply/?courseid=<?=$factsheet->id?>" title="Apply for <?=$factsheet->name?>">Apply</a>
  </div>
  
<?php }?>

	
	
	</section>

	<aside>

    <?php if ($factsheet->programmearea == 'Apprenticeships') {?>

    <div class="the-content">
      <div class="apply-box">
      <h3>Apply online or call</h3>
      <a href="<?php the_field('enquiry'); ?>"><p class="apply-box-button"><i class="fa fa-hand-pointer-o"></i> Apply</p></a>
      <p><i class="fa fa-phone"></i><a class="tel" href="tel:01514775757"> 0151 477 5757</a></p>
      </div>
    </div>

    <?php 
} else {


  
}?>

    <?php if ($factsheet->programmearea != 'Apprenticeships') {?>

		<div class="the-content">
			<div class="apply-box">
			<h3>Apply online or call</h3>
			<a href="/apply/?courseid=<?=$factsheet->id?>"><p class="apply-box-button"><i class="fa fa-hand-pointer-o"></i> Apply</p></a>
			<p><i class="fa fa-phone"></i><a class="tel" href="tel:01514775850"> 0151 477 5850</a></p>
			</div>
		</div>

    <?php 
} else {
  
}?>

    <?php if ($factsheet->programmearea == 'Higher Education') {?>
   
    <a href="<?php the_field('performance_qualifications_link', 'option'); ?>" title="Performance Qualifications">
    <div class="higher-education-promo the-content">

     <img src="<?php the_field('performance_qualifications', 'option'); ?>" alt="Performance Qualifications">

    </div>
    </a>


    <?php 
} else {


  
}?>

<!-- Subject Information -->

  <?php if ($factsheet->programmearea == 'Access') {
   
// echo 'Access';
    
} ?>

  <?php if ($factsheet->programmearea == 'Accounting') {
   
// echo 'Accounting';
    
} ?>

 <?php if ($factsheet->programmearea == 'Apprenticeships') {
   
// echo 'Apprenticeships';
    
} ?>

 <?php if ($factsheet->programmearea == 'Art & Design') {
   
// echo 'Art & Design';
    
} ?>

 <?php if ($factsheet->programmearea == 'Beauty Therapy') {
   
// echo 'Beauty Therapy';
    
} ?>

 <?php if ($factsheet->programmearea == 'Catering & Hospitality') {
   
// echo 'Catering & Hospitality';
    
} ?>

<?php if ($factsheet->programmearea == 'Computing & IT') {
   
// echo 'Computing & IT';
    
} ?>

<?php if ($factsheet->programmearea == 'Construction') {
   
// echo 'Construction';
    
} ?>

<?php if ($factsheet->programmearea == 'Creative Media') {
   
// echo 'Creative Media';
    
} ?>

<?php if ($factsheet->programmearea == 'Early Years') {
   
// echo 'Early Years';
    
} ?>

<?php if ($factsheet->programmearea == 'Electrical Engineering') {
   
// echo 'Electrical Engineering';
    
} ?>

<?php if ($factsheet->programmearea == 'Engineering & Manufacturing') {
   
// echo 'Engineering & Manufacturing';
    
} ?>

<?php if ($factsheet->programmearea == 'English & Maths') {
   
// echo 'English & Maths';
    
} ?>

<?php if ($factsheet->programmearea == 'GCSEs') {
   
// echo 'GCSEs';
    
} ?>

<?php if ($factsheet->programmearea == 'Hairdressing & Barbering') {
   
// echo 'Hairdressing & Barbering';
    
} ?>

<?php if ($factsheet->programmearea == 'Health & Social Care') {
   
// echo 'Health & Social Care';
    
} ?>

<?php if ($factsheet->programmearea == 'Higher Education') {
   
// echo 'Higher Education';
    
} ?>

<?php if ($factsheet->programmearea == 'Music') {
   
// echo 'Music';
    
} ?>

<?php if ($factsheet->programmearea == 'Performing Arts') {
   
// echo 'Performing Arts';
    
} ?>

<?php if ($factsheet->programmearea == 'Public Services') {
   
// echo 'Public Services';
    
} ?>

<?php if ($factsheet->programmearea == 'Science') {
   
// echo 'Science';
    
} ?>

<?php if ($factsheet->programmearea == 'Sport') {
   
// echo 'Sport';
    
} ?>

<?php if ($factsheet->programmearea == 'Supported Learning') {
   
// echo 'Supported Learning';
    
} ?>

<?php if ($factsheet->programmearea == 'Travel and Tourism') {
   
// echo 'Travel and Tourism';
    
} ?>

<?php if ($factsheet->programmearea == 'Workforce Training') {
   
// echo 'Workforce Training';
    
} ?>

	</aside>



		


	</div>

</div>





</main><!-- #main -->
<?php get_footer(); ?>