<div class="live-search">
	<script>
		jQuery(document).ready(function(){
			jQuery("#live-search").autocomplete({
		        source: "/search-test",
		        minLength: 2,
		        select: function(event, ui) {
		        	//console.log(ui.item.id);
		        	//console.log(ui.item.label);
		        	//console.log(ui.item.value);

		        	window.location.href = "/course-finder/factsheet/?factsheet=" + ui.item.id;
			 
			        return false;
		        }
		    });
		});
	</script>
	<input type="text" name="live-search" id="live-search" placeholder="Search for a course">
</div>