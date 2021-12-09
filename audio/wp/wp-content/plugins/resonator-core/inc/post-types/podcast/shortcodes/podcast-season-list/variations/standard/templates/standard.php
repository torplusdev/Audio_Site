<article <?php qode_framework_class_attribute( $item_classes ); ?>>
    <?php //var_dump($params); ?>
	<div class="qodef-e-inner">
		<?php resonator_core_template_part( 'post-types/podcast/shortcodes/podcast-season-list', 'templates/parts/image', '', $params ); ?>
		<div class="qodef-e-content">
			<?php resonator_core_template_part( 'post-types/podcast/shortcodes/podcast-season-list', 'templates/parts/title', '', $params ); ?>
			<?php resonator_core_template_part( 'post-types/podcast/shortcodes/podcast-season-list', 'templates/parts/tagline', '', $params ); ?>
			<?php resonator_core_template_part( 'post-types/podcast/shortcodes/podcast-season-list', 'templates/parts/items', '', $params ); ?>
			<?php resonator_core_template_part( 'post-types/podcast/shortcodes/podcast-season-list', 'templates/parts/link', '', $params ); ?>
		</div>
	</div>
</article>