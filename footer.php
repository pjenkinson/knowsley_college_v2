<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package knowsley_college
 */
?>



<footer class="<?php get_template_part( 'footer/class' );?>">

  <div class="full-width-container footer">
    
          <div class="fixed-container fixed-margin-both">

            <div class='footer-details'>

            <div class="footer-logo"><?php get_template_part( 'footer/logo' );?></div>
            <div class="footer-sitemap <?php if (is_page_template('home-higher-education-flex.php') || is_page_template('page-higher-education.php') ) { ?>sitemap-higher-education<?php }?>">
              <h3 class="footer-top-heading">Quick links</h3>

              <?php if( have_rows('sitemap', 'option') ): ?>

              <ul>
                <?php while( have_rows('sitemap', 'option') ): the_row(); ?>

                <li><a href="<?php the_sub_field('page_link'); ?><?php the_sub_field('custom_link'); ?>"><?php the_sub_field('sitemap_link_title'); ?></a></li>

                <?php endwhile; ?>

              </ul>

              <?php endif; ?>


                <h3 class="footer-top-heading">Apply</h3>
              <ul>
                <li><a href="<?php echo site_url(); ?>/apply/">Apply online</a></li>
                <li><i class="fa fa-phone"> 0151 477 5850</i></li>
              </ul>

            </div>
            <div class="footer-contact <?php if (is_page_template('home-higher-education-flex.php') || is_page_template('page-higher-education.php') ) { ?>contact-higher-education<?php }?>">
              <h3 class="footer-top-heading">Contact</h3>
              <ul>
                <li><i class="fa fa-phone"></i><a href="tel:01514775850"> 0151 477 5850</a></li>
                <li>Minicom: 0151 481 4653</li>
                <li><a href="mailto:info@knowsleycollege.ac.uk" title"info@knowsleycollege.ac.uk"> info@knowsleycollege.ac.uk</a></li>

              <?php if( have_rows('contact', 'option') ): ?>



                <?php while( have_rows('contact', 'option') ): the_row(); ?>

                <li><a href="<?php the_sub_field('page_link'); ?>"><?php the_sub_field('contact_link_title'); ?></a></li>

                <?php endwhile; ?>

              </ul>

              <?php endif; ?>

              <h3>Services</h3>

              <?php if( have_rows('services', 'option') ): ?>

              <ul>

                <?php while( have_rows('services', 'option') ): the_row(); ?>

                <li><a href="<?php the_sub_field('page_link'); ?>"><?php the_sub_field('services_link_title'); ?></a></li>

                <?php endwhile; ?>

              </ul>

              <?php endif; ?>

            </div>
            <div class="footer-last">
              <h3 class="footer-top-heading">Campuses</h3>

              <address>
              <span class="address-line"><strong><a href="<?php the_field('roby_campus_link', 'option'); ?>" title="Main Campus">Main Campus</a></strong></span>
              <span class="address-line">Stockbridge Lane</span>
              <span class="address-line">Huyton</span>
              <span class="address-line">Liverpool</span>
              <span class="address-postcode">L36 3SD</span>
              </address>

              <address>
              <span class="address-line"><strong><a href="<?php the_field('princess_drive_campus_link', 'option'); ?>" title="Main Campus: Institute of Advanced Manufacturing and Technology">Main Campus: Institute of Advanced Manufacturing and Technology</a></strong></span>
              <span class="address-line">Princess Drive</span> 
              <span class="address-line">Liverpool</span> 
              <span class="address-postcode">L14 9ND</span>
              </address>

              <address>
              <span class="address-line"><strong><a href="<?php the_field('kirkby_campus_link', 'option'); ?>" title="Kirkby Campus">Kirkby Campus</a></strong></span>
              <span class="address-line">Cherryfield Drive</span> 
              <span class="address-line">Kirkby</span> 
              <span class="address-postcode">L32 8SF</span>
              </address>

            </div>

            </div>

          </div>  
    
  </div>
  <!-- Partners -->

  <div class="college-info-partnerships full-width-container">
    <div class="fixed-container">

      <img src="<?php echo get_bloginfo('template_directory');?>/images/partners-footer.png" alt="KCC Partners">

    </div>
  <!-- End of partners -->

</footer>
  
  
</div>


<?php wp_footer(); ?>

<script>

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
  
});

jQuery(document).ready(function( $ ) {

$carousel.on( 'select.flickity', function() {

$( ".carousel-caption" ).addClass( "carousel-animation" );

})

});

</script>


</body>
</html>
	

