<?php if ( ! empty( $video_link ) ) : ?>
    <div <?php qode_framework_class_attribute($image_classes); ?>>
		<?php echo wp_get_attachment_image( $video_image, 'full' ); ?>
    </div>
<?php endif; ?>
