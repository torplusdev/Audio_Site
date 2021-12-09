<?php

if ( have_posts() ) {
	while ( have_posts() ) : the_post();
		
		// Hook to include additional content before post item
		do_action( 'resonator_core_action_before_podcast_item' );
		
		$item_layout = 'custom';
		
		// Include post item
		resonator_core_template_part( 'post-types/podcast', 'variations/' . $item_layout . '/layout/' . $item_layout );
		
		// Hook to include additional content after post item
		do_action( 'resonator_core_action_after_podcast_item' );
	
	endwhile; // End of the loop.
} else {
	// Include global posts not found
	resonator_core_theme_template_part( 'content', 'templates/parts/posts-not-found' );
}

wp_reset_postdata();