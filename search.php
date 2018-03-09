<?php get_header(); ?>

<!-- Scroll to top 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'scroll' );?>
	
</header>

<!-- Breadcrumbs
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'breadcrumbs' );?>


<!-- Main content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<main id="main" class="site-main kcc-primary" role="main">


<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="full-width-container one-col-page content-page">


<div class="fixed-container">

<script>
		// LIVE SEARCH WITH HTML OUTPUT

		jQuery(document).ready(function() {

	  jQuery('#livesearch').on('keyup', function(e){

	    var searchTerm = jQuery(this).val();
	    console.log(searchTerm);

	    jQuery.ajax({
	       type: 'GET',
	       url: '/htmllivesearch/?term='+searchTerm,
	       dataType: 'html',
	       data: {
	       	searchTerm: 4
	       },
	       success: function(data) {
	          console.log(data);

	          jQuery('#livesearch-results').html(data);
	       }
	       
	    });
	  });

	  // Adds WP search query to live search text input
	  jQuery('#livesearch').val('<?php echo get_search_query(); ?>').trigger('keyup'); 

	});

</script>

<script>

jQuery(document).ready(function() {

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


</style>

<section class="search-page full-width-container">
<article>

<h1>Search Results</h1>

<p></p>

<h2>Courses</h2>



<!-- COURSE FINDER -->

<div class="course-finder">

  <h2>Course Finder <i class="fa fa-search" aria-hidden="true"></i></h2>
  <p style="">Find a course and apply</p>
  <div class="live-search-container">

    <input type="search" id="livesearch" value="<?php echo get_search_query(); ?>" placeholder="Search for a course" />

    <button id="livesearchbutton">SEARCH</button>
    <button id="showallcourses">VIEW ALL COURSES</button>
  
  </div>

  <div id="livesearch-results">

    <!-- Search Results -->

  </div> 

</div>


<div class="search-results-pages full-width-container">


<?php if ( have_posts() ) : ?>

				<p><?php printf( __( 'Search Results for: %s', 'knowsley_college' ), '<span>' . get_search_query() . '</span>' ); ?></p>



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

				<?php if(has_tag('Course')) {?>

					<article class="the-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h2><?php if(has_tag('Course')) {?>
					<span class="highlight">COURSE:</span>
					<?php } ?>

					<?php the_title() ?></h2>
					<p><?php echo $postType; ?> <?php if ($postType == "Page"){?><i class="fas fa-file"></i><?php } ?></p>

					<p>
					<?php if( get_field('meta_description') ): 
					the_field('meta_description'); 
					endif; ?>
					</p>

					<p><?php the_tags(); ?></p>




					</article><!-- #post-## -->

						
				<?php } ?>





			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

		<!--
		If no results
		-->
		
		<?php endif; ?>
</div>

</article>

	
</section>

		


	</div>

</div>





</main><!-- #main -->
<?php get_footer(); ?>