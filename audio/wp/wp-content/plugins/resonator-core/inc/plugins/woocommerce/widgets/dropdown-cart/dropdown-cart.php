<?php

if ( ! function_exists( 'resonator_core_add_woo_dropdown_cart_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function resonator_core_add_woo_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'ResonatorCoreWooDropDownCartWidget';
		
		return $widgets;
	}
	
	add_filter( 'resonator_core_filter_register_widgets', 'resonator_core_add_woo_dropdown_cart_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class ResonatorCoreWooDropDownCartWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$this->set_base( 'resonator_core_woo_dropdown_cart' );
			$this->set_name( esc_html__( 'Resonator WooCommerce DropDown Cart', 'resonator-core' ) );
			$this->set_description( esc_html__( 'Display a shop cart icon with a dropdown that shows products that are in the cart', 'resonator-core' ) );
			$this->set_widget_option(
				array(
					'field_type'  => 'text',
					'name'        => 'widget_padding',
					'title'       => esc_html__( 'Widget Padding', 'resonator-core' ),
					'description' => esc_html__( 'Insert padding in format: top right bottom left', 'resonator-core' )
				)
			);
		}
		
		public function render( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['widget_padding'] ) ) {
				$styles[] = 'padding: ' . $atts['widget_padding'];
			}
			?>
			<div class="qodef-woo-dropdown-cart qodef-m" <?php qode_framework_inline_style( $styles ); ?>>
				<div class="qodef-woo-dropdown-cart-inner qodef-m-inner">
					<?php resonator_core_template_part( 'plugins/woocommerce/widgets/dropdown-cart', 'templates/content' ); ?>
				</div>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'resonator_core_woo_dropdown_cart_add_to_cart_fragment' ) ) {
	/**
	 * Function that return|update new cart content for products which are added into the cart
	 *
	 * @param array $fragments
	 *
	 * @return array
	 */
	function resonator_core_woo_dropdown_cart_add_to_cart_fragment( $fragments ) {
		ob_start();
		?>
		<div class="qodef-woo-dropdown-cart-inner qodef-m-inner">
			<?php resonator_core_template_part( 'plugins/woocommerce/widgets/dropdown-cart', 'templates/content' ); ?>
		</div>
		
		<?php
		$fragments['.qodef-woo-dropdown-cart-inner'] = ob_get_clean();
		
		return $fragments;
	}
	
	add_filter( 'woocommerce_add_to_cart_fragments', 'resonator_core_woo_dropdown_cart_add_to_cart_fragment' );
}
?>