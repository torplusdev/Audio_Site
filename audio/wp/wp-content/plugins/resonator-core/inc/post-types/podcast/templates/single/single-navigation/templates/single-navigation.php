<?php
$is_enabled = resonator_core_get_post_value_through_levels( 'qodef_podcast_enable_navigation' );

if ( $is_enabled === 'yes' ) {
	$through_same_category = resonator_core_get_post_value_through_levels( 'qodef_podcast_navigation_through_same_category' ) === 'yes';
	?>
	<div id="qodef-single-podcast-navigation" class="qodef-m">
		<div class="qodef-m-inner qodef-content-grid">
			<?php
			$post_navigation = array(
				'next'      => array(
					'label' => '<span class="qodef-m-nav-label">' . esc_html__( 'Next', 'resonator-core' ) . '</span>',
					'icon'  => qode_framework_icons()->render_icon( 'ion-ios-arrow-round-forward', 'ionicons', array( 'icon_attributes' => array( 'class' => 'qodef-m-nav-icon' ) ) )
				),
				'back-link' => array(),
				'prev'      => array(
					'label' => '<span class="qodef-m-nav-label">' . esc_html__( 'Prev', 'resonator-core' ) . '</span>',
					'icon'  => qode_framework_icons()->render_icon( 'ion-ios-arrow-round-back', 'ionicons', array( 'icon_attributes' => array( 'class' => 'qodef-m-nav-icon' ) ) )
				)
			);
			
			if ( $through_same_category ) {
				if ( get_adjacent_post( true, '', false, 'podcast-category' ) !== '' ) {
					$post_navigation['next']['post'] = get_adjacent_post( true, '', false, 'podcast-category' );
				}
				if ( get_adjacent_post( true, '', true, 'podcast-category') !== '' ) {
					$post_navigation['prev']['post'] = get_adjacent_post( true, '', true, 'podcast-category');
				}
			} else {
				if ( get_adjacent_post(false, '', false) !== '' ) {
					$post_navigation['next']['post'] = get_adjacent_post(false, '', false);
				}
				if ( get_adjacent_post(false, '', true) !== '' ) {
					$post_navigation['prev']['post'] = get_adjacent_post(false, '', true);
				}
			}
			foreach ( $post_navigation as $key => $value ) {
				if ( isset( $post_navigation[ $key ]['post'] ) ) {
					$current_post = $value['post'];
					$post_id      = isset( $value['post_id'] ) && ! empty( $value['post_id'] ) ? $value['post_id'] : $current_post->ID;
					$podcast_list_image = get_post_meta( $post_id, 'qodef_podcast_list_image', true );
					$has_image    = ! empty ( $podcast_list_image ) || has_post_thumbnail($post_id);
					
					if ($key === 'next') { ?>
						<div class="qodef-podcast-item qodef-nav-<?php echo esc_attr($key) ; ?>">
						<?php
						if ( $has_image ) {
							$image_dimension = 'resonator_image_size_square'; ?>
						<div class="qodef-e-media-image">
							<span class="qodef-e-media-icon"><?php echo qode_framework_icons()->render_icon('ion-md-headset', 'ionicons'); ?></span>
							<a itemprop="url" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>">
								<?php if ( ! empty ( $podcast_list_image ) ) {
									echo resonator_core_get_list_shortcode_item_image( $image_dimension, $podcast_list_image);
								} else {
									echo get_the_post_thumbnail( $post_id, $image_dimension );
								} ?>
							</a>
						</div>
						<?php } ?>
							<div class="qodef-e-content">
								<span class="qodef-next-text"> <?php esc_html_e('Next up:','resonator-core'); ?></span>
									<h3 class="qodef-e-title entry-title">
										<a itemprop="url" class="qodef-e-title-link" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>">
											<?php echo esc_html( get_the_title($post_id) ); ?>
										</a>
									</h3>
								<div class="qodef-e-info">
									<?php $podcast_episode_number = get_post_meta( $post_id , 'qodef_podcast_episode_number', true );
									if ( ! empty ( $podcast_episode_number ) ) { ?>
										<div class="qodef-e-episode-number">
											<?php esc_html_e('Episode ', 'resonator-core'); ?>
											<?php echo esc_html( $podcast_episode_number ); ?>
										</div>
									<?php } ?>
									<?php $categories = wp_get_post_terms($post_id , 'podcast-category');
									if( !empty( $categories ) ) {
										?>
										<div class="qodef-e-info-category">
											<?php foreach ($categories as $cat) { ?>
												<a itemprop="url" class="qodef-e-category" href="<?php echo esc_url(get_term_link($cat->term_id)); ?>">
													<?php echo esc_html($cat->name); ?>
												</a>
											<?php } ?>
										</div>
									<?php } ?>
									<?php $podcast_media = wp_get_attachment_url(get_post_meta( $post_id, 'qodef_podcast_file', true ));
									if( ! empty ( $podcast_media ) ) {
										$audio_id = attachment_url_to_postid($podcast_media);
										$audio_metadata = get_post_meta( $audio_id , '_wp_attachment_metadata', true ); ?>
										<div class="qodef-recipe-video-length">
											<?php echo esc_html($audio_metadata['length_formatted']);  ?>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php if($key === 'next' ) { ?>
						<div class="qodef-m-nav-holder">
					<?php } ?>
					<?php if( get_adjacent_post(false, '', false) === '' ) { ?>
						<div class="qodef-m-nav-holder qodef-m-nav-last-post">
					<?php } ?>
					<a itemprop="url" class="qodef-m-nav qodef--<?php echo esc_attr( $key ); ?>" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>">
						<?php if ( ! empty( $value['icon'] ) ) {
							echo wp_kses( $value['icon'], array( 'span' => array( 'class' => true ) ) );
						} ?>
						<?php if ( ! empty( $value['label'] ) ) {
							echo wp_kses( $value['label'], array( 'span' => array( 'class' => true ) ) );
						} ?>
					</a>
					<?php if($key === 'prev') { ?>
						
						<?php
						if ( $has_image ) {
						$image_dimension = 'resonator_image_size_square'; ?>
							<div class="qodef-podcast-item qodef-nav-prev">
								<div class="qodef-e-media-image">
									<span class="qodef-e-media-icon"><?php echo qode_framework_icons()->render_icon('ion-md-headset', 'ionicons'); ?></span>
									<a itemprop="url" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>">
										<?php if ( ! empty ( $podcast_list_image ) ) {
											echo resonator_core_get_list_shortcode_item_image( $image_dimension, $podcast_list_image);
										} else {
											echo get_the_post_thumbnail( $post_id, $image_dimension );
										} ?>
									</a>
								</div>
							</div>
							</div>
						<?php } ?>
					<?php } ?>
				<?php
				}
			}
			?>
		</div>
	</div>
<?php } ?>
