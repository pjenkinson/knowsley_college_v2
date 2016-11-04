<?php
/**
* Template Name: Governors minutes
*
* @package knowsley_college
*/
get_header(); ?>

  <script>
jQuery(document).ready(function($) {
    $(function() {
    $( "#accordion" ).accordion(
    {
     heightStyle: "content"
    }
    );
  });
 }); 
 </script>  

 <style>




 </style>



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

<div class="full-width-container secondary-page">

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
<?php get_template_part( 'navigation', 'governors' );?>
</aside>

<section>

<article class="wp-content the-content">

<?php the_content();?>


<div id="accordion">

        <?php 

                // check for rows (parent repeater)
                if( have_rows('accordiontab') ): ?>
        
                    <?php 

                    // loop through rows (parent repeater)
                    while( have_rows('accordiontab') ): the_row(); ?>

  <h3><?php the_sub_field('heading'); ?> <i class="fa fa-arrow-circle-o-down"></i></h3>
  <div>
    <div class="accordion-content">
     <div>
        <ul>
            <?php 

                // check for rows (parent repeater)
                if( have_rows('minutes') ): ?>

                <?php 

                    // loop through rows (parent repeater)
                    while( have_rows('minutes') ): the_row(); ?>
            <li><a href="<?php the_sub_field('pdf'); ?>"><?php the_sub_field('title'); ?> <i class="fa fa-file-pdf-o"></i></a></li>
            <?php endwhile; ?>

    <?php endif; ?>
        </ul>
    </div>
    </div>
  </div>

  <?php endwhile; ?>

    <?php endif; ?>

</div>

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