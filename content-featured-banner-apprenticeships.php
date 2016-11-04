<?php
echo '<div class="featured-banner">' . '<div class="banner-heading">' ;
echo '<h1>'; echo'Apprenticeship Vacancies';
echo '</h1>';
echo '</div>';?>
<img src="<?php the_field('apprenticeship_featured_image', 'option'); ?>" alt="<?php post_type_archive_title(); ?>"> 
<?php echo '</div>';?>
