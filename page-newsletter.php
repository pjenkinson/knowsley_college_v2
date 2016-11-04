<?php
/**
* Template Name: Newsletter
* Content Page
*
* @package knowsley_college
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



<article class="clearLeft">

	<h2>Latest Newsletter</h2>

<div class="issuu-pdf-viewer">
<div data-configid="16866665/36103237" style="width:525px; height:371px;" class="issuuembed"></div>
<script type="text/javascript" src="//e.issuu.com/embed.js" async="true"></script></div>
</article>

<article class="clearLeft">

<h2>Download newsletters</h2>
<?php

// check if the repeater field has rows of data
if( have_rows('newsletter_issues') ):

?>
<ul class="resources-list">
	<?php

 	// loop through the rows of data
    while ( have_rows('newsletter_issues') ) : the_row();
?>
	<li><a href="<?php the_sub_field('newsletter_pdf');?>"><?php the_sub_field('newsletter_title');?> <i class="fa fa-file-pdf-o"></i><?php if( get_sub_field('newsletter_cover') ): ?>
        <img src="<?php the_sub_field('newsletter_cover');?>" alt="<?php the_sub_field('newsletter_title');?>"><?php endif; ?></a></li>
	<?php
    endwhile;?>
</ul>
<?php else :?>

<p>Sorry, we currently have no newsletters available</p>

<?php endif;?>


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