<?php
/**
* Template Name: Course Finder
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

<article class="full-width-container the-content">

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


jQuery('#livesearch').keyup(function() {
    delay(function(){
      jQuery('html, body').stop(true, false).animate({
      scrollTop: jQuery("#livesearch-results").offset().top
      }, 1500);
    }, 1800 );
});
    

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




<!-- COURSE FINDER -->

<div class="course-finder">

  <h2>Course Finder <i class="fa fa-search" aria-hidden="true"></i></h2>
  <p style="color:white; margin-left: 1em; margin-bottom: 0;">Find a course and apply</p>
  <div class="live-search-container">

    <input type="search" id="livesearch" value="<?php echo get_search_query(); ?>" placeholder="Search for a course" />

    <button id="livesearchbutton">SEARCH</button>
    <button id="showallcourses">VIEW ALL COURSES</button>
  
  </div>

  <div id="livesearch-results">

    <!-- Search Results -->

  </div> 

</div>






</article>

</div>


</div>





</main><!-- #main -->
<?php get_footer(); ?>