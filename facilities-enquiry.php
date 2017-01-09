<?php
/**
* Template Name: Facilities Enquiry
* @package knowsley_college
*/
get_header(); ?>

<!-- Scroll to top 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'scroll' );?>
<style>

th.ui-datepicker-week-end:last {
	display: none !important;
}

</style>
<script>
jQuery( document ).ready(function() {

	bindDatePicker()

 });

function bindDatePicker() {
	jQuery( ".datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '2017:2020',
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

<h2>Facilities Enquiry Form</h2>

<?php $facility = $hireDate = $firstName = $surname = $address1 = $address2 = $address3 = $address4 = $postCode = $telephoneNumber = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["facility"])) { 
	  $errors['facility'] = "Missing";	 
	} else {$facility = $_POST['facility'];}

	if (empty($_POST["hireDate"])) { 
	  $errors['hireDate'] = "Missing";	 
	} else {$hireDate = $_POST['hireDate'];}

	if (empty($_POST["timeSlot"])) { 
	  $errors['timeSlot'] = "Missing";	 
	} else {$timeSlot = $_POST['timeSlot'];}

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

}


?>



<form class="app-form" method="POST" action="" data-parsley-validate>

	<fieldset>
		 <label for="facility"><span class="required-ast" style="color:#e64799;">*</span> Facility:</label>
			  	<select class="select-inline" type="text" required="" name="facility" required>
			  			<option value="">Select Facility</option>
  						<option value="All Weather Pitch">All Weather Pitch (£42hr)</option>
  						<option value="Sports Hall">Sports Hall (£35hr)</option>
  						<option value="Full Dance Studio">Full Dance Studio (£30hr)</option>
  						<option value="Half Dance Studio">Half Dance Studio (£15hr)</option>
  						<option value="Classroom Hire">Classroom Hire</option>
			  	</select>

	<label for="hireDate">Date of hire:</label>
			  <input class="input-inline datepicker" type="text" name="hireDate"surnam required/>

	<label for="timeSlot"><span class="required-ast" style="color:#e64799;">*</span> Preferred time slot (Available Mon-Fri 5pm-9pm):</label>
	<input class="input-inline" type="text" name="timeSlot" placeholder="5-6pm" required>
			  	 
	<legend>Your details</legend>
	<label for="firstName"><span class="required-ast" style="color:#e64799;">*</span> First Name:</label>
	<input class="input-inline" type="text" name="firstName" required>
	<label for="surname"><span class="required-ast" style="color:#e64799;">*</span> Surname:</label>
	<input class="input-inline" type="text" name="surname" required>
	<label for="address1">Address line 1</label><input class="input-inline" type="text" name="address1"/>
	<label for="address2">Address line 2</label><input class="input-inline" type="text" name="address2"/>
	<label for="address3">Address line 3</label><input class="input-inline" type="text" name="address3"/>
	<label for="address4">Address line 4</label><input class="input-inline" type="text" name="address4"/>
	<label for="postCode">Post code</label><input class="input-inline"  name="postCode" maxlength="8"/>
    <label for="telephoneNumber"><span class="required-ast" style="color:#e64799;">*</span> Telephone Number:</label>
    <input class="input-inline" type="text" name="telephoneNumber" required>
	<label for="email"><span class="required-ast" style="color:#e64799;">*</span> Email Address:</label>
	<input class="input-inline" type="text" name="email" required>

	</fieldset>
	


<input class="submit" type="submit" name="submit" value="Send form" style="clear:both; margin-bottom:1em;">

</form>

<!-- Flexible Content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php the_content();?>


<?php get_template_part( 'custom-fields/acf', 'content-flex' );?>


<?php 
  if (isset($_POST['submit'])) {

 $sql ="INSERT INTO `enquiryForm`
			(`facility`,
			`hireDate`,
			`timeSlot`,
			`firstName`,
			`surname`,
			`address1`,
			`address2`,
			`address3`,
			`address4`,
			`postCode`,
			`telephoneNumber`,
			`email`
			)
VALUES
			('$facility',
			'$hireDate',
			'$timeSlot',
			'$firstName',
			'$surname',
			'$address1',
			'$address2',
			'$address3',
			'$address4',
			'$postCode',
			'$telephoneNumber',
			'$email'
			)";

$wpdb->query($sql);?>

<?php 
$to = 'facilities@knowsleycollege.ac.uk';
$subject = 'The subject';
$body = '<html><body>';
$body .= '<h1>Facility Hire</h1>';
$body .= '<p>Facility:</p>' . $facility ;
$body .= '<p>Date of Hire:</p>' . $hireDate ;
$body .= '<p>Time Slot:</p>' . $timeSlot ;
$body .= '<p>First Name:</p>' . $firstName ;
$body .= '<p>Surname:</p>' . $surname ;
$body .= '<p>Email:</p>' . $email ;
$body .= '<p>Telephone:</p>' . $telephoneNumber ;
$body .= '<p>Address:</p>' . $address1 . ',' .  $address2 . ',' . $address3 . ',' . $address4 . ',' . $postCode ;

$body .= '</body></html>';
$headers = array('Content-Type: text/html; charset=UTF-8');
 
wp_mail( $to, $subject, $body, $headers );
?>

<?php 
$to = $email;
$subject = 'The subject';
$body = '<html><body>';
$body .= '<h1>Facility Hire</h1>';
$body .= '<p>Hi ' . $firstName . ', thank you for your facility hire enquiry. We will contact you to confirm your facility hire date and cost.</p>' ;
$body .= '<h2>Enquiry Details:</h2>';
$body .= '<p>Facility:</p>' . $facility ;
$body .= '<p>Date of Hire:</p>' . $hireDate ;
$body .= '<p>Time Slot:</p>' . $timeSlot ;
$body .= '<p>Email:</p>' . $email ;
$body .= '<p>Telephone:</p>' . $telephoneNumber ;
$body .= '<p>Address:</p>' . $address1 . ', ' .  $address2 . ', ' . $address3 . ', ' . $address4 . ', ' . $postCode ;

$body .= '</body></html>';
$headers = array('Content-Type: text/html; charset=UTF-8');
 
wp_mail( $to, $subject, $body, $headers );
?>

<script>
window.location = 'https://www.knowsleycollege.ac.uk/about/services/facility-hire/form-confirmation/';
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