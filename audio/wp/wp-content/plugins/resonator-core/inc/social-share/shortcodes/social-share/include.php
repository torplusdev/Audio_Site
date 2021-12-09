<?php

include_once RESONATOR_CORE_INC_PATH . '/social-share/shortcodes/social-share/social-share.php';

foreach ( glob( RESONATOR_CORE_INC_PATH . '/social-share/shortcodes/social-share/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}