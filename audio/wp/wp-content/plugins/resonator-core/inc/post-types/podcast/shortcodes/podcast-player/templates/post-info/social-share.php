<div class="qodef-e qodef-info--social-share">
	<?php if ( class_exists( 'ResonatorCoreSocialShareShortcode' ) ) {
		$params = array(
			'title'  => esc_html__( 'Share:', 'resonator-core' ),
			'layout' => 'text'
		);
		
		echo ResonatorCoreSocialShareShortcode::call_shortcode( $params );
	} ?>
</div>