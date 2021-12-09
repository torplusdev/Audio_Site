<?php
$post_id       = get_the_ID();
$is_enabled    = resonator_core_get_post_value_through_levels( 'qodef_blog_single_enable_related_posts' );
$related_posts = resonator_core_get_custom_post_type_related_posts( $post_id, resonator_core_get_blog_single_post_taxonomies( $post_id ) );

if ( $is_enabled === 'yes' && ! empty( $related_posts ) && class_exists( 'ResonatorCoreBlogListShortcode' ) ) { ?>
	<div id="qodef-related-posts">
		<?php
		$params = apply_filters( 'resonator_core_filter_blog_single_related_posts_params', array(
			'custom_class'      => 'qodef--no-bottom-space',
			'columns'           => '3',
			'posts_per_page'    => 3,
			'additional_params' => 'id',
			'post_ids'          => $related_posts['items'],
			'title_tag'         => 'h5',
			'excerpt_length'    => '100'
		) );
		
		echo ResonatorCoreBlogListShortcode::call_shortcode( $params ); ?>
	</div>
<?php } ?>