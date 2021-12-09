<?php
$is_enabled = resonator_core_get_post_value_through_levels( 'qodef_blog_single_enable_single_post_navigation' );

if ( $is_enabled === 'yes' ) {
	$through_same_category = resonator_core_get_post_value_through_levels( 'qodef_blog_single_post_navigation_through_same_category' ) === 'yes';
	?>
	<div id="qodef-single-post-navigation" class="qodef-m">
		<div class="qodef-m-inner">
			<?php
			$post_navigation = array(
				'prev' => array(
					'label'     => '<span class="qodef-m-nav-label">' . esc_html__( 'Prev project', 'resonator-core' ) . '</span>',
					'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" width="18.7539" height="11" viewBox="0 0 18.7539 11"><title>button_arrow-left</title><path d="M.1125,5.1867q.0567-.056,4.5-5.0157a.4186.4186,0,0,1,.6751,0,.4315.4315,0,0,1,0,.6841L1.5838,5h17.17V6H1.5325l3.7552,4.2024a.4311.4311,0,0,1,0,.6836A.4512.4512,0,0,1,4.95,11a.454.454,0,0,1-.3375-.114l-4.5-5.0152A.4686.4686,0,0,1,0,5.5287.4718.4718,0,0,1,.1125,5.1867Z"/></svg>',
				),
				'next' => array(
					'label' => '<span class="qodef-m-nav-label">' . esc_html__( 'Next project', 'resonator-core' ) . '</span>',
					'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" width="18.7539" height="11" viewBox="0 0 18.7539 11"><title>button_arrow-right</title><path d="M18.6414,5.1867q-.0567-.056-4.5-5.0157a.4186.4186,0,0,0-.6751,0,.4315.4315,0,0,0,0,.6841L17.17,5H0V6H17.2214l-3.7552,4.2024a.4311.4311,0,0,0,0,.6836.5567.5567,0,0,0,.6751,0l4.5-5.0152a.4686.4686,0,0,0,.1125-.342A.4718.4718,0,0,0,18.6414,5.1867Z"/></svg>',
				)
			);
			
			if ( $through_same_category ) {
				if ( get_previous_post( true ) !== '' ) {
					$post_navigation['prev']['post'] = get_previous_post( true );
				}
				if ( get_next_post( true ) !== '' ) {
					$post_navigation['next']['post'] = get_next_post( true );
				}
			} else {
				if ( get_previous_post() !== '' ) {
					$post_navigation['prev']['post'] = get_previous_post();
				}
				if ( get_next_post() !== '' ) {
					$post_navigation['next']['post'] = get_next_post();
				}
			}
			
			foreach ( $post_navigation as $key => $value ) {
				if ( isset( $post_navigation[ $key ]['post'] ) ) {
					$current_post = $value['post'];
					$post_id      = $current_post->ID;
					?>
					<a itemprop="url" class="qodef-m-nav qodef--<?php echo esc_attr( $key ); ?>" href="<?php echo get_permalink( $post_id ); ?>">
						<?php echo qode_framework_wp_kses_html( 'svg custom', $value['icon'] );?>
						<?php echo wp_kses( $value['label'], array( 'span' => array( 'class' => true ) ) ); ?>
					</a>
					<?php if( $key === 'prev' || get_previous_post() === '' ) do_action( 'resonator_action_between_single_post_navigation'); ?>
				<?php }
			}
			?>
		</div>
	</div>
<?php } ?>