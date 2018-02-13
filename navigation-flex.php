<?php if( get_field('navigation') == 'About KCC' ): ?>
	<nav class="nav-home about-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'about-menu' ) ); ?>
  </nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'School Leavers' ): ?>
	<nav class="nav-home">
	<?php wp_nav_menu( array( 'theme_location' => '16-19' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'A Levels' ): ?>
	<nav class="nav-home">
	<?php wp_nav_menu( array( 'theme_location' => 'school-leavers-a-levels' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Apprentices' ): ?>
	<nav class="nav-home apprenticeships-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'apprenticeships' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Adults' ): ?>
	<nav class="nav-home adults-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'adults' ) ); ?>
	</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Adults 2018' ): ?>
	<nav class="nav-secondary adults-2018">
	<?php wp_nav_menu( array( 'theme_location' => 'adults-2018' ) ); ?>
	</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Adults 2018 Courses' ): ?>
	<nav class="nav-secondary adults-2018-courses">
	<?php wp_nav_menu( array( 'theme_location' => 'adults-2018-courses' ) ); ?>
	</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Adults Finance' ): ?>
	<nav class="nav-secondary adults-finance">
	<?php wp_nav_menu( array( 'theme_location' => 'adults-finance' ) ); ?>
	</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Eduroam' ): ?>
	<nav class="nav-secondary eduroam-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'eduroam' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Employers' ): ?>
	<nav class="nav-home">
	<?php wp_nav_menu( array( 'theme_location' => 'employers' ) ); ?>
  </nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Employers Case Studies' ): ?>
	<nav class="nav-home employers-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'employers-case-studies' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Adult GCSE' ): ?>
	<nav class="nav-secondary adults-gcse">
	<?php wp_nav_menu( array( 'theme_location' => 'adults-gcse' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Higher Education' ): ?>
	<nav class="nav-home higher-education-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'higher-education' ) ); ?>
  </nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Contact' ): ?>
	<nav class="nav-home contact-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'contact' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Student Support' ): ?>
	<nav class="nav-home about-student-support-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'about-student-support-menu' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Campuses' ): ?>
	<nav class="nav-home about-campuses-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'campus' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Governors' ): ?>
	<nav class="nav-home about-governors-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'governors' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Policies' ): ?>
	<nav class="nav-home about-policies-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'policies' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Employers Training' ): ?>
	<nav class="nav-home employers-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'employers-training' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'School Leavers Courses' ): ?>
	<nav class="nav-home school-leavers-nav">
	<?php wp_nav_menu( array( 'theme_location' => '16-19-subject' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Services' ): ?>
	<nav class="nav-home services-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'about-services' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Hair and Beauty Salon' ): ?>
	<nav class="nav-home services-hair-beauty-salon-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'services-hair-beauty-salon' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Partners' ): ?>
	<nav class="nav-home partners-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'about-partners' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Adult Vocational Courses' ): ?>
	<nav class="nav-home adult-vocational-courses-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'adult-subject' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'WorkWorld' ): ?>
	<nav class="nav-home workworld">
	<?php wp_nav_menu( array( 'theme_location' => 'workworld' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Alumni' ): ?>
	<nav class="nav-home alumni">
	<?php wp_nav_menu( array( 'theme_location' => 'alumni-menu' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Northern Logistics Academy' ): ?>
	<nav class="nav-home northern-logistics-academy">
	<?php wp_nav_menu( array( 'theme_location' => 'nla' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Leisure Courses' ): ?>
	<nav class="nav-home leisure-courses">
	<?php wp_nav_menu( array( 'theme_location' => 'leisure-courses' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Supported Learning' ): ?>
	<nav class="nav-home supported-learning">
	<?php wp_nav_menu( array( 'theme_location' => 'supported-learning' ) ); ?>
</nav>
<?php endif; ?>




