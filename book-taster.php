<?php
/**
* Template Name: Taster Booking
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


<article class="the-content" style="margin-top: 2em;">


<?php the_content();?>
<!-- Form
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php $firstName = $surname = $postCode = $telephoneNumber = $email = $tasterSubject = $attending = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["firstName"])) { 
	  $errors['firstName'] = "Missing";	 
	} else {$firstName = $_POST['firstName'];}

	if (empty($_POST["surname"])) { 
	  $errors['surname'] = "Missing";	 
	} else {$surname = $_POST['surname'];}

	if (empty($_POST["postCode"])) { 
	  $errors['postCode'] = "Missing";	 
	} else {$postCode = $_POST['postCode'];}

	if (empty($_POST["telephoneNumber"])) { 
	  $errors['telephoneNumber'] = "Missing";	 
	} else {$telephoneNumber = $_POST['telephoneNumber'];}

	if (empty($_POST["email"])) { 
	  $errors['email'] = "Missing";	 
	} else {$email = $_POST['email'];}

	if (empty($_POST["tasterSubject"])) { 
	  $errors['tasterSubject'] = "Missing";	 
	} else {$tasterSubject = $_POST['tasterSubject'];}

	if (empty($_POST["attending"])) { 
	  $errors['attending'] = "Missing";	 
	} else {$attending = $_POST['attending'];}

}


?>


<form class="app-form" method="POST" action="" data-parsley-validate>
	
	<fieldset>
	<label for="firstName"><span class="required-ast" style="color:#e64799;">*</span> First Name:</label>
	<input class="input-inline" type="text" name="firstName" required>
	<label for="surname"><span class="required-ast" style="color:#e64799;">*</span> Surname:</label>
	<input class="input-inline" type="text" name="surname" required>
	<label for="postCode"><span class="required-ast" style="color:#e64799;">*</span> Post code:</label><input class="input-inline"  name="postCode" maxlength="8" required/>
    <label for="telephoneNumber"><span class="required-ast" style="color:#e64799;">*</span> Telephone Number:</label>
    <input class="input-inline" type="text" name="telephoneNumber" required>
	<label for="email"><span class="required-ast" style="color:#e64799;">*</span> Email Address:</label>
	<input class="input-inline" type="text" name="email" required>
	<label for="subject"><span class="required-ast" style="color:#e64799;">*</span> Taster Subject:</label>
	<select class="select-inline" type="text" name="tasterSubject" required>
		<option value="Art & Design">Art & Design</option>
		<option value="Access">Access</option>
		<option value="Accounting">Accounting</option>
		<option value="Beauty Therapy">Beauty Therapy</option>
		<option value="Catering & Hospitality">Catering & Hospitality</option>
		<option value="Computing and IT">Computing and IT</option>
		<option value="Creative Media">Creative Media</option>
		<option value="Higher Education">Higher Education</option>
		<option value="Health and Social Care">Health and Social Care</option>
		<option value="Early Years">Early Years</option>
		<option value="Construction">Construction</option>
		<option value="Travel and Tourism<">Travel and Tourism</option>
		<option value="Engineering & Manufacturing">Engineering & Manufacturing</option>
		<option value="Electrical Engineering">Electrical Engineering</option>
		<option value="GCSEs">GCSEs</option>
		<option value="Hairdressing & Barbering">Hairdressing & Barbering</option>
		<option value="Music">Music</option>
		<option value="Performing Arts">Performing Arts</option>
		<option value="Public Services">Public Services</option>
		<option value="Sport">Sport</option>
		<option value="Science">Science</option>
		<option value="Sport and Public Services">Sport and Public Services</option>
		<option value="Supported Learning">Supported Learning</option>
	</select>
	<label for="attending"><span class="required-ast" style="color:#e64799;">*</span> Attending:</label>
	<select class="select-inline" type="text" name="attending" required>
		<option value="Yes">Yes</option>
		<option value="No">No</option>
	</select>

	</fieldset>

<input class="submit" type="submit" name="submit" value="Send form" style="clear:both; margin-bottom:1em;">

</form>

<?php 
  if (isset($_POST['submit'])) {

 $sql ="INSERT INTO `bookTaster`
			(
			`firstName`,
			`surname`,
			`postCode`,
			`telephoneNumber`,
			`email`,
			`tasterSubject`,
			`attending`
			)
VALUES
			(
			'$firstName',
			'$surname',
			'$postCode',
			'$telephoneNumber',
			'$email',
			'$tasterSubject',
			'$attending'
			)";

$wpdb->query($sql);?>

<?php 
$to = 'marketing@knowsleycollege.ac.uk';
$subject = 'Taster Booking';
$body = '<html><body>';
$body .= '<h2>Taster Booking: ' . '</h2>';
$body .= '<p>Name: ' . $firstName . '</p>' ;
$body .= '<p>Surname: ' . $surname . '</p>'  ;
$body .= '<p>Chosen Subject: ' . $tasterSubject . '</p>'  ;
$body .= '<p>Email: ' . $email . '</p>'  ;
$body .= '<p>Tel: ' . $telephoneNumber . '</p>'  ;
$body .= '<p>Attending: ' . $attending . '</p>'  ;
$body .= '</body></html>';
$headers = array('Content-Type: text/html; charset=UTF-8');
 
wp_mail( $to, $subject, $body, $headers );
?>

<script>
window.location = 'https://www.knowsleycollege.ac.uk/taster-day-confirmation/';
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