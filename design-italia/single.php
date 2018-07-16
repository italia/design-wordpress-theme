<?php get_header(); ?>
<section id="content" role="main" class="container">
   <div class="container">
      <div class="row">

      <div class="col-md-7">
		   <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		   <?php get_template_part( 'entry' ); ?>
		   <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
		   <?php endwhile; endif; ?>
	   </div>
      <div class="col-md-4 offset-md-1">
         <?php get_sidebar(); ?>
      </div>
      
      </div>
   </div>

   <!-- <footer class="footer">
      <?php get_template_part( 'nav', 'below-single' ); ?>
   </footer> -->

</section>
<?php get_footer(); ?>