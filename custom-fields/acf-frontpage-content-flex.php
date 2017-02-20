<?php

// check if the flexible content field has rows of data
if( have_rows('flexible_frontpage') ):

// LEFT CONTENT SNIPPET

     // loop through the rows of data
    while ( have_rows('flexible_frontpage') ) : the_row();

        if( get_row_layout() == 'content_snippet_left' ):

        while ( have_rows('content_snippet_left') ) : the_row();
?>


        
<section class="full-width-container content-snippet <?php the_sub_field('section_branding'); ?> <?php if( get_sub_field('separator') ): ?><?php echo 'separator'?><?php endif; ?>">
  <div class="fixed-container">
    <div class="two-col-section-main">
      <h2 class="section-heading section-heading-colour"><?php the_sub_field('heading'); ?></h2>
      <p><?php the_sub_field('excerpt'); ?></p>
      <div class="button-default section-margin-top section-button">
      <a href="<?php the_sub_field('page_link'); ?>" title="<?php the_sub_field('heading'); ?>">
      Find out more
      </a>
      </div>
    </div>
    <div class="two-col-section-side two-col-section-image">
      <div class="section-image-container">
      <a href="<?php the_sub_field('page_link'); ?>" title="<?php the_sub_field('link_title'); ?>">
      <img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('link_title'); ?>">
      </a>
      </div>
    </div>
  </div>
</section>


<?php

endwhile;

// RIGHT CONTENT SNIPPET

elseif( get_row_layout() == 'content_snippet_right' ):

        while ( have_rows('content_snippet_right') ) : the_row();?>

<section class="full-width-container content-snippet <?php the_sub_field('section_branding'); ?> <?php if( get_sub_field('separator') ): ?><?php echo 'separator'?><?php endif; ?>">

<div class="fixed-container">
		<!-- Section -->
		<div class="two-col-section-main two-col-section-image">
			<div class="section-image-container">
				<a href="<?php the_sub_field('page_link'); ?>" title="<?php the_sub_field('heading'); ?>">
				<img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('heading'); ?>">
				</a>
			</div>
		</div>
			<div class="two-col-section-side right-float">
			<h2 class="section-heading section-heading-colour"><?php the_sub_field('heading'); ?></h2>
			<p><?php the_sub_field('excerpt'); ?></p>

			<div class="button-default section-margin-top section-button">
			<a href="<?php the_sub_field('page_link'); ?>" title="<?php the_sub_field('link_title'); ?>">
			Find out more
			</a>
			</div>
		</div>
	</div>

	</section>


<?php endwhile;

elseif( get_row_layout() == 'page_grid' ):?>

     	</div>

<section class="full-width-container section-panels-bg <?php the_sub_field('grid_background'); ?>">
		<section class="fixed-container">
	<div class="page-sections-container">


        	<?php while ( have_rows('page_grid') ) : the_row();
?>

 <!-- Thumbnail page section-->
		<div class="page-sections page-sections-3col">
			<a href="<?php the_sub_field('page_link'); ?><?php the_sub_field('permalink'); ?>" title="<?php the_sub_field('title'); ?>">
			<div class="page-image">
				<img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>">
			</div>
				<div class="page-description">
					<div class="heading">
						<h3><?php the_sub_field('title'); ?><i class="fa fa-arrow-circle-o-right link-arrow"></i></h3>
					</div>

			</div>
			</a>
		</div><!-- End of Thumbnail page section-->


<?php endwhile;?>

	</section>
	</section>

<?php elseif( get_row_layout() == 'promo_slider' ):?>


<section class="full-width-container promo-slider-container">

<div class="fixed-container" style="overflow:hidden;">

<div class="promo-carousel" style="position:relative;">

<?php while( have_rows('promo_slide') ): the_row(); ?>

  <div class="carousel-cell">
  	<div class="fixed-container carousel-content">

    </div>
    <a href="<?php the_sub_field('slide_link'); ?>" title="<?php the_sub_field('slide_title'); ?>"><img src="<?php the_sub_field('slide_image'); ?>" alt="<?php the_sub_field('slide_title'); ?>" title="<?php the_sub_field('slide_title'); ?>"></a>


  </div>


 <?php endwhile;?>

  </div>



	</section>
	</section>


	</div>


<!-- END -->

<?php 
        endif;?>

<?php     endwhile;

else :?>
  
<?php 
endif;

?>