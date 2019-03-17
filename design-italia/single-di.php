<?php
/*
 * Template Name: Articolo DI
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
		<div class="row">
			<div class="offset-lg-1 col-lg-6 col-md-7">
				<div class="titolo-sezione">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php edit_post_link(); ?>
						<h2 class="mb-4"><?php the_title(); ?></h2>
						<?php the_excerpt(); ?>
				   <?php endwhile; endif; ?>
				</div>
			</div>
			<div class="offset-lg-2 col-lg-3 offset-md-2 col-md-3">
				<div class="condividi">
					<label for="show-menu-moreaction" class="show-menu-moreaction"><small>&#8942; Vedi azioni</small></label>
					<input type="checkbox" id="show-menu-moreaction" role="button">

					<ul class="menu-moreaction">
						<li>
							<a href="#" onclick="window.print();return false;">
								<span class="it-print"></span> Stampa
							</a>
						</li>
						<li>
							<a href="mailto:?subject=Condiviso&body=<?php the_title(); ?>%0D%0A<?php the_excerpt(); ?>">
								<span class="it-mail"></span> Invia
							</a>
						</li>
						<li>
							<a target="_blank" href="https://twitter.com/home?status=<?php the_title(); ?> - <?php echo 'http://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>">
								<span class="it-twitter"></span> Twitter
							</a>
						</li>
						<li>
							<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo 'http://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>">
								<span class="it-facebook"></span> Facebook
							</a>
						</li>
						<li>
							<a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo 'http://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>&title=<?php the_title(); ?>&summary=&source=<?php echo 'http://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>">
								<span class="it-linkedin"></span> LinkedIn
							</a>
						</li>
					</ul>
				</div>

				<div class="argomenti">
					<h6>Argomenti</h6>
					<?php the_tags('',''); ?>
				</div>

				<!-- <h6>Sezioni</h6>
				<div class="argomenti">
					<?php the_category(' '); ?>
				</div> -->
			</div>
		</div>
		<div class="row mt-2">
			<div class="offset-xl-1 col-xl-2 offset-lg-1 col-lg-3 col-md-3">
				<p>
					<small>Data: </small><br>
					<small><strong><?php the_time( get_option( 'date_format' ) ); ?></strong></small>
				</p>
			</div>
			<!-- <div class="offset-xl-1 col-xl-2 offset-lg-1 col-lg-3 offset-md-1 col-md-3">
				<p class="lettura-articolo"><span>Tempo di lettura:</span><br><strong>3 min</strong></p>
			</div> -->
		</div>
	</section>


  <section id="articolo-dettaglio-testo">
    <div class="container">
      <div class="row">
        <div class="col-12">
					<section class="entry-content thumbnail">
						<?php if ( has_post_thumbnail() ) { 
							the_post_thumbnail('single-alignfull-thumb', array('class' => 'alignfull')); 
						} ?>
						<p class="dida"><?php the_post_thumbnail_caption() ?></p>
					</section>
				</div>
    	</div>
    	<div class="row">
	      <div class="col-md-3">
 	       <?php get_sidebar(); ?>
	      </div>
    		<div class="offset-md-1 col-md-6">
					<section class="entry-content contenuto">
						<?php the_content(); ?>
						<div class="entry-links"><?php wp_link_pages(); ?></div>
					</section>
	  		</div>
    	</div>
  	</div>
	</section>


  <section id="articolo-dettaglio-meta">
    <div class="container">
    	<div class="row">
	      <div class="offset-md-3 col-md-6 mt-5 mb-5 text-center">
					<div class="argomenti">
						<h6>Argomenti</h6>
						<?php the_tags('',''); ?>
					</div>
	      </div>
    	</div>
  	</div>
	</section>


				
				
</article>


<?php get_footer(); ?>
