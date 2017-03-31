<?php
/* Template Name: SQL TESTING
 * The template for displaying all pages.
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<h1><?php wp_title();?></h1>

			<p>test SQL</p>



      <?php 

      $id = 14890; 

      $sql = "SELECT factsheetname
             FROM Offering
             INNER JOIN fact_sheets
             On Offering.CourseInformationID=fact_sheets.id
             WHERE fact_sheets.id=$id";

    $CourseNameFromID = $wpdb->get_results($sql);?>
 
   <?php $course1 = $CourseNameFromID[0]->factsheetname?>

   <?php echo $course1?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
