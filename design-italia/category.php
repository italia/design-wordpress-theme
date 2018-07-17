<?php get_header(); ?>
<section id="content" role="main" class="container">
   <div class="container">
      <div class="row">
      	<div class="col-sm-7">
      	
					<header class="header">
						<h1 class="entry-title"><?php _e( 'Archivio per: ', 'wppa' ); ?><?php single_cat_title(); ?></h1>
						<?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>
					</header>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<hr>
					<?php get_template_part( 'entry' ); ?>
					<?php endwhile; endif; ?>
					<?php get_template_part( 'nav', 'below' ); ?>
   
   		</div>
      <div class="col-sm-4 offset-sm-1">
         <?php get_sidebar(); ?>
      </div>

		</div>
	</div>
</section>

<?php get_footer(); ?>