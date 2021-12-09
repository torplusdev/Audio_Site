(function ($) {
	"use strict";

	$( document ).ready(
		function () {
			/* article hovered class on title & read more btn */
			qodef.qodefHoverTrigger.init('.qodef-podcast-season-list .qodef-e-tagline-link, .qodef-podcast-season-list .qodef-e-more-btn .qodef-button', 'article');
		}
	);

	var shortcode = 'resonator_core_podcast_season_list';

	qodefCore.shortcodes[shortcode] = {};

	if (typeof qodefCore.listShortcodesScripts === 'object') {
		$.each(qodefCore.listShortcodesScripts, function (key, value) {
			qodefCore.shortcodes[shortcode][key] = value;
		});
	}
})(jQuery);
