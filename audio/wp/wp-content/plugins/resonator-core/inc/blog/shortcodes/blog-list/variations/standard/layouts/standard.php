<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<?php
		// Include post media
		resonator_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/media', '', $params );
		?>
		<div class="qodef-e-content">
			<div class="qodef-e-info qodef-info--top">
				<?php
				// Include post category info
//				resonator_core_theme_template_part( 'blog', 'templates/parts/post-info/category' );
				
				// Include post date info
				resonator_core_theme_template_part( 'blog', 'templates/parts/post-info/date' );
				?>
			</div>
			<div class="qodef-e-text">
				<?php
				// Include post title
				resonator_core_theme_template_part( 'blog', 'templates/parts/post-info/title', '', array( 'title_tag' => $title_tag ) );
				
				// Include post excerpt
				resonator_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/excerpt', '', $params );
				
				// Hook to include additional content after blog single content
				do_action( 'resonator_action_after_blog_single_content' );
				?>
			</div>
			<div class="qodef-e-info qodef-info--bottom">
				<div class="qodef-e-info-left">
					<?php
					// Include post read more
					resonator_core_theme_template_part( 'blog', 'templates/parts/post-info/read-more' );
					?>
				</div>
				<div class="qodef-e-info-right">
					<?php
					// Include post author info
//					resonator_core_theme_template_part( 'blog', 'templates/parts/post-info/author' );
					
					// Include post date info
//					resonator_core_theme_template_part( 'blog', 'templates/parts/post-info/date' );
					
					// Include post comments info
//					resonator_core_theme_template_part( 'blog', 'templates/parts/post-info/comments' );
					?>
				</div>
			</div>
		</div>
	</div>
</article>