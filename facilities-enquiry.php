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

<?php $facility = $hireDate = $firstName = $surname = $address1 = $address2 = $address3 = $address4 = $postCode = $telephoneNumber = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["enquiryDate"])) { 
	  $errors['enquiryDate'] = "Missing";	 
	} else {$enquiryDate = $_POST['enquiryDate'];}

	if (empty($_POST["facility"])) { 
	  $errors['facility'] = "Missing";	 
	} else {$facility = $_POST['facility'];}

	if (empty($_POST["hireDate"])) { 
	  $errors['hireDate'] = "Missing";	 
	} else {$hireDate = $_POST['hireDate'];}

	if (empty($_POST["timeFrom"])) { 
	  $errors['timeFrom'] = "Missing";	 
	} else {$timeFrom = $_POST['timeFrom'];}

	if (empty($_POST["timeTo"])) { 
	  $errors['timeTo'] = "Missing";	 
	} else {$timeTo = $_POST['timeTo'];}

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

	<h3>Booking Enquiry</h3>
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

	<label for="hireDate"><span class="required-ast" style="color:#e64799;">*</span> Date of hire:</label>
			  <input class="input-inline datepicker" type="text" name="hireDate" required/>

	<label for="timeFrom"><span class="required-ast" style="color:#e64799;">*</span>  From:</label>

	<input id="timePickerFrom" type="text" class="time ui-timepicker-input" name="timeFrom" autocomplete="off" required>

	<label for="timeto"><span class="required-ast" style="color:#e64799;">*</span>  To:</label>

	<input id="timePickerTo" type="text" class="time ui-timepicker-input" name="timeTo" autocomplete="off" required>

	</fieldset>		  	 
	<h3>Your Details</h3>
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

<!-- Flexible Content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php the_content();?>


<?php get_template_part( 'custom-fields/acf', 'content-flex' );?>


<?php 
  if (isset($_POST['submit'])) {

 $sql ="INSERT INTO `enquiryForm`
			(
			`enquiryDate`,
			`facility`,
			`hireDate`,
			`timeFrom`,
			`timeTo`,
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
			'$facility',
			'$hireDate',
			'$timeFrom',
			'$timeTo',
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

// WP Mail
  $to = 'facilities@knowsleycollege.ac.uk';
  $subject = 'Facilities Enquiry: ' . $facility . ' | ' . $hireDate . ' ' . $timeFrom . ' - ' . $timeTo;
  $body = '<html><body>';
  $body .= '<h2>Facilities Enquiry: ' . $facility . ' | ' . $hireDate . ' ' . $timeFrom . ' - ' . $timeTo . '</h2>';
  $body .= '<p>Facility: ' . $facility . '</p>'  ;
  $body .= '<p>Date of hire: ' . $hireDate . '</p>'  ;
  $body .= '<p>Time from: ' . $timeFrom . '</p>'  ;
  $body .= '<p>Time to: ' . $timeTo . '</p>'  ;
  $body .= '<p>First Name: ' . $firstName . '</p>'  ;
  $body .= '<p>Surname: ' . $surname . '</p>'  ;
  $body .= '<p>Age: ' . $age . '</p>'  ;
  $body .= '<p>Email: ' . $email . '</p>'  ;
  $body .= '<p>Telephone: ' . $telephoneNumber . '</p>'  ;
  $body .= '<p>Address: ' . $address1 . ',' .  $address2 . ',' . $address3 . ',' . $address4 . '</p>' ;
  $body .= '<p>Postcode: ' . $postCode . '</p>'  ;
  $body .= '</body></html>';
  $headers = array('Content-Type: text/html; charset=UTF-8'); 
  $headers[]  = 'From:' . $firstName . ' ' . $surname . '<applications@knowsleycollege.ac.uk>';
  $headers[]  = 'Reply-To:' . $firstName . ' ' . $surname . '<'.$email.'>';
  wp_mail( $to, $subject, $body, $headers );

?>


<?php 
$to = $email;
$subject = 'Facilities Enquiry: ' . $facility . ' | ' . $hireDate . ' ' . $timeFrom . ' - ' . $timeTo;
$body = '<html><body>';
$body .= '<h1>Facility Hire</h1>';
$body .= '<p>Hi ' . $firstName . ', thank you for your facility hire enquiry. We will contact you to confirm your facility hire date, time and cost. All bookings are subject to our <a href="https://www.knowsleycollege.ac.uk/wp-content/uploads/2016/12/Facility-Hire.pdf" title="Facility Hire Terms and Conditions | KCC" target="_blank">facility hire terms and conditions</a></p>' ;
$body .= '<h2>Your Enquiry Details:</h2>';
$body .= '<p>Facility: ' . $facility . '</p>' ;
$body .= '<p>Date of hire: ' . $hireDate . '</p>'  ;
$body .= '<p>Time from: ' . $timeFrom . '</p>'  ;
$body .= '<p>Time to: ' . $timeTo . '</p>'  ;
$body .= '<p>Email: ' . $email . '</p>'  ;
$body .= '<p>Telephone: ' . $telephoneNumber . '</p>'  ;
$body .= '<p>Address: ' . $address1 . ', ' .  $address2 . ', ' . $address3 . ', ' . $address4 . '</p>' ;
$body .= '<p>Postcode: ' . $postCode . '</p>'  ;
$body .= '<br>';
$body .= '<p><a href="https://www.knowsleycollege.ac.uk">www.knowsleycollege.ac.uk</a></p>';
$body .= '</body></html>';
$headers = array('Content-Type: text/html; charset=UTF-8'); 
$headers[]   = 'Reply-To: KCC Facility Hire <facilities@knowsleycollege.ac.uk>';
$headers[] = 'From: KCC Facility Hire <applications@knowsleycollege.ac.uk>';
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