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
(function (d) {
"use strict";
var widgetScript = d.createElement('script');
widgetScript.id = 'unistats-widget-script';
widgetScript.src = 'http://widget.unistats.ac.uk/js/unistats.widget.js';
var scriptTags = d.getElementsByTagName('script')[0];
if (d.getElementById('unistats-widget-script')) { return; }
scriptTags.parentNode.insertBefore(widgetScript, scriptTags);
} (document));
</script>

<script>

jQuery(function() {
    jQuery( "#tabs" ).tabs();
  }); 

jQuery("li.last-tab a").unbind('click');

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

<div class="full-width-container factsheet-page">

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

  <div class="factsheet-header">

  <div class="factsheet-feature">

  <div class="factsheet-title">
    <h1><?=$factsheet->name?></h1>
    <p><?=$factsheet->level?></p>
  </div>

  <!-- Featured Factsheet IMG 

  <?php $factsheetImg = $factsheet->programmearea ?>

  <?php $factsheetImg = preg_replace("/[^a-zA-Z]+/", "", $factsheetImg);?>

  <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/factsheet_images/<?php echo $factsheetImg ?>.jpg" alt="">

  -->

  </div>

  </div>

  <!-- PDFs -->

  <?php if ($factsheet->id == '14852' or '14856' or '14858' or '14853' or '14855' or '14859' or '14854' or '14862' or '14863' or '14860' or '14850' or '14824' or '14823' or '14857' or '14849' or '14789' ) {?>

  <?php $HEpdf = 0;?>

  <?php if ($factsheet->id == '14852') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnc-early-years.pdf' ;}?>
  <?php if ($factsheet->id == '14858') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnc-biological-sciences.pdf' ;}?>
  <?php if ($factsheet->id == '14853') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnc-business.pdf'; }?>
  <?php if ($factsheet->id == '14859') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnc-computing-systems-development.pdf' ;}?>
  <?php if ($factsheet->id == '14854') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnc-creative-media.pdf' ;}?>
  <?php if ($factsheet->id == '14862') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnc-electrical-engineering.pdf' ;}?>
  <?php if ($factsheet->id == '14860') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnc-manufacturing-engineering.pdf' ;}?>
  <?php if ($factsheet->id == '14850') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnc-sport.pdf' ;}?>
  <?php if ($factsheet->id == '14824') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnd-business.pdf' ;}?>
  <?php if ($factsheet->id == '14823') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnd-computing-systems-development.pdf' ;}?>
  <?php if ($factsheet->id == '14855') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnc-hospitality-management.pdf' ;}?>
  <?php if ($factsheet->id == '14856') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnc-music.pdf' ;}?>
  <?php if ($factsheet->id == '14857') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnd-creative-media.pdf' ;}?>
  <?php if ($factsheet->id == '14849') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnd-sport.pdf' ;}?>
  <?php if ($factsheet->id == '14789') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnd-music.pdf' ;}?>
  <?php if ($factsheet->id == '14863') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnc-mechanical-engineering.pdf' ;}?>  
  <?php }?>


  <!-- Factsheet tabs -->

  <div id="tabs"> 

  <div class="tab-links">  
  <ul class="tab-links-list">
    <li><a href="#about">Course Information</a></li>
    <li><a href="#units">Units</a></li>
    <?php if ($factsheet->programmearea == 'Higher Education') {?><li id="unistats-tab"><a href="#unistats">Unistats</a></li><?php } else {}?>
  </ul>
  <ul class="tab-links-last">
    <?php if ($HEpdf === 0) {?> <?php } else {?>
    <?php if ($factsheet->programmearea == 'Higher Education') {?><li class="last-tab"><a href="<?php echo $HEpdf ?>">Download Factsheet <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></li><?php } else {}?>
    <?php } ?></li>
  </ul>
  </div>

  <div id="about" class="tab-section">

    <?php if (!empty($factsheet->courseabout)) {?>

    <h2>About</h2>
    <p><?=$factsheet->courseabout?></p>

    <?php } else {}; ?>

    <?php if (!empty($factsheet->entryrequirements)) {?>

    <h2>Entry requirements</h2>
    <p><?=$factsheet->entryrequirements?></p>

    <?php } else {}; ?>

    <?php if (!empty($factsheet->duration)) {?>

    <h2>Duration</h2>
    <p><?=$factsheet->duration?></p>

    <?php } else {}; ?>

    <?php if (!empty($factsheet->progression)) {?>

      <h2>Progression and Careers</h2>
    <p><?=$factsheet->progression?></p>

    <?php } else {}; ?>

    <?php if (!empty($factsheet->location)) {?>

    <h2>Study location</h2>
    <p><?=$factsheet->location?></p>

    <?php } else {}; ?>

    <?php if (!empty($factsheet->cost)) {?>

    <h2>Cost</h2>
    <p><?=$factsheet->cost?></p>

    <?php } else {}; ?>

    <?php if (!empty($factsheet->equipment)) {?>

    <h2>Equipment</h2>
    <p><?=$factsheet->equipment?></p>

    <?php } else {}; ?>

  </div>

  <div id="units" class="tab-section">

  <h2>Units you will study include:</h2>
  
  <ul>
    <li><?=$factsheet->unit1?></li>
    <li><?=$factsheet->unit2?></li>
    <li><?=$factsheet->unit3?></li>
    <li><?=$factsheet->unit4?></li>
  </ul>

  </div>

  <?php if ($factsheet->programmearea == 'Higher Education') {?>

  <div id="unistats" class="tab-section">
   
   <h2>Unistats</h2>
   <p>The Key Information Set (KIS) contains the information which students nationally have said they find most useful when making choices about which course to study. Some of the items are measures of student satisfaction from the National Student Survey (NSS), others are from the Destination of Leavers from Higher Education (DLHE) which surveys students who gained a qualification from a university or college, six months after they left.</p>

   <p>Where applicable you can see the KIS data directly on our course pages. You may however choose to use the information on <a href="https://unistats.direct.gov.uk/Institutions/Details/10003708/ReturnTo/Institutions" title="Unistats - Knowsley Community College">Unistats</a> – which allows you to compare data from different Universities and Colleges.</p>
<?php if ( ($factsheet->programmearea == 'Higher Education') && !empty($factsheet->kiscode) ) {?>
<div class="kis-widget" data-institution="10003708FT" data-course="<?=$factsheet->kiscode?>" data-orientation="horizontal" data-language="en-GB"></div>

    <?php 
} else {
  
}?>
 </div>

 <?php } else {}; ?>

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



<?php // APPLY BOX

    if ( ($factsheet->level == 'Level 5') && ($factsheet->programmearea == 'Higher Education') )  {?>

    <div class="the-content">
      <div class="apply-box">
      <h3>Apply</h3>
      <a href="/apply/?courseid=<?=$factsheet->id?>"><p class="apply-box-button"><i class="fa fa-hand-pointer-o"></i> Apply</p></a>
      <p class="apply-box-button" title="UCAS" href="https://www.ucas.com/"><i class="fa fa-hand-pointer-o"></i><a href="http://search.ucas.com/search/results?Vac=1&AvailableIn=2017&ProviderQuery=Knowsley%20Community%20College%2C%20&AcpId=2841&IsFeatherProcessed=True&page=1&providerids=2841"> Apply Full Time</a></p>
      <p><i class="fa fa-phone"></i><a class="tel" href="tel:01514775757"> 0151 477 5757</a></p>
      </div>
    </div>

     <?php 
} elseif ($factsheet->programmearea == 'Apprenticeships') {?>

    <div class="the-content">
      <div class="apply-box">
      <h3>Apply online or call</h3>
      <p class="apply-box-button"><i class="fa fa-hand-pointer-o"></i><a href="<?php the_field('enquiry'); ?>"> Apply</a></p>
      <p><i class="fa fa-phone"></i><a class="tel" href="tel:01514775757"> 0151 477 5757</a></p>
      </div>
    </div>

    <?php 
} elseif ($factsheet->programmearea != 'Apprenticeships') {?>

		<div class="the-content">
			<div class="apply-box">
			<h3>Apply online or call</h3>
			<a href="/apply/?courseid=<?=$factsheet->id?>"><p class="apply-box-button"><i class="fa fa-hand-pointer-o"></i> Apply</p></a>
			<p><i class="fa fa-phone"></i><a class="tel" href="tel:01514775850"> 0151 477 5850</a></p>
			</div>
		</div>
<?php }
   elseif ($factsheet->id == '14861') {?>
   
    <a href="<?php the_field('performance_qualifications_link', 'option'); ?>" title="Performance Qualifications">
    <div class="higher-education-promo the-content">

     <img width="100%" src="<?php the_field('performance_qualifications', 'option'); ?>" alt="Performance Qualifications">

    </div>
    </a>


    <?php 
} else { }?>

    

<!-- Subject Information -->

<?php if ($factsheet->programmearea == 'Hairdressing & Barbering') {?>

<div class="aside-videos">

<div class="youtube-side">  
<iframe width="100%" height="auto" src="https://www.youtube.com/embed/3gtArMLtKN0?rel=0" frameborder="0" allowfullscreen></iframe>
</div> 

</div>
    
<?php } ?>

<?php if ($factsheet->programmearea == 'Construction') {?>

<div class="aside-videos">

<div class="youtube-side">  
<iframe width="100%" height="auto" src="https://www.youtube.com/embed/lgUwqQ6GsjY?rel=0" frameborder="0" allowfullscreen></iframe>
</div>
   
<div class="youtube-side-last">  
<iframe width="100%" height="auto" src="https://www.youtube.com/embed/ehMcShOR15o?rel=0" frameborder="0" allowfullscreen></iframe>
</div>

</div>

<?php } ?>

<?php if ($factsheet->programmearea == 'Creative Media') {
   
// echo 'Creative Media';
    
} ?>

<?php if ($factsheet->programmearea == 'Early Years') {
   
// echo 'Early Years';
    
} ?>

<?php if ($factsheet->programmearea == 'Electrical Engineering') {?>

<div class="aside-videos">

<div class="youtube-side">   
<iframe width="100%" height="auto" src="https://www.youtube.com/embed/oL8tpP3oOyM?rel=0" frameborder="0" allowfullscreen></iframe>
</div>

<div class="youtube-side-last">  
<iframe width="100%" height="auto" src="https://www.youtube.com/embed/ehMcShOR15o?rel=0" frameborder="0" allowfullscreen></iframe>
</div>

</div>
    
<?php } ?>

<?php if ($factsheet->programmearea == 'Engineering & Manufacturing') {?>

<div class="aside-videos">

<div class="youtube-side">  
<iframe width="100%" height="auto" src="https://www.youtube.com/embed/uNa7EJI6IdA?rel=0" frameborder="0" allowfullscreen></iframe>
</div> 

<div class="youtube-side-last">  
<iframe width="100%" height="auto" src="https://www.youtube.com/embed/ehMcShOR15o?rel=0" frameborder="0" allowfullscreen></iframe>
</div>

</div>
    
<?php } ?>

<?php if ( ($factsheet->programmearea == 'Higher Education') && !empty($factsheet->kiscode) ) {?>
   
<div class="kis-widget" data-institution="10003708FT" data-course="<?=$factsheet->kiscode?>" data-orientation="vertical" data-language="en-GB"></div>

  
<?php } ?>

</aside>


		


	</div>

</div>

  


</main><!-- #main -->
<?php get_footer(); ?>