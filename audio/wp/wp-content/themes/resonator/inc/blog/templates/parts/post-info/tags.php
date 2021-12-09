<?php
$tags_list_enabled   = resonator_get_post_value_through_levels( 'qodef_blog_list_enable_tags' ) !== 'no';
$tags_single_enabled = resonator_get_post_value_through_levels( 'qodef_blog_single_enable_tags' ) !== 'no';
$tags         = get_the_tags();

if ( ( $tags && $tags_list_enabled && !is_single() ) || ( $tags && $tags_single_enabled && is_single() ) ) { ?>
	<div class="qodef-e-info-item qodef-e-info-tags">
		<?php the_tags( '', '', '' ); ?>
	</div>
<?php } ?>
