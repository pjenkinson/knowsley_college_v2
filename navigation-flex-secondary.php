

<?php if( get_field('navigation') == 'About KCC' ): ?>
	<nav class="nav-secondary about-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'about-menu' ) ); ?>
  </nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'School Leavers' ): ?>
	<nav class="nav-secondary">
	<?php wp_nav_menu( array( 'theme_location' => '16-19' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Apprentices' ): ?>
	<nav class="nav-secondary apprenticeships-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'apprenticeships' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Adults' ): ?>
	<nav class="nav-secondary adults-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'adults' ) ); ?>
	</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Employers' ): ?>
	<nav class="nav-secondary">
	<?php wp_nav_menu( array( 'theme_location' => 'employers' ) ); ?>
  </nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Higher Education' ): ?>
	<nav class="nav-secondary higher-education-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'higher-education' ) ); ?>
  </nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Contact' ): ?>
	<nav class="nav-secondary contact-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'contact' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Student Support' ): ?>
	<nav class="nav-secondary about-student-support-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'about-student-support-menu' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Campuses' ): ?>
	<nav class="nav-secondary about-campuses-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'campus' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Governors' ): ?>
	<nav class="nav-secondary about-governors-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'governors' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Policies' ): ?>
	<nav class="nav-secondary about-policies-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'policies' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Employers Training' ): ?>
	<nav class="nav-secondary employers-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'employers-training' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Employers Case Studies' ): ?>
	<nav class="nav-secondary employers-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'employers-case-studies' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'School Leavers Courses' ): ?>
	<nav class="nav-secondary school-leavers-nav">
	<?php wp_nav_menu( array( 'theme_location' => '16-19-subject' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Services' ): ?>
	<nav class="nav-secondary services-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'about-services' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Partners' ): ?>
	<nav class="nav-secondary partners-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'about-partners' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Adult Vocational Courses' ): ?>
	<nav class="nav-secondary adult-vocational-courses-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'adult-subject' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'WorkWorld' ): ?>
	<nav class="nav-secondary workworld">
	<?php wp_nav_menu( array( 'theme_location' => 'workworld' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Alumni' ): ?>
	<nav class="nav-secondary alumni">
	<?php wp_nav_menu( array( 'theme_location' => 'alumni-menu' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Northern Logistics Academy' ): ?>
	<nav class="nav-secondary alumni">
	<?php wp_nav_menu( array( 'theme_location' => 'nla' ) ); ?>
</nav>
<?php endif; ?>
<?php if( get_field('navigation') == 'Leisure Courses' ): ?>
	<nav class="nav-secondary leisure-courses">
	<?php wp_nav_menu( array( 'theme_location' => 'leisure-courses' ) ); ?>
</nav>
<?php endif; ?>



