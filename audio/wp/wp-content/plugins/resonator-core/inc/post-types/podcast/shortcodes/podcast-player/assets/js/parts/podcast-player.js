(function ($) {
	"use strict";

	var shortcode = 'resonator_core_podcast_player';

	qodefCore.shortcodes[shortcode] = {};

	if (typeof qodefCore.listShortcodesScripts === 'object') {
		$.each(qodefCore.listShortcodesScripts, function (key, value) {
			qodefCore.shortcodes[shortcode][key] = value;
		});
	}
})(jQuery);

