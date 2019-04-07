<section class="entry-content thumbnail">
	<?php if ( has_post_thumbnail() ) { 
		the_post_thumbnail('single-alignfull-thumb', array('class' => 'alignfull')); 
		echo '<p class="dida">';
		the_post_thumbnail_caption(); 
		echo '</p>';
	} ?>
</section>