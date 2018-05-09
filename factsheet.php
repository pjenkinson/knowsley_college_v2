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


<!-- Gets factsheet ACF values
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php $factsheetWP = get_field('factsheet_information'); ?>



<!-- Main content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<main id="main" class="site-main kcc-primary" role="main">


<!-- Main content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'branding-flex' );?>

<!-- Main content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'audience' );?>


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
                 course_url,
                 keywords,
                 qualification_type
            FROM fact_sheets
           WHERE id = '".$factsheetID."' ";

  $factsheet = $wpdb->get_results($sql);

  $factsheet = $factsheet[0];       

  ?>



  <div class="factsheet-header">

  <div class="factsheet-feature">

  <div class="fixed-container">

      <div class="factsheet-title">
          <div class="factsheet-title-bg">
            <?php if (!empty($factsheet->name)) {?>
            <h1><?=$factsheet->name?></h1>
            <?php } else {  ?>
            <h1><?php wp_title('');?></h1>
             <?php }?>
            <p>

            <?php if (!empty($factsheet->programmearea)) {?>
               <?=$factsheet->programmearea?>
            <?php 
            } else {?>
              <?php echo $factsheetWP['area'] ?>
            <?php
            }
            ?>

            <?php if (!empty($factsheet->level)) {?>
               | <?=$factsheet->level?>
            <?php 
            } elseif (!empty($factsheetWP->level))  {
              echo '|' . $factsheetWP['level'] ;
            } else {
            }
            ?>
           
            </p>

          </div>
      </div>

  </div>  

  <div class="factsheet-image">
  <?php if( get_field('factsheet_featured_image') ): ?>
    <img src="<?php the_field('factsheet_featured_image');?>" alt="<?=$factsheet->name?>">
  <?php endif; ?>
  
  </div>


    </div>




      </div>


    <div id="tabs"> 

  <div class="tab-links">  

    <div class="fixed-container tab-links-container">

  <ul class="tab-links-list">


   
    <li><a href="#overview" title="Course overview">Course Overview <i class="fa fa-eye" aria-hidden="true"></i></a></li>
    <li><a href="#units" title="Units">Units <i class="fa fa-list-ol" aria-hidden="true"></i></a></li>
    <li><a href="#careers"  title="Careers">Careers <i class="fa fa-map-signs" aria-hidden="true"></i></a></li>
    <!--<li><a href="#print">Print <i class="fa fa-print" aria-hidden="true"></i></a></li>-->
    
    <?php if (!empty($factsheetWP['entry_requirements'])) {?>
    <li><a href="#entry-requirements" title="Entry requirements">Entry Requirements <i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
    <?php }?>
    <?php if (!empty($factsheetWP['course_fees'])) {?>
    <li><a href="#course-fees" title="Course fees">Course Fees <i class="fa fa-gbp" aria-hidden="true"></i></a></li>
    <?php }?>
    
    <?php if ($factsheet->programmearea == 'Higher Education') {?><li id="unistats-tab"><a href="#unistats" title="Unistats">Unistats <i class="fa fa-graduation-cap" aria-hidden="true"></i></a></li><?php }?>

    <li class="apply-tab"><a href="#apply">Apply <i class="fa fa-check-square-o" aria-hidden="true"></i></a></li>
  </ul>


  </div>
  </div>

  <!-- FACTSHEET TABS -->



  <!-- BEGIN OVERVIEW TAB -->

  <div id="overview" class="tab-section">

  

    <div class="full-width-container content-snippet content-snippet-separator"> <!-- Begin Full Width Container -->
      <div class="fixed-container"> <!-- Begin Fixed Container -->

    

    <!-- BEGIN ABOUT SECTION-->

    <section class="content-snippet <?php if( get_sub_field('separator') ): ?><?php echo 'content-snippet-separator'?><?php endif; ?>">
        <div class="two-col-section-main">
        <h2 class="section-heading section-heading-colour">About</h2>
        <?php if (!empty($factsheetWP['about'])) {?>
        <p><?php echo $factsheetWP['about']; ?></p>
        <?php } else if (!empty($factsheet->courseabout)) {  ?>
        <p><?=$factsheet->courseabout?></p>
        <?php }?>
        </div>
        <div class="two-col-section-side two-col-section-image">
          <div class="section-image-container">
          
            <?php the_post_thumbnail();?>

          </div>
        </div>
    </section>

      </div>  <!-- End Fixed Container -->
    </div>  <!-- End Full Width Container -->

    <!-- END ABOUT SECTION -->


    <div class="full-width-container content-snippet content-snippet-separator"> <!-- Begin Full Width Container -->
      <div class="fixed-container"> <!-- Begin Fixed Container -->

      <div class="two-col-section-main">

        <!-- BEGIN DETAILS -->



    <h2 class="section-heading">Entry requirements <i class="fa fa-sign-in" aria-hidden="true"></i></h2>
    <?php if (!empty($factsheetWP['entry_requirements'])) {?>
        <p><?php echo $factsheetWP['entry_requirements']; ?></p>
        <?php } else if (!empty($factsheet->courseabout)) {  ?>
        <p><?=$factsheet->entryrequirements?></p>
        <?php }?>


    <h2 class="section-heading">Finance <i class="fa fa-gbp" aria-hidden="true"></i></h2>
    <?php if (!empty($factsheetWP['finance'])) {?>
        <p><?php echo $factsheetWP['finance']; ?></p>
        <?php } else if (!empty($factsheet->keywords)) {  ?>
        <p><?=$factsheet->keywords?></p>
        <?php }?>

        <?php if (!empty($factsheetWP['assessed'])) {?>

        <h2 class="section-heading">Assessed <i class="fa fa-check-square-o" aria-hidden="true"></i></h2>
    
        <p><?php echo $factsheetWP['assessed']; ?></p>

        <?php }?>




      </div>


      <div class="two-col-section-side">
      

    <h2 class="section-heading">Progression and Careers <i class="fa fa-level-up" aria-hidden="true"></i></h2>
    <?php if (!empty($factsheetWP['progression_and_careers'])) {?>
        <p><?php echo $factsheetWP['progression_and_careers']; ?></p>
        <?php } else if (!empty($factsheet->progression)) {  ?>
        <p><?=$factsheet->progression?></p>
        <?php }?>

    <h2 class="section-heading">Where you will study <i class="fa fa-map-marker" aria-hidden="true"></i></h2>
    <?php if (!empty($factsheetWP['location'])) {?>
        <p><?php echo $factsheetWP['location']; ?></p>
        <?php } else if (!empty($factsheet->location)) { ?>
        <p><?=$factsheet->location?></p>
        <?php }?>

    <h2 class="section-heading">Duration <i class="fa fa-calendar" aria-hidden="true"></i></h2>
    <?php if (!empty($factsheetWP['duration'])) {?>
        <p><?php echo $factsheetWP['duration']; ?></p>
        <?php } else if (!empty($factsheet->duration)) {  ?>
        <p><?=$factsheet->duration?></p>
        <?php }?>


      </div>  

    
       <!-- END DETAILS -->

       </div>  <!-- End Fixed Container -->
    </div>  <!-- End Full Width Container -->


<div class="full-width-container related-courses content-snippet no-print"> <!-- Begin Full Width Container -->
      <div class="fixed-container"> <!-- Begin Fixed Container -->

  <!-- COURSE FINDER SET TO PROGRAMME AREA -->

<h2 class="section-heading text-align-center">More courses</h2>

<p class="text-align-center">If this is not the right course for you, you might be interested in some of our other courses.</p>

<!-- COURSE FINDER -->

<div class="course-finder">

<h2>Course Finder <i class="fa fa-search" aria-hidden="true"></i></h2>
<p style="color:white; margin-left: 1em; margin-bottom: 0;">Search for a course</p>
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

    <div class="full-width-container content-snippet"> <!-- Begin Full Width Container -->
      <div class="fixed-container"> <!-- Begin Fixed Container -->

  <div class="full-width-container content-snippet">  
  <!-- BEGIN UNITS TAB -->

  <h2 class="section-heading">What you will study</h2>
  

  <?php if (!empty($factsheetWP['units'])) {?>
        <?php echo $factsheetWP['units']; ?>
        <?php } else if (!empty($factsheet->unit1)) {  ?>
        <ul>
          <li><?=$factsheet->unit1?></li>
          <li><?=$factsheet->unit2?></li>
          <li><?=$factsheet->unit3?></li>
          <li><?=$factsheet->unit4?></li>
        </ul>

        <?php }?>
    
  </div>

  
 </div>  <!-- End Fixed Container -->
    </div>  <!-- End Full Width Container -->

 </div>


  <div id="careers" class="tab-section">

    <!-- BEGIN CAREERS TAB -->

    <div class="full-width-container content-snippet"> <!-- Begin Full Width Container -->
      <div class="fixed-container"> <!-- Begin Fixed Container -->

    <h2 class="section-heading">Careers</h2>


  <?php if (!empty($factsheetWP['careers'])) {?>
        <?php echo $factsheetWP['careers']; ?>
        <?php } else {  ?>

    <p>You can look into careers in <?php if (!empty($factsheet->programmearea)) {?><?=$factsheet->programmearea?>
            <?php } else {  
             echo $factsheetWP['area'];
            }?>, by visiting <a href="https://nationalcareersservice.direct.gov.uk/job-profiles/home">National Careers Service website <i class="fa fa-external-link-square" aria-hidden="true"></i></a></p>

    <h3>National Careers Service: Job Profiles</h3>

    <p>The <a href="https://nationalcareersservice.direct.gov.uk/job-profiles/home">Job Profiles <i class="fa fa-external-link-square" aria-hidden="true"></i></a> search will give you information on the following:</p>

    <ul>

      <li>the skills and qualifications needed to get into that job</li>
      <li>what the work would be like</li>
      <li>the pay you could expect</li>
      <li>what the career prospects are</li>

    </ul>

    <?php } ?>

     </div>  <!-- End Fixed Container -->
    </div>  <!-- End Full Width Container -->


    <!-- END CAREERS TAB -->

  </div>





<?php if (!empty($factsheetWP['entry_requirements'])) {?>

  <div id="entry-requirements" class="tab-section">

    <!-- BEGIN ENTRY REQUIREMENTS TAB -->

      <div class="full-width-container content-snippet"> <!-- Begin Full Width Container -->
      <div class="fixed-container"> <!-- Begin Fixed Container -->

      <h2 class="section-heading">Entry Requirements</h2>

      

    <?php echo $factsheetWP['entry_requirements']; ?>

       


      

    </div>  <!-- End Fixed Container -->
    </div>  <!-- End Full Width Container -->


    </div>

    <!-- END ENTRY REQUIREMENTS TAB -->

   <?php }  ?>






   <?php if (!empty($factsheetWP['course_fees'])) {?>

  <div id="course-fees" class="tab-section">

    <!-- BEGIN COURSE FEES TAB -->

      <div class="full-width-container content-snippet"> <!-- Begin Full Width Container -->
      <div class="fixed-container"> <!-- Begin Fixed Container -->

      <h2 class="section-heading">Course Fees</h2>

    
        <?php echo $factsheetWP['course_fees']; ?>

      

    </div>  <!-- End Fixed Container -->
    </div>  <!-- End Full Width Container -->


    </div>

    <!-- END COURSE FEES TAB -->

   <?php }  ?>











  <div id="apply" class="tab-section">

    <!-- BEGIN APPLY TAB -->

      <div class="full-width-container content-snippet"> <!-- Begin Full Width Container -->
      <div class="fixed-container"> <!-- Begin Fixed Container -->

      <h2 class="section-heading">Apply</h2>

      <?php if (!empty($factsheetWP['apply'])) {?>
        <?php echo $factsheetWP['apply']; ?>

        <?php } else {  ?>
        <p>To apply for <?php if (!empty($factsheet->name)) {?>
            <strong><?=$factsheet->name?></strong>
            <?php } else {  ?>
            <strong><?php wp_title('');?></strong>
             <?php }?>, use the <a href="/apply/?courseid=<?=$factsheet->id?>" title ="Apply online">online application form</a> or call 0151 477 5850 for more information.</p>

      <p>Once your application has been processed, you will be contacted and given a date for your Interview Evening. Learner Services Advisers and course tutors will be available to speak with you and provide advice, guidance and information about College life.</p>

        <?php }?>

<?php if( get_field('enable_apply_button') ): ?>
<div class="button-default">
        <a href="/apply/?courseid=<?=$factsheet->id?>" title ="Apply">Apply</a>
      </div>
	
<?php endif; ?>


      
      

      </div>

    </div>  <!-- End Fixed Container -->
    </div>  <!-- End Full Width Container -->

    <!-- END APPLY TAB -->


  
  <?php if ($factsheet->programmearea == 'Higher Education') {?> <!-- IMPORTANT: Unistats tab only displays if programme area is equal to 'Higher Education' -->

  <div id="unistats" class="tab-section">

     <!-- BEGIN UNISTATS TAB -->

      <div class="full-width-container content-snippet"> <!-- Begin Full Width Container -->
      <div class="fixed-container"> <!-- Begin Fixed Container -->
   
   <h2>Unistats</h2>
   <p>The Key Information Set (KIS) contains the information which students nationally have said they find most useful when making choices about which course to study. Some of the items are measures of student satisfaction from the National Student Survey (NSS), others are from the Destination of Leavers from Higher Education (DLHE) which surveys students who gained a qualification from a university or college, six months after they left.</p>

   <p>Where applicable you can see the KIS data directly on our course pages. You may however choose to use the information on <a href="https://unistats.direct.gov.uk/Institutions/Details/10003708/ReturnTo/Institutions" title="Unistats - Knowsley Community College">Unistats</a> – which allows you to compare data from different Universities and Colleges.</p>

<?php if ( ($factsheet->programmearea == 'Higher Education') && !empty($factsheet->kiscode) ) {?> <!-- IMPORTANT: KIS code needs to be entered in Pro Solution for widget to display   -->

<iframe id="unistats-widget-frame" title="Unistats KIS Widget" src="https://widget.unistats.ac.uk/Widget/10003708FT/<?=$factsheet->kiscode?>/Horizontal/Small/en-GB" scrolling="no"style="overflow: hidden; border: 0px none transparent; width: 615px; height: 240px;">
</iframe>
    <?php }?>

 </div>  <!-- End Fixed Container -->
    </div>  <!-- End Full Width Container -->

</div>

 <?php } ?>



  <!-- End of tabbed content -->



	


	</div>

</div>

<?php $searchvalue = $factsheet->programmearea; ?>

<?php $searchvaluewp = json_decode(json_encode($factsheetWP['area']),true);?>

<?php if (!empty($searchvaluewp)) { ?>

            <?php $searchvalue = $searchvaluewp;  ?>

            <?php } else { $searchvalue = $factsheet->programmearea; }?>
  
<script>
jQuery(document).ready(function() {
     jQuery('#livesearch').val('<?php echo $searchvalue ?>').trigger('keyup'); 
});     
</script>

</main><!-- #main -->
<?php get_footer(); ?>