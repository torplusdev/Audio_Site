<?php

if ( ! function_exists( 'resonator_core_add_contact_form_7_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function resonator_core_add_contact_form_7_widget( $widgets ) {
		$widgets[] = 'ResonatorCoreContactForm7Widget';
		
		return $widgets;
	}
	
	add_filter( 'resonator_core_filter_register_widgets', 'resonator_core_add_contact_form_7_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class ResonatorCoreContactForm7Widget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$this->set_base( 'resonator_core_contact_form_7' );
			$this->set_name( esc_html__( 'Resonator Contact Form 7', 'resonator-core' ) );
			$this->set_description( esc_html__( 'Add contact form 7 to widget areas', 'resonator-core' ) );
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'widget_title',
					'title'      => esc_html__( 'Widget Title', 'resonator-core' )
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'select',
					'name'       => 'contact_form_id',
					'title'      => esc_html__( 'Select Contact Form 7', 'resonator-core' ),
					'options'    => resonator_core_get_contact_form_7_forms()
				)
			);
		}
		
		public function render( $atts ) { ?>
			<div class="qodef-contact-form-7">
				<?php if ( ! empty( $atts['contact_form_id'] ) ) {
					echo do_shortcode( '[contact-form-7 id="' . esc_attr( $atts['contact_form_id'] ) . '"]' ); // XSS OK
				} ?>
			</div>
			<?php
		}
	}
}