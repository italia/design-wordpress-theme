<?php 
/**
 * Template name: Pagina home
 * 
**/
get_header(); ?>
<section id="content" role="main" class="container">
   <div class="container">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
         <header class="header">
            <?php // if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
      		<?php if ( !is_search() ) get_template_part( 'entry-footer' ); ?>
      		<?php if ( !is_search() ) get_template_part( 'entry', 'meta' ); ?>
            <h4 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
         </header>
         <section class="entry-content">
            <?php edit_post_link(); ?>
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
      <div class="widget-area">
         <div class="row xoxo">
            <?php dynamic_sidebar( 'home-widget-area' ); ?>
         </div>
      </div>
      <?php endif; ?>

   </div>
</section>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>