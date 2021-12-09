<?php if ( is_active_sidebar( 'qodef-side-area' ) ) { ?>
	<div id="qodef-side-area" <?php qode_framework_class_attribute( $classes ); ?>>
		<?php resonator_core_get_opener_icon_html( array(
			'option_name' => 'side_area',
			'custom_id'   => 'qodef-side-area-close'
		), true,true ); ?>
		<div id="qodef-side-area-inner">
			<?php dynamic_sidebar( 'qodef-side-area' ); ?>
		</div>
	</div>
<?php } ?>
