<?php

include_once RESONATOR_CORE_CPT_PATH . '/clients/shortcodes/clients-list/variations/image-only/hover-animations/hover-animations.php';

foreach ( glob( RESONATOR_CORE_CPT_PATH . '/clients/shortcodes/clients-list/variations/image-only/hover-animations/*/include.php' ) as $animation ) {
	include_once $animation;
}