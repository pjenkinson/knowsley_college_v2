<?php
/**
* Template Name: Course finder
*
* @package knowsley_college
*/
get_header(); ?>

<!-- Scroll to top 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'scroll' );?>

<!-- Course URL 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'script', 'courseurl-course-finder' );?>
	
</header>

<!-- Breadcrumbs
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'breadcrumbs' );?>


<!-- Main content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<main id="main" class="site-main" role="main">


<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="full-width-container">

	<div class="fixed-container">

<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<aside>

</aside>

<section>

<article class="the-content">

<h1>404: Page not found <i class="fa fa-thumbs-o-down"></i></h1>

<p>You are on this page because we can't find the page you are looking for. If you typed the address, please check the URL to make sure there are no errors. Otherwise try searching the website or use the website navigation.</p>

<div><?php get_search_form(); ?></div>


</article>




	
	</section>

		


	</div>

</div>





</main><!-- #main -->
<?php get_footer(); ?>