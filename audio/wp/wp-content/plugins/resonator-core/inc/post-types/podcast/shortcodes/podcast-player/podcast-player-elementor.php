<?php

class ResonatorCoreElementorPodcastPlayer extends ResonatorCoreElementorWidgetBase {

	function __construct( array $data = [], $args = null ) {
		$this->set_shortcode_slug( 'resonator_core_podcast_player' );

		parent::__construct( $data, $args );
	}
}

resonator_core_get_elementor_widgets_manager()->register_widget_type( new ResonatorCoreElementorPodcastPlayer() );