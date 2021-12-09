<?php
$audio_meta = get_post_meta( get_the_ID(), 'qodef_post_format_audio_url', true );

if ( ! empty( $audio_meta ) ) {
	$oembed = wp_oembed_get( $audio_meta );
	if ( ! empty( $oembed ) ) {
		echo wp_oembed_get( $audio_meta );
	} else {
		// Include featured image
		resonator_template_part( 'blog', 'templates/parts/post-info/image' );
		?>
		<div class="qodef-e-media-audio">
			<div id="qodef-blog-audio-player" class="qodef-blog-audio-player" data-playing-id="<?php echo esc_attr($current_id); ?>">
				<audio>
					<source src="<?php echo esc_url($audio_meta); ?>" type="audio/mp3" />
				</audio>
			</div>
		</div>
	<?php }
} ?>
