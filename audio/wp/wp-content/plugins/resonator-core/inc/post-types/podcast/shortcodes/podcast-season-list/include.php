<?php

include_once RESONATOR_CORE_CPT_PATH . '/podcast/shortcodes/podcast-season-list/podcast-season-list.php';

foreach ( glob( RESONATOR_CORE_CPT_PATH . '/podcast/shortcodes/podcast-season-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}