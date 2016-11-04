<script>
		jQuery(document).ready(function(){
			  jQuery('#course-select').on('change', function() {
			  	var selectedValue = jQuery(this).val();
//"/16-19/course/?course=" + selectedValue
			  	window.location.href = "/16-19/course/?page_id=455&course=" + selectedValue;
			  });
		});
</script>