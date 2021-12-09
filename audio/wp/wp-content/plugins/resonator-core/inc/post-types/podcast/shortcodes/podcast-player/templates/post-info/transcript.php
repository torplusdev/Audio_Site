<?php
if ( ! empty ( $custom_transcript_text ) ) {
	$podcast_episode_transcript = $custom_transcript_text;
} else {
	$podcast_episode_transcript = strip_tags( get_post_meta( $podcast_id, 'qodef_podcast_transcript_text', true ) );
}

if ( ! empty ( $podcast_episode_transcript ) ) { ?>
	<p>
		<?php echo qode_framework_wp_kses_html( 'content', $podcast_episode_transcript );; ?>
	</p>
<?php } ?>
