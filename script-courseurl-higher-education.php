<script>
		jQuery(document).ready(function(){
			  jQuery('#course-select').on('change', function() {
			  	var selectedValue = jQuery(this).val();
//"/16-19/course/?course=" + selectedValue
			  	window.location.href = "/kcc_wordpress/wordpress/?page_id=242&course=" + selectedValue;
			  });
		});
</script>