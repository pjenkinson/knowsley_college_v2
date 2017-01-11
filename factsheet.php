
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

  <?php if ($factsheet->id == '14676') { $careerid = '756896' ;}?>
  <?php if ($factsheet->id == '14677') { $careerid = '756893' ;}?>
  <?php if ($factsheet->id == '14678') { $careerid = '756863' ;}?>
  <?php if ($factsheet->id == '14679') { $careerid = '756869' ;}?>
  <?php if ($factsheet->id == '14680') { $careerid = '756914' ;}?>
  <?php if ($factsheet->id == '14681') { $careerid = '756983' ;}?>
  <?php if ($factsheet->id == '14682') { $careerid = '757004' ;}?>
  <?php if ($factsheet->id == '14683') { $careerid = '757007' ;}?>
  <?php if ($factsheet->id == '14685') { $careerid = '757028' ;}?>
  <?php if ($factsheet->id == '14694') { $careerid = '756884' ;}?>
  <?php if ($factsheet->id == '14695') { $careerid = '756890' ;}?>
  <?php if ($factsheet->id == '14696') { $careerid = '756908' ;}?>
  <?php if ($factsheet->id == '14697') { $careerid = '756938' ;}?>
  <?php if ($factsheet->id == '14704') { $careerid = '756905' ;}?>
  <?php if ($factsheet->id == '14705') { $careerid = '757001' ;}?>
  <?php if ($factsheet->id == '14708') { $careerid = '756935' ;}?>
  <?php if ($factsheet->id == '14711') { $careerid = '756866' ;}?>
  <?php if ($factsheet->id == '14713') { $careerid = '756887' ;}?>
  <?php if ($factsheet->id == '14716') { $careerid = '756911' ;}?>
  <?php if ($factsheet->id == '14718') { $careerid = '756980' ;}?>
  <?php if ($factsheet->id == '14719') { $careerid = '756986' ;}?>
  <?php if ($factsheet->id == '14720') { $careerid = '756998' ;}?>
  <?php if ($factsheet->id == '14721') { $careerid = '' ;} //Certificate in youth work practice?>
  <?php if ($factsheet->id == '14724') { $careerid = '757046' ;}?>
  <?php if ($factsheet->id == '14725') { $careerid = '756992' ;}?>
  <?php if ($factsheet->id == '14726') { $careerid = '757052' ;}?>
  <?php if ($factsheet->id == '14727') { $careerid = '757049' ;}?>
  <?php if ($factsheet->id == '14729') { $careerid = '756872' ;}?>
  <?php if ($factsheet->id == '14730') { $careerid = '756878' ;}?>
  <?php if ($factsheet->id == '14731') { $careerid = '756899' ;}?>
  <?php if ($factsheet->id == '14732') { $careerid = '757022' ;}?>
  <?php if ($factsheet->id == '14734') { $careerid = '756875' ;}?>
  <?php if ($factsheet->id == '14735') { $careerid = '756902' ;}?>
  <?php if ($factsheet->id == '14737') { $careerid = '756932' ;}?>
  <?php if ($factsheet->id == '14738') { $careerid = '756989' ;}?>
  <?php if ($factsheet->id == '14739') { $careerid = '757013' ;}?>
  <?php if ($factsheet->id == '14740') { $careerid = '757016' ;}?>
  <?php if ($factsheet->id == '14741') { $careerid = '757019' ;}?>
  <?php if ($factsheet->id == '14742') { $careerid = '757025' ;}?>
  <?php if ($factsheet->id == '14743') { $careerid = '' ;} // NVQ Diploma in Engineering Maintenance?>
  <?php if ($factsheet->id == '14744') { $careerid = '' ;} // NVQ Diploma in Engineering Manufacture?>
  <?php if ($factsheet->id == '14746') { $careerid = '756926' ;}?>
  <?php if ($factsheet->id == '14747') { $careerid = '756968' ;}?>
  <?php if ($factsheet->id == '14748') { $careerid = '756860' ;}?>
  <?php if ($factsheet->id == '14750') { $careerid = '' ;} // GCSE Maths?>
  <?php if ($factsheet->id == '14752') { $careerid = '756977' ;}?>
  <?php if ($factsheet->id == '14753') { $careerid = '756929' ;}?>
  <?php if ($factsheet->id == '14754') { $careerid = '757031' ;}?>
  <?php if ($factsheet->id == '14757') { $careerid = '757043' ;}?>
  <?php if ($factsheet->id == '14758') { $careerid = '' ;} // Diploma in Advanced Professional Cookery?>
  <?php if ($factsheet->id == '14762') { $careerid = '756881' ;}?>
  <?php if ($factsheet->id == '14765') { $careerid = '756857' ;}?>
  <?php if ($factsheet->id == '14995') { $careerid = '756854' ;} // Access to Higher Education - Health Professions?>
  <?php if ($factsheet->id == '14767') { $careerid = '756851' ;}?>
  <?php if ($factsheet->id == '14772') { $careerid = '' ;} // Certificate in Understanding the Care and Management of Diabetes?>
  <?php if ($factsheet->id == '14773') { $careerid = '' ;} // Certificate in the Principles of the Prevention and Control of Infection in Health Care Settings?>
  <?php if ($factsheet->id == '14774') { $careerid = '' ;} // Certificate in the Principles of Dementia Care?>
  <?php if ($factsheet->id == '14775') { $careerid = '' ;} // Certificate in Understanding Dignity and Safeguarding in Adult Health and Social Care?>
  <?php if ($factsheet->id == '14776') { $careerid = '' ;} // Certificate in Understanding the Safe Handling of Medicines?>
  <?php if ($factsheet->id == '14777') { $careerid = '' ;} // Certificate in Principles of Working with Individuals with Learning Disabilities?>
  <?php if ($factsheet->id == '14778') { $careerid = '757037' ;}?>
  <?php if ($factsheet->id == '14779') { $careerid = '757034' ;}?>
  <?php if ($factsheet->id == '14780') { $careerid = '757040' ;}?>
  <?php if ($factsheet->id == '14783') { $careerid = '756956' ;}?>
  <?php if ($factsheet->id == '14786') { $careerid = '756941' ;}?>
  <?php if ($factsheet->id == '14788') { $careerid = '756959' ;}?>
  <?php if ($factsheet->id == '14789') { $careerid = '757064' ;}?>
  <?php if ($factsheet->id == '14790') { $careerid = '757010' ;}?>
  <?php if ($factsheet->id == '14791') { $careerid = '756917' ;}?>
  <?php if ($factsheet->id == '14792') { $careerid = '756962' ;}?>
  <?php if ($factsheet->id == '14793') { $careerid = '757067' ;}?>
  <?php if ($factsheet->id == '14794') { $careerid = '756947' ;}?>
  <?php if ($factsheet->id == '14795') { $careerid = '756944' ;}?>
  <?php if ($factsheet->id == '14796') { $careerid = '' ;} // Certificate in Cleaning and Support Services Skills}?>
  <?php if ($factsheet->id == '14797') { $careerid = '756920' ;}?>
  <?php if ($factsheet->id == '14798') { $careerid = '756950' ;}?>
  <?php if ($factsheet->id == '14799') { $careerid = '756953' ;}?>
  <?php if ($factsheet->id == '14801') { $careerid = '756923' ;}?>
  <?php if ($factsheet->id == '14811') { $careerid = '757085' ;}?>
  <?php if ($factsheet->id == '14812') { $careerid = '756965' ;}?>
  <?php if ($factsheet->id == '14816') { $careerid = '' ;} // Pathway to Employment - Entry 2?>
  <?php if ($factsheet->id == '14817') { $careerid = '757082' ;}?>
  <?php if ($factsheet->id == '14822') { $careerid = '756995' ;}?>
  <?php if ($factsheet->id == '14823') { $careerid = '756974' ;}?>
  <?php if ($factsheet->id == '14824') { $careerid = '757064' ;}?>
  <?php if ($factsheet->id == '14830') { $careerid = '757073' ;}?>
  <?php if ($factsheet->id == '14837') { $careerid = '757076' ;}?>
  <?php if ($factsheet->id == '14838') { $careerid = '757070' ;}?>
  <?php if ($factsheet->id == '14839') { $careerid = '757061' ;}?>
  <?php if ($factsheet->id == '14847') { $careerid = '' ;} // Pathway to Employment - Entry 3?>
  <?php if ($factsheet->id == '14849') { $careerid = '' ;} // HND Diploma in Sport  (Coaching and Development)?>
  <?php if ($factsheet->id == '14850') { $careerid = '' ;} // HNC in Sport  (Coaching and Development)?>
  <?php if ($factsheet->id == '14852') { $careerid = '' ;} // HNC Diploma in Advanced Practice in Early Years Education?>
  <?php if ($factsheet->id == '14912') { $careerid = '756971' ;}?>
  <?php if ($factsheet->id == '14854') { $careerid = '' ;} // HNC Diploma in Creative Media Production?>
  <?php if ($factsheet->id == '14855') { $careerid = '' ;} // HNC Diploma in Hospitality Management?>
  <?php if ($factsheet->id == '14856') { $careerid = '' ;} // HNC Diploma in Music?>
  <?php if ($factsheet->id == '14857') { $careerid = '' ;} // HND Diploma in Creative Media Production?>
  <?php if ($factsheet->id == '14858') { $careerid = '' ;} // HNC Diploma in Biological Sciences for Industry?>
  <?php if ($factsheet->id == '14859') { $careerid = '' ;} // HNC Diploma in Computing and Systems Development?>
  <?php if ($factsheet->id == '14860') { $careerid = '' ;} // HNC Diploma in Manufacturing Engineering?>
  <?php if ($factsheet->id == '14861') { $careerid = '757067' ;}?>
  <?php if ($factsheet->id == '14862') { $careerid = '' ;} // HNC Diploma in Electrical and Electronic Engineering?>
  <?php if ($factsheet->id == '14863') { $careerid = '' ;} // HNC Diploma in Mechanical Engineering?>
  <?php if ($factsheet->id == '14865') { $careerid = '756998' ;}?>
  <?php if ($factsheet->id == '14866') { $careerid = '' ;} // HNC Diploma in Performing Arts?>

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