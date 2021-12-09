(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefHoverDir.init();
	});
	
	$(document).on('resonator_trigger_get_new_posts', function () {
		qodefHoverDir.init();
	});
	
	var qodefHoverDir = {
		init: function () {
			var $gallery = $('.qodef-hover-animation--direction-aware');
			
			if ($gallery.length) {
				$gallery.each(function () {
					var $this = $(this);
					$this.find('article').each(function () {
						$(this).hoverdir({
							hoverElem: 'div.qodef-e-content',
							speed: 330,
							hoverDelay: 35,
							easing: 'ease'
						});
					});
				});
			}
		}
	};
	
	qodefCore.shortcodes.resonator_core_podcast_list.qodefHoverDir = qodefHoverDir;
	
})(jQuery);