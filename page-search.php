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

<article class="single-article the-content">

<script>
jQuery(document).ready(function() {

jQuery(".search-box").select2({
  ajax: {
    url: "/search-test-2/",
    placeholder: "Search for a course",
    dataType: 'json',
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
  console.log(e.params.data.text);
  console.log(e.params.data.level)
});

})
</script>


<select class="search-box" style="width: 100%; list-style:none;"></select>


</article>


	
	</section>

		


	</div>

</div>





</main><!-- #main -->
<?php get_footer(); ?>