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


<aside>
<!-- Secondary Navigation
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'flex-secondary' );?>
</aside>

<section>

<script>
 jQuery(".js-select2").each(function() {
    jQuery(this).select2({
       placeholder: jQuery(this).attr('placeholder')
   });
 });
</script>

<article class="single-article the-content">

<script>
jQuery(document).ready(function() {

jQuery(".search-box").select2({
  ajax: {
    url: "/search-test-2/",
    dataType: 'json',
    placeholder: "Text...",
    delay: 150,
    allowClear: true,
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

})
</script>


<select class="search-box" style="width: 100%;">

</select>


</article>


	
	</section>

		


	</div>

</div>





</main><!-- #main -->
<?php get_footer(); ?>