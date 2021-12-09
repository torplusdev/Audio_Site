<?php if ( ! post_password_required() && class_exists( 'ResonatorCoreButtonShortcode' ) ) { ?>
        <div class="qodef-e-read-more">
			<?php
			$button_params = array(
				'button_layout' => 'textual',
				'link' => get_the_permalink(),
				'text' => esc_html__( 'Episode page', 'resonator-core' )
			);

			echo ResonatorCoreButtonShortcode::call_shortcode( $button_params ); ?>
        </div>
<?php } ?>