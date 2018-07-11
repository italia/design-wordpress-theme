<?php 
/**
 * Template name: Homepage
 * 
**/
get_header(); ?>
<section id="content" role="main" class="container">
   <div class="container">
      
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
         <header class="header sr-only">
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php edit_post_link(); ?>
         </header>
         <section class="entry-content">
            <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
            <?php the_content(); ?>
            <div class="entry-links"><?php wp_link_pages(); ?></div>
         </section>
      </article>
      <?php // if ( ! post_password_required() ) comments_template( '', true ); ?>
      <?php endwhile; endif; ?>

   </div>
</section>

<section class="home-widget">
   <div class="container">

      <?php if ( is_active_sidebar( 'home-widget-area' ) ) : ?>
      <div class="container-fluid widget-area">
         <ul class="row xoxo">
            <?php dynamic_sidebar( 'home-widget-area' ); ?>
         </ul>
      </div>
      <?php endif; ?>

   </div>
</section>
      
<?php //get_sidebar(); ?>
<?php get_footer(); ?>