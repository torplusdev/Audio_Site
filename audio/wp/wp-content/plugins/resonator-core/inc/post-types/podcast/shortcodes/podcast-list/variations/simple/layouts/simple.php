<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<div class="qodef-e-content">
			<div>
				<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/play', '', $params ); ?>
				<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/title', '', $params ); ?>
			</div>
			<div>
				<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/episode-number', '', $params ); ?>
	            <?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/category', '', $params ); ?>
	            <?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/read-more', '', $params ); ?>
			</div>
		</div>
	</div>
</article>