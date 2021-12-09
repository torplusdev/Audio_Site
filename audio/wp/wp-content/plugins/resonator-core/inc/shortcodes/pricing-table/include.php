<?php

include_once RESONATOR_CORE_SHORTCODES_PATH . '/pricing-table/pricing-table.php';

foreach ( glob( RESONATOR_CORE_SHORTCODES_PATH . '/pricing-table/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}