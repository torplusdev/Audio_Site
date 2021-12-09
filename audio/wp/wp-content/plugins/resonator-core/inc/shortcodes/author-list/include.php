<?php

include_once RESONATOR_CORE_SHORTCODES_PATH . '/author-list/helper.php';
include_once RESONATOR_CORE_SHORTCODES_PATH . '/author-list/author-list.php';

foreach ( glob( RESONATOR_CORE_INC_PATH . '/shortcodes/author-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}