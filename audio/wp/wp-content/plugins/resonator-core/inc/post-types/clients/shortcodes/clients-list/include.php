<?php

include_once RESONATOR_CORE_CPT_PATH . '/clients/shortcodes/clients-list/clients-list.php';

foreach ( glob( RESONATOR_CORE_CPT_PATH . '/clients/shortcodes/clients-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}