<div class="qodef-m-player-box qodef-content-grid">
	<?php if ( has_post_thumbnail() ) { ?>
        <div class="qodef-e-image">
			<?php the_post_thumbnail( 'resonator_image_size_square' ); ?>
        </div>
	<?php } ?>
    <div class="qodef-m-box-info">
        <h3 itemprop="name" class="qodef-e-title entry-title qodef-podcast-title">
			<?php the_title(); ?>
        </h3>
        <div class="qodef-m-info-top">
	        <?php resonator_core_template_part( 'post-types/podcast', 'templates/parts/post-info/episode-number' ); ?>
	        <?php resonator_core_template_part( 'post-types/podcast', 'templates/parts/post-info/categories' ); ?>


	        <?php
	        $podcast_media = wp_get_attachment_url(get_post_meta( get_the_ID(), 'qodef_podcast_file', true ));

	        if( ! empty ( $podcast_media ) ) {
		        $audio_id = attachment_url_to_postid($podcast_media);
		        $audio_metadata = get_post_meta( $audio_id , '_wp_attachment_metadata', true ); ?>
            <div class="qodef-recipe-video-length">
		        <?php echo esc_html($audio_metadata['length_formatted']);  ?>
            </div>
            <?php } ?>

        </div>
	    <?php $current_id = is_singular() ? get_the_ID() : 0; ?>
        <div class="qodef-podcast-player" data-playing-id="<?php echo esc_attr($current_id); ?>">
            <audio>
                <source src="<?php echo esc_url($podcast_media); ?>" type="audio/mp3" />
            </audio>
        </div>
    </div>
</div>
