<?php
if ( $slider_navigation !== 'no' && 'yes' === $navigation_with_text ) { ?>
	<div class="qodef-navigation-holder">
		<div class="swiper-button-prev"><?php resonator_core_render_svg_icon('btn-arrow-left', 'qodef-m-swiper-nav-left-icon'); ?><span class="qodef-nav-prev-text"><?php esc_html_e('Prev', 'resonator-core'); ?></span></div>
		<div class="swiper-button-next"><span class="qodef-nav-next-text"><?php esc_html_e('Next', 'resonator-core'); ?></span><?php resonator_core_render_svg_icon('btn-arrow-right', 'qodef-m-swiper-nav-right-icon'); ?></div>
	</div>
<?php
} else if ( $slider_navigation !== 'no' ) {
	$nav_next_classes = '';
	$nav_prev_classes = '';
	if ( isset( $unique ) && ! empty( $unique ) ) {
		$nav_next_classes = 'swiper-button-outside swiper-button-next-' . esc_attr( $unique );
		$nav_prev_classes = 'swiper-button-outside swiper-button-prev-' . esc_attr( $unique );
	}
	?>
	<div class="swiper-button-prev <?php echo esc_attr( $nav_prev_classes ); ?>"><?php resonator_core_render_svg_icon('btn-arrow-left', 'qodef-m-swiper-nav-left-icon'); ?></div>
	<div class="swiper-button-next <?php echo esc_attr( $nav_next_classes ); ?>"><?php resonator_core_render_svg_icon('btn-arrow-right', 'qodef-m-swiper-nav-right-icon'); ?></div>
<?php } ?>
