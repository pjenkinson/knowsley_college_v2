<?php
/**
* Template Name: Facilities Enquiry
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
<?php get_template_part( 'navigation', 'about' );?>
</aside>

<section>


<article class="the-content">

<h2>Facilities Enquiry Form</h2>

<?php 

$title = $firstname = $address1 = $address2 = $address3 = $address4 = $postCode = $occupation = $occupationOther = $option = $views = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["title"])) { 
	  $errors['title'] = "Missing";	 
	} else {$title = $_POST['title'];}

	if (empty($_POST["firstname"])) { 
	  $errors['firstname'] = "Missing";	 
	} else {$firstname = $_POST['firstname'];}

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

	if (empty($_POST["occupation"])) { 
	  $errors['occupation'] = "Missing";	 
	} else {$occupation = $_POST['occupation'];}

	if (empty($_POST["occupationOther"])) { 
	  $errors['occupationOther'] = "Missing";	 
	} else {$occupationOther = $_POST['occupationOther'];}

	if (empty($_POST["option"])) { 
	  $errors['option'] = "Missing";	 
	} else {$option = $_POST['option'];}


	if (empty($_POST["views"])) { 
	  $errors['views'] = "Missing";	 
	} else {$views = $_POST['views'];}


}


?>



<form class="app-form" method="POST" action="" data-parsley-validate>

	<fieldset>
		 <label for="facility"><span class="required-ast" style="color:#e64799;">*</span> Facility:</label>
			  	<select class="select-inline" type="text" required="" name="facility">
			  			<option value="student">Select Facility</option>
  						<option value="student">All Weather Pitch (£42hr)</option>
  						<option value="Sports Hall">Sports Hall (£35hr)</option>
  						<option value="Full Dance Studio">Full Dance Studio (£30hr)</option>
  						<option value="Half Dance Studio">Half Dance Studio (£15hr)</option>
  						<option value="Classroom Hire">Classroom Hire</option>
			  	</select>

	<label for="Date">Date:</label>
			  <input class="input-inline datepicker" type="text" name="Date" value="<?=$_SESSION['appform']['contents']['DateOfBirth']?>" required/>
			  	 
	<legend>Your details</legend>
	<label for="firstName"><span class="required-ast" style="color:#e64799;">*</span> First Name:</label>
	<input class="input-inline" type="text" name="title" required>
	<label for="surname"><span class="required-ast" style="color:#e64799;">*</span> Surname:</label>
	<input class="input-inline" type="text" name="firstname" required>
	

			  <label for="address1">Address line 1</label><input class="input-inline" type="text" name="address1"/>
			  <label for="address2">Address line 2</label><input class="input-inline" type="text" name="address2"/>
			  <label for="address3">Address line 3</label><input class="input-inline" type="text" name="address3"/>
			  <label for="address4">Address line 4</label><input class="input-inline" type="text" name="address4"/>
			  <label for="postCode">Post code</label><input class="input-inline"  name="postCode" maxlength="8"/>



	</fieldset>
			 
	<fieldset>
	<legend><span class="required-ast" style="color:#e64799;">*</span> Do you support</legend>
	<label class="checkbox-label" for="option1"><strong>Option 1:</strong> Status Quo (no-change)</label>
	<input type="radio" name="option" value="1" required="">
	<label class="checkbox-label" for="option2"><strong>Option 2:</strong> Merger with local college(s)</label>
	<input type="radio" name="option" value="2" style="float:left;">
	<label class="checkbox-label" for="option3"><strong>I am unsure:</strong> Please leave your comments below</label>
	<input type="radio" name="option" value="3" style="float:left;">
	<label for="views">Please explain your views:</label>
	<textarea name="views" type="textarea" maxlength="1000"></textarea>

	</fieldset>

<input class="submit" type="submit" name="submit" value="Send form">

</form>

<?php 
  if (isset($_POST['submit'])) {

 $sql ="INSERT INTO `questionnaire`
			(`firstname`,
			`title`,
			`occupation`,
			`occupationOther`,
			`address1`,
			`address2`,
			`address3`,
			`address4`,
			`postCode`,
			`option`,
			`views`
			)
VALUES
			('$firstname',
			'$title',
			'$occupation',
			'$occupationOther',
			'$address1',
			'$address2',
			'$address3',
			'$address4',
			'$postCode',
			'$option',
			'$views'
			)";

$wpdb->query($sql);?>

<script>
window.location = 'http://knowsleycollege.ac.uk/form-confirmation';
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