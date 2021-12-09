<?php

include_once RESONATOR_CORE_SHORTCODES_PATH . '/image-with-text/image-with-text.php';

foreach ( glob( RESONATOR_CORE_SHORTCODES_PATH . '/image-with-text/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}