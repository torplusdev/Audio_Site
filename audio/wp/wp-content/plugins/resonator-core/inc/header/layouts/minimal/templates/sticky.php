<div class="qodef-header-sticky qodef-custom-header-layout <?php echo implode( ' ', apply_filters( 'resonator_core_filter_sticky_header_class', array() ) ); ?>">
	<div class="qodef-header-sticky-inner <?php echo implode( ' ', apply_filters( 'resonator_filter_header_inner_class', array(), 'sticky' ) ); ?>">
		<?php resonator_core_get_header_logo_image( array( 'sticky_logo' => true ) ); ?>
		<?php resonator_core_get_opener_icon_html( array(
			'option_name'  => 'fullscreen_menu',
			'custom_class' => 'qodef-fullscreen-menu-opener'
		), true ); ?>
	</div>
</div>