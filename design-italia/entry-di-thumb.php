<?php if (is_single()) {
	if ( has_post_thumbnail() ) { 
		echo '<section class="entry-content thumbnail">';
		the_post_thumbnail('single-alignfull-thumb', array('class' => 'alignfull')); 
		echo '<p class="dida">';
		the_post_thumbnail_caption(); 
		echo '</p>';
		echo '</section>';
	} 
} else if (is_page()) {
	if ( has_post_thumbnail() ) { 
		echo '<section class="entry-content thumbnail thumbnail-page">';
		the_post_thumbnail('single-alignfull-thumb', array('class' => 'alignfull')); 
		echo '<p class="dida">';
		/* echo '<p class="dida">';
		the_post_thumbnail_caption(); 
		echo '</p>'; */
		echo '</section>';
	} 
} ?>
