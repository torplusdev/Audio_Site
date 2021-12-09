<?php if ( class_exists( 'ResonatorCoreSocialShareShortcode' ) ) { ?>
	<div class="qodef-e-info-item qodef-e-info-social-share">
		<?php
		$params = array();
		$params['title'] = esc_html__( 'Share:', 'resonator-core' );
		
		echo ResonatorCoreSocialShareShortcode::call_shortcode( $params ); ?>
	</div>
<?php } ?>