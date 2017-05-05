<?php

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
<main id="main" class="site-main" role="main">


<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="full-width-container secondary-page content-page">

	<div class="fixed-container">

<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->


<aside>
<!-- Secondary Navigation
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

</aside>


<script>
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

	  jQuery('#livesearch').val('<?php echo get_search_query(); ?>').trigger('keyup'); 


	});
  

</script>


<section class="search-page">




<article>



<div class="course-finder" style="margin-bottom: 2em; background: #3d3d3c; margin-top: 2em;">

<h2 style="border-bottom: none; color: white; margin-top: 0 !important; padding: 0.6em;">Course Finder</h2>
	
	<div class="" style="padding:1em; maring: 0;">
  <input type="search" id="livesearch" style="width:100%;" value="<?php echo get_search_query(); ?>" />
	</div>
  <div id="livesearch-results"></div> 

</div>





<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'knowsley_college' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

</article>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

		<!--
		If no results
		-->
		
		<?php endif; ?>

	
</section>

		


	</div>

</div>





</main><!-- #main -->
<?php get_footer(); ?>