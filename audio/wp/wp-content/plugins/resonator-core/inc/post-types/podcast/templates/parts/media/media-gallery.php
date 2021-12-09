<?php
if ( isset( $media ) && ! empty( $media ) ) {
	$images = explode( ',', $media );
	
	foreach ( $images as $image ) {
		$params          = array();
		$params['media'] = $image;
		resonator_core_template_part( 'post-types/podcast', 'templates/parts/media/media', 'image', $params );
	}
}