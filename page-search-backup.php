<?php
/**
* Template Name: Flexible Search Page
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

<style>
.select2-search__field {
  width: 100%;
}

ul.select2-results__options li {
  list-style: none;
}

.select2-selection__placeholder {
  font-size: 2em;
}

.select2-selection__rendered {
  padding: 1em;
}

.select2-container .select2-selection--single  {
  height: auto;
}

/* Stacktable */

.stacktable.small-only {
 display: none;
}

@media (max-width: 900px) {
  #advanced-search-table.stacktable.large-only { display: none; }
  .stacktable.small-only { display: table; } /* Responsive Table */
}


</style>

<script>
jQuery(document).ready(function() {

  jQuery("#search-box").select2({
    placeholder: 'Search for a course...',
    tags: false,
    ajax: {
      url: "/search-test-2/",
      dataType: "json",
      delay: 150,
      data: function (params) {
        return params;
      },
      processResults: function (data, params) {

        return {
          results: data
          
        };
      },
      cache: true
  },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1
    // templateResult: formatRepo, // omitted for brevity, see the source of this page
    // templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
  }).on("select2:select", function (e) { 
      window.location.href="https://www.knowsleycollege.ac.uk/course-finder/factsheet/?factsheet=" + (e.params.data.id);
  });

});

</script>

<script>
jQuery(document).ready(function() {

jQuery("#search-box-prog").select2({
  placeholder: 'Search by curriculum area...',
  ajax: {
    url: "/search-test-2/",
    dataType: "json",
    delay: 150,
    data: function (params) {
      return params;
    },
    processResults: function (data, params) {

      return {
        results: data
        
      };
    },
    cache: true
},
  escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
  minimumInputLength: 1
  // templateResult: formatRepo, // omitted for brevity, see the source of this page
  // templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
}).on("select2:select", function (e) { 
  console.log(e.params.data.id);
  window.location.href="https://www.knowsleycollege.ac.uk/course-finder/factsheet/?factsheet=" + (e.params.data.id);
});


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
          console.log(data);

          jQuery('#livesearch-results').html(data);
       }
       
    });
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