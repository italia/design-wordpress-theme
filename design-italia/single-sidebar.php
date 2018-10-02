<?php
/*
 * Template Name: Articolo senza sidebar
 * Template Post Type: post, product
 */
 
 get_header(); ?>
<section id="content" role="main" class="container">
   <div class="container">
      <div class="row">

	      <div class="col-lg-8 offset-lg-2">
			   <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			   <?php get_template_part( 'entry' ); ?>
			   <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
			   <?php endwhile; endif; ?>
		   </div>
      </div>
   </div>

</section>
<?php get_footer(); ?>