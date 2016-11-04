<?php
/**
* Template Name: Sidebar navigation page 
* @package knowsley_college
*/
get_header(); ?>
	
</header>

<!-- Breadcrumbs
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div class="full-width-container primary-breadcrumbs">
	<div class="fixed-container">
		<div id="breadcrumbs">
			<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
				<?php if(function_exists('bcn_display'))
				{
				bcn_display();
				}?>
			</div>
		</div>
	</div>
</div>

<!-- Main content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<main id="main" class="site-main" role="main">


<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="full-width-container default-page">

	<div class="fixed-container">

	<section>

		<h1><?php echo get_the_title(); ?></h1>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

<?php the_content();?>

<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>
	
	</section>


	<aside>


	<h2>Documents</h2>

		<ul>
		<li><a href="#"><i class="fa fa-file-pdf-o"></i>PDF document</a></li>
		<li><a href="#"><i class="fa fa-file-pdf-o"></i>PDF document</a></li>
		<li><a href="#"><i class="fa fa-file-pdf-o"></i>PDF document</a></li>
		<li><a href="#"><i class="fa fa-file-pdf-o"></i>PDF document</a></li>
		<li><a href="#"><i class="fa fa-file-pdf-o"></i>PDF document</a></li>
		<li><a href="#"><i class="fa fa-file-pdf-o"></i>PDF document</a></li>
	</ul>

	<h2>Related pages</h2>

	<ul>
		<li><a href="#">Item link</a></li>
		<li><a href="#">Item link</a></li>
		<li><a href="#">Item link</a></li>
		<li><a href="#">Item link</a></li>
		<li><a href="#">Item link</a></li>
		<li><a href="#">Item link</a></li>
	</ul>

	</aside>

		


	</div>


</div>



</main><!-- #main -->
<?php get_footer(); ?