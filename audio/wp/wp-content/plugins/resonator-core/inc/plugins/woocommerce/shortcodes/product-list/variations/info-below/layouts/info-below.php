<div <?php wc_product_class( $item_classes ); ?>>
    <div class="qodef-woo-product-inner">
		<?php if ( has_post_thumbnail() ) { ?>
            <div class="qodef-woo-product-image">
				<?php resonator_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/mark' ); ?>
				<?php resonator_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/image', '', $params ); ?>
                <div class="qodef-woo-product-image-inner">
					<?php
					
					// Hook to include additional content inside product list item image
					do_action( 'resonator_core_action_product_list_item_additional_image_content' );
					?>
                </div>
            </div>
		<?php } ?>
        <div class="qodef-woo-product-content">
			<?php resonator_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/category', '', $params ); ?>
			<div class="qodef-woo-product-title-inner">
				<?php resonator_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/title', '', $params ); ?>
				<?php resonator_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/price', '', $params ); ?>
			</div>
	        <?php resonator_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/add-to-cart' ); ?>
			
			<?php
			// Hook to include additional content inside product list item content
			do_action( 'resonator_core_action_product_list_item_additional_content' );
			?>
        </div>
		<?php resonator_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/link' ); ?>
    </div>
</div>
