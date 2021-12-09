<?php

abstract class ResonatorCoreTitle {
	protected $slug;
	public $overriding_whole_title = false;
	public $parameters = array();

	public function load_template() {
		return resonator_core_get_template_part( 'title/layouts/' . $this->slug, 'templates/' . $this->slug, '', $this->parameters );
	}
}