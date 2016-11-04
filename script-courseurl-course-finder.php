<script>
		jQuery(document).ready(function(){
			  jQuery('#course-select').on('change', function() {
			  	var selectedValue = jQuery(this).val();
//"/16-19/course/?course=" + selectedValue
			  	window.location.href = "/courses/?page_id=1770&course=" + selectedValue;
			  });
		});
</script>