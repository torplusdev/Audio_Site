<?php
$podcast_info_items = get_post_meta( get_the_ID(), 'qodef_podcast_info_items', true );

if ( ! empty ( $podcast_info_items ) ) {
	foreach ( $podcast_info_items as $item ) {
		$label  = $item['qodef_info_item_label'];
		$value  = $item['qodef_info_item_value'];
		$link   = $item['qodef_info_item_link'];
		$target = ! empty( $item['qodef_info_item_target'] ) ? $item['qodef_info_item_target'] : '_blank';
		?>
		<div class="qodef-e qodef-info--info-items">
			<?php if ( ! empty ( $label ) ) { ?>
				<h5 class="qodef-e-title"><?php echo esc_html( $label ); ?>: </h5>
			<?php } ?>
			<?php if ( ! empty ( $link ) ) { ?>
				<a class="qodef-e-info-item qodef--link" href="<?php echo esc_url( $link ); ?>" target="<?php echo esc_attr( $target ); ?>">
			<?php } else { ?>
				<span class="qodef-e-info-item">
			<?php } ?>
				<?php echo qode_framework_wp_kses_html( 'content', $value ); ?>
			<?php if ( empty ( $link ) ) { ?>
				</span>
			<?php } else { ?>
				</a>
			<?php } ?>
		</div>
	<?php } ?>
<?php } ?>