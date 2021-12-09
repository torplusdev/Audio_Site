<?php
$apple_podcast = get_post_meta( get_the_ID(), 'qodef_apple_podcast_link', true );
$spotify       = get_post_meta( get_the_ID(), 'qodef_spotify_link', true );
$soundcould    = get_post_meta( get_the_ID(), 'qodef_soundcloud_link', true );
$rss_feed      = get_post_meta( get_the_ID(), 'qodef_rss_feed_link', true );

$enable_apple_podcast = resonator_core_get_post_value_through_levels( 'qodef_podcast_enable_apple_podcast_title_link' );
$enable_spotify       = resonator_core_get_post_value_through_levels( 'qodef_podcast_enable_spotify_title_link' );
$enable_soundcould    = resonator_core_get_post_value_through_levels( 'qodef_podcast_enable_soundcloud_title_link' );
$enable_rss_feed      = resonator_core_get_post_value_through_levels( 'qodef_podcast_enable_rss_feed_title_link' );
?>
<div class="qodef-podcast-title-area-links">
	<?php if ( 'yes' === $enable_apple_podcast && ! empty( $apple_podcast ) ) { ?>
		<a href="<?php echo esc_html( $apple_podcast ); ?>" class="qodef-e-link">
			<div class="qodef-podcast-title-area-link">
				<div class="qodef-e-icon">
					<?php echo qode_framework_icons()->render_icon( 'fa fa-podcast', 'font-awesome' ); ?>
				</div>
				<div class="qodef-e-info">
					<span class="qodef-e-label"><?php echo esc_html__( 'Listen on', 'resonator-core' ); ?></span>
					<span class="qodef-e-title"><?php echo esc_html__( 'Apple Podcast', 'resonator-core' ); ?></span>
				</div>
			</div>
		</a>
	<?php } ?>
	<?php if ( 'yes' === $enable_spotify && ! empty( $spotify ) ) { ?>
		<a href="<?php echo esc_html( $spotify ); ?>" class="qodef-e-link">
			<div class="qodef-podcast-title-area-link">
				<div class="qodef-e-icon">
					<?php echo qode_framework_icons()->render_icon( 'fab fa-spotify', 'font-awesome' ); ?>
				</div>
				<div class="qodef-e-info">
					<span class="qodef-e-label"><?php echo esc_html__( 'Listen on', 'resonator-core' ); ?></span>
					<span class="qodef-e-title"><?php echo esc_html__( 'Spotify', 'resonator-core' ); ?></span>
				</div>
			</div>
		</a>
	<?php } ?>
	<?php if ( 'yes' === $enable_soundcould && ! empty( $soundcould ) ) { ?>
		<a href="<?php echo esc_html( $soundcould ); ?>" class="qodef-e-link">
			<div class="qodef-podcast-title-area-link">
				<div class="qodef-e-icon">
					<?php echo qode_framework_icons()->render_icon( 'fab fa-soundcloud', 'font-awesome' ); ?>
				</div>
				<div class="qodef-e-info">
					<span class="qodef-e-label"><?php echo esc_html__( 'Listen on', 'resonator-core' ); ?></span>
					<span class="qodef-e-title"><?php echo esc_html__( 'SoundCloud', 'resonator-core' ); ?></span>
				</div>
			</div>
		</a>
	<?php } ?>
	<?php if ( 'yes' === $enable_rss_feed && ! empty( $rss_feed ) ) { ?>
		<a href="<?php echo esc_html( $rss_feed ); ?>" class="qodef-e-link">
			<div class="qodef-podcast-title-area-link">
				<div class="qodef-e-icon">
					<?php echo qode_framework_icons()->render_icon( 'fa fa-rss', 'font-awesome' ); ?>
				</div>
				<div class="qodef-e-info">
					<span class="qodef-e-label"><?php echo esc_html__( 'Listen on', 'resonator-core' ); ?></span>
					<span class="qodef-e-title"><?php echo esc_html__( 'RSS Feed', 'resonator-core' ); ?></span>
				</div>
			</div>
		</a>
	<?php } ?>
</div>
