<div class="qodef-e qodef-inof--social-share">
	<?php if ( class_exists( 'ResonatorCoreSocialShareShortcode' ) ) {
		$params = array(
			'title'  => esc_html__( 'Share:', 'resonator-core' ),
			'layout' => 'list'
		);
		
		echo ResonatorCoreSocialShareShortcode::call_shortcode( $params );
	} ?>
</div>