<?php
/**
* Template Name: SEO Friendly Factsheet
*/
get_header(); ?>




<script>
  jQuery(function() {
      jQuery( "#tabs" ).tabs();
    }); 

  jQuery("li.last-tab a").unbind('click');
</script>

<script>

// jQuery LIVE SEARCH WITH HTML OUTPUT

jQuery(document).ready(function() {

  jQuery('#livesearch').on('keyup', function(e){

    var searchTerm = jQuery(this).val();
    console.log(searchTerm);

    jQuery.ajax({
       type: 'GET',
       url: '/htmllivesearch/?term='+searchTerm,
       dataType: 'html',
       success: function(data) {
          // console.log(data);
          jQuery('#livesearch-results').html(data);

           // jQuery('html, body').animate({
            //  scrollTop: jQuery("#livesearch-results").offset().top
           //}, 4000);

       }
       
    });
  });

});

var livesearchvalue = '';

jQuery(document).ready(function() {

  console.log(livesearchvalue);

  jQuery('#livesearch').bind('keypress', function(e) {
    if(e.keyCode==13){
        var livesearchvalue = jQuery( "#livesearch" ).val();
        window.location.href="/?s=" + livesearchvalue;
    }
});


var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();
    

jQuery( "#livesearchbutton" ).click(function() {
  var livesearchvalue = jQuery( "#livesearch" ).val();
  window.location.href="/?s=" + livesearchvalue;
});

jQuery( "#showallcourses" ).click(function() {
  var livesearchvalue = jQuery( "a" ).val();
  window.location.href="/?s=" + livesearchvalue;
});

});

</script>

</header>

<!-- Breadcrumbs
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'breadcrumbs' );?>


<!-- Main content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<main id="main" class="site-main kcc-primary" role="main">


<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="full-width-container factsheet-page">


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

  // Get Factsheet ID from ACF Field
  $factsheetID = get_field('factsheet_id');

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
                 kiscode,
                 course_url
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

  <div class="fixed-container">

      <div class="factsheet-title">
          <div class="fixed-container factsheet-title-bg">
            <h1><?=$factsheet->name?></h1>
            <p><?=$factsheet->programmearea?>: <span class="highlight-text"><?=$factsheet->level?></span></p>

          </div>
      </div>

  </div>  

  <div class="factsheet-image">
  <?php $factsheetImg = $factsheet->programmearea ?>

  <?php $factsheetImg = preg_replace("/[^a-zA-Z]+/", "", $factsheetImg);?>

  <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/factsheet_images/<?php echo $factsheetImg ?>.jpg" alt="">
    </div>

  


    </div>




      </div>


    <div id="tabs"> 

  <div class="tab-links">  

    <div class="fixed-container">

  <ul class="tab-links-list">
    <li><a href="#overview">Course Overview <i class="fa fa-eye" aria-hidden="true"></i></a></li>
    <li><a href="#units">Units <i class="fa fa-list-ol" aria-hidden="true"></i></a></li>
    <li><a href="#careers">Careers <i class="fa fa-briefcase" aria-hidden="true"></i></a></li>
    <li><a href="#print" onclick="window.print();">Print <i class="fa fa-print" aria-hidden="true"></i></a></li>
    <li class="apply-tab"><a href="#apply" onclick="location.href = '/apply/?courseid=<?=$factsheet->id?>';">Apply <i class="fa fa-check-square-o" aria-hidden="true"></i></a></li>
    
    <?php if ($factsheet->programmearea == 'Higher Education') {?><li id="unistats-tab"><a href="#unistats">Unistats</a></li><?php } else {}?>
  </ul>

  <ul class="tab-links-last">
    <?php if ($HEpdf === 0) {?> <?php } else {?>
    <?php if ($factsheet->programmearea == 'Higher Education') {?><li class="last-tab"><a href="<?php echo $HEpdf ?>">Download Factsheet <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></li><?php } else {}?>
    <?php } ?></li>
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


  <!-- FACTSHEET TABS -->

  <!-- BEGIN OVERVIEW TAB -->

  <div id="overview" class="tab-section">

  

    <div class="full-width-container"> <!-- Begin Full Width Container -->
      <div class="fixed-container"> <!-- Begin Fixed Container -->

    <?php if (!empty($factsheet->courseabout)) {?>

    <!-- BEGIN ABOUT SECTION-->

    <section class="content-snippet <?php if( get_sub_field('separator') ): ?><?php echo 'content-snippet-separator'?><?php endif; ?>">
        <div class="two-col-section-main">
        <h2 class="section-heading section-heading-colour">About</h2>
        <p><?=$factsheet->courseabout?></p>
        </div>
        <div class="two-col-section-side two-col-section-image">
          <div class="section-image-container">
          <img src="http://192.168.99.100:8000/wp-content/themes/KCC2/images/factsheet_images/ArtDesign.jpg" alt="<?=$factsheet->title?>">
          </div>
        </div>
    </section>

      </div>  <!-- End Fixed Container -->
    </div>  <!-- End Full Width Container -->

    <!-- END ABOUT SECTION -->

    <?php } ?>


    <div class="full-width-container factsheet-details"> <!-- Begin Full Width Container -->
      <div class="fixed-container"> <!-- Begin Fixed Container -->

      <div class="two-col-section-main factsheet-details-text">

        <!-- BEGIN DETAILS -->

          <h2>Details</h2>

        <?php if (!empty($factsheet->entryrequirements)) {?>

    <h3>Entry requirements <i class="fa fa-sign-in" aria-hidden="true"></i></h3>
    <p><?=$factsheet->entryrequirements?></p>

    <?php } else {}; ?>

    <?php if (!empty($factsheet->duration)) {?>

    <h3>Duration <i class="fa fa-calendar" aria-hidden="true"></i></h3>
    <p><?=$factsheet->duration?></p>

    <?php } else {}; ?>

    <?php if (!empty($factsheet->progression)) {?>

      <h3>Progression and Careers <i class="fa fa-level-up" aria-hidden="true"></i></h3>
    <p><?=$factsheet->progression?></p>

    <?php } else {}; ?>

    <?php if (!empty($factsheet->location)) {?>

    <h3>Where you will study <i class="fa fa-map-marker" aria-hidden="true"></i></h3>
    <p><?=$factsheet->location?></p>

    <?php } else {}; ?>

      </div>

      <div class="two-col-section-side">
        <!-- YouTube Embed v5.0.3 -->
        <div style="max-width: 548px; width: 100%;">
          <div class="youtube-embed ye-container" itemprop="video" itemscope itemtype="https://schema.org/VideoObject">
            <meta itemprop="url" content="https://www.youtube.com/v/7CUCEDEO7Tw" />
            <meta itemprop="name" content="National Apprenticeship Week Roundup 2017" />
            <meta itemprop="description" content="National Apprenticeship Week Roundup 2017" />
            <meta itemprop="uploadDate" content="2017-03-10T15:51:41+00:00" />
            <meta itemprop="thumbnailUrl" content="https://i.ytimg.com/vi/3aWG6P1gR94/default.jpg" />
            <meta itemprop="embedUrl" content="https://www.youtube.com/embed/7CUCEDEO7Tw" />
            <meta itemprop="height" content="416" />
            <meta itemprop="width" content="740" />
            <iframe style="border: 0; width: 100%;" class="youtube-player" height="300" src="https://www.youtube.com/embed/7CUCEDEO7Tw" allowfullscreen ></iframe>
          </div>
      </div>
<!-- End of YouTube Embed code. Generated in 0.00227 seconds -->
      </div>

       <!-- END DETAILS -->

       </div>  <!-- End Fixed Container -->
    </div>  <!-- End Full Width Container -->


<div class="full-width-container related-courses content-snippet"> <!-- Begin Full Width Container -->
      <div class="fixed-container"> <!-- Begin Fixed Container -->

  <!-- COURSE FINDER SET TO PROGRAMME AREA -->

<h2 class="section-heading text-align-center">Related courses</h2>

<p class="text-align-center">If this is not the course for you, you might be interested in some of our other <?=$factsheet->programmearea?> courses.</p>

<!-- COURSE FINDER -->

<div class="course-finder">

<h2>Course Finder <i class="fa fa-search" aria-hidden="true"></i></h2>
<p style="color:white; margin-left: 1em; margin-bottom: 0;">Find a course and apply</p>
  <div class="live-search-container">

  <input type="search" id="livesearch" value="" placeholder="Search for a course" />

  <button id="livesearchbutton">SEARCH</button>
  <button id="showallcourses">VIEW ALL COURSES</button>

  </div>

  <div id="livesearch-results">

  <!-- Search Results -->

  </div> 

</div>

<!-- END OF COURSE FINDER -->
 

 </div>  <!-- End Fixed Container -->
    </div>  <!-- End Full Width Container -->


  </div> <!-- END OF OVERVIEW TAB -->
    

  <div id="units" class="tab-section">

    <div class="full-width-container related-courses content-snippet"> <!-- Begin Full Width Container -->
      <div class="fixed-container"> <!-- Begin Fixed Container -->

  <div class="full-width-container content-snippet">  
  <!-- BEGIN UNITS TAB -->

  <h2>Units you will study include:</h2>
  
  <ul>
    <li><?=$factsheet->unit1?></li>
    <li><?=$factsheet->unit2?></li>
    <li><?=$factsheet->unit3?></li>
    <li><?=$factsheet->unit4?></li>
  </ul>

  </div>


  </div>

  <?php if ($factsheet->programmearea == 'Higher Education') {?>

  <div id="unistats" class="tab-section">
   
   <h2>Unistats</h2>
   <p>The Key Information Set (KIS) contains the information which students nationally have said they find most useful when making choices about which course to study. Some of the items are measures of student satisfaction from the National Student Survey (NSS), others are from the Destination of Leavers from Higher Education (DLHE) which surveys students who gained a qualification from a university or college, six months after they left.</p>

   <p>Where applicable you can see the KIS data directly on our course pages. You may however choose to use the information on <a href="https://unistats.direct.gov.uk/Institutions/Details/10003708/ReturnTo/Institutions" title="Unistats - Knowsley Community College">Unistats</a> – which allows you to compare data from different Universities and Colleges.</p>
<?php if ( ($factsheet->programmearea == 'Higher Education') && !empty($factsheet->kiscode) ) {?>
<iframe id="unistats-widget-frame" title="Unistats KIS Widget" src="https://widget.unistats.ac.uk/Widget/10003708FT/<?=$factsheet->kiscode?>/Horizontal/Small/en-GB" scrolling="no"style="overflow: hidden; border: 0px none transparent; width: 615px; height: 240px;">
</iframe>
    <?php 
} else {
  
}?>
 </div>

 <?php } else {}; ?>

 </div>  <!-- End Fixed Container -->
    </div>  <!-- End Full Width Container -->




  <div id="careers" class="tab-section">

    <!-- BEGIN CAREERS TAB -->

    <div class="full-width-container related-courses content-snippet"> <!-- Begin Full Width Container -->
      <div class="fixed-container"> <!-- Begin Fixed Container -->

    <h2>Careers</h2>

    <p>You can look into careers in <?=$factsheet->programmearea?>, by visiting <a href="https://nationalcareersservice.direct.gov.uk/job-profiles/home">National Careers Service website <i class="fa fa-external-link-square" aria-hidden="true"></i></a></p>

    <h3>National Careers Service: Job Profiles</h3>

    <p>The <a href="https://nationalcareersservice.direct.gov.uk/job-profiles/home">Job Profiles <i class="fa fa-external-link-square" aria-hidden="true"></i></a> search will give you information on the following:</p>

    <ul>

      <li>the skills and qualifications needed to get into that job</li>
      <li>what the work would be like</li>
      <li>the pay you could expect</li>
      <li>what the career prospects are</li>

    </ul>

    

     </div>  <!-- End Fixed Container -->
    </div>  <!-- End Full Width Container -->


    <!-- END CAREERS TAB -->

  </div>

  <div id="print" class="tab-section">

    <!-- BEGIN PRINT TAB -->

    <div class="full-width-container related-courses content-snippet"> <!-- Begin Full Width Container -->
      <div class="fixed-container"> <!-- Begin Fixed Container -->

      <div class="full-width-container content-snippet">

        <h2>Print Factsheet</h2>

        <h3><?=$factsheet->name?></h3>
        <p><a href="#print" onclick="window.print();">Print factsheet <i class="fa fa-print" aria-hidden="true"></i></a></p>

      </div>

      <!-- END PRINT TAB -->

  </div>


  <div id="apply" class="tab-section">

    <!-- BEGIN APPLY TAB -->

      <div class="full-width-container content-snippet">

      <h2>Apply</h2>

      <p>To apply for <strong><?=$factsheet->name?></strong>, use the online application form or call 0151 477 5850 for more information.</p>

      <p>Once your application has been processed, you will be contacted and given a date for your Interview Evening. Learner Services Advisers will be available to speak with you and provide advice, guidance and information about College life.</p>

      <div class="button-default">
        <a href="#apply">Apply</a>
      </div>

      </div>

  </div>

    <!-- END APPLY TAB -->

  <!-- End of tabbed content -->
	


	</div>

</div>

  
<script>
jQuery(document).ready(function() {
     jQuery('#livesearch').val('<?=$factsheet->programmearea?>').trigger('keyup'); 
});     
</script>

</main><!-- #main -->
<?php get_footer(); ?>