<?php
/**
 * Breadcrumbs.
 */
?>

<div class="full-width-container primary-breadcrumbs">
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
