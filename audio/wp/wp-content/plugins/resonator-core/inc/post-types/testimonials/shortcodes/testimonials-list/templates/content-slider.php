<div <?php qode_framework_class_attribute( $wrapper_classes ); ?>>
	<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_attr( $slider_attr, 'data-options' ); ?>>
		<div class="swiper-wrapper">
			<?php
			// Include items
			resonator_core_template_part( 'post-types/testimonials/shortcodes/testimonials-list', 'templates/loop', '', $params );
			?>
		</div>
		<?php resonator_core_template_part( 'content', 'templates/swiper-pag', '', $params ); ?>
		<?php if ( $slider_pagination !== 'no' ) { ?>
			<div class="swiper-pagination"></div>
		<?php } ?>
	</div>
	<?php resonator_core_template_part( 'content', 'templates/swiper-nav', '', $params ); ?>
</div>
