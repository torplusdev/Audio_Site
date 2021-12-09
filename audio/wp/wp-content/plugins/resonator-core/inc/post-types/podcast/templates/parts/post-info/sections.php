<div class="qodef-m-image">
	<?php
	$podcast_sections_image = get_post_meta( get_the_ID(), 'qodef_podcast_parts_image', true );
	if( ! empty( $podcast_sections_image ) ) {
		echo wp_get_attachment_image($podcast_sections_image, 'full');
	} ?>
</div>
<div class="qodef-m-items">
	<?php
	$podcast_sections_items = get_post_meta( get_the_ID(), 'qodef_podcast_parts_items', true );

	if ( ! empty ( $podcast_sections_items ) ) { ?>
        <h3 class="qodef-e qodef-info--title">
			<?php esc_html_e('Listen to the specific part','resonator-core'); ?>
        </h3>
		<?php foreach ( $podcast_sections_items as $item ) {
			$label  = $item['qodef_part_item_label'];
			$value  = $item['qodef_part_item_value'];
			$link = '#'. $value;
			?>
			<div class="qodef-e qodef-info--info-items">
                <a class="qodef-jump-button" href="<?php echo esc_html($link); ?>" data-chapter-time="<?php echo esc_attr($value); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 7 11.2" style="enable-background:new 0 0 7 11.2;" xml:space="preserve">
<polygon points="0,0 0,11.2 7,5.6 "/>
</svg>
                </a>
                <div class="qodef-e-content">
	                <span><?php echo qode_framework_wp_kses_html( 'content', $value ); ?></span>
	                <?php if ( ! empty ( $label ) ) { ?>
                        <h5 class="qodef-e-title"><?php echo esc_html( $label ); ?></h5>
	                <?php } ?>
                </div>
			</div>
		<?php } ?>
	<?php } ?>
</div>