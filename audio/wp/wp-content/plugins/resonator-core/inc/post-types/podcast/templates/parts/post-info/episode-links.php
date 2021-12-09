<?php
$apple_podcast = get_post_meta( get_the_ID(), 'qodef_apple_podcast_link', true );
$spotify       = get_post_meta( get_the_ID(), 'qodef_spotify_link', true );
$soundcould    = get_post_meta( get_the_ID(), 'qodef_soundcloud_link', true );
$rss_feed      = get_post_meta( get_the_ID(), 'qodef_rss_feed_link', true );
?>
<div class="qodef-e qodef-episode-links-content">
<div class="qodef-episode-links">
	<h5 class="qodef-e-title">
		<?php echo esc_html__('Listen on:', 'resonator-core') ?>
	</h5>
</div>
<?php
if ( '' !== $apple_podcast ) { ?>
	<div class="qodef-episode-link">
		<?php
		$button_params = array(
			'link'          => $apple_podcast,
			'button_layout' => 'textual',
			'text'          => esc_html__( 'Apple Podcast', 'resonator-core' ),
		);
		resonator_render_button_element( $button_params );
		?>
	</div>
<?php }
if ( '' !== $spotify ) { ?>
	<div class="qodef-episode-link">
		<?php
		$button_params = array(
			'link'          => $spotify,
			'button_layout' => 'textual',
			'text'          => esc_html__( 'Spotify', 'resonator-core' ),
		);
		resonator_render_button_element( $button_params );
		?>
	</div>
<?php }
if ( '' !== $soundcould ) { ?>
	<div class="qodef-episode-link">
		<?php
		$button_params = array(
			'link'          => $soundcould,
			'button_layout' => 'textual',
			'text'          => esc_html__( 'SoundCloud', 'resonator-core' ),
		);
		resonator_render_button_element( $button_params );
		?>
	</div>
<?php }
if ( '' !== $rss_feed ) { ?>
	<div class="qodef-episode-link">
		<?php
		$button_params = array(
			'link'          => $rss_feed,
			'button_layout' => 'textual',
			'text'          => esc_html__( 'RSS Feed', 'resonator-core' ),
		);
		resonator_render_button_element( $button_params );
		?>
	</div>
<?php }
?>
</div>

