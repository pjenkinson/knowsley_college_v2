<?php
/**
 * Breadcrumbs.
 * @package knowsley_college
 */
?>

<div class="full-width-container primary-breadcrumbs <?php if (is_page_template('home-higher-education.php')) { ?>breadcrumbs-higher-education<?php }?>">
	<div class="fixed-container">
		<div id="breadcrumbs">
			<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
				<?php if(function_exists('bcn_display'))
				{
				bcn_display();
				}?>
			</div>
		</div>
	</div>
</div>
