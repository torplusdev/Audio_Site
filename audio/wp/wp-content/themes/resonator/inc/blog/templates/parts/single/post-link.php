<article <?php post_class( 'qodef-blog-item qodef-e' ); ?>>
	<div class="qodef-e-inner">
		<?php
		// Include post format part
		resonator_template_part( 'blog', 'templates/parts/post-format/link' );
		?>
		<div class="qodef-e-content">
			<div class="qodef-e-info qodef-info--top">
				<?php
				// Include post date info
				resonator_template_part( 'blog', 'templates/parts/post-info/date' );
				?>
			</div>
			<div class="qodef-e-text">
				<?php
				// Include post title
				resonator_template_part( 'blog', 'templates/parts/post-info/title' );
				
				// Include post content
				the_content();

				// Hook to include additional content after blog single content
				do_action( 'resonator_action_after_blog_single_content' );
				?>
			</div>
			<div class="qodef-e-info qodef-info--bottom">
				<div class="qodef-e-info-left">
					<?php
					// Include post author info
//					resonator_template_part( 'blog', 'templates/parts/post-info/author' );

					// Include post date info
//					resonator_template_part( 'blog', 'templates/parts/post-info/date' );

					// Include post comments info
//					resonator_template_part( 'blog', 'templates/parts/post-info/comments' );
					?>
				</div>
				<div class="qodef-e-info-right">
					<?php
					// Include post tags info
//					resonator_template_part( 'blog', 'templates/parts/post-info/tags' );
					?>
				</div>
			</div>
		</div>
	</div>
</article>
