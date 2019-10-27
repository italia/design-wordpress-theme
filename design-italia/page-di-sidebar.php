<?php 
   /* Template Name: DI - Pagina con sidebar */
   get_header(); 
?>

<?php get_template_part('entry-di-thumb'); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>

  <section class="wrap-argomento">
    <div class="container">
    	<div class="row box-argomento">
    		<div class="col-lg-7 col-md-7">
					<?php if ( is_singular() ) { wppa_breadcrumb(); } ?>
					<div class="titolo-sezione">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<?php edit_post_link(); ?>
							<h2 class="mb-4"><?php the_title(); ?></h2>
							<?php if ( ! has_excerpt() ) { echo ''; } else { the_excerpt(); } ?>
					  <?php endwhile; endif; ?>
					</div>
					<section id="pagina-dettaglio-testo" class="entry-content contenuto">
						<?php the_content(); ?>
						<div class="entry-links"><?php wp_link_pages(); ?></div>
					</section>
	  		</div>
	      <div class="offset-lg-1 col-lg-4 col-md-5">
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

</article>

<section id="articolo-dettaglio-meta">
  <div class="container">
    <?php if ( is_active_sidebar( 'single-footer-widget-area' ) ) : ?>
    <div class="widget-area mt-5">
       <div class="row xoxo">
          <?php dynamic_sidebar( 'single-footer-widget-area' ); ?>
       </div>
    </div>
    <?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>