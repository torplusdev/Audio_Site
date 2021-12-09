<div class="qodef-grid-item <?php echo esc_attr( resonator_core_get_page_content_sidebar_classes() ); ?>">
	<div class="qodef-podcast qodef-m <?php echo esc_attr( resonator_core_get_podcast_holder_classes() ); ?>">
		<?php
		// Include podcast posts loop
		resonator_core_template_part( 'post-types/podcast', 'templates/parts/loop' );
		?>
	</div>
</div>