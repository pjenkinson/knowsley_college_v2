
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

  <!-- Career Coach -->

  <?php if ($factsheet->id ==  '14676' or '14677' or '14678' or '14679' or '14680' or '14681' or '14682' or '14683' or '14685' or '14694' or '14695' or '14696' or '14697' or '14704' or '14705' or '14708' or '14711' or '14713' or '14716' or '14718' or '14719' or '14720' or '14721' or '14724' or '14725' or '14726' or '14727' or '14729' or '14730' or '14731' or '14732' or '14734' or '14735' or '14737' or '14738' or '14739' or '14740' or '14741' or '14742' or '14743' or '14744' or '14746' or '14747' or '14748' or '14750' or '14752' or '14753' or '14754' or '14757' or '14758' or '14762' or '14765' or '14766' or '14767' or '14772' or '14773' or '14774' or '14775' or '14776' or '14777' or '14778' or '14779' or '14780' or '14783' or '14786' or '14788' or '14789' or '14790' or '14791' or '14792' or '14793' or '14794' or '14795' or '14796' or '14797' or '14798' or '14799' or '14801' or '14811' or '14812' or '14816' or '14817' or '14822' or '14823' or '14824' or '14830' or '14837' or '14838' or '14839' or '14847' or '14849' or '14850' or '14852' or '14853' or '14854' or '14855' or '14856' or '14857' or '14858' or '14859' or '14860' or '14861' or '14862' or '14863' or '14865' or '14866') {?>

  <?php $careerid = 0;?>

  <?php if ($factsheet->id == '14968') { $careerid = '756968' ;} // BTEC Foundation Diploma in Art and Design ?>
  <?php if ($factsheet->id == '14967') { $careerid = '756926' ;} // BTEC Nationals in Art & Design ?>
  <?php if ($factsheet->id == '14968') { $careerid = '756968' ;} // BTEC Foundation Diploma in Art and Design ?>
  <?php if ($factsheet->id == '14986') { $careerid = '757043' ;} // Level 2 - City & Guilds NVQ Diploma in Professional Cookery ?>
  <?php if ($factsheet->id == '15018') { $careerid = '756956' ;} // BTEC First Extended Certificate in Information and Creative Technology ?>
  <?php if ($factsheet->id == '14908') { $careerid = '756938' ;} // BTEC Nationals in IT ?>

  <?php if ($factsheet->id == '14942') { $careerid = '756992' ;} // City & Guilds Extended Certificate in Construction Skills ?>
  <?php if ($factsheet->id == '14974') { $careerid = '756977' ;} // BTEC Diploma in Creative Media Production ?>
  <?php if ($factsheet->id == '14975') { $careerid = '756929' ;} // BTEC Nationals in Creative Media Production ?>
  <?php if ($factsheet->id == '14932') { $careerid = '756986' ;} // CACHE Certificate in an Introduction to Early Years Education and Care ?>
  <?php if ($factsheet->id == '14936') { $careerid = '757001' ;} // CACHE Certificate in Childcare and Education ?>
  <?php if ($factsheet->id == '14956') { $careerid = '757013' ;} // Level 1 - EAL Diploma in Electrical Installation ?>
  <?php if ($factsheet->id == '14957') { $careerid = '757016' ;} // Level 2 - EAL Diploma in Electrical Installation ?>
  <?php if ($factsheet->id == '14958') { $careerid = '757019' ;} // Level 3 - EAL Diploma in Electrical Installation ?>
  <?php if ($factsheet->id == '14955') { $careerid = '756989' ;} // EAL Certificate in Engineering and Technology ?>
  <?php if ($factsheet->id == '14949') { $careerid = '757022' ;} // EAL Diploma in Engineering and Technology - Mechanical ?>
  <?php if ($factsheet->id == '14959') { $careerid = '757025' ;} // EAL Diploma in Engineering Technology - Fabrication and Welding  ?>
  <?php if ($factsheet->id == '14954') { $careerid = '756932' ;} // EAL Diplomas in Engineering Technologies  ?>
  <?php if ($factsheet->id == '14976') { $careerid = '757073' ;} // VTCT Diploma in Hairdressing  ?>
  <?php if ($factsheet->id == '14978') { $careerid = '757076' ;} // Level 3 - VTCT Diploma in Hairdressing ?>
  <?php if ($factsheet->id == '15015') { $careerid = '757040' ;} // CACHE Diploma in Introduction to Health, Social Care and Children’s and Young People’s Settings ?>
  <?php if ($factsheet->id == '15014') { $careerid = '757034' ;} // Level 2 - CACHE Diploma in Health and Social Care ?>
  <?php if ($factsheet->id == '14921') { $careerid = '756935' ;} // BTEC Nationals in Health and Social Care ?>
  <?php if ($factsheet->id == '15013') { $careerid = '757037' ;} // Level 3 - CACHE Diploma in Health and Social Care ?>
  <?php if ($factsheet->id == '15029') { $careerid = '756959' ;} // BTEC First Extended Certificate in Music ?>
  <?php if ($factsheet->id == '15027') { $careerid = '756941' ;} // BTEC Nationals in Music Performance ?>
  <?php if ($factsheet->id == '15034') { $careerid = '756962' ;} // BTEC First Extended Certificate in Performing Arts, Level 2 ?>
  <?php if ($factsheet->id == '15038') { $careerid = '757067' ;} // Higher National Diploma in Performing Arts ?>

  <?php if ($factsheet->id == '15052') { $careerid = '757085' ;} // BTEC Combined Sport and Public Services ?>
  <?php if ($factsheet->id == '15041') { $careerid = '756920' ;} // BTEC Extended Certificate Public Service ?>

  <?php if ($factsheet->id == '14866') { $careerid = '' ;} // HNC Diploma in Performing Arts ?>

  <?php } else echo ''?>

  <!-- Factsheet tabs -->

  <div id="tabs"> 

  <div class="tab-links">  
  <ul class="tab-links-list">
    <li><a href="#about">Course information</a></li>
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

<?php if ($factsheet->id == '14861') {?>
   
    <a href="<?php the_field('performance_qualifications_link', 'option'); ?>" title="Performance Qualifications">
    <div class="higher-education-promo the-content">

     <img width="100%" src="<?php the_field('performance_qualifications', 'option'); ?>" alt="Performance Qualifications">

    </div>
    </a>


    <?php 
} else {


  
}?>

    

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

<?php if (!empty($careerid)) {?>
<div class="emsi-widget">

<iframe id="ge_<?php echo $careerid ?>" scrolling="auto" frameborder="0" border="0"  width="100%" src="https://knowsleycollege.emsicareercoach.co.uk/coursewidgets/?CourseID=<?php echo $careerid ?>" ></iframe>

</div>
<?php }?>

</aside>


		


	</div>

</div>

  


</main><!-- #main -->
<?php get_footer(); ?>