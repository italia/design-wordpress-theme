						<article id="post-<?php the_ID(); ?>" <?php post_class('card card-bg'); ?> >
							<?php if ( has_post_thumbnail() ) { ?>
								<div class="card-img-top">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php the_post_thumbnail('mansory-thumb', array('class' => 'img-fluid')); ?>
									</a>
								</div><!--/.post-thumbnail-->
							<?php   
								} 
							?>
							<div class="card-body">
								<div class="category-top">
									<strong><?php the_category(', '); ?></strong>
									<span class="data"><?php the_date(); ?></span>
								</div>
								<header class="entry-header">
									<?php edit_post_link(); ?>
									<?php the_title( '<h5 class="card-title big-heading">', '</h5>' ); ?>
								</header><!-- .entry-header -->
								<div class="card-text">
									<?php the_excerpt(); ?>
								</div><!-- .entry-summary -->
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="read-more">Leggi di pi&ugrave; &nbsp;<span class="it-arrow-right"></span></a>
							</div>
						
						</article><!-- #post-## -->