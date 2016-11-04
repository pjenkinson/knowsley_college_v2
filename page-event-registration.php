<?php
/**
* Template Name: Event Registration
* Content Page
*
* @package knowsley_college
*/
get_header(); ?>

<!-- Scroll to top 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'scroll' );?>

<script>

jQuery( document ).ready(function() {

	bindDatePicker()

 });

function bindDatePicker() {
	jQuery( ".datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '1940:2016',
        dateFormat: 'yy-mm-dd'
    });
}
</script>

<style>
input[type=checkbox] {
	clear: none;
	margin-bottom: 1em;
	vertical-align: bottom;
}

.app-form label.checkbox-label {
	width: auto;
	margin-top: 0px;
	padding-right: 1em;
}

</style>
	
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


<article class="the-content">

<h1>Reserve your place for 2016 Taster Workshops</h1>

<?php 
$errors = array();
$checkboxerrors = array();
$firstName = $surname = $email = $tel = $course = $DateOfBirth = $postCode = $keepingwarm1 = $keepingwarm2 = $keepingwarm3 = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["firstName"])) { 
	  $errors['firstName'] = "Missing";	 
	} else {$firstName = $_POST['firstName'];}

	if (empty($_POST["surname"])) { 
	  $errors['surname'] = "Missing";	
	} else {$surname = $_POST['surname'];}

	if (empty($_POST["DateOfBirth"])) { 
	  $errors['DateOfBirth'] = "Missing";	
	} else {$DateOfBirth = $_POST['DateOfBirth'];}

	if (empty($_POST["email"])) { 
	  $errors['email'] = "Missing";	
	} else {$email = $_POST['email'];}

	if (empty($_POST["course"])) { 
	  $errors['course'] = "Missing";	
	} else {$course = $_POST['course'];}

	if (empty($_POST["tel"])) { 
	  $errors['tel'] = "Missing";	
	} else {$tel = $_POST['tel'];}

	if (empty($_POST["keepingwarm1"]) && empty($_POST["keepingwarm2"]) && empty($_POST["keepingwarm3"])) {
	  $errors['keepwarm'] = "Missing";
} else {$keepingwarm1 = $_POST['keepingwarm1'];
	$keepingwarm2 = $_POST['keepingwarm2'];
    $keepingwarm3 = $_POST['keepingwarm3']; }

}



?>

<form class="app-form" method="POST" action="" data-parsley-validate>


	<label for="firstName">Name:</label>
	<input class="input-inline" type="text" name="firstName" required>
	<label for="surname">Surname:</label>
	<input class="input-inline" type="text" name="surname" required>
	<label for="DateOfBirth">Date of birth:</label>
	<input class="input-inline datepicker" type="text" name="DateOfBirth" required>
	<label for="email">Email:</label>
	<input class="input-inline" type="text" name="email" email>
	<label for="course">Course applied for:</label>
	<input class="input-inline" type="text" name="course" required>
	<label for="tel">Phone number:</label>
	<input class="input-inline" type="text" name="tel" maxlength="15" required>
	<p>Select the keeping warm events you can attend:</p>
	
	<label class="checkbox-label" for="keepingwarm1">January 26th</label>
	<input type="checkbox" name="keepingwarm1" value="1" data-parsley-mincheck="1">
	<label class="checkbox-label" for="keepingwarm2">February 25th</label>
	<input type="checkbox" name="keepingwarm2" value="1">
	<label class="checkbox-label" for="keepingwarm3">March 23rd</label>
	<input type="checkbox" name="keepingwarm3" value="1"> 


<input class="submit" type="submit" name="submit" value="Reserve">

</form>



<?php 
  if (isset($_POST['submit'])) {

  	if (!$errors) {
 $sql ="INSERT INTO `register`
(`firstName`,
`surname`,
`DateOfBirth`,
`email`,
`course`,
`tel`,
`keepingwarm1`,
`keepingwarm2`,
`keepingwarm3`
)
VALUES
('$firstName',
	'$surname',
	'$DateOfBirth',
	'$email',
	'$course',
	'$tel',
	'$keepingwarm1',
	'$keepingwarm2',
	'$keepingwarm3'
	)";

$wpdb->query($sql);?>

<script>
window.location = 'http://knowsleycollege.ac.uk/event-confirmation';
</script>
<?php

} else {
 if (empty($_POST["keepingwarm1"]) && empty($_POST["keepingwarm2"]) && empty($_POST["keepingwarm3"])) {?>
		<div class="primary-error"><?php echo'You need to select at least one date that you can attend.';} ?></div><?php 
}
	}
?>


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