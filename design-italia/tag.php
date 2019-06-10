<?php get_header(); ?>
<section id="content" role="main" class="container">
   <div class="container">
      <div class="row">
      	<div class="col">
	  	
				  <header class="header mt-5 mb-5">
			      <h3 class="entry-title"><?php _e( 'Tag Archives: ', 'wppa' ); ?><?php single_tag_title(); ?></h3>
			   	</header>

					<div class="widget_category_mansory">
						<div class="card-columns">
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'entry-dl-card' ); ?>
							<?php endwhile; endif; ?>
						</div>
					</div>

					<?php get_template_part( 'nav', 'below' ); ?>

   		</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>