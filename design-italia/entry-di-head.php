<div class="row">
	<div class="offset-lg-1 col-lg-6 col-md-7">
		<div class="titolo-sezione">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php edit_post_link(); ?>
				<h2 class="mb-4"><?php the_title(); ?></h2>
				<?php if ( ! has_excerpt() ) { echo ''; } else { the_excerpt(); } ?>
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
					<a href="mailto:?subject=Condiviso&body=<?php the_title(); ?>%0D%0A<?php echo get_the_excerpt(); ?>%0D%0A<?php the_permalink(); ?>">
						<span class="it-mail"></span> Invia
					</a>
				</li>
				<li>
					<a target="_blank" href="https://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>">
						<span class="it-twitter"></span> Twitter
					</a>
				</li>
				<li>
					<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
						<span class="it-facebook"></span> Facebook
					</a>
				</li>
				<li>
					<a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php the_permalink(); ?>">
						<span class="it-linkedin"></span> LinkedIn
					</a>
				</li>
			</ul>
		</div>

		<!-- <h6>Sezioni</h6>
		<div class="argomenti">
			<?php the_category(' '); ?>
		</div> -->
		
		<?php if ( has_tag() ) { 
			echo '<div class="argomenti"><h6>Argomenti</h6>';
			the_tags('','');
			echo '</div>';
		} ?>

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
