<?php
/*
Template Name: Courses
*
  Courses page, links through to Course sections e.g Higher Education.
 *
 * @package knowsley_college
 */

get_header(); ?>

  <!-- Slider
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <div class="slider">

    <?php putRevSlider( "homepage" ) ?>
  

  </div>

  


</header>


  
  <!-- Main content
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <main id="main" class="site-main" role="main">


  <!-- Courses section
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <section class="full-width-container courses-section">

    <div class="fixed-container">

      <h1 class="section-heading">Courses</h1>

      <p class="content-snippet-intro">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat.</p>

      <div class="course-snippet-containers">
        
        <div class="course-category-snippet">

        <a href="#" title="16-19 School Leavers">
          <span>16-19 School Leavers</span>
        </a>
        <img class="course-category-thumb" src="<?php echo get_bloginfo('template_directory');?>/images/course-category-thumb/higher-education.jpg"> 
        

        </div>


        <div class="course-category-snippet">

        
        <a href="#" title="Higher Education">
          <span>Higher Education</span>
        </a>
        <img class="course-category-thumb" src="<?php echo get_bloginfo('template_directory');?>/images/course-category-thumb/higher-education.jpg"> 

   
        </div>

        <div class="course-category-snippet last">

        <a href="#" title="Apprenticeships">
          <span>Apprenticeships</span>
        </a>
        <img class="course-category-thumb" src="<?php echo get_bloginfo('template_directory');?>/images/course-category-thumb/higher-education.jpg"> 

 
        </div>

        <div class="course-category-snippet">

        <a href="#" title="16-19 School Leavers">
          <span>16-19 School Leavers</span>
        </a>
        <img class="course-category-thumb" src="<?php echo get_bloginfo('template_directory');?>/images/course-category-thumb/higher-education.jpg"> 
        

        </div>


        <div class="course-category-snippet">

        
        <a href="#" title="Higher Education">
          <span>Higher Education</span>
        </a>
        <img class="course-category-thumb" src="<?php echo get_bloginfo('template_directory');?>/images/course-category-thumb/higher-education.jpg"> 

   
        </div>

        <div class="course-category-snippet last">

        <a href="#" title="Apprenticeships">
          <span>Apprenticeships</span>
        </a>
        <img class="course-category-thumb" src="<?php echo get_bloginfo('template_directory');?>/images/course-category-thumb/higher-education.jpg"> 

 
        </div>

      </div>



        <div class="button-default section-margin-top">
        <a href="#" title="Find out more">Find out more</a>
        </div>

  </section>

  <!-- Courses text list section
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <section class="full-width-container courses-text-list-section">

    <div class="fixed-container">

      <h2>More courses</h2>

      <div class="course-text-list-container">

        <ul class="course-text-list">
          <li class="course-text-list-item"><a href="#">Course type 1<i class="fa fa-arrow-circle-o-right"></i></a></li>
          <li class="course-text-list-item"><a href="#">Course type 1<i class="fa fa-arrow-circle-o-right"></i></a></li>
          <li class="course-text-list-item"><a href="#">Course type 1<i class="fa fa-arrow-circle-o-right"></i></a></li>
        </ul>

        <ul class="course-text-list">
          <li class="course-text-list-item"><a href="#">Course type 1<i class="fa fa-arrow-circle-o-right"></i></a></li>
          <li class="course-text-list-item"><a href="#">Course type 1<i class="fa fa-arrow-circle-o-right"></i></a></li>
          <li class="course-text-list-item"><a href="#">Course type 1<i class="fa fa-arrow-circle-o-right"></i></a></li>
        </ul>

      </div>

    </div>



  </section>




  </main>


<?php get_footer(); ?>