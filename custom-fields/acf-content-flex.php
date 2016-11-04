<!-- FLEXIBLE CONTENT PAGE -->


<!-- TEXT BLOCKS WITH IMAGE -->

<?php

// check if the flexible content field has rows of data
if( have_rows('flexible_content') ):

 	// loop through the rows of data
    while ( have_rows('flexible_content') ) : the_row();

		// check current row layout
        if( get_row_layout() == 'senior_leadership_team' ):

			 	// loop through the rows of data
			    while ( have_rows('slt') ) : the_row();?>

				
<article class="slt-profile slt-profile-1col">

	<div class="slt-image">
		<a href="<?php if ( get_sub_field('custom_url') ) { the_sub_field('custom_url'); } else { the_sub_field('link');} ?>"><img src="<?php the_sub_field('image')?>" alt="<?php the_sub_field('name')?>"></a>
		<p class="slt-member-name"><?php the_sub_field('name')?></p>
	</div>

	<div class="slt-info">
		<p class="slt-member-title"><?php the_sub_field('title')?></p>
	</div>

</article>


<?php endwhile;?>

<!-- ACCORDION -->

<?php elseif( get_row_layout() == 'accordion' ):?>

<!-- Accordion Container -->
<div id="accordion" style="clear:both;">

<!-- 1st Repeater (Accordion Item) -->
<?php while ( have_rows('accordion_item') ) : the_row();?>

<h3><?php the_sub_field('title')?> <i class="fa fa-chevron-circle-down" aria-hidden="true"></i></h3>


    <div class="accordion-content">
     <div>
        <ul>

<!-- 2nd Repeater (Accordion Item Content) -->
<?php if( have_rows('content') ):

 	// loop through the rows of data
    while ( have_rows('content') ) : the_row();?>


<p><?php the_sub_field('text')?></p>

<?php  endwhile;?>

<?php endif;?>

 </ul>
    </div>
    </div>

<?php     endwhile;?>

</div><!-- End of Accordion Container -->

<!-- TEXT BLOCK -->

<?php elseif( get_row_layout() == 'text_block' ):?>


<p class="flex-text-block"><?php the_sub_field('text_block')?></p>

<!-- PAGE GRID -->


<?php elseif( get_row_layout() == 'page_grid' ):?>


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


<!-- QUICK LINKS -->

<?php elseif( get_row_layout() == 'quick_links' ):?>


  <div class="quick-links">
	<h3><?php the_sub_field('quick_links_title');?> <i class="fa fa-link"></i></h3>
	<ul>
		<?php // check current row layout
        if( get_row_layout() == 'quick_links' ):

			 	// loop through the rows of data
			    while ( have_rows('quick_links_items') ) : the_row();?>

			  <li><a href="<?php the_sub_field('page_link');?>"><?php the_sub_field('title');?></a></li>

<?php  endwhile;?>
<?php  endif;?>
</ul>
</div>


<!-- SINGLE PDF (STACKED) -->


<?php elseif( get_row_layout() == 'single_pdf' ):?>

	<?php // check current row layout
        if( get_row_layout() == 'single_pdf' ):

			 	// loop through the rows of data
			    while ( have_rows('single_pdf_stacked') ) : the_row();?>

<div class="single-pdf">

	<div class="pdf-cover"><a href="<?php the_sub_field('link');?>" title="<?php the_sub_field('title');?>"><img src="<?php the_sub_field('pdf_cover');?>" alt="<?php the_sub_field('title');?>"></a> <i class="fa fa-file-pdf-o" aria-hidden="true"></i></div>
	<div class="pdf-title"><a href="<?php the_sub_field('link');?>" title="<?php the_sub_field('title');?>"><?php the_sub_field('title');?></a></div>

</div>

<?php endwhile;?>
<?php endif;?>

<!-- MULTIPLE PDFs (GRID) -->

<?php elseif( get_row_layout() == 'multiple_pdfs' ):?>

<div class="pdf-grid-group-title"><h2><?php the_sub_field('pdf_grid_title');?></h2></div>

<div class="pdf-grid-container">

	<?php // check current row layout
        if( get_row_layout() == 'multiple_pdfs' ):

			 	// loop through the rows of data
			    while ( have_rows('pdf_grid') ) : the_row();?>
	<div class="pdf-item">
		
		<div class="pdf-cover"><a href="<?php the_sub_field('link');?>" title="<?php the_sub_field('title');?>"><img src="<?php the_sub_field('pdf_cover');?>" alt="<?php the_sub_field('title');?>"></a> <i class="fa fa-file-pdf-o" aria-hidden="true"></i></div>
		<div class="pdf-title"><a href="<?php the_sub_field('link');?>" title="<?php the_sub_field('title');?>"><?php the_sub_field('title');?></a></div>
		
	</div>


<?php  endwhile;?>

</div>

<?php  endif;?>

<?php elseif( get_row_layout() == 'pdf_carousel' ):?>

<div class="pdf-grid-group-title"><h2><?php the_sub_field('pdf_carousel_title');?></h2></div>


<script>
jQuery(document).ready(function(){
  jQuery('.owl-carousel').owlCarousel({
    loop:false,
    nav:true,  
    items: 3
})
});
</script>

<div class="owl-carousel">

	<?php // check current row layout
        if( get_row_layout() == 'pdf_carousel' ):

			 	// loop through the rows of data
			    while ( have_rows('pdf_item') ) : the_row();?>

  <div class="pdf-item">
		
		<div class="item pdf-cover"><a href="<?php the_sub_field('link');?>" title="<?php the_sub_field('title');?>"><img src="<?php the_sub_field('pdf_cover');?>" alt="<?php the_sub_field('title');?>"></a> <i class="fa fa-file-pdf-o" aria-hidden="true"></i></div>
		<div class="pdf-title"><a href="<?php the_sub_field('link');?>" title="<?php the_sub_field('title');?>"><?php the_sub_field('title');?></a></div>
		
	</div>

<?php  endwhile;?>

</div>

<?php  endif;?>












<?php 
        endif;?>

<?php     endwhile;

else :?>
  
<?php 
endif;

?>