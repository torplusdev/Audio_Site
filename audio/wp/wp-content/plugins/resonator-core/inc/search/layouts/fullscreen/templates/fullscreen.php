<div class="qodef-fullscreen-search-holder qodef-m">
	<?php resonator_core_get_opener_icon_html( array(
		'option_name'  => 'search',
		'custom_class' => 'qodef-m-close',
		'custom_icon'  => 'search'
	), true, true ); ?>
	<div class="qodef-m-inner">
		<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="qodef-m-form" method="get">
			<input type="text" placeholder="<?php esc_attr_e( 'Search', 'resonator-core' ); ?>" name="s" class="qodef-m-form-field" autocomplete="off" required/>
			<?php resonator_core_get_opener_icon_html( array(
				'html_tag'     => 'button',
				'option_name'  => 'search',
				'custom_icon'  => 'search',
				'custom_class' => 'qodef-m-form-submit'
			) ); ?>
			<div class="qodef-m-form-line"></div>
		</form>
		<span class="qodef-m-form-text">Type at least 1 character to search</span>
	</div>
</div>
