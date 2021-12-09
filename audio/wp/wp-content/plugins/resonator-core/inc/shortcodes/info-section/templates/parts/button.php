<?php if ( ! empty( $button_params ) && ! empty ( $button_params['text'] ) && class_exists( 'ResonatorCoreButtonShortcode' ) ) { ?>
	<div class="qodef-m-button">
		<?php echo ResonatorCoreButtonShortcode::call_shortcode( $button_params ); ?>
	</div>
<?php } ?>