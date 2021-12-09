<?php

if ( ! function_exists( 'resonator_core_add_audio_playlist_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function resonator_core_add_audio_playlist_shortcode( $shortcodes ) {
		$shortcodes[] = 'ResonatorCoreAudioPlaylistShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'resonator_core_filter_register_shortcodes', 'resonator_core_add_audio_playlist_shortcode' );
}

if ( class_exists( 'ResonatorCoreShortcode' ) ) {
	class ResonatorCoreAudioPlaylistShortcode extends ResonatorCoreShortcode {
		
		public function __construct() {
			$this->set_layouts( apply_filters( 'resonator_core_filter_audio_playlist_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'resonator_core_filter_audio_playlist_extra_options', array() ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( RESONATOR_CORE_SHORTCODES_URL_PATH . '/audio-playlist' );
			$this->set_base( 'resonator_core_audio_playlist' );
			$this->set_name( esc_html__( 'Audio Playlist', 'resonator-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds audio playlist element', 'resonator-core' ) );
			$this->set_category( esc_html__( 'Resonator Core', 'resonator-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'playlist_url',
				'title'      => esc_html__( 'Playlist Link', 'resonator-core' )
			) );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes'] = 'qodef-audio-playlist';
			
			return resonator_core_get_template_part( 'shortcodes/audio-playlist', '/templates/audio-playlist', '', $atts );
		}
	}
}