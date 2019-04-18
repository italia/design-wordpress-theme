<?php
/*
 * Template Name: DI - Articolo senza sidebar
 * Template Post Type: post, product
 */
 
 get_header(); ?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	
	<section class="container">
	  <div class="row">
	    <div class="offset-lg-1 col-lg-9 col-md-12">
				<?php if ( is_singular() ) { wppa_breadcrumb(); } ?>
	    </div>
	  </div>
	</section>

	<section class="container">
		<?php get_template_part( 'entry-di-head' ); ?>
	</section>

  <section id="articolo-dettaglio-testo">
    <div class="container">
      <div class="row">
        <div class="col-12">
					<?php get_template_part( 'entry-di-thumb' ); ?>
				</div>
    	</div>
    	<div class="row">
    		<div class="offset-md-1 col-md-10">
					<section class="entry-content contenuto">
						<?php the_content(); ?>
						<div class="entry-links"><?php wp_link_pages(); ?></div>
					</section>
	  		</div>
    	</div>
    	<div class="row">
	      <div class="col-md-12 mt-4 mb-2">
					<section class="entry-nav-below">
						<?php get_template_part( 'nav', 'below-single' ); ?>
					</section>
	      </div>
    	</div>
  	</div>
	</section>


  <section id="articolo-dettaglio-meta">

    <div class="container">
      <?php if ( is_active_sidebar( 'single-footer-widget-area' ) ) : ?>
      <div class="widget-area">
         <div class="row xoxo">
            <?php dynamic_sidebar( 'single-footer-widget-area' ); ?>
         </div>
      </div>
      <?php endif; ?>

    	<div class="row">
	      <div class="offset-md-3 col-md-6 mt-5 mb-5 text-center">
					<?php if ( has_tag() ) { 
						echo '<div class="argomenti"><h4 class="mb-4">Argomenti</h4>';
						the_tags('','');
						echo '</div>';
					} ?>
	      </div>
    	</div>
  	</div>
	</section>


</article>


<?php get_footer(); ?>
