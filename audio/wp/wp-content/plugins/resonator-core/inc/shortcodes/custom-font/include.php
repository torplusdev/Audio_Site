<?php

include_once RESONATOR_CORE_SHORTCODES_PATH . '/custom-font/custom-font.php';

foreach ( glob( RESONATOR_CORE_SHORTCODES_PATH . '/custom-font/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}