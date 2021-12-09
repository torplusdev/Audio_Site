<?php
$title_tag = isset( $title_tag ) && ! empty( $title_tag ) ? $title_tag : 'div';
?>
<p itemprop="name" class="qodef-e-title title-season entry-title" <?php qode_framework_inline_style( $this_shortcode->get_title_styles( $params ) ); ?>>
	<a itemprop="url" class="qodef-e-tagline-link" href="<?php echo esc_url( get_term_link( $term_id ) ); ?>">
		<?php echo esc_html( get_term_field( 'name', $term_id ) ); ?>
	</a>
</p>
