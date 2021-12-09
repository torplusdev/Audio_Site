<?php if ( ! empty( $button_params ) && class_exists( 'ResonatorCoreButtonShortcode' ) ) { ?>
	<div class="qodef-m-button">
		<?php echo ResonatorCoreButtonShortcode::call_shortcode( $button_params ); ?>
	</div>
<?php } ?>