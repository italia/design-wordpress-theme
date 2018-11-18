<?php get_header(); ?>
<section id="content" role="main" class="container">
   <div class="container">
      <div class="row">
      	<div class="col-sm-7">

				<header class="header">
		      <h1 class="entry-title"><?php 
					if ( is_day() ) { printf( __( 'Archivi giornalieri: %s', 'wppa' ), get_the_time( get_option( 'date_format' ) ) ); }
					elseif ( is_month() ) { printf( __( 'Archivi mensili: %s', 'wppa' ), get_the_time( 'F Y' ) ); }
					elseif ( is_year() ) { printf( __( 'Archivi annuali: %s', 'wppa' ), get_the_time( 'Y' ) ); }
					else { _e( 'Archivi', 'wppa' ); }
					?></h1>
					</header>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

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