<?php get_header(); ?>
<section id="content" role="main">
   <div class="container">
      <div class="row">
      	<div class="col-sm-7">

            <?php if ( have_posts() ) : ?>
            <header class="header">
               <h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'wppa' ), get_search_query() ); ?></h1>
            </header>
            <?php while ( have_posts() ) : the_post(); ?>
            <hr>
            <?php get_template_part( 'entry' ); ?>
            <?php endwhile; ?>
            <?php get_template_part( 'nav', 'below' ); ?>
            <?php else : ?>
            <article id="post-0" class="post no-results not-found">
               <header class="header">
                  <h2 class="entry-title"><?php _e( 'Nessun risultato', 'wppa' ); ?></h2>
               </header>
               <section class="entry-content">
                  <p><?php _e( 'La ricerca non ha prodotto risultati per i termini utilizzati.', 'wppa' ); ?></p>
                  <?php get_search_form(); ?>
               </section>
            </article>
            <?php endif; ?>

   		</div>
      <div class="col-sm-4 offset-sm-1">
				<?php get_sidebar(); ?>
			</div>

		</div>
	</div>
</section>

<?php get_footer(); ?>