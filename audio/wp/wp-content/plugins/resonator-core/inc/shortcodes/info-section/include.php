<?php

include_once RESONATOR_CORE_SHORTCODES_PATH . '/info-section/info-section.php';

foreach ( glob( RESONATOR_CORE_SHORTCODES_PATH . '/info-section/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}