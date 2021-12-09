(function ($) {
    "use strict";

    var podcastPlayer = {};
    qodefCore.shortcodes.podcastPlayer = podcastPlayer;

    podcastPlayer.qodefPodcastPlayer = qodefPodcastPlayer;
    podcastPlayer.qodefElementorPodcastPlayer = qodefElementorPodcastPlayer;
    podcastPlayer.qodefElementorPodcastPlayerShortcode = qodefElementorPodcastPlayerShortcode;

    $(window).on('load', function () {
        qodefElementorPodcastPlayer();
        qodefElementorPodcastPlayerShortcode();
    });

    $(document).ready(function () {
        qodefPodcastPlayer.init();
    });

    var qodefPodcastPlayer = {
        init: function () {
            this.holder = $('.qodef-podcast-player');

            if (this.holder.length) {
                this.holder.each(function () {
                    var $thisHolder = $(this);
                    var $thisHolderAudio = $thisHolder.find('audio');
                    var player = '';
                    var $jumpButton = $('.qodef-jump-button');

                    player = new MediaElementPlayer($thisHolderAudio[0], {
                        'classPrefix': 'mejs-',
                        'isVideo': false,
                        'setDimensions': false,
                        'alwaysShowControls': true,
                        'audioVolume': 'vertical',
                        'skipBackInterval': 10,
                        'jumpForwardInterval': 10,
                        'timeAndDurationSeparator': '<span> / </span>',
                        'features' : ["skipback", "playpause", "jumpforward", "progress", "current", "duration", "volume", "speed"],
                        'speeds': ['2', '1.5', '1.25', '0.75'],
                        'defaultSpeed': '1',
                        success: function(mediaElement, originalNode, instance) {

                            mediaElement.addEventListener('ended', function(e) {
                                $(document).trigger('meks_ap_player_ended');
                            }, false);

                        }
                    });

                    $jumpButton.on('click', function(e) {
                        //console.log(player);
                        var $jumpLink = $(this),
                            $timeString = $(this).data('chapter-time');
                        var p = $timeString.split(':'),
                            $time = 0, m = 1;

                        while (p.length > 0) {
                            $time += m * parseInt(p.pop(), 10);
                            m *= 60;
                        }
                        e.preventDefault();
                        player.setCurrentTime($time);
                        player.play();
                        //qodefPodcastPlayer.jumpToPart($time);
                    })
                });
            }

        },

        jumpToPart: function ($time) {
            //console.log($time);
        },
    };

    /**
     * Elementor init for resonator_core_podcast_season_list Shortcode
     */
    function qodefElementorPodcastPlayer() {
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/resonator_core_podcast_season_list.default', function () {
                qodefPodcastPlayer.init();
            });
        });
    }

    /**
     * Elementor init for resonator_core_podcast_player Shortcode
     */
    function qodefElementorPodcastPlayerShortcode() {
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/resonator_core_podcast_player.default', function () {
                qodefPodcastPlayer.init();
            });
        });
    }

})(jQuery);

