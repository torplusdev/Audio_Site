<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! isset ( $input_id ) ) {
	$input_id = uniqid( 'quantity_' );
}

if ( $max_value && $min_value === $max_value ) {
	?>
	<div class="qodef-quantity-buttons quantity hidden">
		<input type="hidden" id="<?php echo esc_attr( $input_id ); ?>" class="qty" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $min_value ); ?>" />
	</div>
	<?php
} else {
	/* translators: %s: Quantity. */
	$label = ! empty( $args['product_name'] ) ? sprintf( esc_html__( '%s quantity', 'resonator' ), wp_strip_all_tags( $args['product_name'] ) ) : esc_html__( 'Quantity', 'resonator' );
	?>
	<div class="qodef-quantity-buttons quantity">
		<?php do_action( 'woocommerce_before_quantity_input_field' ); ?>
		<label class="screen-reader-text" for="<?php echo esc_attr( $input_id ); ?>"><?php echo esc_attr( $label ); ?></label>
		<span class="qodef-quantity-minus"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 12.5 7.5" style="enable-background:new 0 0 12.5 7.5;" xml:space="preserve"><g><path d="M11.8,0l0.7,0.8L6.2,7.5L0,0.8L0.7,0l5.5,5.9L11.8,0z"/></g></svg></span>
		<input
			type="<?php echo apply_filters( 'resonator_filter_woo_quantity_input_type', 'text' ); ?>"
			id="<?php echo esc_attr( $input_id ); ?>"
			class="<?php echo esc_attr( join( ' ', (array) $classes ) ); ?> qodef-quantity-input"
			data-step="<?php echo esc_attr( $step ); ?>"
			data-min="<?php echo esc_attr( $min_value ); ?>"
			data-max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>"
			name="<?php echo esc_attr( $input_name ); ?>"
			value="<?php echo esc_attr( ! empty( $input_value ) ? $input_value : 0 ); ?>"
			title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'resonator' ); ?>"
			size="4"
			placeholder="<?php echo esc_attr( $placeholder ); ?>"
			inputmode="<?php echo esc_attr( $inputmode ); ?>" />
		<span class="qodef-quantity-plus"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 12.5 7.5" style="enable-background:new 0 0 12.5 7.5;" xml:space="preserve"><g><path d="M11.8,7.5L6.2,1.6L0.7,7.5L0,6.7L6.2,0l6.2,6.7L11.8,7.5z"/></g></svg></span>
		<?php do_action( 'woocommerce_after_quantity_input_field' ); ?>
	</div>
	<?php
}
