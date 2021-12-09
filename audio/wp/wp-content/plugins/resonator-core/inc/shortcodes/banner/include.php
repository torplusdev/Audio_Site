<?php

include_once RESONATOR_CORE_SHORTCODES_PATH . '/banner/banner.php';

foreach ( glob( RESONATOR_CORE_INC_PATH . '/shortcodes/banner/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}