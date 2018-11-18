<?php get_header(); ?>
<section id="content" role="main" class="container">
   <div class="container">
      <div class="row">
      	<div class="col-sm-7">
  
					<header class="header">
						<?php the_post(); ?>
						<h1 class="entry-title author"><?php _e( 'Archivio per l\'autore', 'wppa' ); ?>: <?php the_author_link(); ?></h1>
						<?php if ( '' != get_the_author_meta( 'user_description' ) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . get_the_author_meta( 'user_description' ) . '</div>' ); ?>
						<?php rewind_posts(); ?>
					</header>
					<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'entry' ); ?>
					<?php endwhile; ?>
					<?php get_template_part( 'nav', 'below' ); ?>

   		</div>
      <div class="col-sm-4 offset-sm-1">
         <?php get_sidebar(); ?>
      </div>

		</div>
	</div>
</section>

<?php get_footer(); ?>