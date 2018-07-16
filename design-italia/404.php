<?php get_header(); ?>
<section id="content" class="container">
   <div class="container">
      <div class="row">

  	    <div class="col-lg-8 offset-lg-2">
			   <article id="post-0" class="post not-found">
			      <header class="header">
			         <h1 class="entry-title"><?php _e( '404 Pagina non trovata', 'wppa' ); ?></h1>
			      </header>
			      <section class="entry-content">
			         <p><?php _e( 'La pagina che stavi cercando non esiste. Utilizza in Cerca oppure torna in homepage.', 'wppa' ); ?></p>
			         <?php get_search_form(); ?>
			      </section>
			   </article>
	 		</div>

 		</div>
	</div>
</section>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>