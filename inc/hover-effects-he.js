jQuery(document).ready(function() {

jQuery('.page-sections').hover(
       function(){ jQuery(this).find(".page-description .heading").css("background-color", "#8466a1") },   
       function(){ jQuery(this).find(".page-description .heading").css("background-color", "") }
      
)

jQuery('.page-sections').hover(
      function(){ jQuery(this).find(".page-description .heading h3").css("color", "white") },
      function(){ jQuery(this).find(".page-description .heading h3").css("color", "") }
      
)

  
});



  