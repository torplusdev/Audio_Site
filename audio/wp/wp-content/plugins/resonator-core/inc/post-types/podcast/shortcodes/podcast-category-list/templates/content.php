<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<div class="qodef-grid-inner clear">
		<?php
		// Include global masonry template from theme
		resonator_core_theme_template_part( 'masonry', 'templates/sizer-gutter', '', $params['behavior'] );
		
		// Include items
		resonator_core_template_part( 'post-types/podcast/shortcodes/podcast-category-list', 'templates/loop', '', $params );
		?>
	</div>
</div>