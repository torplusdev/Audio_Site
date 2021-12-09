<div class="qodef-e-more-btn">
	<?php
	$button_params = array(
		'button_layout' => 'textual',
		'link' => get_term_link( $term_id ),
		'text' => esc_html__( 'View all episodes', 'resonator-core' )
	);

	echo ResonatorCoreButtonShortcode::call_shortcode( $button_params ); ?>
</div>