<?php
$selected_icon_pack = str_replace( '-', '_', $main_icon );

if ( ( $icon_type == 'icon-pack' ) && ! empty( $main_icon ) && ! empty( $icon_params[ 'main_icon_' . $selected_icon_pack ] ) ) {
	echo ResonatorCoreIconShortcode::call_shortcode( $icon_params );
}