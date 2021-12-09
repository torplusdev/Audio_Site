<div class="qodef-m-player-box">
	<div class="qodef-m-box-info">
		<a class="qodef-e-title-link" href="<?php echo get_the_permalink($podcast_id) ?>">
			<h2 itemprop="name" class="qodef-e-title entry-title qodef-podcast-title">
				<?php echo get_the_title($podcast_id); ?>
			</h2>
		</a>
		<div class="qodef-m-info-top">
			<?php
				$podcast_media = wp_get_attachment_url(get_post_meta( $podcast_id, 'qodef_podcast_file', true ));
				$current_id = is_singular() ? $podcast_id : 0;
			?>
			<div class="qodef-podcast-player" data-playing-id="<?php echo esc_attr($current_id); ?>">
				<audio>
					<source src="<?php echo esc_url($podcast_media); ?>" type="audio/mp3" />
				</audio>
			</div>
			<div class="qodef-m-audio-info">
				<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-player', 'post-info/episode-number', '', $params ); ?>
				
				<div>
					<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-player', 'post-info/category', '', $params ); ?>
					
					<?php if( ! empty ( $podcast_media ) ) {
						$audio_id = attachment_url_to_postid($podcast_media);
						$audio_metadata = get_post_meta( $audio_id , '_wp_attachment_metadata', true ); ?>
						<div class="qodef-recipe-video-length">
							<?php echo esc_html($audio_metadata['length_formatted']);  ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="qodef-m-info-transcript">
			<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-player', 'post-info/transcript', '', $params ); ?>
		</div>
		<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-player', 'post-info/read-more', '', $params ); ?>
	</div>
	<div class="qodef-e-image">
		<?php if( $new_episode_marker === 'yes') { ?>
			<span class="qodef-e-episode-marker"><?php echo esc_html__('New episode', 'resonator-core'); ?></span>
		<?php } ?>
		<?php echo get_the_post_thumbnail( $podcast_id, 'resonator_image_size_square' ); ?>
	</div>
</div>
