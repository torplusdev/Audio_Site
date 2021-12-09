<?php
// Hook to include additional content before podcast single item
do_action( 'resonator_core_action_before_podcast_single_item' );
?>
<article <?php post_class( 'qodef-podcast-single-item qodef-e' ); ?>>
    <div class="qodef-e-inner">
        <div class="qodef-e-content qodef-grid qodef-layout--template <?php echo resonator_core_get_grid_gutter_classes(); ?>">
	        <?php resonator_core_template_part( 'post-types/podcast', 'templates/parts/post-info/player-box' ); ?>
            <div class="qodef-podcast-content-holder qodef-content-grid qodef-grid-inner clear">
	            <div class="qodef-grid-item qodef-col--9">
		            <?php resonator_core_template_part( 'post-types/podcast', 'templates/parts/post-info/content' ); ?>
	            </div>
	            <div class="qodef-grid-item qodef-col--3">
		            <?php resonator_core_template_part( 'post-types/podcast', 'templates/parts/post-info/episode-links' ); ?>
	            </div>
            </div>
            <div class="qodef-podcast-navigation">
	            <?php resonator_core_template_part( 'post-types/podcast', 'templates/parts/post-info/sections' ); ?>
            </div>
            <div class="qodef-podcast-transcript qodef-content-grid">
		        <?php resonator_core_template_part( 'post-types/podcast', 'templates/parts/post-info/transcript' ); ?>
            </div>
            <div class="qodef-podcast-hosts qodef-content-grid">
	            <?php resonator_core_template_part( 'post-types/podcast', 'templates/parts/post-info/hosts' ); ?>
            </div>
        </div>
    </div>
</article>
<?php
// Hook to include additional content after podcast single item
do_action( 'resonator_core_action_after_podcast_single_item' );
?>
