<?php
/**
* Template Name: School Leavers Application Page
*/

if(!session_id()) {
	session_start();
}
get_header(); ?>

<!-- Scroll to top 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'scroll' );?>

<!-- pickadate.js
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

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
  		today: ''
	})
});
</script>

<!-- Show/Hide course options
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<script>
 jQuery(document).ready(function(){
 	
 	jQuery("#course-select-options").hide();	

    jQuery("#hide").click(function(){
        jQuery("#course-select-options").hide(500);
        event.preventDefault();
    });
    jQuery("#show").click(function(){
        jQuery("#course-select-options").show(500);
        event.preventDefault();
    });
});
</script>

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

	<div class="fixed-container">

<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<!-- Start of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>


<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'content', 'featured-banner-has-parent' );?>

<section class="application-form-section">

<?php if( get_field('tagline') ): ?>

<!-- Homepage tagline and intro paragraph
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'acf', 'homepage-tagline' );?>

<?php endif; ?>

<?php

$courseID = filter_var($_GET['courseid'], FILTER_SANITIZE_NUMBER_INT);
$pageID   = filter_var($_GET['pageid'], FILTER_SANITIZE_NUMBER_INT);

//Process Form
if(!empty($_POST['submit'])) {
		//Add all form elements to the session
	  foreach($_POST AS $key => $value) {
	  		if(is_array($value)) {
	  				foreach($value AS $subKey => &$subValue) {
	  					  $subValue = filter_var($subValue, FILTER_SANITIZE_STRING);
	  					  $textOutput = preg_replace_callback("/(&#39+;)/", function($m) { return mb_convert_encoding($m[1], "UTF-8", "HTML-ENTITIES"); }, $subValue);
	  					  $subValue = $textOutput;
	  				}
	  		} else {
	  	      $value = filter_var($value, FILTER_SANITIZE_STRING);
	  	      $textOutput = preg_replace_callback("/(&#39+;)/", function($m) { return mb_convert_encoding($m[1], "UTF-8", "HTML-ENTITIES"); }, $value);
	  		  $value = $textOutput;
	  	  }

	  	  $_SESSION['appform']['contents'][$key] = $value;
	  }
}


//Start displaying the pages
if($pageID == '1' || empty($pageID)) {
		$sql = "SELECT factsheetname AS name
         	    FROM fact_sheets_live
             WHERE id = '".$courseID."'";
    	$courses = $wpdb->get_results($sql);
	  ?>

	  <?php 
	  //Offering ID
	  $sql = "SELECT OfferingID
         	    FROM Offering
             WHERE CourseInformationID = '".$courseID."'";
     $offeringid = $wpdb->get_results($sql);
    ?>

	  <?php 
	  // Academic Year 
		$sql = "SELECT OfferingID, AcademicYearID, Name
         	    FROM Offering
             WHERE CourseInformationID IS NOT NULL";
        $offering = $wpdb->get_results($sql);?>



	  <?php 
		$sql = "SELECT DISTINCT programmearea FROM fact_sheets_live";
		$subjects = $wpdb->get_results($sql);
	  ?>


    <?php $sql = "SELECT DisabilityID, Description
         	   FROM Disability";

    $DisabilityType = $wpdb->get_results($sql);?>

     <?php $sql = "SELECT OfferingID, AcademicYearID, Name, factsheetname, level, id, CourseInformationID, qualification_type
         	   FROM Offering
         	   INNER JOIN fact_sheets_live
         	   On Offering.CourseInformationID=fact_sheets_live.id
         	   ORDER BY level ASC";

    $allCourses = $wpdb->get_results($sql);?>

     <?php $sql = "SELECT OfferingID, AcademicYearID, Name, factsheetname, level, id, CourseInformationID, qualification_type
         	   FROM Offering
         	   INNER JOIN fact_sheets_live
         	   On Offering.CourseInformationID=fact_sheets_live.id
         	   WHERE level = 'Level 1'
         	   ORDER BY level ASC";

    $level1Courses = $wpdb->get_results($sql);?>

     <?php $sql = "SELECT OfferingID, AcademicYearID, Name, factsheetname, level, id, CourseInformationID, qualification_type
         	   FROM Offering
         	   INNER JOIN fact_sheets_live
         	   On Offering.CourseInformationID=fact_sheets_live.id
         	   WHERE level = 'Level 2'
         	   ORDER BY level ASC";

    $level2Courses = $wpdb->get_results($sql);?>

    <?php $sql = "SELECT OfferingID, AcademicYearID, Name, factsheetname, level, id, CourseInformationID, qualification_type
         	   FROM Offering
         	   INNER JOIN fact_sheets_live
         	   On Offering.CourseInformationID=fact_sheets_live.id
         	   WHERE level = 'Level 3'
         	   ORDER BY level ASC";

    $level3Courses = $wpdb->get_results($sql);?>

    <?php $sql = "SELECT OfferingID, AcademicYearID, Name, factsheetname, level, id, CourseInformationID, qualification_type
         	   FROM Offering
         	   INNER JOIN fact_sheets_live
         	   On Offering.CourseInformationID=fact_sheets_live.id
         	   WHERE level = 'Level 4'
         	   ORDER BY level ASC";

    $level4Courses = $wpdb->get_results($sql);?>

    <?php $sql = "SELECT OfferingID, AcademicYearID, Name, factsheetname, level, id, CourseInformationID, qualification_type
         	   FROM Offering
         	   INNER JOIN fact_sheets_live
         	   On Offering.CourseInformationID=fact_sheets_live.id
         	   WHERE level = 'Level 5'
         	   ORDER BY level ASC";

    $level5Courses = $wpdb->get_results($sql);?>

    <?php $sql = "SELECT OfferingID, AcademicYearID, Name, factsheetname, level, id, CourseInformationID, qualification_type
         	   FROM Offering
         	   INNER JOIN fact_sheets_live
         	   On Offering.CourseInformationID=fact_sheets_live.id
         	   WHERE level = 'Entry Level 1' or level = 'Entry Level 2' or level = 'Entry 3'
         	   ORDER BY level ASC";

    $EntryLevelCourses = $wpdb->get_results($sql);?>

    <?php $sql = "SELECT sid, area
         	   FROM CollegeAreas
         	   ORDER BY area ASC";

    $sid = $wpdb->get_results($sql);?>


	  <form id="school-leavers-application-form" category class="app-form" method="POST" action="/apply/school-leavers/?courseid=<?=$CourseID?>&pageid=2" data-parsley-validate>
	  		 <div class="the-content">

	  			<h2 class="section-heading">School Leavers Application Form</h2>

	  			<p>Online applications are currently being taken for 2018 entry.</p>


		<h3>Personal details</h3>
	  
	  	<fieldset>


	  		 <label for="FirstForename">First name:</label>
			  	<input class="input-inline" type="text" name="FirstForename" value="<?=$_SESSION['appform']['contents']['FirstForename']?>" placeholder="Your First Name" required/>
			  <label for="Surname">Surname:</label>
			  	<input class="input-inline" type="text" name="Surname" value="<?=$_SESSION['appform']['contents']['Surname']?>" placeholder="Your Surname" required/>

			  <label for="Sex">Gender:</label>
			  	<select class="select-inline" type="text" name="Sex" required>
			  			<option value="">Select</option>
  						<option value="male" <?php
  							if($_SESSION['appform']['contents']['Sex'] == 'male') {
  								echo 'selected';
  							}
  						?>>Male</option>
  						<option value="female" <?php
  							if($_SESSION['appform']['contents']['Sex'] == 'female') {
  								echo 'selected';
  							}
  						?>>Female</option>
			  	</select>
			  
			  

			<label for="DateOfBirth">Date of birth:</label>

			  <input class="datepicker" type="text" name="DateOfBirth" value="<?=$_SESSION['appform']['contents']['DateOfBirth']?>" placeholder="YYYY-MM-DD" maxlength="10" required/>

			  
			  <label for="Address1">Address line 1</label><input class="input-inline" type="text" name="Address1" value="<?=$_SESSION['appform']['contents']['Address1']?>" required />
			  <label for="Address2">Address line 2</label><input class="input-inline" type="text" name="Address2" value="<?=$_SESSION['appform']['contents']['Address2']?>" />
			  <label for="Address3">Address line 3</label><input class="input-inline" type="text" name="Address3" value="<?=$_SESSION['appform']['contents']['Address3']?>" />
			  <label for="Address4">Address line 4</label><input class="input-inline" type="text" name="Address4" value="<?=$_SESSION['appform']['contents']['Address4']?>" />
			  <label for="PostCodeOut">Post code</label><input class="input-inline postcodeout"  name="PostCodeOut" maxlength="4" value="<?=$_SESSION['appform']['contents']['PostCodeOut']?>" required/>
			  <input class="input-inline postcodein" name="PostCodein" maxlength="3" value="<?=$_SESSION['appform']['contents']['PostCodein']?>" required></input>


			  <label for="Tel">Telephone:</label>
					<input class="input-inline" type="text" name="Tel" value="<?=$_SESSION['appform']['contents']['Tel']?>" required/>
			  <label for="MobileTel">Mobile:</label>
			  	<input class="input-inline" type="text" name="MobileTel" value="<?=$_SESSION['appform']['contents']['MobileTel']?>" required />
			  <label for="Email">Email:</label>
			  	<input class="input-inline" type="email" data-parsley-type="email" name="Email" value="<?=$_SESSION['appform']['contents']['Email']?>" required/>		 


			  



<?php 
$sql = "SELECT OrganisationID, Name FROM Schools ORDER BY Name";

    $schools = $wpdb->get_results($sql);
?>
			  
	  	    <div>
			  	<label for="LastSchool">Name of your current school/college? </label>
			  	<select class="select-inline schoollist" type="text" name="LastSchool" required>
			  			<option value="">Select</option>
						<?php
													foreach($schools AS $key => $value) {
															$storedValue = $_SESSION['appform']['contents']['LastSchool'];
															if($storedValue == $value) {
																  $selected = 'selected';
															} else {
																	$selected = '';
															}
														  ?>
														  <option value="<?=$value->OrganisationID?>" <?=$selected?>><?=$value->Name?></option>
														  <?php
													}
												?>
			  	</select>


			  	<label for="ParentFirstName">Parent/Carer First name:</label>
			  	<input class="input-inline" type="text" name="ParentFirstName" value="<?=$_SESSION['appform']['contents']['ParentFirstName']?>" placeholder="Parent/Carer First Name" required/>
			  <label for="ParentSurname">Parent/Carer Surname:</label>
			  	<input class="input-inline" type="text" name="ParentSurname" value="<?=$_SESSION['appform']['contents']['ParentSurname']?>" placeholder="Parent/Carer Surname" required/>	

			  	 <label for="ParentPhoneNumber">Parent/Carer Contact Number:</label>
			  	<input class="input-inline" type="text" name="ParentPhoneNumber" value="<?=$_SESSION['appform']['contents']['ParentPhoneNumber']?>" required />

			  <label for="ParentEmailAddress">Parent/Carer Email:</label>
			  	<input class="input-inline" type="email" data-parsley-type="email" name="ParentEmailAddress" value="<?=$_SESSION['appform']['contents']['ParentEmailAddress']?>" required/>	



	  	 	 <input type="hidden" name="courseid" value="<?=$courseID?>" />

	  	 	 <input type="hidden" name="Ethnicity" value="99" />

			  	<!-- END OF PERSONAL DETAILS -->

			  </fieldset>


			

				 		<h3>Subject and course choice</h3>


				 		 <fieldset>

					   	<div>
							<label class="course-choice" for="sid">Select the subject you are interested in studying:</label>
							<select class="select-inline" name="sid" required="">
								<option value="">Please Select</option>
								<?php
								foreach($sid AS $key => $value) {
								$storedValue = $_SESSION['appform']['contents']['sid'];
								if($storedValue == $value) {
								$selected = 'selected';
								} else {
								$selected = '';
								}
								?>


								<option value="<?=$value->sid?>">
								<?=$value->area?> 
								</option>


								<?php
								}
								?>
							</select>
						</div>

						<div class="button-default form-button" id="show"><a href=""><i class="fa fa-plus" aria-hidden="true"></i> Select a course (Optional)</a></div>

						<label for="UserDefined17">If required you can use the text area below to input further information about your course/subject choice:</label>
						<textarea name="UserDefined17" data-parsley-maxlength="1000"><?=$courses[0]->name?></textarea>

						<?php            
					            $UserDefined17 = ($_POST['UserDefined17']) ;
					            $_SESSION['appform']['contents']['UserDefined17'] = $UserDefined17;
    					?>

						</fieldset>



				 		<fieldset id="course-select-options">
				 		  <?php
					if(!empty($courses)) {
						?>
					  <p>You have selected the following courses:</p>

					  <ul>
					  	<li><?=$courses[0]->name?></li>
					 	</ul>
					 	<input type="hidden" name="Offering1" value="<?=$offeringid[0]->OfferingID?>" />
					 	<input type="hidden" name="AcademicYearID" value="18/19"/>

				 		<?php
				 	} else {
				 		?>
				 		
				 		<p>Please select your course choices (Optional):</p>	

				 		<div>
				 			<label class="course-choice" for="Offering1">Select your first choice course</label>
				 			<select class="select-inline" name="Offering1">
				 				  <option value="">Please Select</option>
				 				  <?php include( locate_template( 'course-select-options-1.php', false, false ) );?> 

				 			</select>
				 		</div>
				 		<?php
				 	}
				 	?>
				 	<input type="hidden" name="AcademicYearID" value="18/19"/>
				 	<div>
				 		  <label class="course-choice" for="Offering2">Select your second choice course</label>
				 			<select class="select-inline" name="Offering2">
				 				  <option value="">Please Select</option>
				 				  <?php include( locate_template( 'course-select-options-2.php', false, false ) );?> 

				 			</select>
				 	</div>
				 	<div>
				 			<label class="course-choice" for="Offering3">Select your third choice course</label>
				 			<select class="select-inline" name="Offering3">
				 					<option value="">Please Select</option>
				 					<?php include( locate_template( 'course-select-options-3.php', false, false ) );?> 
				 			</select>
				 	</div>


				 	<div class="button-default form-button" id="hide"><a href=""><i class="fa fa-minus" aria-hidden="true"></i> Hide course options</a></div>


				 </fieldset>


			<h3>Marketing</h3>

			<fieldset>

			<label class="marketing" for="UserDefined16">Is Knowsley Community College your first choice for Further Education?</label>

			<div class="radio-buttons">
				<div class="radio-button-input"><input class="radio-buttons" type="radio" name="UserDefined16" value="Yes" required>Yes</div>
				<div class="radio-button-input"><input class="radio-buttons" type="radio" name="UserDefined16" value="No">No</div>
			<div>

			<?php
			if(isset($_POST['UserDefined16']))
			{ $_SESSION['appform']['contents']['UserDefined16'] == $_POST['UserDefined16']; }
			?>

			<label class="marketing" for="SentMarketingInfo">Tick the box if you do NOT want to receive any marketing information from us</label>
			<input class="input-inline" type="checkbox" name="SentMarketingInfo" value="1" />

			<?php

if(isset($_POST['SentMarketingInfo'])){
    //$stok is checked and value = 1
    $SentMarketingInfo = $_POST['SentMarketingInfo'];
}
else{
    //$stok is nog checked and value=0
    $SentMarketingInfo=0;
}
$SentMarketingInfo = $_SESSION['appform']['contents']['SentMarketingInfo'];
?>

<?php // Heard about the college ?>

<?php 
$sql = "SELECT HeardAboutCollegeID, Description
         	   FROM HeardAboutCollege";

    $HeardAboutCollege = $wpdb->get_results($sql);
?>

	<label class="feedback" for="HeardAboutCollegeID">How did you hear about KCC?</label>
	<select class="select-inline" type="text" name="HeardAboutCollegeID" required="">
	<option value="">Select</option>
	<?php
		foreach($HeardAboutCollege AS $key => $value) {
				$storedValue = $_SESSION['appform']['contents']['HeardAboutCollegeID'];
				if($storedValue == $value) {
					  $selected = 'selected';
				} else {
						$selected = '';
				}
			  ?>
			  <option value="<?=$value->HeardAboutCollegeID?>" <?=$selected?>><?=$value->Description?></option>
			  <?php
		}
	?>


		
	</select>

</fieldset>	 

<h2>How We Use Your Personal Information</h2>
 
 <p>This privacy notice is issued by the Education and Skills Funding Agency (ESFA), on behalf of the Secretary of State for the Department of Education (DfE). It is to inform learners how their personal information will be used by the DfE, the ESFA (an executive agency of the DfE) and any successor bodies to these organisations. For the purposes of the relevant data protection legislation, the DfE is the data controller for personal data processed by the ESFA. </p>
 
 <p>Your personal information is used by the DfE to exercise its functions and to meet its statutory responsibilities, including under the Apprenticeships, Skills, Children and Learning Act 2009 and to create and maintain a unique learner number (ULN) and a personal learning record (PLR). Your information will be securely destroyed, after it is no longer required for these purposes. Your information may be shared with third parties for education, training, employment and well-being related purposes, including for research.</p>
 
 <p>This will only take place where the law allows it and the sharing is in compliance with the data protection legislation. The English European Social Fund (ESFA) Managing Authority (or agents acting on its behalf) may contact you in order for them to carry out research and evaluation to inform the effectiveness of training.</p>
  
 <fieldset>

 <p><strong>You can agree to be contacted for other purposes by ticking any of the following boxes:</strong></p>


<!-- GDPR | Purpose of contact -->


<!-- GDPR | Learning opportunities -->

<?php
			if(isset($_POST['RestrictedUseAllowLearningOpportunities']))
			{ $_SESSION['appform']['contents']['RestrictedUseAllowLearningOpportunities'] == $_POST['RestrictedUseAllowLearningOpportunities']; }
			?>

			<label class="marketing" for="RestrictedUseAllowLearningOpportunities">Courses or learning opportunities</label>
			<input class="input-inline" type="checkbox" name="RestrictedUseAllowLearningOpportunities" value="1" />

			<?php

if(isset($_POST['RestrictedUseAllowLearningOpportunities'])){
    //$stok is checked and value = 1
    $LearningOpportunities = $_POST['RestrictedUseAllowLearningOpportunities'];
}
else{
    //$stok is nog checked and value=0
    $LearningOpportunities=0;
}
$LearningOpportunities = $_SESSION['appform']['contents']['RestrictedUseAllowLearningOpportunities'];
?>

<!-- GDPR | Surveys and research -->

<?php
			if(isset($_POST['RestrictedUseAllowResearch']))
			{ $_SESSION['appform']['contents']['RestrictedUseAllowResearch'] == $_POST['RestrictedUseAllowLearningOpportunities']; }
			?>

			<label class="marketing" for="RestrictedUseAllowResearch">Surveys and research
</label>
			<input class="input-inline" type="checkbox" name="RestrictedUseAllowResearch" value="1" />

			<?php

if(isset($_POST['RestrictedUseAllowResearch'])){
    //$stok is checked and value = 1
    $Research = $_POST['RestrictedUseAllowResearch'];
}
else{
    //$stok is nog checked and value=0
    $Research=0;
}
$Research = $_SESSION['appform']['contents']['RestrictedUseAllowResearch'];
?>


  
 <p><strong>Indicate a preferred method of contact:</strong></p>

<!-- GDPR | Method of contact -->


<!-- GDPR | Allow contact by post -->

<?php
			if(isset($_POST['RestrictedUseAllowContactByPost']))
			{ $_SESSION['appform']['contents']['RestrictedUseAllowContactByPost'] == $_POST['RestrictedUseAllowContactByPost']; }
			?>

			<label class="marketing" for="RestrictedUseAllowContactByPost">By Post</label>
			<input style="display:inline-block;float:left;" class="input-inline" type="checkbox" name="RestrictedUseAllowContactByPost" value="1" />

			<?php

if(isset($_POST['RestrictedUseAllowContactByPost'])){
    //$stok is checked and value = 1
    $AllowContactByPost = $_POST['RestrictedUseAllowContactByPost'];
}
else{
    //$stok is nog checked and value=0
    $AllowContactByPost=0;
}
$AllowContactByPost = $_SESSION['appform']['contents']['RestrictedUseAllowContactByPost'];
?>

<!-- GDPR | Allow contact by telephone -->

<?php
			if(isset($_POST['RestrictedUseAllowContactByTelephone']))
			{ $_SESSION['appform']['contents']['RestrictedUseAllowContactByTelephone'] == $_POST['RestrictedUseAllowContactByTelephone']; }
			?>

			<label class="marketing" for="RestrictedUseAllowContactByTelephone">By telephone</label>
			<input style="display:inline-block;float:left;"  class="input-inline" type="checkbox" name="RestrictedUseAllowContactByTelephone" value="1" />

			<?php

if(isset($_POST['RestrictedUseAllowContactByTelephone'])){
    //$stok is checked and value = 1
    $AllowContactByTelephone = $_POST['RestrictedUseAllowContactByTelephone'];
}
else{
    //$stok is nog checked and value=0
    $AllowContactByTelephone=0;
}
$AllowContactByTelephone = $_SESSION['appform']['contents']['RestrictedUseAllowContactByTelephone'];
?>


<!-- GDPR | Allow contact by email -->

<?php
			if(isset($_POST['RestrictedUseAllowContactByEmail']))
			{ $_SESSION['appform']['contents']['RestrictedUseAllowContactByEmail'] == $_POST['RestrictedUseAllowContactByEmail']; }
			?>

			<label class="marketing" for="RestrictedUseAllowContactByEmail">By Email</label>
			<input class="input-inline" type="checkbox" name="RestrictedUseAllowContactByEmail" value="1" />

			<?php

if(isset($_POST['RestrictedUseAllowContactByEmail'])){
    //$stok is checked and value = 1
    $AllowContactByEmail = $_POST['RestrictedUseAllowContactByEmail'];
}
else{
    //$stok is nog checked and value=0
    $AllowContactByEmail=0;
}
$AllowContactByEmail = $_SESSION['appform']['contents']['RestrictedUseAllowContactByEmail'];
?>

  
 <p>Further information about use of and access to your personal data, details of organisations with whom we regularly share data, are available at:</p>

 <p><a href="https://www.gov.uk/government/publications/esfa-privacy-notice">ESFA Privacy Notice <i class="fa fa-external-link" aria-hidden="true"></i>
</a></p>

</fieldset>





<h3>Data protection</h3>
<fieldset>
	<p>Knowsley Community College is registered under the Data Protection Act 1988. Information we process about you may be used for planning, analysis, marketing and any other purpose deemed necessary. Your information may also be shared with other official organisations such as your school and Local Education Authorities. Please contact enquiries (Tel: 0151 477 5850) if you have any concerns about the use or accuracy of your information.</p>

<p>I agree to the data protection declaration above. Ticking the box serves as your signature</p>


<input class="input-inline" required type="checkbox" name="StudentDeclaration" value="Yes" required="" <?php


if(isset($_POST['StudentDeclaration'])){
    $StudentDeclaration = $_POST['StudentDeclaration'];
}
else{
    $StudentDeclaration=No;
}
$StudentDeclaration = $_SESSION['appform']['contents']['StudentDeclaration'];

			

?>/>
</fieldset>


			 <input class="submit" type="submit" name="submit" value="Apply" />

	  </form>

</div>

	  <?php
} elseif($pageID == '2') {

	  ?>

	<?php

	$insertData = $_SESSION['appform']['contents'];

	$sql = "INSERT INTO `application_request`
										 (`RequestDate`, /* New */
										 	`Offering1ID`,
											`Offering2ID`,
											`Offering3ID`,
											`sid`,
											`AcademicYearID`,
											`FirstForename`,
											`Surname`,
											`DateOfBirth`,
											`Sex`,
											`EthnicGroupID`,
											`Tel`,
											`MobileTel`,
											`Email`,
											`Address1`,
											`Address2`,
											`Address3`,
											`Address4`,
											`PostCodeOut`,
											`PostCodein`,
											`LastSchool`,
											`ParentFirstName`,
											`ParentSurname`,
											`ParentPhoneNumber`,
											`ParentEmailAddress`,
											`StudentDeclaration`,
											`SentMarketingInfo`,
											`HeardAboutCollegeID`,
											`UserDefined16`,
											`UserDefined17`,
											`RestrictedUseAllowLearningOpportunities`,
											`RestrictedUseAllowResearch`,
											`RestrictedUseAllowContactByPost`,
											`RestrictedUseAllowContactByTelephone`,
											`RestrictedUseAllowContactByEmail`
											)
											VALUES
											(NOW(),
											'".$insertData['Offering1']."',
											'".$insertData['Offering2']."',
											'".$insertData['Offering3']."',
											'".$insertData['sid']."',
											'".$insertData['AcademicYearID']."',
											'".$insertData['FirstForename']."',
											'".$insertData['Surname']."',
											'".$insertData['DateOfBirth']."',
											'".$insertData['Sex']."',
											'".$insertData['Ethnicity']."',
											'".$insertData['Tel']."',
											'".$insertData['MobileTel']."',
											'".$insertData['Email']."',
											'".$insertData['Address1']."',
											'".$insertData['Address2']."',
											'".$insertData['Address3']."',
											'".$insertData['Address4']."',
											'".$insertData['PostCodeOut']."',
											'".$insertData['PostCodein']."',
											'".$insertData['LastSchool']."',
											'".$insertData['ParentFirstName']."',
											'".$insertData['ParentSurname']."',
											'".$insertData['ParentPhoneNumber']."',
											'".$insertData['ParentEmailAddress']."',
											'".$insertData['StudentDeclaration']."',
											'".$insertData['SentMarketingInfo']."',
											'".$insertData['HeardAboutCollegeID']."',
											'".$insertData['UserDefined16']."',
											'".$insertData['UserDefined17']."',
											'".$insertData['RestrictedUseAllowLearningOpportunities']."',
											'".$insertData['RestrictedUseAllowResearch']."',
											'".$insertData['RestrictedUseAllowContactByPost']."',
											'".$insertData['RestrictedUseAllowContactByTelephone']."',
											'".$insertData['RestrictedUseAllowContactByEmail']."'
											)";

	$wpdb->query($sql);

	//get_template_part( 'page', 'applyEmail' );
	include (locate_template('page-applyEmail.php')); 

	$applicationID = $wpdb->insert_id;

	for ($i=0; $i < count($insertData['qualification']); $i++) { 
			$sql ="INSERT INTO `applications_qualifications`
												(`application_id`,
											  `qualification`,
												`subject`,
												`grade`,
												`dateawarded`)
												VALUES
												('".$applicationID."',
												'".$insertData['qualification'][$i]."',
												'".$insertData['subject'][$i]."',
												'".$insertData['grade'][$i]."',
												'".$insertData['dateawarded'][$i]."')";

			$wpdb->query($sql);
	}

	// Insert runs again to backup data

	$insertDataBackup = $_SESSION['appform']['contents'];

	$sql = "INSERT INTO `application_request_backup`
										 (`RequestDate`, /* New */
										 	`Offering1ID`,
											`Offering2ID`,
											`Offering3ID`,
											`sid`,
											`AcademicYearID`,
											`FirstForename`,
											`Surname`,
											`DateOfBirth`,
											`Sex`,
											`EthnicGroupID`,
											`Tel`,
											`MobileTel`,
											`Email`,
											`Address1`,
											`Address2`,
											`Address3`,
											`Address4`,
											`PostCodeOut`,
											`PostCodein`,
											`LastSchool`,
											`ParentFirstName`,
											`ParentSurname`,
											`ParentPhoneNumber`,
											`ParentEmailAddress`,
											`StudentDeclaration`,
											`SentMarketingInfo`,
											`HeardAboutCollegeID`,
											`UserDefined16`,
											`UserDefined17`,
											`RestrictedUseAllowLearningOpportunities`,
											`RestrictedUseAllowResearch`,
											`RestrictedUseAllowContactByPost`,
											`RestrictedUseAllowContactByTelephone`,
											`RestrictedUseAllowContactByEmail`
											)
											VALUES
											(NOW(),
											'".$insertData['Offering1']."',
											'".$insertData['Offering2']."',
											'".$insertData['Offering3']."',
											'".$insertData['sid']."',
											'".$insertData['AcademicYearID']."',
											'".$insertData['FirstForename']."',
											'".$insertData['Surname']."',
											'".$insertData['DateOfBirth']."',
											'".$insertData['Sex']."',
											'".$insertData['Ethnicity']."',
											'".$insertData['Tel']."',
											'".$insertData['MobileTel']."',
											'".$insertData['Email']."',
											'".$insertData['Address1']."',
											'".$insertData['Address2']."',
											'".$insertData['Address3']."',
											'".$insertData['Address4']."',
											'".$insertData['PostCodeOut']."',
											'".$insertData['PostCodein']."',
											'".$insertData['LastSchool']."',
											'".$insertData['ParentFirstName']."',
											'".$insertData['ParentSurname']."',
											'".$insertData['ParentPhoneNumber']."',
											'".$insertData['ParentEmailAddress']."',
											'".$insertData['StudentDeclaration']."',
											'".$insertData['SentMarketingInfo']."',
											'".$insertData['HeardAboutCollegeID']."',
											'".$insertData['UserDefined16']."',
											'".$insertData['UserDefined17']."',
											'".$insertData['RestrictedUseAllowLearningOpportunities']."',
											'".$insertData['RestrictedUseAllowResearch']."',
											'".$insertData['RestrictedUseAllowContactByPost']."',
											'".$insertData['RestrictedUseAllowContactByTelephone']."',
											'".$insertData['RestrictedUseAllowContactByEmail']."'
											)";

	$wpdb->query($sql);

	$applicationIDBackup = $wpdb->insert_id;

	for ($i=0; $i < count($insertData['qualification']); $i++) { 
			$sql ="INSERT INTO `applications_qualifications_backup`
												(`application_id`,
											  `qualification`,
												`subject`,
												`grade`,
												`dateawarded`)
												VALUES
												('".$applicationID."',
												'".$insertData['qualification'][$i]."',
												'".$insertData['subject'][$i]."',
												'".$insertData['grade'][$i]."',
												'".$insertData['dateawarded'][$i]."')";

			$wpdb->query($sql);
	}

	// Browser Info

	$insertBrowserInfo = $_SESSION['appform']['contents'];

	$sql = "INSERT INTO `application_browser_info`
										 (`RequestDate`, 
											`FirstForename`,
											`Surname`,
											`Browser`
											)
											VALUES
											(NOW(),
											'".$insertData['FirstForename']."',
											'".$insertData['Surname']."',
											'".$_SERVER['HTTP_USER_AGENT']."'
											)";

	$wpdb->query($sql);

	
	?>



	<?php session_unset();
	session_destroy();
	?>
	<div class="the-content">
		<h2>Thank you for submitting your application for Knowsley Community College. </h2>
 
		<p>You will soon be contacted by a member of the KCC team to invite you to an interview. If you have any questions in the meantime, please call our Learner Services Department on <a href="tel:01514775850">0151 477 5850</a>.</p>

	</div>
  			

	<?php
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