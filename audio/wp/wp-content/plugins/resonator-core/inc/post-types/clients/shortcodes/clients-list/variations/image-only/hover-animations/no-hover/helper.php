<?php

if ( ! function_exists( 'resonator_core_filter_clients_list_image_only_no_hover' ) ) {
    /**
     * Function that add variation layout for this module
     *
     * @param array $variations
     *
     * @return array
     */
    function resonator_core_filter_clients_list_image_only_no_hover( $variations ) {
        $variations['no-hover'] = esc_html__( 'No Hover', 'resonator-core' );

        return $variations;
    }

    add_filter( 'resonator_core_filter_clients_list_image_only_animation_options', 'resonator_core_filter_clients_list_image_only_no_hover' );
}
