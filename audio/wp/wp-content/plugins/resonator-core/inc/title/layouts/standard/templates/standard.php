<?php
// Load title image template
resonator_core_get_page_title_image();
?>
<div class="qodef-m-content <?php echo esc_attr( resonator_core_get_page_title_content_classes() ); ?>">
    <<?php echo esc_attr( $title_tag ); ?> class="qodef-m-title entry-title">
        <?php if ( qode_framework_is_installed( 'theme' ) ) {
            echo esc_html( resonator_get_page_title_text() );
        } else {
            echo get_option( 'blogname' );
        } ?>
    </<?php echo esc_attr( $title_tag ); ?>>
    <?php
    // Load subtitle template
    resonator_core_template_part( 'title/layouts/standard', 'templates/parts/subtitle', '', resonator_core_get_standard_title_layout_subtitle_text() );
    
    do_action('resonator_action_after_standard_title_content');
    ?>
</div>
