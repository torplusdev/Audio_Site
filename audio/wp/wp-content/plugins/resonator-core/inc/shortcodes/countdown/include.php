<?php

include_once RESONATOR_CORE_SHORTCODES_PATH . '/countdown/countdown.php';

foreach ( glob( RESONATOR_CORE_SHORTCODES_PATH . '/countdown/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}