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
       url: '/search-test-html/?term='+searchTerm,
       dataType: 'html',
       success: function(data) {
          console.log(data);

          jQuery('#livesearch-results').html(data);
       }
       
    });
  });

});

});
</script>







<select id="search-box" style="width:100%;">
 <option value=""></option>
</select>

<select id="search-box-prog" style="width:100%;" multiple="multiple">
 <option value=""></option>
</select>

<div class="course-finder" style="margin-bottom: 2em; background: #3d3d3c; margin-top: 2em;">

<h2 style="border-bottom: none; color: white; margin-top: 0 !important; padding: 1em;">Course Finder</h2>

  <input type="text" id="livesearch" style="width:100%; padding: 1em;" />

  <div id="livesearch-results"></div> 

</div>

<?php get_search_form(); ?>

</article>

</div>


</div>





</main><!-- #main -->
<?php get_footer(); ?>