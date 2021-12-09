<?php

$taxonomy = str_replace( array( '-', ' ' ), array( '_', '' ), $taxonomy );
$tagline    = get_term_meta( $term_id, 'qodef_' . $taxonomy . '_tagline', true );

if ( ! empty( $tagline ) ) { ?>
	<h4 class="qodef-e-tagline">
		<a itemprop="url" class="qodef-e-tagline-link" href="<?php echo esc_url( get_term_link( $term_id ) ); ?>">
			<?php echo esc_html( $tagline ); ?>
		</a>
	</h4>
<?php } ?>
