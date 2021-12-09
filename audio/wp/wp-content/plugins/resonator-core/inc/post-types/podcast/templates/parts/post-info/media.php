<?php
$podcast_media = get_post_meta( get_the_ID(), 'qodef_podcast_media', true );

if ( ! empty ( $podcast_media ) ) { ?>
	<div class="qodef-e qodef-magnific-popup qodef-popup-gallery">
		<?php foreach ( $podcast_media as $media ) {
			$type       = $media['qodef_podcast_media_type'];
			$media_name = 'qodef_podcast_' . $type;
			
			$params          = array();
			$params['media'] = $media[ $media_name ];
			
			resonator_core_template_part( 'post-types/podcast', 'templates/parts/media/media', $type, $params );
		} ?>
	</div>
<?php }