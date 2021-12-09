<?php

include_once RESONATOR_CORE_SHORTCODES_PATH . '/call-to-action/call-to-action.php';

foreach ( glob( RESONATOR_CORE_SHORTCODES_PATH . '/call-to-action/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}