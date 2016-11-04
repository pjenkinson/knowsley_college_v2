<script>

jQuery(document).ready(function() {
  jQuery.scrollUp();
});


jQuery(document).ready(function() {
  jQuery.scrollUp({
    scrollName: 'scrollUp', // Element ID
    topDistance: '100', // Distance from top before showing element (px)
    topSpeed: 300, // Speed back to top (ms)
    animation: 'fade', // Fade, slide, none
    animationInSpeed: 200, // Animation in speed (ms)
    animationOutSpeed: 200, // Animation out speed (ms)
    scrollText: 'Scroll to top', // Text for element
    activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
  });
});
</script>
