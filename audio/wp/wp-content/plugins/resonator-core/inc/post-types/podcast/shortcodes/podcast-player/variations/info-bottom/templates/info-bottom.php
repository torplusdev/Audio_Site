<div class="qodef-m-player-box">
	<div class="qodef-m-box-info">
		<div class="qodef-e-image">
			<?php echo get_the_post_thumbnail( $podcast_id, 'square' ); ?>
		</div>
		<div class="qodef-m-info-top">
			<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-player', 'post-info/episode-number', '', $params ); ?>
			<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-player', 'post-info/category', '', $params ); ?>
		</div>
		<h2 itemprop="name" class="qodef-e-title entry-title qodef-podcast-title">
			<a class="qodef-e-title-link" href="<?php echo get_the_permalink($podcast_id) ?>">
				<?php echo get_the_title($podcast_id); ?>
			</a>
		</h2>
		<?php
		$podcast_media = wp_get_attachment_url(get_post_meta( $podcast_id, 'qodef_podcast_file', true ));
		$current_id = is_singular() ? $podcast_id : 0;
		$podcast_episode_number = get_post_meta( $current_id, 'qodef_podcast_episode_number', true );
		$podcast_episode_number = esc_html__('Episode','resonator-core').$podcast_episode_number;
		?>
		<?php
		if ( isset( $show_progress_in_modal ) && 'yes' === $show_progress_in_modal ) {
		?>
			<div class="qodef-m-play" data-playing-id="<?php echo esc_attr($current_id); ?>" data-source="<?php echo esc_url($podcast_media); ?>" data-title="<?php echo get_the_title($current_id); ?>" data-link="<?php the_permalink($current_id); ?>" data-image="<?php echo esc_attr( get_the_post_thumbnail_url($current_id)); ?>" data-episode="<?php echo esc_attr($podcast_episode_number); ?>"></div>
		<?php } else {
		?>
			<div class="qodef-podcast-player" data-playing-id="<?php echo esc_attr($current_id); ?>">
				<audio>
					<source src="<?php echo esc_url($podcast_media); ?>" type="audio/mp3" />
				</audio>
			</div>
		<?php }
		?>
	</div>
</div>
