<article <?php post_class( 'qodef-blog-item qodef-e' ); ?>>
	<div class="qodef-e-inner">
		<?php
		// Include post media
		resonator_template_part( 'blog', 'templates/parts/post-info/media' );
		?>
		<div class="qodef-e-content">
			<div class="qodef-e-info qodef-info--top">
				<?php
				// Include post category info
				resonator_template_part( 'blog', 'templates/parts/post-info/date' );
				resonator_template_part( 'blog', 'templates/parts/post-info/category' );
				?>
			</div>
			<div class="qodef-e-text">
				<?php
				// Include post title
				resonator_template_part( 'blog', 'templates/parts/post-info/title', '', array( 'title_tag' => 'h3' ) );

				// Include post excerpt
				resonator_template_part( 'blog', 'templates/parts/post-info/excerpt' );

				// Hook to include additional content after blog single content
				do_action( 'resonator_action_after_blog_single_content' );
				?>
			</div>
			<div class="qodef-e-info qodef-info--bottom">
				<div class="qodef-e-info-left">
					<?php
					// Include post read more
					resonator_template_part( 'blog', 'templates/parts/post-info/read-more' );
					?>
				</div>
				<div class="qodef-e-info-right">
					<?php
					// Include post tags info
					resonator_template_part( 'blog', 'templates/parts/post-info/tags' );
					?>
				</div>
			</div>
		</div>
	</div>
</article>
