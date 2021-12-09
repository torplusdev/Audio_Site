<?php

include_once RESONATOR_CORE_SHORTCODES_PATH . '/button/button.php';

foreach ( glob( RESONATOR_CORE_SHORTCODES_PATH . '/button/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}