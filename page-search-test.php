<?php
/**
* Template Name: Search Test
* Content Page
*
* @package knowsley_college
*/

if(isset($_GET['term'])) {
 $searchTerm = filter_var($_GET['term'], FILTER_SANITIZE_STRING);

     $sql = "SELECT id, factsheetname as name
               FROM fact_sheets
              WHERE factsheetname LIKE '%".$searchTerm."%'
              LIMIT 20";

     $courses = $wpdb->get_results($sql);

     foreach ($courses as $courses) {
          $results[] = array('id' => $courses->id, 
                              'label' => $courses->name, 
                              'value' => $courses->name);
     }

     echo json_encode($results);

     exit;
} 

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

<!-- Start of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>


<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'content', 'featured-banner-has-parent' );?>


<aside>
<!-- Secondary Navigation
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'about' );?>
</aside>

<section>

<article class="the-content">

<?php the_content();?>

<!-- Live Search Script
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'script', 'livesearch' );?>


</article>

<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>

<!-- End of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	
	</section>

		


	</div>

</div>





</main><!-- #main -->
<?php get_footer(); ?>