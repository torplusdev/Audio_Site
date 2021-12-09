<div class="qodef-season-items">
	<?php
	$args2 = array(
		'post_type' => 'podcast-item',
		'tax_query' => array(
			array(
				'taxonomy' => 'podcast-season',
				'field' => 'term_id',
				'terms' => $params['term_id']
			)
		),
		'posts_per_page' => 3,
	);
	$loop = new WP_Query($args2);
	while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <div class="qodef-m-item">
        <div class="qodef-m-player-box">
		    <?php
		    $podcast_media = wp_get_attachment_url(get_post_meta( get_the_ID(), 'qodef_podcast_file', true )); ?>

		    <?php $current_id = is_singular() ? get_the_ID() : 0; ?>
            <div class="qodef-podcast-player" data-playing-id="<?php echo esc_attr($current_id); ?>">
                <audio>
                    <source src="<?php echo esc_url($podcast_media); ?>" type="audio/mp3" />
                </audio>
            </div>
        </div>
	    <?php $podcast_episode_number = get_post_meta( get_the_ID(), 'qodef_podcast_episode_number', true ); ?>
        <div class="qodef-m-info">
	        <?php if ( ! empty ( $podcast_episode_number ) ) { ?>
                <div class="qodef-m-episode">
			        <?php esc_html_e('Episode ', 'resonator-core'); ?>
			        <?php echo esc_html( $podcast_episode_number ); ?>
                </div>
	        <?php } ?>
            <a itemprop="url" class="qodef-e-title-link" href="<?php the_permalink(); ?>">
		        <?php the_title(); ?>
            </a>
        </div>
    </div>
	<?php endwhile;
	wp_reset_postdata(); ?>
</div>
