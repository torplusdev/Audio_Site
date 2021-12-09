<?php

include_once RESONATOR_CORE_SHORTCODES_PATH . '/item-showcase/item-showcase.php';

foreach ( glob( RESONATOR_CORE_SHORTCODES_PATH . '/item-showcase/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}