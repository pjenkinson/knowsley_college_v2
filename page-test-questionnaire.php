<?php
/**
* Template Name: Test Questionnaire
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

<div class="full-width-container secondary-page">

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

<h1>Structure and Prospects Appraisal Questionnaire</h1>

		<!--	 
<form class="app-form" method="POST" action="" data-parsley-validate>

	<fieldset>
	<legend>Your details</legend>
	<label for="title"><span class="required-ast" style="color:#e64799;">*</span> Title:</label>
	<input class="input-inline" type="text" name="title" required>
	<label for="firstname"><span class="required-ast" style="color:#e64799;">*</span> Name:</label>
	<input class="input-inline" type="text" name="firstname" required>
	

			  <label for="address1">Address line 1</label><input class="input-inline" type="text" name="address1"/>
			  <label for="address2">Address line 2</label><input class="input-inline" type="text" name="address2"/>
			  <label for="address3">Address line 3</label><input class="input-inline" type="text" name="address3"/>
			  <label for="address4">Address line 4</label><input class="input-inline" type="text" name="address4"/>
			  <label for="postCode">Post code</label><input class="input-inline"  name="postCode" maxlength="8"/>

	 <label for="occupation"><span class="required-ast" style="color:#e64799;">*</span> I am:</label>
			  	<select class="select-inline" type="text" required="" name="occupation">
  						<option value="student">Student</option>
  						<option value="KCC staff">KCC staff</option>
  						<option value="Local Authority">Local Authority</option>
  						<option value="Higher Education Institution">Higher Education Institution</option>
  						<option value="College of Further Education/Sixth Form College">College of Further Education/Sixth Form College</option>
  						<option value="Parent">Parent</option>
  						<option value="Employer">Employer</option>
  						<option value="Goverment Agency/Body">Goverment Agency/Body</option>
  						<option value="School (11-16)">School (11-16)</option>
  						<option value="School (11-18)">School (11-18)</option>
  						<option value="Training Organisation<">Training Organisation</option>
  						<option value="Other">Other</option>
			  	</select>

	<label for="occupation-other">If other please state:</label>
	<input class="input-inline" type="text" maxlength="30" name="occupationOther">		  

	</fieldset>
		

	<fieldset>

	<legend><span class="required-ast" style="color:#e64799;">*</span> Do you support</legend>
	<label class="checkbox-label" for="option1"><strong>Option 1:</strong> Status Quo (no-change)</label>
	<input type="radio" name="option" value="1">
	<label class="checkbox-label" for="option2"><strong>Option 2:</strong> Merger with local college(s)</label>
	<input type="radio" name="option" value="2" style="float:left;">
	<label for="views">Please explain your views:</label>
	<textarea name="views" type="textarea" maxlength="1000"></textarea>

	</fieldset>
-->



 <?php

			$sql ="INSERT INTO `questionnaire`
			(`title`,
			`firstname`,
			`address1`,
			`address2`,
			`address3`,
			`address4`,
			`postCode`,
			`occupation`,
			`occupationOther`,	
			`views`
			)
			VALUES
			('title',
			'firstname',
			'address1',
			'address2',
			'address3',
			'address4',
			'postCode',
			'occupation',
			'occupationOther',	
			'views'
			)";
?>

<?php $wpdb->query($sql);?>

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