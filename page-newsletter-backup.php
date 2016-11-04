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
 <div data-configid="16866665/31887610" class="issuuembed"></div><script type="text/javascript" src="//e.issuu.com/embed.js" async="true"></script>
</div>
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

<h2>Sign up to our newsletter</h2>

<form class="app-form" method="POST" action="" data-parsley-validate>


	<label for="firstName">Name</label>
	<input class="input-inline" type="text" name="firstName" required/>
	<label for="surname">Surname</label>
	<input class="input-inline" type="text" name="surname" required/>
	<label for="email">Email</label>
	<input class="input-inline" type="text" name="email" email/>
	<label for="tel">Phone number</label>
	<input class="input-inline" type="text" name="tel" required/>
	<label for="postCode">Postcode</label>
	<input class="input-inline" type="text" maxlength="8" name="postCode" required/>
	<label for="description">Choose the option that best describes you:</label>
	<select class="input-inline" type="text" name="description" required/>
		<option value="I am a prospective student, 19+">
			I am a prospective student, 19+.
		</option>
		<option value="I am a current KCC student aged 16-18">
			I am a current KCC student aged 16-18
		</option>
		<option value="I am a current KCC student aged 19+">
			I am a current KCC student aged 19+
		</option>
		<option value="I am a parent of a student">
			I am a parent of a student
		</option>
		<option value="I am a parent of a prospective student">
			I am a parent of a prospective student
		</option>
		<option value="I am an employer">
			I am an employer
		</option>
		<option value="I am a member of the community ">
			I am a member of the community 
		</option>
		<option value="I work at a local school">
			I work at a local school
		</option>

	</select>


<input class="submit" type="submit" name="submit" value="Sign up" />

</form>

<?php
  if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $postCode = $_POST['postCode'];
    $description = $_POST['description'];    
  }

?>

<?php

  $sql ="INSERT INTO `newsletter`
												(`firstName`,
											  `surname`,
												`email`,
												`tel`,
												`postCode`,
												`description`
												)
	VALUES
												('$firstName',
													'$surname',
													'$email',
													'$tel',
													'$postCode',
													'$description'
													)";

			$wpdb->query($sql);
?>





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