<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<?php if($enable_image === 'yes') { ?>
			<div class="qodef-e-image">
				<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/image', '', $params ); ?>
			</div>
		<?php } ?>
		<div class="qodef-e-content">
			<div class="qodef-info-top">
				<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/episode-number', '', $params ); ?>
				<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/category', '', $params ); ?>
				<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/audio-length', '', $params ); ?>
			</div>
			<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/title', '', $params ); ?>
			<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/next-up', '', $params ); ?>
			<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/excerpt', '', $params ); ?>
			<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/social', '', $params ); ?>
			<?php if($enable_button === 'yes') { ?>
				<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/read-more', '', $params ); ?>
			<?php } ?>
		</div>
	</div>
</article>
