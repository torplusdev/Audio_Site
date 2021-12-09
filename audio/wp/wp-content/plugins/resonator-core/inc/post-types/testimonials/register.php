<?php

if ( ! function_exists( 'resonator_core_register_testimonials_for_meta_options' ) ) {
	/**
	 * Function that add custom post type into global meta box allowed items array for saving meta box options
	 *
	 * @param array $post_types
	 *
	 * @return array
	 */
	function resonator_core_register_testimonials_for_meta_options( $post_types ) {
		$post_types[] = 'testimonials';
		return $post_types;
	}
	
	add_filter( 'qode_framework_filter_meta_box_save', 'resonator_core_register_testimonials_for_meta_options' );
	add_filter( 'qode_framework_filter_meta_box_remove', 'resonator_core_register_testimonials_for_meta_options' );
}

if ( ! function_exists( 'resonator_core_add_testimonials_custom_post_type' ) ) {
	/**
	 * Function that adds testimonials custom post type
	 *
	 * @param array $cpts
	 *
	 * @return array
	 */
	function resonator_core_add_testimonials_custom_post_type( $cpts ) {
		$cpts[] = 'ResonatorCoreTestimonialsCPT';
		
		return $cpts;
	}
	
	add_filter( 'resonator_core_filter_register_custom_post_types', 'resonator_core_add_testimonials_custom_post_type' );
}

if ( class_exists( 'QodeFrameworkCustomPostType' ) ) {
	class ResonatorCoreTestimonialsCPT extends QodeFrameworkCustomPostType {
		
		public function map_post_type() {
			$name = esc_html__( 'Testimonials', 'resonator-core' );
			$this->set_base( 'testimonials' );
			$this->set_menu_position( 10 );
			$this->set_menu_icon( 'dashicons-format-status' );
			$this->set_slug( 'testimonials' );
			$this->set_name( $name );
			$this->set_path( RESONATOR_CORE_CPT_PATH . '/testimonials' );
			$this->set_labels( array(
				'name'          => esc_html__( 'Resonator Testimonials', 'resonator-core' ),
				'singular_name' => esc_html__( 'Testimonial', 'resonator-core' ),
				'add_item'      => esc_html__( 'New Testimonial', 'resonator-core' ),
				'add_new_item'  => esc_html__( 'Add New Testimonial', 'resonator-core' ),
				'edit_item'     => esc_html__( 'Edit Testimonial', 'resonator-core' )
			) );
			$this->set_public( false );
			$this->set_archive( false );
			$this->set_supports( array(
				'title',
				'thumbnail'
			) );
			$this->add_post_taxonomy( array(
				'base'          => 'testimonials-category',
				'slug'          => 'testimonials-category',
				'singular_name' => esc_html__( 'Category', 'resonator-core' ),
				'plural_name'   => esc_html__( 'Categories', 'resonator-core' ),
			) );
		}
		
	}
}