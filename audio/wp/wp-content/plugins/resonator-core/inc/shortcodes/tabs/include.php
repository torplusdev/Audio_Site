<?php

include_once RESONATOR_CORE_SHORTCODES_PATH . '/tabs/tab.php';
include_once RESONATOR_CORE_SHORTCODES_PATH . '/tabs/tab-child.php';

foreach ( glob( RESONATOR_CORE_SHORTCODES_PATH . '/tabs/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}