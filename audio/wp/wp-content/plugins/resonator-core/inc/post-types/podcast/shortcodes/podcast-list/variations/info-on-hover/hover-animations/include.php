<?php

include_once RESONATOR_CORE_CPT_PATH . '/podcast/shortcodes/podcast-list/variations/info-on-hover/hover-animations/hover-animations.php';

foreach ( glob( RESONATOR_CORE_CPT_PATH . '/podcast/shortcodes/podcast-list/variations/info-on-hover/hover-animations/*/include.php' ) as $animation ) {
	include_once $animation;
}