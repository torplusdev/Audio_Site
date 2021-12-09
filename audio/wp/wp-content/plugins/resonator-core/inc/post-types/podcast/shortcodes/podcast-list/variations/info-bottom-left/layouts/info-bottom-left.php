<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<div class="qodef-e-image">
			<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/image', '', $params ); ?>
		</div>
		<div class="qodef-e-content">
			<div class="qodef-e-content-inner">
				<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/category', '', $params ); ?>
				<?php resonator_core_list_sc_template_part( 'post-types/podcast/shortcodes/podcast-list', 'post-info/title', '', $params ); ?>
				<a itemprop="url" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'resonator-core' ); ?></a>
			</div>
		</div>
	</div>
</article>