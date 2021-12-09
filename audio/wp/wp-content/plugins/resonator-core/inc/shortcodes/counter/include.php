<?php

include_once RESONATOR_CORE_SHORTCODES_PATH . '/counter/counter.php';

foreach ( glob( RESONATOR_CORE_SHORTCODES_PATH . '/counter/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}