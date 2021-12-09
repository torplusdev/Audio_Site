<?php
$podcast_media = get_post_meta( get_the_ID(), 'qodef_podcast_media', true );

$masonry_classes   = '';
$number_of_columns = resonator_core_get_post_value_through_levels( 'qodef_podcast_columns_number' );
$masonry_classes .= ! empty( $number_of_columns ) ? ' qodef-col-num--' . $number_of_columns : ' qodef-col-num--3';

$space_between_items = resonator_core_get_post_value_through_levels( 'qodef_podcast_space_between_items' );
$masonry_classes .= ! empty( $space_between_items ) ? ' qodef-gutter--' . $space_between_items : ' qodef-gutter--tiny';

if ( ! empty ( $podcast_media ) ) { ?>
	<div class="qodef-e qodef-grid qodef-layout--masonry qodef-items--fixed qodef-responsive--predefined qodef--no-bottom-space <?php echo esc_attr( $masonry_classes ); ?>">
		<div class="qodef-grid-inner clear qodef-magnific-popup qodef-popup-gallery">
			<?php
			// Include global masonry template from theme
			resonator_core_theme_template_part( 'masonry', 'templates/sizer-gutter', '', 'masonry' );
			
			foreach ( $podcast_media as $media ) {
				$type       = $media['qodef_podcast_media_type'];
				$media_name = 'qodef_podcast_' . $type;
				
				$params          = array();
				$params['media'] = $media[ $media_name ];
				
				resonator_core_template_part( 'post-types/podcast', 'templates/parts/media/media', $type . '-masonry', $params );
			} ?>
		</div>
	</div>
<?php } ?>