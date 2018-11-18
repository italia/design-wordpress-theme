<?php 
   /* Template Name: Pagina con sidebar */
   get_header(); 
?>
<section id="content" role="main" class="container">
   <div class="container">
      <div class="row">

      <div class="col-md-7">
         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
         <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="header">
               <h1 class="entry-title"><?php the_title(); ?></h1>
               <?php edit_post_link(); ?>
            </header>
            <section class="entry-content">
               <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
               <?php the_content(); ?>
               <div class="entry-links"><?php wp_link_pages(); ?></div>
            </section>
         </article>
         <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
         <?php endwhile; endif; ?>
      </div>
      
      <div class="col-sm-4 offset-sm-1">
   		<?php if ( is_active_sidebar( 'page-widget-area' ) ) : ?>
   		<div class="container-fluid widget-area page-widget-area">
   		   <ul class="xoxo">
   		      <?php dynamic_sidebar( 'page-widget-area' ); ?>
   		   </ul>
   		</div>
   		<?php endif; ?>
		</div>
      
      </div>
   </div>
</section>

<?php get_footer(); ?>