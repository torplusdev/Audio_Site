<?php
$styles = array();
if ( ! empty( $info_below_content_margin_top ) ) {
	$margin_bottom = qode_framework_string_ends_with_space_units( $info_below_content_margin_top ) ? $info_below_content_margin_top : intval( $info_below_content_margin_top ) . 'px';
	$styles[] = 'margin-top:' . $margin_bottom;
}
?>
<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner" <?php qode_framework_inline_style( $holder_styles ); ?>>
        <?php if($enable_image === 'yes') { ?>
            <div class="qodef-e-image">
                <?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/image', '', $params ); ?>
            </div>
        <?php } ?>
		<div class="qodef-e-content" <?php qode_framework_inline_style( $styles ); ?>>
            <div class="qodef-info-top">
	            <?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/episode-number', '', $params ); ?>
	            <?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/category', '', $params ); ?>
            </div>
			<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/title', '', $params ); ?>
			<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/excerpt', '', $params ); ?>
			<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/social', '', $params ); ?>
			<?php if($enable_button === 'yes') { ?>
			    <?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/read-more', '', $params ); ?>
			<?php } ?>
		</div>
	</div>
</article>