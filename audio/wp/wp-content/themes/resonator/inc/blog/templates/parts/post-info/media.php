<div class="qodef-e-media">
	<?php
	switch ( get_post_format() ) {
		case 'gallery':
			resonator_template_part( 'blog', 'templates/parts/post-format/gallery' );
			break;
		case 'video':
			resonator_template_part( 'blog', 'templates/parts/post-format/video' );
			break;
		case 'audio':
			resonator_template_part( 'blog', 'templates/parts/post-format/audio' );
			break;
		default:
			resonator_template_part( 'blog', 'templates/parts/post-info/image' );
			break;
	}
	?>
</div>
