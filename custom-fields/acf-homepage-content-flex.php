<?php
// check if the flexible content field has rows of data
if( have_rows('flexible_homepage') ):

// LEFT CONTENT SNIPPET

     // loop through the rows of data
    while ( have_rows('flexible_homepage') ) : the_row();

        if( get_row_layout() == 'content_snippet_left' ):

        while ( have_rows('content_snippet_left') ) : the_row();
?>


        <section class="full-width-container content-snippet <?php if( get_sub_field('separator') ): ?><?php echo 'content-snippet-separator'?><?php endif; ?>">
			<div class="fixed-container">
<div class="two-col-section-main">
<h2 class="section-heading section-heading-colour"><?php the_sub_field('heading'); ?></h2>
<p><?php the_sub_field('excerpt'); ?></p>
<div class="button-default section-margin-top section-button">
<a href="<?php the_sub_field('page_link'); ?>" title="<?php the_sub_field('heading'); ?>">
Find out more
</a>
</div>
</div>
<div class="two-col-section-side two-col-section-image">
	<div class="section-image-container">
		<a href="<?php the_sub_field('page_link'); ?>" title="<?php the_sub_field('link_title'); ?>">
		<img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('link_title'); ?>">
		</a>
	</div>
</div>
</div>
</section>

<?php

endwhile;

// RIGHT CONTENT SNIPPET

elseif( get_row_layout() == 'content_snippet_right' ):

        while ( have_rows('content_snippet_right') ) : the_row();?>

<section class="full-width-container content-snippet <?php if( get_sub_field('separator') ): ?><?php echo 'content-snippet-separator'?><?php endif; ?>">


<div class="fixed-container">
		<!-- Section -->
		<div class="two-col-section-main two-col-section-image">
			<div class="section-image-container">
				<a href="<?php the_sub_field('page_link'); ?>" title="<?php the_sub_field('heading'); ?>">
				<img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('heading'); ?>">
				</a>
			</div>
		</div>
			<div class="two-col-section-side right-float">
			<h2 class="section-heading section-heading-colour"><?php the_sub_field('heading'); ?></h2>
			<p><?php the_sub_field('excerpt'); ?></p>

			<div class="button-default section-margin-top section-button">
			<a href="<?php the_sub_field('page_link'); ?>" title="<?php the_sub_field('link_title'); ?>">
			Find out more
			</a>
			</div>
		</div>
	</div>

	</section>

<?php endwhile;

elseif( get_row_layout() == 'page_grid' ):?>

     	</div>

<section class="full-width-container section-panels-bg <?php the_sub_field('grid_background'); ?>">
		<section class="fixed-container">
	<div class="page-sections-container">

<?php $courseID = filter_var($_GET['courseid'], FILTER_SANITIZE_NUMBER_INT);  // Gets Course ID selected by user to pull through to application form if required?>


        	<?php while ( have_rows('page_grid') ) : the_row();
?>


 <!-- Thumbnail page section-->
		<div class="page-sections page-sections-3col">
			<a href="<?php if ( is_page( 'apply' ) ) { // Append course ID to ACF page link or URL ?>
    
    <?php the_sub_field('page_link'); ?><?php the_sub_field('permalink'); ?><?php echo '?courseid=' . $courseID ?>" title="<?php the_sub_field('title'); ?>

<?php } else // Use selected page links or URL from ACF ?>

  <?php the_sub_field('page_link'); ?><?php the_sub_field('permalink'); ?>" title="<?php the_sub_field('title'); ?>

">
			<div class="page-image">
				<img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>">
			</div>
				<div class="page-description">
					<div class="heading">
						<h3><?php the_sub_field('title'); ?><i class="fa fa-arrow-circle-o-right link-arrow"></i></h3>
					</div>

			</div>
			</a>
		</div><!-- End of Thumbnail page section-->


<?php endwhile;?>

	</section>
	</section>
	</div>

<?php elseif( get_row_layout() == 'service_opening_times' ):?>


<!-- Test Opening Times-->

<section class="full-width-container opening-times-container">
	<section class="fixed-container">
		<div class="two-col-section-main">
			<h2 class="section-heading section-heading-colour">Opening Times</h2>
			<ul class="service-opening-times">
        <?php while ( have_rows('day_and_time') ) : the_row();?>
				<li><?php the_sub_field('day'); ?>: <?php the_sub_field('opening_time'); ?> - <?php the_sub_field('closing_time'); ?></li>
        <?php endwhile;?>
			</ul>
			</div>
			<div class="two-col-section-side two-col-section-image">
			<div class="section-image-container">
			<img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('link_title'); ?>">
			</div>
    </div>
	</section>
</section>

<?php elseif( get_row_layout() == 'course_list' ):?>




 <?php

 // COURSE LIST

 $acfprogarea = get_sub_field('programme_area'); // Gets selected programme area - List of programme area needs to be updated through ACF
 

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
           WHERE programmearea = '$acfprogarea'";

  $factsheets = $wpdb->get_results($sql);

  ?>


</div>

<section class="full-width-container section-panels-bg">
		<section class="fixed-container">
	<div class="page-sections-container">

<h2 class="section-heading"><?php the_sub_field('course_list_title'); ?></h2>


<?php foreach($factsheets AS $factsheet) {?>




<div class="factsheet-snippet">
    <h3><?=$factsheet->name?></h3>
    <p><?=$factsheet->level?></p>
    <p><?=$factsheet->courseabout?></p>
    <div class="button-default"><a href="/?page_id=1789&factsheet=<?=$factsheet->id?>">Course information</a></div>
  <div class="button-default"><a href="/apply/?courseid=<?=$factsheet->id?>">Apply</a></div>
  </div>



	<?php
}
?>

<div class="factsheet-snippet-more-courses">
	<div class="button-default section-button"><a href="">More Courses</a></div>
</div>

</section>
	</section>
	</div>



<?php elseif( get_row_layout() == 'campuses' ):?>

	<div class="campus-sections" style="clear:both;">

	<?php while ( have_rows('campus_info') ) : the_row();?>

	<div class="contact-sections">
		<div class="page-image">
			<img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>">
			<div class="heading">
					<h3><?php the_sub_field('title'); ?></h3>
				</div>
		</div>
			<div class="page-description">
				<p><i class="fa fa-phone"></i><a href="tel:<?php the_sub_field('telephone'); ?>"><?php the_sub_field('telephone'); ?></a></p>
				<p><i class="fa fa-envelope"></i></i><a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a></p>
				<address>
					<?php the_sub_field('address'); ?>
				</address>

				<div class="opening-hours">
					<ul>
						<?php if( have_rows('opening_hours') ): ?>
						<?php while( have_rows('opening_hours') ): the_row(); ?>
						<li><?php the_sub_field('opening_hours_line'); ?></li>
						<?php endwhile; ?>
						<?php endif; ?>
					</ul>

				</div>

		</div>


		<div class="more-campus">
			<a href="<?php the_sub_field('campus_link'); ?>" title="<?php the_sub_field('title'); ?>">
					<p>More <i class="fa fa-arrow-circle-o-right"></i></p>
			</a>
		</div>
	</div><!-- End of Thumbnail page section-->

<?php     endwhile;?>

</div>


<?php elseif( get_row_layout() == 'google_map_full_width' ):?>

</div>


<?php $text = get_sub_field('info'); //?>

<script>
    function MainCampus() {
  map.setCenter(new google.maps.LatLng(53.428737, -2.8593184));
  map.setZoom(16);
}
function Kirkby() {
  map.setCenter(new google.maps.LatLng(53.4810983, -2.8934299));
  map.setZoom(16);
}
function IAMT() {
  map.setCenter(new google.maps.LatLng(53.4260583, -2.8615826));
  map.setZoom(17);
}
    </script>


 


<div class="map-container full-width-container">


   

<div id="map" style="height: 100%; clear:both;"></div>
   

</div>
    <script>

    var locations = [
      ['<h4>Main Campus</h4>', 53.428737, -2.8593184],
      ['<h4>Kirkby Campus</h4>', 53.4810983, -2.8934299],
      ['<h4>Main Campus: Institute of Advanced Manufacturing and Technology</h4>', 53.4260583, -2.8615826]
    ];
    
    // Setup the different icons and shadows
    var iconURLPrefix = '<?php echo get_bloginfo('template_directory');?>/images/icons/';
    
    var icons = [
      iconURLPrefix + 'main-campus.png',
      iconURLPrefix + 'kirkby.png',
      iconURLPrefix + 'iamt.png'
    ]

    var iconsLength = icons.length;

    var map = new google.maps.Map(document.getElementById('map'), {
    			zoom: 16,
    			center: new google.maps.LatLng(53.4287376, -2.8593184),
          mapTypeId: 'terrain',
          navigationControl: false,
    			mapTypeControl: false,
    			scaleControl: false,
    			scrollwheel: false
    });

    var infowindow = new google.maps.InfoWindow({
      maxWidth: 400
    });

    var markers = new Array();
    
    var iconCounter = 0;
    
    // Add the markers and infowindows to the map
    for (var i = 0; i < locations.length; i++) {  
      var marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        icon: icons[iconCounter]
      });

      markers.push(marker);

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
      
      iconCounter++;
      // We only have a limited number of possible icon colors, so we may have to restart the counter
      if(iconCounter >= iconsLength) {
      	iconCounter = 0;
      }
    }
    
    
    </script>

    <div>

    <div class="map-links full-width-container">
 		<div class="fixed-container">
    <div class="map-link main-campus"><a href="javascript:MainCampus()">Main Campus <img width="32px" height="22px" style="width:32px; height:22px; display:inline-block;" src="<?php echo get_bloginfo('template_directory');?>/images/icons/main-campus.png?>"></a></div>
    <div class="map-link iamt"><a href="javascript:IAMT()"><abbr title="Institute of Advanced Manufacturing and Technology">Main Campus: IAMT</abbr><img width="32px" height="22px" style="width:32px; height:22px; display:inline-block;" src="<?php echo get_bloginfo('template_directory');?>/images/icons/iamt.png?>"></a></div>
    <div class="map-link kirkby"><a href="javascript:Kirkby()">Kirkby Campus<img width="32px" height="22px" style="width:32px; height:22px; display:inline-block;" src="<?php echo get_bloginfo('template_directory');?>/images/icons/kirkby.png?>"></a></div>
    </div>

    </div>


<?php elseif( get_row_layout() == 'pdf_feature_left' ):?>


<section class="full-width-container white-background pdf-feature-container">
<div class="fixed-container">
<div class="pdf-feature-content">
<h2 class="section-heading section-heading-colour"><?php the_sub_field('heading'); ?></h2>
<p><?php the_sub_field('excerpt'); ?></p>

<div class="button-default section-margin-top section-button">
<a href="<?php the_sub_field('pdf'); ?>" title="<?php the_sub_field('heading'); ?>">View Menu</a>
</div>
</div>
<div class="pdf-feature-img">
  <div class="section-image-container">
    <a href="<?php the_sub_field('pdf'); ?>" target="_blank" title="<?php the_sub_field('heading'); ?>">
    <img src="<?php the_sub_field('pdf_image'); ?>" alt="<?php the_sub_field('heading'); ?>">
    </a>
  </div>
</div>
</div>
</section>

<!-- ACCORDION -->

<?php elseif( get_row_layout() == 'accordion' ):?>

<!-- Accordion Container -->

<section class="full-width-container accordion-container">
  <div class="fixed-container">
<div id="accordion" style="clear:both;">

<!-- 1st Repeater (Accordion Item) -->
<?php while ( have_rows('accordion_item') ) : the_row();?>

<h3><?php the_sub_field('title')?> <i class="fa fa-chevron-circle-down" aria-hidden="true"></i></h3>


    <div class="accordion-content">
     <div>
        <ul>

<!-- 2nd Repeater (Accordion Item Content) -->
<?php if( have_rows('content') ):

  // loop through the rows of data
    while ( have_rows('content') ) : the_row();?>


<p><?php the_sub_field('text')?></p>

<?php  endwhile;?>

<?php endif;?>

 </ul>
    </div>
    </div>

<?php     endwhile;?>

</div><!-- End of Accordion Container -->

</section>
</div>



</div>

<!-- -->

<?php elseif( get_row_layout() == 'slider' ):?>

<script>
jQuery(document).ready(function(){
    jQuery('.slider').flickity({
    // options
    cellAlign: 'left',
    contain: true
  });
});
</script>

<section class="full-width-container content-slider-container">
  <div class="fixed-container">

<div class="slider">
<?php // check current row layout
if( get_row_layout() == 'slider' ):

// loop through the rows of data
while ( have_rows('slide') ) : the_row();?>

<div class="carousel-cell"><img src="<?php the_sub_field('image');?>" alt="" title=""></div>

<?php  endwhile;?>
</div>

</div>
</div>

<?php  endif;?>

<!-- -->


<!-- END -->

<?php 
        endif;?>

<?php     endwhile;

else :?>
  
<?php 
endif;

?>