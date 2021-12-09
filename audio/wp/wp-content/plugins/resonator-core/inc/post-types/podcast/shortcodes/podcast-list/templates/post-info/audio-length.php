<?php
$post_id = get_the_ID();

if ( ! empty ( $show_audio_length ) && 'yes' === $show_audio_length ) {

	$podcast_media = wp_get_attachment_url(get_post_meta( $post_id, 'qodef_podcast_file', true ));
	if ( ! empty ( $podcast_media ) ) {
		$audio_id = attachment_url_to_postid($podcast_media);
		$audio_metadata = get_post_meta( $audio_id , '_wp_attachment_metadata', true ); ?>
		<div class="qodef-recipe-video-length">
			<?php echo esc_html($audio_metadata['length_formatted']);  ?>
		</div>
	<?php
	}
}
