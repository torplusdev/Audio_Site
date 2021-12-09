<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<div class="qodef-e-info qodef-info--top">
			<?php
			// Include post date info
			resonator_core_theme_template_part( 'blog', 'templates/parts/post-info/date' );

			// Include post category info
			resonator_core_theme_template_part( 'blog', 'templates/parts/post-info/category' );
			?>
		</div>
		 <?php resonator_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/title', '', $params ); ?>
		<div class="qodef-e-info qodef-info--bottom">
			<?php
			// Include post read more
			resonator_core_theme_template_part( 'blog', 'templates/parts/post-info/read-more' );
			?>
		</div>
	</div>
</article>
