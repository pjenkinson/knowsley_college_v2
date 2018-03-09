<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package knowsley_college
 */
?>


<?php $postType = get_post_type();?>




<?php if(!has_tag('Course')) {?>

<article class="the-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h2><?php the_title() ?></h2>
	<p><?php echo $postType; ?> <?php if ($postType == "Page"){?><i class="fas fa-file"></i><?php } ?></p>
	
	<p>
	<?php if( get_field('meta_description') ): 
  the_field('meta_description'); 
  endif; ?>
	</p>

<p><?php the_tags(); ?></p>



	
</article><!-- #post-## -->
<?php }?>