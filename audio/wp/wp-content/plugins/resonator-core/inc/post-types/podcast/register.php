<?php

if ( ! function_exists( 'resonator_core_register_podcast_for_meta_options' ) ) {
	/**
	 * Function that add custom post type into global meta box allowed items array for saving meta box options
	 *
	 * @param array $post_types
	 *
	 * @return array
	 */
	function resonator_core_register_podcast_for_meta_options( $post_types ) {
		$post_types[] = 'podcast-item';
		
		return $post_types;
	}
	
	add_filter( 'qode_framework_filter_meta_box_save', 'resonator_core_register_podcast_for_meta_options' );
	add_filter( 'qode_framework_filter_meta_box_remove', 'resonator_core_register_podcast_for_meta_options' );
}

if ( ! function_exists( 'resonator_core_add_podcast_custom_post_type' ) ) {
	/**
	 * Function that adds podcast custom post type
	 *
	 * @param array $cpts
	 *
	 * @return array
	 */
	function resonator_core_add_podcast_custom_post_type( $cpts ) {
		$cpts[] = 'ResonatorCorePodcastCPT';
		
		return $cpts;
	}
	
	add_filter( 'resonator_core_filter_register_custom_post_types', 'resonator_core_add_podcast_custom_post_type' );
}

if ( class_exists( 'QodeFrameworkCustomPostType' ) ) {
	class ResonatorCorePodcastCPT extends QodeFrameworkCustomPostType {
		
		public function map_post_type() {
			$name = esc_html__( 'Podcast', 'resonator-core' );
			$this->set_base( 'podcast-item' );
			$this->set_menu_position( 10 );
			$this->set_menu_icon( 'dashicons-grid-view' );
			$this->set_slug( 'podcast-item' );
			$this->set_name( $name );
			$this->set_path( RESONATOR_CORE_CPT_PATH . '/podcast' );
			$this->set_labels( array(
				'name'          => esc_html__( 'Resonator Podcast', 'resonator-core' ),
				'singular_name' => esc_html__( 'Podcast Item', 'resonator-core' ),
				'add_item'      => esc_html__( 'New Podcast Item', 'resonator-core' ),
				'add_new_item'  => esc_html__( 'Add New Podcast Item', 'resonator-core' ),
				'edit_item'     => esc_html__( 'Edit Podcast Item', 'resonator-core' )
			) );
			$this->add_post_taxonomy( array(
				'base'          => 'podcast-category',
				'slug'          => 'podcast-category',
				'singular_name' => esc_html__( 'Category', 'resonator-core' ),
				'plural_name'   => esc_html__( 'Categories', 'resonator-core' ),
			) );
			$this->add_post_taxonomy( array(
				'base'          => 'podcast-tag',
				'slug'          => 'podcast-tag',
				'singular_name' => esc_html__( 'Tag', 'resonator-core' ),
				'plural_name'   => esc_html__( 'Tags', 'resonator-core' ),
			) );
			$this->add_post_taxonomy( array(
				'base'          => 'podcast-season',
				'slug'          => 'podcast-season',
				'singular_name' => esc_html__( 'Season', 'resonator-core' ),
				'plural_name'   => esc_html__( 'Seasons', 'resonator-core' ),
			) );
		}
	}
}