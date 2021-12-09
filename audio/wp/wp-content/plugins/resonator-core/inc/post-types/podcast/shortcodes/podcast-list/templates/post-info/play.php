<?php
$podcast_media = wp_get_attachment_url(get_post_meta( get_the_ID(), 'qodef_podcast_file', true ));
$current_id = is_singular() ? get_the_ID() : 0;
$podcast_episode_number = get_post_meta( get_the_ID(), 'qodef_podcast_episode_number', true );
$podcast_episode_number = esc_html__('Episode','resonator-core').$podcast_episode_number; ?>
<div class="qodef-m-play" data-playing-id="<?php echo esc_attr($current_id); ?>" data-source="<?php echo esc_url($podcast_media); ?>" data-title="<?php the_title(); ?>" data-link="<?php the_permalink(); ?>" data-image="<?php echo esc_attr( get_the_post_thumbnail_url()); ?>" data-episode="<?php echo esc_attr($podcast_episode_number); ?>"></div>
