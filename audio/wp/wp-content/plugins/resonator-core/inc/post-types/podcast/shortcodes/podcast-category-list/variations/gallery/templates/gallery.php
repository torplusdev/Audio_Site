<article <?php qode_framework_class_attribute( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<?php resonator_core_template_part( 'post-types/podcast/shortcodes/podcast-category-list', 'templates/parts/image', '', $params ); ?>
		<div class="qodef-e-content">
			<?php resonator_core_template_part( 'post-types/podcast/shortcodes/podcast-category-list', 'templates/parts/title', '', $params ); ?>
		</div>
		<?php resonator_core_template_part( 'post-types/podcast/shortcodes/podcast-category-list', 'templates/parts/link', '', $params ); ?>
	</div>
</article>