<div class="clear"></div>
</div>


<footer id="footer" class="it-footer" role="contentinfo">
  <div class="it-footer-main">
    <div class="container">
      <section>
        <div class="row clearfix">
          <div class="col-sm-12">
            <div class="it-brand-wrapper">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home">
	               <?php 
	                  $custom_logo_id = get_theme_mod( 'custom_logo' );
	                  $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	                  if ( has_custom_logo() ) {
	                     echo '<img class="icon" src="'. esc_url( $logo[0] ) .'">';
	                  } else {
	                     echo '<img class="icon" src="'. get_template_directory_uri() . '/img/custom-logo.png' .'">';
	               } ?>
                <div class="it-brand-text">
                  <h2 class="no_toc"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h2>
                  <h3 class="no_toc d-none d-md-block"><?php bloginfo( 'description' ); ?></h3>
                </div>
              </a>
            </div>
          </div>
        </div>
      </section>


		<?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>
      <section>
        <div class="row">
				<div class="container-fluid widget-area">
				   <div class="row xoxo">
				      <?php dynamic_sidebar( 'footer-widget-area' ); ?>
				   </div>
				</div>
        </div>
      </section>
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'footer-sub-widget-area' ) ) : ?>
      <section class="py-4 border-white border-top">
        <div class="row">
				<div class="container-fluid widget-area">
				   <div class="row xoxo">
				      <?php dynamic_sidebar( 'footer-sub-widget-area' ); ?>
				   </div>
				</div>
        </div>
      </section>
		<?php endif; ?>
          
    </div>
  </div>
  <div class="it-footer-small-prints clearfix">
   <div class="container">
   	<div class="row">
			<div class="col-md">
				<?php wp_nav_menu(array( 'theme_location' => 'menu-footer', 'container' => 'ul', 'menu_class' => 'nav' )); ?>
			</div>
			<div class="col-md text-right copyright">
				<small><?php echo sprintf( __( '%1$s %2$s %3$s', 'wppa' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); ?></small>
			</div>
   		
   	</div>
	</div>
  </div>
</footer>



</div>
<?php wp_footer(); ?>
</body>
</html>