<?php if($enable_share === 'yes') { ?>
<div class="qodef-e qodef-inof--social-share">
	<?php if ( class_exists( 'ResonatorCoreSocialShareShortcode' ) ) {
		$params = array(
			'title'             => esc_html__( 'Share', 'resonator-core' ),
			'layout'            => 'dropdown',
			'dropdown_behavior' => 'right',
		);

		echo ResonatorCoreSocialShareShortcode::call_shortcode( $params );
	} ?>
</div>
<?php } ?>
