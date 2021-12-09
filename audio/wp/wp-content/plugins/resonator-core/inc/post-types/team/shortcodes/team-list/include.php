<?php

include_once RESONATOR_CORE_CPT_PATH . '/team/shortcodes/team-list/team-list.php';

foreach ( glob( RESONATOR_CORE_CPT_PATH . '/team/shortcodes/team-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}