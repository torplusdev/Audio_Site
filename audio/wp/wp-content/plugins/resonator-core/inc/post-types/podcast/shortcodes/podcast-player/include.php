<?php
include_once RESONATOR_CORE_CPT_PATH . '/podcast/shortcodes/podcast-player/podcast-player.php';

foreach ( glob( RESONATOR_CORE_CPT_PATH . '/podcast/shortcodes/podcast-player/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}