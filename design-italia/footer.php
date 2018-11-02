<div class="clear"></div>
</div>

<footer id="footer" role="contentinfo">

   <div class="container">

      <div class="row">
         <div class="col-2 col-lg-1">
         	<?php wppa_the_custom_logo(); ?>
         </div>
         <div class="col">
            <div>
					<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h2>
            </div>
            <div><?php bloginfo( 'description' ); ?></div>
         </div>
		</div>
	      
		<?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>
		<div class="container-fluid widget-area">
		   <ul class="row xoxo">
		      <?php dynamic_sidebar( 'footer-widget-area' ); ?>
		   </ul>
		</div>
		<?php endif; ?>

	<hr>
	
		<div class="row">
			<div class="col-auto">
				<?php wp_nav_menu(array( 'theme_location' => 'menu-footer', 'container' => 'ul', 'menu_class' => 'nav' )); ?>
			</div>
			<div class="col copyright">
				<p class="text-right">
					<?php echo sprintf( __( '%1$s %2$s %3$s', 'wppa' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); ?>
				</p>
			</div>
		</div>

   </div>

</footer>

</div>
<?php wp_footer(); ?>
</body>
</html>