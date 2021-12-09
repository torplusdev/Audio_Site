<?php

include_once RESONATOR_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-list/product-list.php';

foreach ( glob( RESONATOR_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}