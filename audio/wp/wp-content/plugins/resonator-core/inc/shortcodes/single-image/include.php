<?php

include_once RESONATOR_CORE_SHORTCODES_PATH . '/single-image/single-image.php';

foreach ( glob( RESONATOR_CORE_SHORTCODES_PATH . '/single-image/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}