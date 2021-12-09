<div class="qodef-top-holder">
	<h2 class="qodef-e qodef-info--title">
		<?php esc_html_e('Meet your hosts:','resonator-core'); ?>
	</h2>
	<div class="qodef-m-link-holder">
		<?php
		$podcast_hosts_link = get_post_meta( get_the_ID(), 'qodef_podcast_hosts_link', true );
		if ( !empty($podcast_hosts_link) && class_exists( 'ResonatorCoreButtonShortcode' )  ) {
			$button_params = array(
				'link'          => $podcast_hosts_link,
				'text'          => esc_html__( 'View all of them', 'resonator-core' ),
				'button_layout' => 'textual',
			);
			
			echo ResonatorCoreButtonShortcode::call_shortcode( $button_params );
		} ?>
	</div>
</div>
<div class="qodef-grid-item <?php echo esc_attr( resonator_core_get_page_content_sidebar_classes() ); ?>">
	<?php
	$podcast_hosts = get_post_meta( get_the_ID(), 'qodef_podcast_host', true );
	$ids = implode(",", $podcast_hosts);

	$params = array();
	$params['additional_params']  = 'id';
	$params['post_ids']           = $ids;
	$params['columns_responsive'] = 'custom';
	$params['columns']            = '3';
	$params['columns_1024']       = '2';
	$params['columns_768']        = '2';
	$params['columns_680']        = '1';
	$params['columns_480']        = '1';
	$params['posts_per_page']     = '3';
	$params['space']              = 'extra-large';

	echo ResonatorCoreTeamListShortcode::call_shortcode( $params );
	?>
</div>
