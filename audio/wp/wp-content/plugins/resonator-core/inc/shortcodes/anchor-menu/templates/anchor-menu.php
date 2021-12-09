<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<div class="qodef-m-items">
		<?php foreach ( $items as $item ) { ?>
			<a class="qodef-m-item qodef-anchor" href="<?php echo esc_url($item['link']); ?>">
			<span class="qodef-m-item-number">
				<?php echo esc_attr($item['number']); ?>
			</span>
			<span class="qodef-m-item-label">
				<?php echo esc_attr($item['title']); ?>
			</span>
			</a>
		<?php } ?>
	</div>
</div>