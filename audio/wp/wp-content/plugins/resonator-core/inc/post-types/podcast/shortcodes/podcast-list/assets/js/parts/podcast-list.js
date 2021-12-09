(function ($) {
	"use strict";

	$( document ).ready(
		function () {
			/* article hovered class on title & read more btn */
			qodef.qodefHoverTrigger.init('.qodef-podcast-list .qodef-e-title-link, .qodef-podcast-list .qodef-e-read-more .qodef-button', 'article');
		}
	);
	
	var shortcode = 'resonator_core_podcast_list';
	
	qodefCore.shortcodes[shortcode] = {};
	
	if (typeof qodefCore.listShortcodesScripts === 'object') {
		$.each(qodefCore.listShortcodesScripts, function (key, value) {
			qodefCore.shortcodes[shortcode][key] = value;
		});
	}
	
})(jQuery);
