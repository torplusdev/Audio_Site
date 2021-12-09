<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<div class="qodef-e-image">
			<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/image', '', $params ); ?>
		</div>
		<div class="qodef-e-content">
			<div class="qodef-e-content-inner">
				<a itemprop="url" href="<?php the_permalink(); ?>"></a>
				<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/category', '', $params ); ?>
				<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/title', '', $params ); ?>
			</div>
		</div>
	</div>
</article>