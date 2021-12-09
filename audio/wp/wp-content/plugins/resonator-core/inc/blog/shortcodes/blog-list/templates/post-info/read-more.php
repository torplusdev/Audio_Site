<?php if ( ! post_password_required() && class_exists( 'ResonatorCoreButtonShortcode' ) ) { ?>
	<div class="qodef-e-read-more">
		<?php
		$button_params = array(
			'link' => get_the_permalink(),
			'text' => esc_html__( 'Read More', 'resonator-core' )
		);
		
		echo ResonatorCoreButtonShortcode::call_shortcode( $button_params ); ?>
	</div>
<?php } ?>