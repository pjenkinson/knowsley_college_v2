
<?php
/**
* Template Name: PDF test
* Content Page
*
* @package knowsley_college
*/
get_header(); ?>

<?php require(TEMPLATEPATH . '/fpdf17/fpdf.php');?>

<?php
class PDF extends FPDF
{
// Load data
function LoadData($file)
{
    // Read file lines
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
    {  $data[] = explode(';',trim($line));}
    return $data;
}
 
// Simple table
function BasicTable($header, $data)
{   $i=0;
    // Header
    foreach($header as $col)
    {  $this->Cell(40,6,$col,1,0,'L'); 
    
   foreach ($data as $dat) {
    $this->Cell(80,6,$dat[$i],1,0,'C');
    $i++;    
    }
    $this->Ln();
        
    }
    
}//basic table end
 
}
?>

<?php
    $name = array($a, $b); //this is your data 
    $final = implode(";", $name); //making data ; separated
    $file = TEMPLATEPATH . '/pdf/file.txt'; // putting it in text file
    file_put_contents($file, $final);
    //PDF Creation
    $pdf = new PDF();
    // Column Headings
    $header = array('A', 'B');
    // Data loading
    $data = $pdf->LoadData($file);
    $pdf->SetFont('Arial', '', 10);
    $pdf->AddPage();
                    
    $pdf->BasicTable($header, $data);
                                    
    //Save PDF to file
 
    $pdf->Output('report.pdf', "D");
?>

<!-- Scroll to top 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'scroll' );?>

<script>
jQuery(function() {
    jQuery( "#tabs" ).tabs();
  }); 
</script>
	
</header>

<!-- Breadcrumbs
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'breadcrumbs' );?>


<!-- Main content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<main id="main" class="site-main" role="main">


<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="full-width-container factsheet-page content-page">

	<div class="fixed-container">

<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<!-- Start of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>


<section>

<?php if( get_field('tagline') ): ?>

<!-- Homepage tagline and intro paragraph
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'acf', 'homepage-tagline' );?>

<?php endif; ?>

<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>

<!-- End of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->


	
	</section>

	<aside>

    <?php if ($factsheet->programmearea == 'Apprenticeships') {?>

    <div class="the-content">
      <div class="apply-box">
      <h3>Apply online or call</h3>
      <a href="<?php the_field('enquiry'); ?>"><p class="apply-box-button"><i class="fa fa-hand-pointer-o"></i> Apply</p></a>
      <p><i class="fa fa-phone"></i><a class="tel" href="tel:01514775757"> 0151 477 5757</a></p>
      </div>
    </div>

    <?php 
} else {


  
}?>

    <?php if ($factsheet->programmearea != 'Apprenticeships') {?>

		<div class="the-content">
			<div class="apply-box">
			<h3>Apply online or call</h3>
			<a href="/apply/?courseid=<?=$factsheet->id?>"><p class="apply-box-button"><i class="fa fa-hand-pointer-o"></i> Apply</p></a>
			<p><i class="fa fa-phone"></i><a class="tel" href="tel:01514775850"> 0151 477 5850</a></p>
			</div>
		</div>

    <?php 
} else {
  
}?>

    <?php if ($factsheet->programmearea == 'Higher Education') {?>
   
    <a href="<?php the_field('performance_qualifications_link', 'option'); ?>" title="Performance Qualifications">
    <div class="higher-education-promo the-content">

     <img src="<?php the_field('performance_qualifications', 'option'); ?>" alt="Performance Qualifications">

    </div>
    </a>


    <?php 
} else {


  
}?>

<!-- Subject Information -->

  <?php if ($factsheet->programmearea == 'Access') {
   
// echo 'Access';
    
} ?>

  <?php if ($factsheet->programmearea == 'Accounting') {
   
// echo 'Accounting';
    
} ?>

 <?php if ($factsheet->programmearea == 'Apprenticeships') {
   
// echo 'Apprenticeships';
    
} ?>

 <?php if ($factsheet->programmearea == 'Art & Design') {
   
// echo 'Art & Design';
    
} ?>

 <?php if ($factsheet->programmearea == 'Beauty Therapy') {
   
// echo 'Beauty Therapy';
    
} ?>

 <?php if ($factsheet->programmearea == 'Catering & Hospitality') {
   
// echo 'Catering & Hospitality';
    
} ?>

<?php if ($factsheet->programmearea == 'Computing & IT') {
   
// echo 'Computing & IT';
    
} ?>

<?php if ($factsheet->programmearea == 'Construction') {
   
// echo 'Construction';
    
} ?>

<?php if ($factsheet->programmearea == 'Creative Media') {
   
// echo 'Creative Media';
    
} ?>

<?php if ($factsheet->programmearea == 'Early Years') {
   
// echo 'Early Years';
    
} ?>

<?php if ($factsheet->programmearea == 'Electrical Engineering') {
   
// echo 'Electrical Engineering';
    
} ?>

<?php if ($factsheet->programmearea == 'Engineering & Manufacturing') {
   
// echo 'Engineering & Manufacturing';
    
} ?>

<?php if ($factsheet->programmearea == 'English & Maths') {
   
// echo 'English & Maths';
    
} ?>

<?php if ($factsheet->programmearea == 'GCSEs') {
   
// echo 'GCSEs';
    
} ?>

<?php if ($factsheet->programmearea == 'Hairdressing & Barbering') {
   
// echo 'Hairdressing & Barbering';
    
} ?>

<?php if ($factsheet->programmearea == 'Health & Social Care') {
   
// echo 'Health & Social Care';
    
} ?>

<?php if ($factsheet->programmearea == 'Higher Education') {
   
// echo 'Higher Education';
    
} ?>

<?php if ($factsheet->programmearea == 'Music') {
   
// echo 'Music';
    
} ?>

<?php if ($factsheet->programmearea == 'Performing Arts') {
   
// echo 'Performing Arts';
    
} ?>

<?php if ($factsheet->programmearea == 'Public Services') {
   
// echo 'Public Services';
    
} ?>

<?php if ($factsheet->programmearea == 'Science') {
   
// echo 'Science';
    
} ?>

<?php if ($factsheet->programmearea == 'Sport') {
   
// echo 'Sport';
    
} ?>

<?php if ($factsheet->programmearea == 'Supported Learning') {
   
// echo 'Supported Learning';
    
} ?>

<?php if ($factsheet->programmearea == 'Travel and Tourism') {
   
// echo 'Travel and Tourism';
    
} ?>

<?php if ($factsheet->programmearea == 'Workforce Training') {
   
// echo 'Workforce Training';
    
} ?>

	</aside>



		


	</div>

</div>





</main><!-- #main -->
<?php get_footer(); ?>