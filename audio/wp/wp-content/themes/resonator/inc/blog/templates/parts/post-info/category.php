<?php
$categories_list_enabled   = resonator_get_post_value_through_levels( 'qodef_blog_list_enable_categories' ) !== 'no';
$categories_single_enabled = resonator_get_post_value_through_levels( 'qodef_blog_single_enable_categories' ) !== 'no';
?>

<?php
	if ( ( has_category() && $categories_list_enabled && !is_single() ) || ( has_category() && $categories_single_enabled && is_single() ) ) {
?>
	<div class="qodef-e-info-item qodef-e-info-category">
		<?php the_category( ', ' ); ?>
	</div>
<?php
	}
?>
