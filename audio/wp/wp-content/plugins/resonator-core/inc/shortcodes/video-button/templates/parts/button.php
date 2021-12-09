<?php if ( ! empty( $video_link ) ) { ?>
	<a itemprop="url" class="qodef-m-play qodef-magnific-popup qodef-popup-item" <?php echo qode_framework_get_inline_style( $play_button_styles ); ?> href="<?php echo esc_url( $video_link ); ?>" data-type="iframe">
		<div class="qodef-m-play-inner">
			<div class="qodef-m-play-holder">
				<?php resonator_core_render_svg_icon( 'play-sharp', 'qodef-m-play-icon' ); ?>
			</div>
		</div>
	</a>
<?php } ?>
