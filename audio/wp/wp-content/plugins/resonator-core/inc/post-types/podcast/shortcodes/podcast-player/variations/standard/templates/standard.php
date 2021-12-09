<div class="qodef-m-player-box">
	<div class="qodef-e-image">
		<?php echo get_the_post_thumbnail( $podcast_id, 'resonator_image_size_square' ); ?>
	</div>
	<div class="qodef-m-box-info">
		<div class="qodef-m-title-area">
			<a class="qodef-e-title-link" href="<?php echo get_the_permalink($podcast_id) ?>">
				<h3 itemprop="name" class="qodef-e-title entry-title qodef-podcast-title">
					<?php echo get_the_title($podcast_id); ?>
				</h3>
			</a>
			<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-player', 'post-info/read-more', '', $params ); ?>
		</div>
		<div class="qodef-m-info-top">
			<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-player', 'post-info/episode-number', '', $params ); ?>
			<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-player', 'post-info/category', '', $params ); ?>


			<?php
			$podcast_media = wp_get_attachment_url(get_post_meta( $podcast_id, 'qodef_podcast_file', true ));

			if( ! empty ( $podcast_media ) ) {
				$audio_id = attachment_url_to_postid($podcast_media);
				$audio_metadata = get_post_meta( $audio_id , '_wp_attachment_metadata', true ); ?>
				<div class="qodef-recipe-video-length">
					<?php echo esc_html($audio_metadata['length_formatted']);  ?>
				</div>
			<?php } ?>

		</div>
		<?php $current_id = is_singular() ? $podcast_id : 0; ?>
		<div class="qodef-podcast-player" data-playing-id="<?php echo esc_attr($current_id); ?>">
			<audio>
				<source src="<?php echo esc_url($podcast_media); ?>" type="audio/mp3" />
			</audio>
		</div>
	</div>
</div>
