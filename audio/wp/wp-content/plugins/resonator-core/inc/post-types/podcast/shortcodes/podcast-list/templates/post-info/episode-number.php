<?php
$podcast_episode_number = get_post_meta( get_the_ID(), 'qodef_podcast_episode_number', true );

if ( ! empty ( $podcast_episode_number ) ) { ?>
	<div class="qodef-e-episode-number">
		<?php esc_html_e('Episode ', 'resonator-core'); ?>
		<?php echo esc_html( $podcast_episode_number ); ?>
	</div>
<?php } ?>