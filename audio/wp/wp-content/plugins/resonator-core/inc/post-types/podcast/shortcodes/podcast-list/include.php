<?php

include_once RESONATOR_CORE_CPT_PATH . '/podcast/shortcodes/podcast-list/podcast-list.php';

foreach ( glob( RESONATOR_CORE_CPT_PATH . '/podcast/shortcodes/podcast-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}