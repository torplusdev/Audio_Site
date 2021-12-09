<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_attr( $slider_attr, 'data-options' ); ?>>
	<div class="swiper-wrapper">
		<?php
		// Include items
		resonator_core_template_part( 'post-types/podcast/shortcodes/podcast-list', 'templates/loop', '', $params );
		?>
	</div>
	<?php resonator_core_template_part( 'content', 'templates/swiper-nav', '', $params ); ?>
	<?php resonator_core_template_part( 'content', 'templates/swiper-pag', '', $params ); ?>
</div>