<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<?php
		$embed = wp_oembed_get( $playlist_url );
		print $embed;
	?>
</div>