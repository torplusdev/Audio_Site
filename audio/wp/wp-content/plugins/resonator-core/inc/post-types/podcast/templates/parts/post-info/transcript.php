<?php
$podcast_transcript = get_post_meta( get_the_ID(), 'qodef_podcast_transcript_text', true );
$podcast_transcript_image = get_post_meta( get_the_ID(), 'qodef_podcast_transcript_image', true );
?>

<div class="qodef-m-text">
	<?php if(!empty($podcast_transcript)) { ?>
		<h2 class="qodef-m-title">
			<?php esc_html_e('Episode Transcript:', 'resonator-core'); ?>
		</h2>
        <div class="qodef-m-transcript-text">
	        <?php echo qode_framework_wp_kses_html( 'content', $podcast_transcript ); ?>
        </div>
	<?php } ?>
</div>
<div class="qodef-m-image">
	<?php
	if( ! empty( $podcast_transcript_image ) ) {
		echo wp_get_attachment_image($podcast_transcript_image, 'full');
	} ?>
</div>
