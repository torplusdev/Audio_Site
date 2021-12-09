<?php
$post_id       = get_the_ID();
$is_enabled    = resonator_core_get_post_value_through_levels( 'qodef_podcast_single_enable_related_posts' );
$related_posts = resonator_core_get_custom_post_type_related_posts( $post_id, resonator_core_get_podcast_single_post_taxonomies( $post_id ) );

if ( $is_enabled === 'yes' && ! empty( $related_posts ) && class_exists( 'ResonatorCorePodcastListShortcode' ) ) { ?>
	<div id="qodef-podcast-single-related-items">
		<?php
		$params = apply_filters( 'resonator_core_filter_podcast_single_related_posts_params', array(
			'custom_class'         => 'qodef--no-bottom-space',
			'behavior'             => 'slider',
			'slider_loop'          => 'yes',
			'slider_autoplay'      => 'no',
			'slider_centered'      => 'yes',
			'slider_pagination'    => 'no',
			'images_proportion'    => 'resonator_image_size_square',
			'columns'              => '1.6',
			'space'                => 'custom-wast',
			'posts_per_page'       => -1,
			'additional_params'    => 'id',
			'post_ids'             => $related_posts['items'],
			'layout'               => 'info-right',
			'title_tag'            => 'h3',
			'show_audio_length'    => 'yes',
			'show_next_up'         => 'yes',
			'navigation_with_text' => 'yes',
		) );
		
		echo ResonatorCorePodcastListShortcode::call_shortcode( $params ); ?>
	</div>
<?php } ?>
