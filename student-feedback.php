<?php
/**
* Template Name: Student Feedback
* @package knowsley_college
*/
get_header(); ?>

<!-- Scroll to top 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'scroll' );?>
<style>

.ui-datepicker-week-end {
	display: none;
}

</style>

<script>
jQuery( document ).ready(function() {
	jQuery('.datepicker').pickadate({
		labelMonthNext: 'Go to the next month',
  		labelMonthPrev: 'Go to the previous month',
  		labelMonthSelect: 'Pick a month from the dropdown',
  		labelYearSelect: 'Pick a year from the dropdown',
  		selectMonths: true,
  		showMonthsShort: true,
  		selectYears: 41,
  		format: 'yyyy-mm-dd',
  		formatSubmit: 'yyyy/mm/dd',
	})
});
</script>

<script>
	jQuery( document ).ready(function() {

	jQuery('#timePickerFrom').timepicker({
		'minTime': '6:00pm',
    'maxTime': '9:00pm',
    'step': 60,
     disableTextInput: true
	});

	jQuery('#timePickerTo').timepicker({
		'minTime': '7:00pm',
    'maxTime': '9:00pm',
    'step': 60,
     disableTextInput: true
	});

 });
	
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
<?php get_template_part( 'branding-flex' );?>


<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="full-width-container secondary-page">

	<div class="full-width-container">


<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<!-- Start of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->


<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'content', 'featured-banner-has-parent' );?>

<div class="fixed-container">

<aside>
<!-- Secondary Navigation
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'flex-secondary' );?>
</aside>

<section>


<article class="the-content">

<!-- Form
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php $firstName = $surname = $postCode = $email = $courseName = $studentID = $feedback = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["enquiryDate"])) { 
	  $errors['enquiryDate'] = "Missing";	 
	} else {$enquiryDate = $_POST['enquiryDate'];}

	if (empty($_POST["firstName"])) { 
	  $errors['firstName'] = "Missing";	 
	} else {$firstName = $_POST['firstName'];}

	if (empty($_POST["surname"])) { 
	  $errors['surname'] = "Missing";	 
	} else {$surname = $_POST['surname'];}

	if (empty($_POST["email"])) { 
	  $errors['email'] = "Missing";	 
	} else {$email = $_POST['email'];}

	if (empty($_POST["courseName"])) { 
	  $errors['courseName'] = "Missing";	 
	} else {$courseName = $_POST['courseName'];}

	if (empty($_POST["studentID"])) { 
	  $errors['studentID'] = "Missing";	 
	} else {$studentID = $_POST['studentID'];}

	if (empty($_POST["feedback"])) { 
	  $errors['feedback'] = "Missing";	 
	} else {$feedback = $_POST['feedback'];}



}


?>
 


<form class="app-form" method="POST" action="" data-parsley-validate>

	<p>If you have any feedback, comments or specific questions or concerns about the merger with St Helens College. Please complete the form below:</p>
		
	<h3>Your details and feedback</h3>
	<fieldset>
	<label for="firstName"><span class="required-ast" style="color:#e64799;">*</span> First Name:</label>
	<input class="input-inline" type="text" name="firstName" required>
	<label for="surname"><span class="required-ast" style="color:#e64799;">*</span> Surname:</label>
	<input class="input-inline" type="text" name="surname" required>
	<label for="email"><span class="required-ast" style="color:#e64799;">*</span> Email Address:</label>
	<input class="input-inline" type="text" name="email" required>

	<label for="courseName"><span class="required-ast" style="color:#e64799;">*</span> Course:</label>
	<input class="input-inline" type="text" name="courseName" required>

	<label for="studentID"><span class="required-ast" style="color:#e64799;">*</span> Student ID:</label>
	<input class="input-inline" type="text" name="studentID" required>

	<label for="feedback"><span class="required-ast" style="color:#e64799;">*</span> Feedback:</label>
						<textarea name="feedback" data-parsley-maxlength="4000" required="">Enter your feedback here...</textarea>

						<?php            
					            $feedback = ($_POST['feedback']) ;
    					?>

	</fieldset>

<input class="submit" type="submit" name="submit" value="Send form" style="clear:both; margin-bottom:1em;">

</form>

<!-- Flexible Content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php the_content();?>


<?php 
  if (isset($_POST['submit'])) {

 $sql ="INSERT INTO `student_feedback`
			(
			`enquiryDate`,
			`firstName`,
			`surname`,
			`email`,
			`courseName`,
			`studentID`,
			`feedback`
			)
VALUES
			(NOW(),
			'$firstName',
			'$surname',
			'$email',
			'$courseName',
			'$studentID',
			'$feedback'
			)";

$wpdb->query($sql);?>


<script>
window.location = 'https://www.knowsleycollege.ac.uk/student-feedback-confirmation';
</script>
<?php

} ?>

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