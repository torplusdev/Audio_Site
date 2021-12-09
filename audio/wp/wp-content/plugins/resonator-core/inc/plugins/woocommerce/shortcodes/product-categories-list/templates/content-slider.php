<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_attr( $slider_attr, 'data-options' ); ?>>
    <div class="swiper-wrapper">
		<?php
		// Include items
		resonator_core_template_part( 'plugins/woocommerce/shortcodes/product-categories-list', 'templates/loop', '', $params );
		?>
    </div>
	<?php resonator_core_template_part( 'content', 'templates/swiper-nav', '', $params ); ?>
	<?php resonator_core_template_part( 'content', 'templates/swiper-pag', '', $params ); ?>
</div>