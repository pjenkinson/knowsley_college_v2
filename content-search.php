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





<article style="padding-left:0;padding-right:0;" class="the-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
		<?php if ($postType == "post") {?>
	<p><strong>News</strong></p>
<?php }?>

<?php if(has_tag('Course')) {?>
	<p><strong>Course</strong></p>
<?php }?>




	<?php if( get_field('meta_description') ): ?>
  <p><?php  the_field('meta_description'); ?></p>
 <?php endif; ?>

<p><?php the_tags(); ?></p>



<?php if (($post->post_parent)) {?>

<p><i class="fa fa-level-up" aria-hidden="true"></i> <a href="<?php $parentLink = get_permalink($post->post_parent); echo $parentLink; ?>"><?php $parentTitle = get_the_title($post->post_parent); echo $parentTitle; ?></a></p>

<?php }?>




</article><!-- #post-## -->









