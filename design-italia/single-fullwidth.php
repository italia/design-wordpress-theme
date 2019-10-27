<?php
/*
 * Template Name: Articolo full-width
 * Template Post Type: post, product
 */
 
 get_header(); ?>
<section id="content" role="main" class="container mt-4 mb-4">
   <div class="container">
      <div class="row">

	      <div class="col-12">
			   <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			   <?php get_template_part( 'entry' ); ?>
			   <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
			   <?php endwhile; endif; ?>
		   </div>

      </div>
   </div>

   <footer class="footer">
      <?php get_template_part( 'nav', 'below-single' ); ?>
   </footer>

</section>
<?php get_footer(); ?>