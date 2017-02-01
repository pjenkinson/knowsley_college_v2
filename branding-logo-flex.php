<?php if( get_field('branding') == 'KCC Primary' ): ?>

<img width="150px" height="71px" class="desktop-logo" src="<?php echo get_bloginfo('template_directory');?>/images/kcc-logo.svg" alt="Knowsley Community College">


	
<?php elseif( get_field('branding') == 'Higher Education' ): ?>

<img class="desktop-logo" src="<?php echo get_bloginfo('template_directory');?>/images/kcc-logo-he.svg" alt="Knowsley Community College"> 

	
<?php elseif( get_field('branding') == 'Employers' ): ?>

<img class="desktop-logo" src="<?php echo get_bloginfo('template_directory');?>/images/kcc-employers.svg" alt="Knowsley Community College"> 

	
<?php elseif( get_field('branding') == 'Lee Stafford' ): ?>

<img class="desktop-logo" src="<?php echo get_bloginfo('template_directory');?>/images/kcc-logo-lee-stafford.svg" alt="Knowsley Community College">

<?php elseif( get_field('branding') == 'The Bistro' ): ?>

<img class="desktop-logo" src="<?php echo get_bloginfo('template_directory');?>/images/kcc-logo-the-bistro.svg" alt="Knowsley Community College">

<?php elseif( get_field('branding') == 'WorkWorld' ): ?>

<img class="desktop-logo" src="<?php echo get_bloginfo('template_directory');?>/images/kcc-logo-workworld.svg" alt="Knowsley Community College">

<?php elseif( get_field('branding') == 'IAMT' ): ?>

<img class="desktop-logo" src="<?php echo get_bloginfo('template_directory');?>/images/kcc-logo-iamt.svg" alt="Knowsley Community College">

<?php elseif( get_field('branding') == 'KCC Live' ): ?>

<img class="desktop-logo" src="<?php echo get_bloginfo('template_directory');?>/images/kcc-logo-kcc-live.svg" alt="Knowsley Community College">

<?php elseif( get_field('branding') == 'Studio 115' ): ?>

<img class="desktop-logo" src="<?php echo get_bloginfo('template_directory');?>/images/kcc-logo-studio-115.svg" alt="Knowsley Community College">

<?php elseif( get_field('branding') == 'Northern Logistics Academy' ): ?>

<img class="desktop-logo" src="<?php echo get_bloginfo('template_directory');?>/images/kcc-logo-nla.svg" alt="Knowsley Community College">

<?php else: {?>
	<img width="150px" height="71px" class="desktop-logo" src="<?php echo get_bloginfo('template_directory');?>/images/kcc-logo.svg" alt="Knowsley Community College">
<?php }?>

<?php endif; ?>





