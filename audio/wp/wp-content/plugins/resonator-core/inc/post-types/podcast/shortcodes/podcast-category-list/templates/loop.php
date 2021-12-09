<?php

if ( ! empty( $taxonomy_items ) ) {
	foreach ( $taxonomy_items as $taxonomy_item ) {
		$params['term_id']         = $taxonomy_item->term_id;
		$params['image_dimension'] = $this_shortcode->get_list_item_image_dimension( $params );
		$params['item_classes']    = $this_shortcode->get_item_classes( $params );
		
		resonator_core_template_part( 'post-types/podcast/shortcodes/podcast-category-list', 'variations/' . $layout . '/templates/' . $layout, '', $params );
	}
} else {
	// Include global posts not found
	resonator_core_theme_template_part( 'content', 'templates/parts/posts-not-found' );
}