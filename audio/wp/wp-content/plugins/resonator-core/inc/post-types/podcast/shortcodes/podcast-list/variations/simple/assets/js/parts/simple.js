(function ($) {
    "use strict";

    $(document).ready(function () {
        qodefPodcastListSimple.init();
    });


    var qodefPodcastListSimple = {
        init: function () {
            this.holder = $('.qodef-podcast-list .qodef-m-play');
            var $modalClose = $('#qodef-podcast-popup-modal .qodef-pp-close'),
                $podcastModal = $('#qodef-podcast-popup-modal'),
                $podcastPopupPlayer = $podcastModal.find('.qodef-podcast-player'),
                player = '';

            if (this.holder.length) {
                this.holder.on('click', function(e) {
                        var $thisHolder = $(this),
                            $source = $thisHolder.attr('data-source'),
                            $title = $thisHolder.attr('data-title'),
                            $link = $thisHolder.attr('data-link'),
                            $episode = $thisHolder.attr('data-episode'),
                            $image = $thisHolder.attr('data-image');
                        $podcastPopupPlayer.empty();
                        $podcastModal.find('.qodef-podcast-title').empty();
                        $podcastModal.find('.qodef-m-episode-number').empty();
                        $podcastModal.find('.qodef-e-image').empty();
                        $podcastModal.find('.qodef-e-title-link').attr('href', '');
                        $podcastPopupPlayer.append('<audio width="100%" height="100%"><source src="' + $source +'" type="audio/mp3" /></audio>');
                        $podcastModal.find('.qodef-podcast-title').append($title);
                        $podcastModal.find('.qodef-m-episode-number').append($episode);
                        $podcastModal.find('.qodef-e-image').append('<img src="' + $image + '" alt="popup-image">');
                        $podcastModal.find('.qodef-e-title-link').attr('href', $link);
                        $podcastModal.addClass('opened');
                        player = new MediaElementPlayer($podcastPopupPlayer.find('audio')[0], {
                            'classPrefix': 'mejs-',
                            'isVideo': false,
                            'setDimensions': false,
                            'alwaysShowControls': true,
                            'audioVolume': 'vertical',
                            'skipBackInterval': 15,
                            'jumpForwardInterval': 15,
                            'timeAndDurationSeparator': '<span> / </span>',
                            'features' : ["skipback", "playpause", "jumpforward", "progress", "current", "duration", "volume", "speed"],
                            'speeds': ['2', '1.5', '1.25', '0.75'],
                            'defaultSpeed': '1',
                        });
                        player.play();
                });
            }

            $modalClose.on('click', function (e) {
                e.preventDefault();
                var $playerHolder = $(this).parents('#qodef-podcast-popup-modal').find('audio');
                $playerHolder[0].player.remove();
                $podcastModal.removeClass('opened');
            });

        },
    };
})(jQuery);

