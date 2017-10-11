// Keeps secondary menu open when window is = or < 1140px 


// media query event handler
if (matchMedia) {
  var mq = window.matchMedia("(min-width: 1180px)");
  mq.addListener(WidthChange);
  WidthChange(mq);
}

// media query change
function WidthChange(mq) {
  if (mq.matches) {
    jQuery( document ).ready(function() {
        jQuery( ".nav-secondary .mega-menu-toggle" ).css( "display", "none" );
        jQuery( ".nav-secondary .mega-menu-toggle" ).addClass( "mega-menu-open" );
});
  } else {
     
  }

}
  