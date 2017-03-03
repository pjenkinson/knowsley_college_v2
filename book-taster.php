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
<main id="main" class="site-main" role="main">


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

<?php $firstName = $surname = $address1 = $address2 = $address3 = $address4 = $postCode = $telephoneNumber = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["firstName"])) { 
	  $errors['firstName'] = "Missing";	 
	} else {$firstName = $_POST['firstName'];}

	if (empty($_POST["surname"])) { 
	  $errors['surname'] = "Missing";	 
	} else {$surname = $_POST['surname'];}

	if (empty($_POST["address1"])) { 
	  $errors['address1'] = "Missing";	 
	} else {$address1 = $_POST['address1'];}

	if (empty($_POST["address2"])) { 
	  $errors['address2'] = "Missing";	 
	} else {$address2 = $_POST['address2'];}

	if (empty($_POST["address3"])) { 
	  $errors['address3'] = "Missing";	 
	} else {$address3 = $_POST['address3'];}

	if (empty($_POST["address4"])) { 
	  $errors['address4'] = "Missing";	 
	} else {$address4 = $_POST['address4'];}

	if (empty($_POST["postCode"])) { 
	  $errors['postCode'] = "Missing";	 
	} else {$postCode = $_POST['postCode'];}

	if (empty($_POST["telephoneNumber"])) { 
	  $errors['telephoneNumber'] = "Missing";	 
	} else {$telephoneNumber = $_POST['telephoneNumber'];}

	if (empty($_POST["email"])) { 
	  $errors['email'] = "Missing";	 
	} else {$email = $_POST['email'];}

	if (empty($_POST["age"])) { 
	  $errors['age'] = "Missing";	 
	} else {$age = $_POST['age'];}

}


?>

<form class="app-form" method="POST" action="" data-parsley-validate>
	
	<legend>Your Details</legend>
	<fieldset>
	<label for="firstName"><span class="required-ast" style="color:#e64799;">*</span> First Name:</label>
	<input class="input-inline" type="text" name="firstName" required>
	<label for="surname"><span class="required-ast" style="color:#e64799;">*</span> Surname:</label>
	<input class="input-inline" type="text" name="surname" required>
	<label for="address1"><span class="required-ast" style="color:#e64799;">*</span> Address line 1</label><input class="input-inline" type="text" name="address1" required/>
	<label for="address2">Address line 2</label><input class="input-inline" type="text" name="address2"/>
	<label for="address3">Address line 3</label><input class="input-inline" type="text" name="address3"/>
	<label for="address4">Address line 4</label><input class="input-inline" type="text" name="address4"/>
	<label for="postCode"><span class="required-ast" style="color:#e64799;">*</span> Post code:</label><input class="input-inline"  name="postCode" maxlength="8" required/>
    <label for="telephoneNumber"><span class="required-ast" style="color:#e64799;">*</span> Telephone Number:</label>
    <input class="input-inline" type="text" name="telephoneNumber" required>
	<label for="email"><span class="required-ast" style="color:#e64799;">*</span> Email Address:</label>
	<input class="input-inline" type="text" name="email" required>

	<label for="ageGroup">Age group:</label>
			  	<select class="select-inline" type="text" name="age">
			  			<option value="">Select age group</option>
  						<option value="16-19">16-19</option>
  						<option value="20-30">20-30</option>
  						<option value="30-40">30-40</option>
  						<option value="40-50">40-50</option>
  						<option value="50-65">50-65</option>
  						<option value="65+">65+</option>
			  	</select>

	</fieldset>

<input class="submit" type="submit" name="submit" value="Send form" style="clear:both; margin-bottom:1em;">

</form>

<?php 
  if (isset($_POST['submit'])) {

 $sql ="INSERT INTO `enquiryForm`
			(
			`firstName`,
			`surname`,
			`address1`,
			`address2`,
			`address3`,
			`address4`,
			`postCode`,
			`telephoneNumber`,
			`email`,
			`age`
			)
VALUES
			(NOW(),
			'$firstName',
			'$surname',
			'$address1',
			'$address2',
			'$address3',
			'$address4',
			'$postCode',
			'$telephoneNumber',
			'$email',
			'$age'
			)";

$wpdb->query($sql);?>

<?php 
$to = 'pjenkinson@knowsleycollege.ac.uk';
$subject = 'Testing Subject';
$body = '<html><body>';
$body .= '<h2>Testing</h2>';

$body .= '</body></html>';
$headers = array('Content-Type: text/html; charset=UTF-8');
 
wp_mail( $to, $subject, $body, $headers );
?>

<script>
window.location = 'https://www.knowsleycollege.ac.uk/';
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