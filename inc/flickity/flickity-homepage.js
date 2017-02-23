jQuery(document).ready(function( $ ) {
  
  $('.main-carousel').flickity({
  // options
  cellAlign: 'left',
  contain: true,
  draggable: false,
  autoPlay: 6000,
  pauseAutoPlayOnHover: true,
  prevNextButtons: true,
  pageDots: true,
  lazyLoad: true,
  selectedAttraction: 0.01,
  friction: 0.2
});

    $('.promo-carousel').flickity({
  // options
  cellAlign: 'left',
  contain: true,
  draggable: false,
  autoPlay: false,
  pauseAutoPlayOnHover: true,
  prevNextButtons: true,
  pageDots: true,
  lazyLoad: true,
  selectedAttraction: 0.01,
  friction: 0.2
});
  
});

jQuery(document).ready(function( $ ) {

$carousel.on( 'select.flickity', function() {

$( ".carousel-caption" ).addClass( "carousel-animation" );

})

});