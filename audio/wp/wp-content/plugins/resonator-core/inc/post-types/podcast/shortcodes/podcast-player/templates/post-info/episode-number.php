<?php
$podcast_episode_number = get_post_meta( $podcast_id, 'qodef_podcast_episode_number', true );

if ( ! empty ( $podcast_episode_number ) ) { ?>
	<div class="qodef-m-episode-number">
        <?php esc_html_e('Episode ', 'resonator-core'); ?>
        <?php echo esc_html( $podcast_episode_number ); ?>
    </div>
<?php } ?>