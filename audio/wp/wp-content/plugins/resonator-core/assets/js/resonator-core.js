(function ($) {
	"use strict";
	
	// This case is important when theme is not active
	if (typeof qodef !== 'object') {
		window.qodef = {};
	}
	
	window.qodefCore = {};
	qodefCore.shortcodes = {};
	qodefCore.listShortcodesScripts = {
		qodefSwiper: qodef.qodefSwiper,
		qodefPagination: qodef.qodefPagination,
		qodefFilter: qodef.qodefFilter,
		qodefMasonryLayout: qodef.qodefMasonryLayout,
		qodefJustifiedGallery: qodef.qodefJustifiedGallery,
		qodefAppear: qodef.qodefAppear,
	};

	qodefCore.body = $('body');
	qodefCore.html = $('html');
	qodefCore.windowWidth = $(window).width();
	qodefCore.windowHeight = $(window).height();
	qodefCore.scroll = 0;

	$(document).ready(function () {
		qodefCore.scroll = $(window).scrollTop();
		qodefInlinePageStyle.init();
	});

	$(window).resize(function () {
		qodefCore.windowWidth = $(window).width();
		qodefCore.windowHeight = $(window).height();
	});

	$(window).scroll(function () {
		qodefCore.scroll = $(window).scrollTop();
	});

	var qodefScroll = {
		disable: function(){
			if (window.addEventListener) {
				window.addEventListener('wheel', qodefScroll.preventDefaultValue, {passive: false});
			}

			// window.onmousewheel = document.onmousewheel = qodefScroll.preventDefaultValue;
			document.onkeydown = qodefScroll.keyDown;
		},
		enable: function(){
			if (window.removeEventListener) {
				window.removeEventListener('wheel', qodefScroll.preventDefaultValue, {passive: false});
			}
			window.onmousewheel = document.onmousewheel = document.onkeydown = null;
		},
		preventDefaultValue: function(e){
			e = e || window.event;
			if (e.preventDefault) {
				e.preventDefault();
			}
			e.returnValue = false;
		},
		keyDown: function(e) {
			var keys = [37, 38, 39, 40];
			for (var i = keys.length; i--;) {
				if (e.keyCode === keys[i]) {
					qodefScroll.preventDefaultValue(e);
					return;
				}
			}
		}
	};

	qodefCore.qodefScroll = qodefScroll;

	var qodefPerfectScrollbar = {
		init: function ($holder) {
			if ($holder.length) {
				qodefPerfectScrollbar.qodefInitScroll($holder);
			}
		},
		qodefInitScroll: function ( $holder ) {
			var $defaultParams = {
				wheelSpeed: 0.6,
				suppressScrollX: true
			};

			var $ps = new PerfectScrollbar(
				$holder[0],
				$defaultParams
			);

			$( window ).resize(
				function () {
					$ps.update();
				}
			);
		}
	};

	qodefCore.qodefPerfectScrollbar = qodefPerfectScrollbar;

	var qodefInlinePageStyle = {
		init: function () {
			this.holder = $('#resonator-core-page-inline-style');

			if (this.holder.length) {
				var style = this.holder.data('style');

				if (style.length) {
					$('head').append('<style type="text/css">' + style + '</style>');
				}
			}
		}
	};

})(jQuery);

(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefAgeVerificationModal.init();
	});
	
	var qodefAgeVerificationModal = {
		init: function () {
			this.holder = $('#qodef-age-verification-modal');
			
			if (this.holder.length) {
				var $preventHolder = this.holder.find('.qodef-m-content-prevent');
				
				if ($preventHolder.length) {
					var $preventYesButton = $preventHolder.find('.qodef-prevent--yes');
					
					$preventYesButton.on('click', function () {
						var cname = 'disabledAgeVerification';
						var cvalue = 'Yes';
						var exdays = 7;
						var d = new Date();
						
						d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
						var expires = "expires=" + d.toUTCString();
						document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
						
						qodefAgeVerificationModal.handleClassAndScroll('remove');
					});
				}
			}
		},
		
		handleClassAndScroll: function (option) {
			if (option === 'remove') {
				qodefCore.body.removeClass('qodef-age-verification--opened');
				qodefCore.qodefScroll.enable();
			}
			if (option === 'add') {
				qodefCore.body.addClass('qodef-age-verification--opened');
				qodefCore.qodefScroll.disable();
			}
		},
	};
	
})(jQuery);
(function ($) {
    "use strict";

    $(document).ready(function () {
        qodefBackToTop.init();
    });

    var qodefBackToTop = {
        init: function () {
            this.holder = $('#qodef-back-to-top');

            if(this.holder.length) {
                // Scroll To Top
                this.holder.on('click', function (e) {
                    e.preventDefault();
                    qodefBackToTop.animateScrollToTop();
                });
    
                qodefBackToTop.showHideBackToTop();
            }
        },
        animateScrollToTop: function() {
            var startPos = qodef.scroll,
                newPos = qodef.scroll,
                step = .9,
                animationFrameId;

           var startAnimation = function() {
                if (newPos === 0) return;
                newPos < 0.0001 ? newPos = 0 : null;
                var ease = qodefBackToTop.easingFunction((startPos - newPos) / startPos);
                $('html, body').scrollTop(startPos - (startPos - newPos) * ease);
                newPos = newPos * step;
    
                animationFrameId = requestAnimationFrame(startAnimation)
            }
            startAnimation();
            $(window).one('wheel touchstart', function() {
                cancelAnimationFrame(animationFrameId);
            });
        },
        easingFunction: function(n) {
            return 0 == n ? 0 : Math.pow(1024, n - 1);
        },
        showHideBackToTop: function () {
            $(window).scroll(function () {
                var $thisItem = $(this),
                    b = $thisItem.scrollTop(),
                    c = $thisItem.height(),
                    d;

                if (b > 0) {
                    d = b + c / 2;
                } else {
                    d = 1;
                }

                if (d < 1e3) {
                    qodefBackToTop.addClass('off');
                } else {
                    qodefBackToTop.addClass('on');
                }
            });
        },
        addClass: function (a) {
            this.holder.removeClass('qodef--off qodef--on');

            if (a === 'on') {
                this.holder.addClass('qodef--on');
            } else {
                this.holder.addClass('qodef--off');
            }
        }
    };

})(jQuery);

(function ($) {
	"use strict";

	$( window ).on( 'load', function () {
		qodefUncoverFooter.init();
	});
	
	var qodefUncoverFooter = {
		holder: '',
		init: function () {
			this.holder = $('#qodef-page-footer.qodef--uncover');
			
			if (this.holder.length && !qodefCore.html.hasClass('touchevents')) {
				qodefUncoverFooter.addClass();
				qodefUncoverFooter.setHeight(this.holder);
				
				$(window).resize(function () {
                    qodefUncoverFooter.setHeight(qodefUncoverFooter.holder);
				});
			}
		},
        setHeight: function ($holder) {
	        $holder.css('height', 'auto');
	        
            var footerHeight = $holder.outerHeight();
            
            if (footerHeight > 0) {
                $('#qodef-page-outer').css({'margin-bottom': footerHeight, 'background-color': qodefCore.body.css('backgroundColor')});
                $holder.css('height', footerHeight);
            }
        },
		addClass: function () {
			qodefCore.body.addClass('qodef-page-footer--uncover');
		}
	};
	
})(jQuery);

(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefFullscreenMenu.init();
	});
	
	var qodefFullscreenMenu = {
		init: function () {
			var $fullscreenMenuOpener = $('a.qodef-fullscreen-menu-opener'),
				$menuItems 	     = $('#qodef-fullscreen-area nav ul li a'),
				$menuItemsParent = $('#qodef-fullscreen-area nav > ul > li > a');

			//Appearing animation
			$menuItemsParent.each(function(i) {
				var $animationDelay = (i+1) * 70 + 'ms';
				$(this).css({
					'-webkit-animation-delay': $animationDelay,
					'-moz-animation-delay': $animationDelay,
					'animation-delay': $animationDelay
				});
				$(this).next('.qodef-drop-down-second').css({
					'-webkit-animation-delay': $animationDelay,
					'-moz-animation-delay': $animationDelay,
					'animation-delay': $animationDelay
				});
			});
			
			// Open popup menu
			$fullscreenMenuOpener.on('click', function (e) {
				e.preventDefault();
				var $thisOpener = $(this);
				
				if (!qodefCore.body.hasClass('qodef-fullscreen-menu--opened')) {
					qodefFullscreenMenu.openFullscreen($thisOpener);
					
					$(document).keyup(function (e) {
						if (e.keyCode === 27) {
							qodefFullscreenMenu.closeFullscreen($thisOpener);
						}
					});
				} else {
					qodefFullscreenMenu.closeFullscreen($thisOpener);
				}
			});
			
			//open dropdowns
			$menuItems.on('tap click', function (e) {
				var $thisItem = $(this);
				
				if ($thisItem.parent().hasClass('menu-item-has-children')) {
					e.preventDefault();
					qodefFullscreenMenu.clickItemWithChild($thisItem);
				} else if ($thisItem.attr('href') !== "http://#" && $thisItem.attr('href') !== "#") {
					qodefFullscreenMenu.closeFullscreen($fullscreenMenuOpener);
				}
			});
		},
		openFullscreen: function ($opener) {
			$opener.addClass('qodef--opened');
			qodefCore.body.removeClass('qodef-fullscreen-menu-animate--out').addClass('qodef-fullscreen-menu--opened qodef-fullscreen-menu-animate--in');
			qodefCore.qodefScroll.disable();
		},
		closeFullscreen: function ($opener) {
			$opener.removeClass('qodef--opened');
			qodefCore.body.removeClass('qodef-fullscreen-menu--opened qodef-fullscreen-menu-animate--in').addClass('qodef-fullscreen-menu-animate--out');
			qodefCore.qodefScroll.enable();
			$("nav.qodef-fullscreen-menu ul.sub_menu").slideUp(200);
		},
		clickItemWithChild: function (thisItem) {
			var $thisItemParent = thisItem.parent(),
				$thisItemSubMenu = $thisItemParent.find('.sub-menu').first();
			
			if ($thisItemSubMenu.is(':visible')) {
				$thisItemSubMenu.slideUp(300);
				$thisItemParent.removeClass('qodef--opened');
			} else {
				$thisItemSubMenu.slideDown(300);
				$thisItemParent.addClass('qodef--opened').siblings().find('.sub-menu').slideUp(400);
			}
		}
	};
	
})(jQuery);

(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefHeaderScrollAppearance.init();
	});
	
	var qodefHeaderScrollAppearance = {
		appearanceType: function () {
			return qodefCore.body.attr('class').indexOf('qodef-header-appearance--') !== -1 ? qodefCore.body.attr('class').match(/qodef-header-appearance--([\w]+)/)[1] : '';
		},
		init: function () {
			var appearanceType = this.appearanceType();
			
			if (appearanceType !== '' && appearanceType !== 'none') {
                qodefCore[appearanceType + "HeaderAppearance"]();
			}
		}
	};
	
})(jQuery);

(function ($) {
    "use strict";

    $(document).ready(function () {
        qodefMobileHeaderAppearance.init();
    });

    /*
     **	Init mobile header functionality
     */
    var qodefMobileHeaderAppearance = {
        init: function () {
            if (qodefCore.body.hasClass('qodef-mobile-header-appearance--sticky')) {

                var docYScroll1 = qodefCore.scroll,
                    displayAmount = qodefGlobal.vars.mobileHeaderHeight + qodefGlobal.vars.adminBarHeight,
                    $pageOuter = $('#qodef-page-outer');

                qodefMobileHeaderAppearance.showHideMobileHeader(docYScroll1, displayAmount, $pageOuter);
                $(window).scroll(function () {
                    qodefMobileHeaderAppearance.showHideMobileHeader(docYScroll1, displayAmount, $pageOuter);
                    docYScroll1 = qodefCore.scroll;
                });

                $(window).resize(function () {
                    $pageOuter.css('padding-top', 0);
                    qodefMobileHeaderAppearance.showHideMobileHeader(docYScroll1, displayAmount, $pageOuter);
                });
            }
        },
        showHideMobileHeader: function(docYScroll1, displayAmount,$pageOuter){
            if(qodefCore.windowWidth <= 1024) {
                if (qodefCore.scroll > displayAmount * 2) {
                    //set header to be fixed
                    qodefCore.body.addClass('qodef-mobile-header--sticky');

                    //add transition to it
                    setTimeout(function () {
                        qodefCore.body.addClass('qodef-mobile-header--sticky-animation');
                    }, 300); //300 is duration of sticky header animation

                    //add padding to content so there is no 'jumping'
                    $pageOuter.css('padding-top', qodefGlobal.vars.mobileHeaderHeight);
                } else {
                    //unset fixed header
                    qodefCore.body.removeClass('qodef-mobile-header--sticky');

                    //remove transition
                    setTimeout(function () {
                        qodefCore.body.removeClass('qodef-mobile-header--sticky-animation');
                    }, 300); //300 is duration of sticky header animation

                    //remove padding from content since header is not fixed anymore
                    $pageOuter.css('padding-top', 0);
                }

                if ((qodefCore.scroll > docYScroll1 && qodefCore.scroll > displayAmount) || (qodefCore.scroll < displayAmount * 3)) {
                    //show sticky header
                    qodefCore.body.removeClass('qodef-mobile-header--sticky-display');
                } else {
                    //hide sticky header
                    qodefCore.body.addClass('qodef-mobile-header--sticky-display');
                }
            }
        }
    };

})(jQuery);
(function ($) {
	"use strict";

	$(document).ready(function () {
		qodefNavMenu.init();
	});

	var qodefNavMenu = {
		init: function () {
			qodefNavMenu.dropdownBehavior();
			qodefNavMenu.wideDropdownPosition();
			qodefNavMenu.dropdownPosition();
		},
		dropdownBehavior: function () {
			var $menuItems = $('.qodef-header-navigation > ul > li');
			
			$menuItems.each(function () {
				var $thisItem = $(this);
				
				if ($thisItem.find('.qodef-drop-down-second').length) {
					$thisItem.waitForImages(function () {
						var $dropdownHolder = $thisItem.find('.qodef-drop-down-second'),
							$dropdownMenuItem = $dropdownHolder.find('.qodef-drop-down-second-inner ul'),
							dropDownHolderHeight = $dropdownMenuItem.outerHeight();
						
						if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
							$thisItem.on("touchstart mouseenter", function () {
								$dropdownHolder.css({
									'height': dropDownHolderHeight,
									'overflow': 'visible',
									'visibility': 'visible',
									'opacity': '1'
								});
							}).on("mouseleave", function () {
								$dropdownHolder.css({
									'height': '0px',
									'overflow': 'hidden',
									'visibility': 'hidden',
									'opacity': '0'
								});
							});
						} else {
							if (qodefCore.body.hasClass('qodef-drop-down-second--animate-height')) {
								var animateConfig = {
									interval: 0,
									over: function () {
										setTimeout(function () {
											$dropdownHolder.addClass('qodef-drop-down--start').css({
												'visibility': 'visible',
												'height': '0',
												'opacity': '1'
											});
											$dropdownHolder.stop().animate({
												'height': dropDownHolderHeight
											}, 400, 'easeInOutQuint', function () {
												$dropdownHolder.css('overflow', 'visible');
											});
										}, 100);
									},
									timeout: 100,
									out: function () {
										$dropdownHolder.stop().animate({
											'height': '0',
											'opacity': 0
										}, 100, function () {
											$dropdownHolder.css({
												'overflow': 'hidden',
												'visibility': 'hidden'
											});
										});
										
										$dropdownHolder.removeClass('qodef-drop-down--start');
									}
								};
								
								$thisItem.hoverIntent(animateConfig);
							} else {
								var config = {
									interval: 0,
									over: function () {
										setTimeout(function () {
											$dropdownHolder.addClass('qodef-drop-down--start').stop().css({'height': dropDownHolderHeight});
										}, 150);
									},
									timeout: 150,
									out: function () {
										$dropdownHolder.stop().css({'height': '0'}).removeClass('qodef-drop-down--start');
									}
								};
								
								$thisItem.hoverIntent(config);
							}
						}
					});
				}
			});
		},
		wideDropdownPosition: function () {
			var $menuItems = $(".qodef-header-navigation > ul > li.qodef-menu-item--wide");

			if ($menuItems.length) {
				$menuItems.each(function () {
					var $menuItem = $(this);
					var $menuItemSubMenu = $menuItem.find('.qodef-drop-down-second');

					if ($menuItemSubMenu.length) {
						$menuItemSubMenu.css('left', 0);

						var leftPosition = $menuItemSubMenu.offset().left;

						if (qodefCore.body.hasClass('qodef--boxed')) {
							//boxed layout case
							var boxedWidth = $('.qodef--boxed #qodef-page-wrapper').outerWidth();
							leftPosition = leftPosition - (qodefCore.windowWidth - boxedWidth) / 2;
							$menuItemSubMenu.css({'left': -leftPosition, 'width': boxedWidth});

						} else if (qodefCore.body.hasClass('qodef-drop-down-second--full-width')) {
							//wide dropdown full width case
							$menuItemSubMenu.css({'left': -leftPosition});
						}
						else {
							//wide dropdown in grid case
							$menuItemSubMenu.css({'left': -leftPosition + (qodefCore.windowWidth - $menuItemSubMenu.width()) / 2});
						}
					}
				});
			}
		},
		dropdownPosition: function () {
			var $menuItems = $('.qodef-header-navigation > ul > li.qodef-menu-item--narrow.menu-item-has-children');

			if ($menuItems.length) {
				$menuItems.each(function () {
					var $thisItem = $(this),
						menuItemPosition = $thisItem.offset().left,
						$dropdownHolder = $thisItem.find('.qodef-drop-down-second'),
						$dropdownMenuItem = $dropdownHolder.find('.qodef-drop-down-second-inner ul'),
						dropdownMenuWidth = $dropdownMenuItem.outerWidth(),
						menuItemFromLeft = $(window).width() - menuItemPosition;

                    if (qodef.body.hasClass('qodef--boxed')) {
                        //boxed layout case
                        var boxedWidth = $('.qodef--boxed #qodef-page-wrapper').outerWidth();
                        menuItemFromLeft = boxedWidth - menuItemPosition;
                    }

					var dropDownMenuFromLeft;

					if ($thisItem.find('li.menu-item-has-children').length > 0) {
						dropDownMenuFromLeft = menuItemFromLeft - dropdownMenuWidth;
					}

					$dropdownHolder.removeClass('qodef-drop-down--right');
					$dropdownMenuItem.removeClass('qodef-drop-down--right');
					if (menuItemFromLeft < dropdownMenuWidth || dropDownMenuFromLeft < dropdownMenuWidth) {
						$dropdownHolder.addClass('qodef-drop-down--right');
						$dropdownMenuItem.addClass('qodef-drop-down--right');
					}
				});
			}
		}
	};

})(jQuery);
(function ($) {
    "use strict";

    $(window).on( 'load', function () {
        qodefParallaxBackground.init();
    });

    /**
     * Init global parallax background functionality
     */
    var qodefParallaxBackground = {
        init: function (settings) {
            this.$sections = $('.qodef-parallax');

            // Allow overriding the default config
            $.extend(this.$sections, settings);

            var isSupported = !qodefCore.html.hasClass('touchevents') && !qodefCore.body.hasClass('qodef-browser--edge') && !qodefCore.body.hasClass('qodef-browser--ms-explorer');

            if (this.$sections.length && isSupported) {
                this.$sections.each(function () {
                    qodefParallaxBackground.ready($(this));
                });
            }
        },
        ready: function ($section) {
            $section.$imgHolder = $section.find('.qodef-parallax-img-holder');
            $section.$imgWrapper = $section.find('.qodef-parallax-img-wrapper');
            $section.$img = $section.find('img.qodef-parallax-img');

            var h = $section.height(),
                imgWrapperH = $section.$imgWrapper.height();

            $section.movement = 100 * (imgWrapperH - h) / h / 2; //percentage (divided by 2 due to absolute img centering in CSS)

            $section.buffer = window.pageYOffset;
            $section.scrollBuffer = null;

			
            //calc and init loop
            requestAnimationFrame(function () {
				$section.$imgHolder.animate({opacity: 1}, 100);
                qodefParallaxBackground.calc($section);
                qodefParallaxBackground.loop($section);
            });

            //recalc
            $(window).on('resize', function () {
                qodefParallaxBackground.calc($section);
            });
        },
        calc: function ($section) {
            var wH = $section.$imgWrapper.height(),
                wW = $section.$imgWrapper.width();

            if ($section.$img.width() < wW) {
                $section.$img.css({
                    'width': '100%',
                    'height': 'auto'
                });
            }

            if ($section.$img.height() < wH) {
                $section.$img.css({
                    'height': '100%',
                    'width': 'auto',
                    'max-width': 'unset'
                });
            }
        },
        loop: function ($section) {
            if ($section.scrollBuffer === Math.round(window.pageYOffset)) {
                requestAnimationFrame(function () {
                    qodefParallaxBackground.loop($section);
                }); //repeat loop
                return false; //same scroll value, do nothing
            } else {
                $section.scrollBuffer = Math.round(window.pageYOffset);
            }

            var wH = window.outerHeight,
                sTop = $section.offset().top,
                sH = $section.height();

            if ($section.scrollBuffer + wH * 1.2 > sTop && $section.scrollBuffer < sTop + sH) {
                var delta = (Math.abs($section.scrollBuffer + wH - sTop) / (wH + sH)).toFixed(4), //coeff between 0 and 1 based on scroll amount
                    yVal = (delta * $section.movement).toFixed(4);

                if ($section.buffer !== delta) {
                    $section.$imgWrapper.css('transform', 'translate3d(0,' + yVal + '%, 0)');
                }

                $section.buffer = delta;
            }

            requestAnimationFrame(function () {
                qodefParallaxBackground.loop($section);
            }); //repeat loop
        }
    };

    qodefCore.qodefParallaxBackground = qodefParallaxBackground;

})(jQuery);

(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefReview.init();
	});
	
	var qodefReview = {
		init: function () {
			var ratingHolder = $('#qodef-page-comments-form .qodef-rating-inner');
			
			var addActive = function (stars, ratingValue) {
				for (var i = 0; i < stars.length; i++) {
					var star = stars[i];
					if (i < ratingValue) {
						$(star).addClass('active');
					} else {
						$(star).removeClass('active');
					}
				}
			};
			
			ratingHolder.each(function () {
				var thisHolder = $(this),
					ratingInput = thisHolder.find('.qodef-rating'),
					ratingValue = ratingInput.val(),
					stars = thisHolder.find('.qodef-star-rating');
				
				addActive(stars, ratingValue);
				
				stars.on('click', function () {
					ratingInput.val($(this).data('value')).trigger('change');
				});
				
				ratingInput.change(function () {
					ratingValue = ratingInput.val();
					addActive(stars, ratingValue);
				});
			});
		}
	}
})(jQuery);
(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefSideArea.init();
	});
	
	var qodefSideArea = {
		init: function () {
			var $sideAreaOpener = $('a.qodef-side-area-opener'),
				$sideAreaClose = $('#qodef-side-area-close'),
				$sideArea = $('#qodef-side-area');
				qodefSideArea.openerHoverColor($sideAreaOpener);
			// Open Side Area
			$sideAreaOpener.on('click', function (e) {
				e.preventDefault();
				
				if (!qodefCore.body.hasClass('qodef-side-area--opened')) {
					qodefSideArea.openSideArea();
					
					$(document).keyup(function (e) {
						if (e.keyCode === 27) {
							qodefSideArea.closeSideArea();
						}
					});
				} else {
					qodefSideArea.closeSideArea();
				}
			});
			
			$sideAreaClose.on('click', function (e) {
				e.preventDefault();
				qodefSideArea.closeSideArea();
			});
			
			if ($sideArea.length && typeof qodefCore.qodefPerfectScrollbar === 'object') {
				qodefCore.qodefPerfectScrollbar.init($sideArea);
			}
		},
		openSideArea: function () {
			var $wrapper = $('#qodef-page-wrapper');
			var currentScroll = $(window).scrollTop();

			$('.qodef-side-area-cover').remove();
			$wrapper.prepend('<div class="qodef-side-area-cover"/>');
			qodefCore.body.removeClass('qodef-side-area-animate--out').addClass('qodef-side-area--opened qodef-side-area-animate--in');

			$('.qodef-side-area-cover').on('click', function (e) {
				e.preventDefault();
				qodefSideArea.closeSideArea();
			});

			$(window).scroll(function () {
				if (Math.abs(qodefCore.scroll - currentScroll) > 400) {
					qodefSideArea.closeSideArea();
				}
			});

		},
		closeSideArea: function () {
			qodefCore.body.removeClass('qodef-side-area--opened qodef-side-area-animate--in').addClass('qodef-side-area-animate--out');
		},
		openerHoverColor: function ($opener) {
			if (typeof $opener.data('hover-color') !== 'undefined') {
				var hoverColor = $opener.data('hover-color');
				var originalColor = $opener.css('color');
				
				$opener.on('mouseenter', function () {
					$opener.css('color', hoverColor);
				}).on('mouseleave', function () {
					$opener.css('color', originalColor);
				});
			}
		}
	};
	
})(jQuery);

(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefSpinner.init();
	});

	$(window).on('elementor/frontend/init', function() {
		var isEditMode = Boolean(elementorFrontend.isEditMode());
        if (isEditMode) {
			qodefSpinner.init(isEditMode);
		}
    });
	
	var qodefSpinner = {
		init: function (isEditMode) {
			this.holder = $('#qodef-page-spinner:not(.qodef--custom-spinner)');
			
			if (this.holder.length) {
				qodefSpinner.animateSpinner(this.holder, isEditMode);
				qodefSpinner.fadeOutAnimation();
			}
		},
		animateSpinner: function ($holder, isEditMode) {
			$(window).on('load', function () {
				qodefSpinner.fadeOutLoader($holder);
			});

			if (isEditMode) {
				qodefSpinner.fadeOutLoader($holder);
			}
		},
		fadeOutLoader: function ($holder, speed, delay, easing) {
			speed = speed ? speed : 600;
			delay = delay ? delay : 0;
			easing = easing ? easing : 'swing';
			
			$holder.delay(delay).fadeOut(speed, easing);
			
			$(window).on('bind', 'pageshow', function (event) {
				if (event.originalEvent.persisted) {
					$holder.fadeOut(speed, easing);
				}
			});
		},
		fadeOutAnimation: function () {
			
			// Check for fade out animation
			if (qodefCore.body.hasClass('qodef-spinner--fade-out')) {
				var $pageHolder = $('#qodef-page-wrapper'),
					$linkItems = $('a');
				
				// If back button is pressed, than show content to avoid state where content is on display:none
				window.addEventListener("pageshow", function (event) {
					var historyPath = event.persisted || (typeof window.performance !== "undefined" && window.performance.navigation.type === 2);
					if (historyPath && !$pageHolder.is(':visible')) {
						$pageHolder.show();
					}
				});
				
				$linkItems.on('click', function (e) {
					var $clickedLink = $(this);

					if (
						e.which === 1 && // check if the left mouse button has been pressed
						$clickedLink.attr('href').indexOf(window.location.host) >= 0 && // check if the link is to the same domain
						!$clickedLink.hasClass('remove') && // check is WooCommerce remove link
						$clickedLink.parent('.product-remove').length <= 0 && // check is WooCommerce remove link
						$clickedLink.parents('.woocommerce-product-gallery__image').length <= 0 && // check is product gallery link
						typeof $clickedLink.data('rel') === 'undefined' && // check pretty photo link
						typeof $clickedLink.attr('rel') === 'undefined' && // check VC pretty photo link
						!$clickedLink.hasClass('lightbox-active') && // check is lightbox plugin active
						(typeof $clickedLink.attr('target') === 'undefined' || $clickedLink.attr('target') === '_self') && // check if the link opens in the same window
						$clickedLink.attr('href').split('#')[0] !== window.location.href.split('#')[0] // check if it is an anchor aiming for a different page
					) {
						e.preventDefault();
				
						$pageHolder.fadeOut(600, 'easeOutSine', function () {
							window.location = $clickedLink.attr('href');
						});
					}
				});
			}
		}
	}
	
})(jQuery);
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


(function ($) {
	"use strict";

	qodefCore.shortcodes.resonator_core_accordion = {};

	$(document).ready(function () {
		qodefAccordion.init();
	});
	
	var qodefAccordion = {
		init: function () {
			this.holder = $('.qodef-accordion');
			
			if (this.holder.length) {
				this.holder.each(function () {
					var $thisHolder = $(this);
					
					if ($thisHolder.hasClass('qodef-behavior--accordion')) {
						qodefAccordion.initAccordion($thisHolder);
					}
					
					if ($thisHolder.hasClass('qodef-behavior--toggle')) {
						qodefAccordion.initToggle($thisHolder);
					}
					
					$thisHolder.addClass('qodef--init');
				});
			}
		},
		initAccordion: function ($accordion) {
			$accordion.accordion({
				animate: "swing",
				collapsible: true,
				active: 0,
				icons: "",
				heightStyle: "content"
			});
		},
		initToggle: function ($toggle) {
			var $toggleAccordionTitle = $toggle.find('.qodef-accordion-title'),
				$toggleAccordionContent = $toggleAccordionTitle.next();
			
			$toggle.addClass("accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset");
			$toggleAccordionTitle.addClass("ui-accordion-header ui-state-default ui-corner-top ui-corner-bottom");
			$toggleAccordionContent.addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").hide();
			
			$toggleAccordionTitle.each(function () {
				var $thisTitle = $(this);
				
				$thisTitle.hover(function () {
					$thisTitle.toggleClass("ui-state-hover");
				});
				
				$thisTitle.on('click', function () {
					$thisTitle.toggleClass('ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom');
					$thisTitle.next().toggleClass('ui-accordion-content-active').slideToggle(400);
				});
			});
		}
	};

	qodefCore.shortcodes.resonator_core_accordion.qodefAccordion = qodefAccordion;

})(jQuery);

(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefAuthorListPagination.init();
	});
	
	$(window).scroll(function () {
		qodefAuthorListPagination.scroll();
	});
	
	$(document).on('resonator_core_trigger_author_load_more', function (e, $holder, nextPage) {
		qodefAuthorListPagination.triggerLoadMore($holder, nextPage);
	});
	
	/*
	 **	Init pagination functionality
	 */
	var qodefAuthorListPagination = {
		init: function (settings) {
			this.holder = $('.qodef-author-pagination--on');
			
			// Allow overriding the default config
			$.extend(this.holder, settings);
			
			if (this.holder.length) {
				this.holder.each(function () {
					var $holder = $(this);
					
					qodefAuthorListPagination.initPaginationType($holder);
				});
			}
		},
		scroll: function (settings) {
			this.holder = $('.qodef-author-pagination--on');
			
			// Allow overriding the default config
			$.extend(this.holder, settings);
			
			if (this.holder.length) {
				this.holder.each(function () {
					var $holder = $(this);
					
					if ($holder.hasClass('qodef-pagination-type--infinite-scroll')) {
						qodefAuthorListPagination.initInfiniteScroll($holder);
					}
				});
			}
		},
		initPaginationType: function ($holder) {
			if ($holder.hasClass('qodef-pagination-type--standard')) {
				qodefAuthorListPagination.initStandard($holder);
			} else if ($holder.hasClass('qodef-pagination-type--load-more')) {
				qodefAuthorListPagination.initLoadMore($holder);
			} else if ($holder.hasClass('qodef-pagination-type--infinite-scroll')) {
				qodefAuthorListPagination.initInfiniteScroll($holder);
			}
		},
		initStandard: function ($holder) {
			var $paginationItems = $holder.find('.qodef-m-pagination-items');
			
			if ($paginationItems.length) {
				var options = $holder.data('options');
				
				$paginationItems.children().each(function () {
					var $thisItem = $(this),
						$itemLink = $thisItem.children('a');
					
					qodefAuthorListPagination.changeStandardState($holder, options.max_num_pages, 1);
					
					$itemLink.on('click', function (e) {
						e.preventDefault();
						
						if (!$thisItem.hasClass('qodef--active')) {
							qodefAuthorListPagination.getNewPosts($holder, $itemLink.data('paged'));
						}
					});
				});
			}
		},
		changeStandardState: function ($holder, max_num_pages, nextPage) {
			if ($holder.hasClass('qodef-pagination-type--standard')) {
				var $paginationNav = $holder.find('.qodef-m-pagination-items'),
					$numericItem = $paginationNav.children('.qodef--number'),
					$prevItem = $paginationNav.children('.qodef--prev'),
					$nextItem = $paginationNav.children('.qodef--next');
				
				$numericItem.removeClass('qodef--active').eq(nextPage - 1).addClass('qodef--active');
				
				$prevItem.children().data('paged', nextPage - 1);
				
				if (nextPage > 1) {
					$prevItem.show();
				} else {
					$prevItem.hide();
				}
				
				$nextItem.children().data('paged', nextPage + 1);
				
				if (nextPage === max_num_pages) {
					$nextItem.hide();
				} else {
					$nextItem.show();
				}
			}
		},
		initLoadMore: function ($holder) {
			var $loadMoreButton = $holder.find('.qodef-load-more-button');
			
			$loadMoreButton.on('click', function (e) {
				e.preventDefault();
				
				qodefAuthorListPagination.getNewPosts($holder);
			});
		},
		triggerLoadMore: function ($holder, nextPage) {
			qodefAuthorListPagination.getNewPosts($holder, nextPage);
		},
		hideLoadMoreButton: function ($holder, options) {
			if ($holder.hasClass('qodef-pagination-type--load-more') && options.next_page > options.max_num_pages) {
				$holder.find('.qodef-load-more-button').hide();
			}
		},
		initInfiniteScroll: function ($holder) {
			var holderEndPosition = $holder.outerHeight() + $holder.offset().top,
				scrollPosition = qodefCore.scroll + qodefCore.windowHeight,
				options = $holder.data('options');
			
			if (!$holder.hasClass('qodef--loading') && scrollPosition > holderEndPosition  && options.max_num_pages >= options.next_page) {
				qodefAuthorListPagination.getNewPosts($holder);
			}
		},
		getNewPosts: function ($holder, nextPage) {
			$holder.addClass('qodef--loading');
			
			var $itemsHolder = $holder.children('.qodef-grid-inner');
			var options = $holder.data('options');
			
			qodefAuthorListPagination.setNextPageValue(options, nextPage, false);
			
			$.ajax({
				type: "GET",
				url: qodefGlobal.vars.restUrl + qodefGlobal.vars.authorPaginationRestRoute,
				data: {
					options: options
				},
				beforeSend: function( request ) {
					request.setRequestHeader( 'X-WP-Nonce', qodefGlobal.vars.restNonce );
				},
				success: function (response) {
					
					if (response.status === 'success') {
						qodefAuthorListPagination.setNextPageValue(options, nextPage, true);
						qodefAuthorListPagination.changeStandardState($holder, options.max_num_pages, nextPage);
						
						$itemsHolder.waitForImages(function () {
							qodefAuthorListPagination.addPosts($itemsHolder, response.data, nextPage);
							
							qodefCore.body.trigger('resonator_core_trigger_get_new_authors', [$holder]);
						});
						
						qodefAuthorListPagination.hideLoadMoreButton($holder, options);
					} else {
						console.log(response.message);
					}
				},
				complete: function () {
					$holder.removeClass('qodef--loading');
				}
			});
		},
		setNextPageValue: function (options, nextPage, ajaxTrigger) {
			if (typeof nextPage !== 'undefined' && nextPage !== '' && !ajaxTrigger) {
				options.next_page = nextPage;
			} else if (ajaxTrigger) {
				options.next_page = parseInt(options.next_page, 10) + 1;
			}
		},
		addPosts: function ($itemsHolder, newItems, nextPage) {
			if (typeof nextPage !== 'undefined' && nextPage !== '') {
				$itemsHolder.html(newItems);
			} else {
				$itemsHolder.append(newItems);
			}
		}
	};
	
})(jQuery);
(function ($) {
	"use strict";

	qodefCore.shortcodes.resonator_core_button = {};

	$(document).ready(function () {
		qodefButton.init();
	});
	
	var qodefButton = {
		init: function () {
			this.buttons = $('.qodef-button');
			
			if (this.buttons.length) {
				this.buttons.each(function () {
					var $thisButton = $(this);
					
					qodefButton.buttonHoverColor($thisButton);
					qodefButton.buttonHoverBgColor($thisButton);
					qodefButton.buttonHoverBorderColor($thisButton);
				});
			}
		},
		buttonHoverColor: function ($button) {
			if (typeof $button.data('hover-color') !== 'undefined') {
				var hoverColor = $button.data('hover-color');
				var originalColor = $button.css('color');
				
				$button.on('mouseenter', function () {
					qodefButton.changeColor($button, 'color', hoverColor);
				});
				$button.on('mouseleave', function () {
					qodefButton.changeColor($button, 'color', originalColor);
				});
			}
		},
		buttonHoverBgColor: function ($button) {
			if (typeof $button.data('hover-background-color') !== 'undefined') {
				var hoverBackgroundColor = $button.data('hover-background-color');
				var originalBackgroundColor = $button.css('background-color');
				
				$button.on('mouseenter', function () {
					qodefButton.changeColor($button, 'background-color', hoverBackgroundColor);
				});
				$button.on('mouseleave', function () {
					qodefButton.changeColor($button, 'background-color', originalBackgroundColor);
				});
			}
		},
		buttonHoverBorderColor: function ($button) {
			if (typeof $button.data('hover-border-color') !== 'undefined') {
				var hoverBorderColor = $button.data('hover-border-color');
				var originalBorderColor = $button.css('borderTopColor');
				
				$button.on('mouseenter', function () {
					qodefButton.changeColor($button, 'border-color', hoverBorderColor);
				});
				$button.on('mouseleave', function () {
					qodefButton.changeColor($button, 'border-color', originalBorderColor);
				});
			}
		},
		changeColor: function ($button, cssProperty, color) {
			$button.css(cssProperty, color);
		}
	};

	qodefCore.shortcodes.resonator_core_button.qodefButton = qodefButton;


})(jQuery);
(function ($) {
	"use strict";

	qodefCore.shortcodes.resonator_core_countdown = {};

	$(document).ready(function () {
		qodefCountdown.init();
	});
	
	var qodefCountdown = {
		init: function () {
			this.countdowns = $('.qodef-countdown');
			
			if (this.countdowns.length) {
				this.countdowns.each(function () {
					var $thisCountdown = $(this),
						$countdownElement = $thisCountdown.find('.qodef-m-date'),
						options = qodefCountdown.generateOptions($thisCountdown);
					
					qodefCountdown.initCountdown($countdownElement, options);
				});
			}
		},
		generateOptions: function($countdown) {
			var options = {};
			options.date = typeof $countdown.data('date') !== 'undefined' ? $countdown.data('date') : null;
			
			options.weekLabel = typeof $countdown.data('week-label') !== 'undefined' ? $countdown.data('week-label') : '';
			options.weekLabelPlural = typeof $countdown.data('week-label-plural') !== 'undefined' ? $countdown.data('week-label-plural') : '';
			
			options.dayLabel = typeof $countdown.data('day-label') !== 'undefined' ? $countdown.data('day-label') : '';
			options.dayLabelPlural = typeof $countdown.data('day-label-plural') !== 'undefined' ? $countdown.data('day-label-plural') : '';
			
			options.hourLabel = typeof $countdown.data('hour-label') !== 'undefined' ? $countdown.data('hour-label') : '';
			options.hourLabelPlural = typeof $countdown.data('hour-label-plural') !== 'undefined' ? $countdown.data('hour-label-plural') : '';
			
			options.minuteLabel = typeof $countdown.data('minute-label') !== 'undefined' ? $countdown.data('minute-label') : '';
			options.minuteLabelPlural = typeof $countdown.data('minute-label-plural') !== 'undefined' ? $countdown.data('minute-label-plural') : '';
			
			options.secondLabel = typeof $countdown.data('second-label') !== 'undefined' ? $countdown.data('second-label') : '';
			options.secondLabelPlural = typeof $countdown.data('second-label-plural') !== 'undefined' ? $countdown.data('second-label-plural') : '';
			
			return options;
		},
		initCountdown: function ($countdownElement, options) {
			var $weekHTML = '<span class="qodef-digit-wrapper"><span class="qodef-digit">%w</span><span class="qodef-label">' + '%!w:' + options.weekLabel + ',' + options.weekLabelPlural + ';</span></span>';
			var $dayHTML = '<span class="qodef-digit-wrapper"><span class="qodef-digit">%d</span><span class="qodef-label">' + '%!d:' + options.dayLabel + ',' + options.dayLabelPlural + ';</span></span>';
			var $hourHTML = '<span class="qodef-digit-wrapper"><span class="qodef-digit">%H</span><span class="qodef-label">' + '%!H:' + options.hourLabel + ',' + options.hourLabelPlural + ';</span></span>';
			var $minuteHTML = '<span class="qodef-digit-wrapper"><span class="qodef-digit">%M</span><span class="qodef-label">' + '%!M:' + options.minuteLabel + ',' + options.minuteLabelPlural + ';</span></span>';
			var $secondHTML = '<span class="qodef-digit-wrapper"><span class="qodef-digit">%S</span><span class="qodef-label">' + '%!S:' + options.secondLabel + ',' + options.secondLabelPlural + ';</span></span>';
			
			$countdownElement.countdown(options.date, function(event) {
				$(this).html(event.strftime($weekHTML + $dayHTML + $hourHTML + $minuteHTML + $secondHTML));
			});
		}
	};

	qodefCore.shortcodes.resonator_core_countdown.qodefCountdown  = qodefCountdown;


})(jQuery);
(function ($) {
	"use strict";

	qodefCore.shortcodes.resonator_core_counter = {};

	$(document).ready(function () {
		qodefCounter.init();
	});
	
	var qodefCounter = {
		init: function () {
			this.counters = $('.qodef-counter');
			
			if (this.counters.length) {
				this.counters.each(function () {
					var $thisCounter = $(this),
						$counterElement = $thisCounter.find('.qodef-m-digit'),
						options = qodefCounter.generateOptions($thisCounter);
					
					qodefCounter.counterScript($counterElement, options);
				});
			}
		},
		generateOptions: function($counter) {
			var options = {};
			options.start = typeof $counter.data('start-digit') !== 'undefined' && $counter.data('start-digit') !== '' ? $counter.data('start-digit') : 0;
			options.end = typeof $counter.data('end-digit') !== 'undefined' && $counter.data('end-digit') !== '' ? $counter.data('end-digit') : null;
			options.step = typeof $counter.data('step-digit') !== 'undefined' && $counter.data('step-digit') !== '' ? $counter.data('step-digit') : 1;
			options.delay = typeof $counter.data('step-delay') !== 'undefined' && $counter.data('step-delay') !== '' ? parseInt( $counter.data('step-delay'), 10 ) : 100;
			options.txt = typeof $counter.data('digit-label') !== 'undefined' && $counter.data('digit-label') !== '' ? $counter.data('digit-label') : '';
			
			return options;
		},
		counterScript: function ($counterElement, options) {
			var defaults = {
				start: 0,
				end: null,
				step: 1,
				delay: 50,
				txt: ""
			};
			
			var settings = $.extend(defaults, options || {});
			var nb_start = settings.start;
			var nb_end = settings.end;
			
			$counterElement.text(nb_start + settings.txt);
			
			var counter = function() {
				// Definition of conditions of arrest
				if (nb_end !== null && nb_start >= nb_end) {
					return;
				}
				// incrementation
				nb_start = nb_start + settings.step;
				
				if( nb_start >= nb_end ) {
					nb_start = nb_end;
				}
				// display
				$counterElement.text(nb_start + settings.txt);
			};
			
			// Timer
			// Launches every "settings.delay"
			$counterElement.appear(function() {
				setInterval(counter, settings.delay);
			}, { accX: 0, accY: 0 });
		}
	};

	qodefCore.shortcodes.resonator_core_counter.qodefCounter  = qodefCounter;

})(jQuery);
(function ($) {
	"use strict";
	
	qodefCore.shortcodes.resonator_core_google_map = {};
	
	$(document).ready(function () {
		qodefGoogleMap.init();
	});
	
	var qodefGoogleMap = {
		init: function () {
			this.holder = $('.qodef-google-map');
			
			if (this.holder.length) {
				this.holder.each(function () {
					if (typeof window.qodefGoogleMap !== 'undefined') {
						window.qodefGoogleMap.init($(this).find('.qodef-m-map'));
					}
				});
			}
		}
	};
	
	qodefCore.shortcodes.resonator_core_google_map.qodefGoogleMap = qodefGoogleMap;
	
})(jQuery);
(function ($) {
    "use strict";

	qodefCore.shortcodes.resonator_core_icon = {};

    $(document).ready(function () {
        qodefIcon.init();
    });

    var qodefIcon = {
        init: function () {
            this.icons = $('.qodef-icon-holder');

            if (this.icons.length) {
                this.icons.each(function () {
                    var $thisIcon = $(this);

                    qodefIcon.iconHoverColor($thisIcon);
                    qodefIcon.iconHoverBgColor($thisIcon);
                    qodefIcon.iconHoverBorderColor($thisIcon);
                });
            }
        },
        iconHoverColor: function ($iconHolder) {
            if (typeof $iconHolder.data('hover-color') !== 'undefined') {
                var spanHolder = $iconHolder.find('span');
                var originalColor = spanHolder.css('color');
                var hoverColor = $iconHolder.data('hover-color');

                $iconHolder.on('mouseenter', function () {
                    qodefIcon.changeColor(spanHolder, 'color', hoverColor);
                });
                $iconHolder.on('mouseleave', function () {
                    qodefIcon.changeColor(spanHolder, 'color', originalColor);
                });
            }
        },
        iconHoverBgColor: function ($iconHolder) {
            if (typeof $iconHolder.data('hover-background-color') !== 'undefined') {
                var hoverBackgroundColor = $iconHolder.data('hover-background-color');
                var originalBackgroundColor = $iconHolder.css('background-color');

                $iconHolder.on('mouseenter', function () {
                    qodefIcon.changeColor($iconHolder, 'background-color', hoverBackgroundColor);
                });
                $iconHolder.on('mouseleave', function () {
                    qodefIcon.changeColor($iconHolder, 'background-color', originalBackgroundColor);
                });
            }
        },
        iconHoverBorderColor: function ($iconHolder) {
            if (typeof $iconHolder.data('hover-border-color') !== 'undefined') {
                var hoverBorderColor = $iconHolder.data('hover-border-color');
                var originalBorderColor = $iconHolder.css('borderTopColor');

                $iconHolder.on('mouseenter', function () {
                    qodefIcon.changeColor($iconHolder, 'border-color', hoverBorderColor);
                });
                $iconHolder.on('mouseleave', function () {
                    qodefIcon.changeColor($iconHolder, 'border-color', originalBorderColor);
                });
            }
        },
        changeColor: function (iconElement, cssProperty, color) {
            iconElement.css(cssProperty, color);
        }
    };

	qodefCore.shortcodes.resonator_core_icon.qodefIcon = qodefIcon;

})(jQuery);
(function ($) {
    "use strict";
    
	qodefCore.shortcodes.resonator_core_image_gallery = {};
	qodefCore.shortcodes.resonator_core_image_gallery.qodefSwiper = qodef.qodefSwiper;
	qodefCore.shortcodes.resonator_core_image_gallery.qodefMasonryLayout = qodef.qodefMasonryLayout;

})(jQuery);
(function ($) {
    "use strict";

	qodefCore.shortcodes.resonator_core_image_with_text = {};
    qodefCore.shortcodes.resonator_core_image_with_text.qodefMagnificPopup = qodef.qodefMagnificPopup;

})(jQuery);
(function ($) {
    "use strict";
	
	qodefCore.shortcodes.resonator_core_item_showcase = {};
	
	$(document).ready(function () {
		qodefItemShowcaseList.init();
	});
	
	var qodefItemShowcaseList = {
		init: function () {
			this.holder = $('.qodef-item-showcase');
			
			if (this.holder.length) {
				this.holder.each(function () {
					var $thisHolder = $(this);
					
					$thisHolder.appear(function(){
						$thisHolder.addClass('qodef--init');
					}, {accX: 0, accY: -100});
				});
			}
		}
	};
	qodefCore.shortcodes.resonator_core_item_showcase.qodefItemShowcaseList = qodefItemShowcaseList;

})(jQuery);
(function ($) {
    'use strict';

    qodefCore.shortcodes.resonator_core_progress_bar = {};

    $(document).ready(function () {
        qodefProgressBar.init();
    });

    /**
     * Init progress bar shortcode functionality
     */
    var qodefProgressBar = {
        init: function () {
            this.holder = $('.qodef-progress-bar');

            if (this.holder.length) {
                this.holder.each(function () {
                    var $thisHolder = $(this),
                        layout = $thisHolder.data('layout');

                    $thisHolder.appear(function () {
                        $thisHolder.addClass('qodef--init');

                        var $container = $thisHolder.find('.qodef-m-canvas'),
                            data = qodefProgressBar.generateBarData($thisHolder, layout),
                            number = $thisHolder.data('number') / 100;

                        switch (layout) {
                            case 'circle':
                                qodefProgressBar.initCircleBar($container, data, number);
                                break;
                            case 'semi-circle':
                                qodefProgressBar.initSemiCircleBar($container, data, number);
                                break;
                            case 'line':
                                data = qodefProgressBar.generateLineData($thisHolder, number);
                                qodefProgressBar.initLineBar($container, data);
                                break;
                            case 'custom':
                                qodefProgressBar.initCustomBar($container, data, number);
                                break;
                        }
                    });
                });
            }
        },
        generateBarData: function (thisBar, layout) {
            var activeWidth = thisBar.data('active-line-width');
            var activeColor = thisBar.data('active-line-color');
            var inactiveWidth = thisBar.data('inactive-line-width');
            var inactiveColor = thisBar.data('inactive-line-color');
            var easing = 'linear';
            var duration = typeof thisBar.data('duration') !== 'undefined' && thisBar.data('duration') !== '' ? parseInt(thisBar.data('duration'), 10) : 1600;
            var textColor = thisBar.data('text-color');

            return {
                strokeWidth: activeWidth,
                color: activeColor,
                trailWidth: inactiveWidth,
                trailColor: inactiveColor,
                easing: easing,
                duration: duration,
                svgStyle: {
                    width: '100%',
                    height: '100%'
                },
                text: {
                    style: {
                        color: textColor
                    },
                    autoStyleContainer: false
                },
                from: {
                    color: inactiveColor
                },
                to: {
                    color: activeColor
                },
                step: function (state, bar) {
                    if (layout !== 'custom') {
                        bar.setText(Math.round(bar.value() * 100) + '%');
                    }
                }
            };
        },
        generateLineData: function (thisBar, number) {
            var height = thisBar.data('active-line-width');
            var activeColor = thisBar.data('active-line-color');
            var inactiveHeight = thisBar.data('inactive-line-width');
            var inactiveColor = thisBar.data('inactive-line-color');
            var duration = typeof thisBar.data('duration') !== 'undefined' && thisBar.data('duration') !== '' ? parseInt(thisBar.data('duration'), 10) : 1600;
            var textColor = thisBar.data('text-color');

            return {
                percentage: number * 100,
                duration: duration,
                fillBackgroundColor: activeColor,
                backgroundColor: inactiveColor,
                height: height,
                inactiveHeight: inactiveHeight,
                followText: thisBar.hasClass('qodef-percentage--floating'),
                textColor: textColor
            };
        },
        initCircleBar: function ($container, data, number) {
            if (qodefProgressBar.checkBar($container)) {
                var $bar = new ProgressBar.Circle($container[0], data);

                $bar.animate(number);
            }
        },
        initSemiCircleBar: function ($container, data, number) {
            if (qodefProgressBar.checkBar($container)) {
                var $bar = new ProgressBar.SemiCircle($container[0], data);

                $bar.animate(number);
            }
        },
        initCustomBar: function ($container, data, number) {
            if (qodefProgressBar.checkBar($container)) {
                var $bar = new ProgressBar.Path($container[0], data);

                $bar.set(0);
                $bar.animate(number);
            }
        },
        initLineBar: function ($container, data) {
            $container.LineProgressbar(data);
        },
        checkBar: function ($container) {
            // check if svg is already in container, elementor fix
            if ($container.find('svg').length) {
                return false;
            }

            return true;
        }
    };

    qodefCore.shortcodes.resonator_core_progress_bar.qodefProgressBar = qodefProgressBar;

})(jQuery);
(function ($) {
	"use strict";

	qodefCore.shortcodes.resonator_core_tabs = {};

	$(document).ready(function () {
		qodefTabs.init();
	});
	
	var qodefTabs = {
		init: function () {
			this.holder = $('.qodef-tabs');
			
			if (this.holder.length) {
				this.holder.each(function () {
					qodefTabs.initTabs($(this));
				});
			}
		},
		initTabs: function ($tabs) {
			$tabs.children('.qodef-tabs-content').each(function (index) {
				index = index + 1;
				
				var $that = $(this),
					link = $that.attr('id'),
					$navItem = $that.parent().find('.qodef-tabs-navigation li:nth-child(' + index + ') a'),
					navLink = $navItem.attr('href');
				
				link = '#' + link;
				
				if (link.indexOf(navLink) > -1) {
					$navItem.attr('href', link);
				}
			});
			
			$tabs.addClass('qodef--init').tabs();
		}
	};

	qodefCore.shortcodes.resonator_core_tabs.qodefTabs = qodefTabs;

})(jQuery);
(function ($) {
    "use strict";

	qodefCore.shortcodes.resonator_core_video_button = {};
    qodefCore.shortcodes.resonator_core_video_button.qodefMagnificPopup = qodef.qodefMagnificPopup;

})(jQuery);
(function ($) {
	"use strict";
	
	$(window).on( 'load', function () {
		qodefStickySidebar.init();
	});
	
	var qodefStickySidebar = {
		init: function () {
			var info = $('.widget_resonator_core_sticky_sidebar');
			
			if (info.length && qodefCore.windowWidth > 1024) {
				info.wrapper = info.parents('#qodef-page-sidebar');
				info.c = 24;
				info.offsetM = info.offset().top - info.wrapper.offset().top;
				info.adj = 15;
				
				qodefStickySidebar.callStack(info);
				
				$(window).on('resize', function () {
					if (qodefCore.windowWidth > 1024) {
						qodefStickySidebar.callStack(info);
					}
				});
				
				$(window).on('scroll', function () {
					if (qodefCore.windowWidth > 1024) {
						qodefStickySidebar.infoPosition(info);
					}
				});
			}
		},
		calc: function (info) {
			var content = $('.qodef-page-content-section'),
				headerH = qodefCore.body.hasClass('qodef-header-appearance--none') ? 0 : parseInt(qodefGlobal.vars.headerHeight, 10);
			
			info.start = content.offset().top;
			info.end = content.outerHeight();
			info.h = info.wrapper.height();
			info.w = info.outerWidth();
			info.left = info.offset().left;
			info.top = headerH + qodefGlobal.vars.adminBarHeight + info.c - info.offsetM;
			info.data('state', 'top');
		},
		infoPosition: function (info) {
			if (qodefCore.scroll < info.start - info.top && qodefCore.scroll + info.h && info.data('state') !== 'top') {
				TweenMax.to(info.wrapper, .1, {
					y: 5,
				});
				TweenMax.to(info.wrapper, .3, {
					y: 0,
					delay: .1,
				});
				info.data('state', 'top');
				info.wrapper.css({
					'position': 'static',
				});
			} else if (qodefCore.scroll >= info.start - info.top && qodefCore.scroll + info.h + info.adj <= info.start + info.end &&
				info.data('state') !== 'fixed') {
				var c = info.data('state') === 'top' ? 1 : -1;
				info.data('state', 'fixed');
				info.wrapper.css({
					'position': 'fixed',
					'top': info.top,
					'left': info.left,
					'width': info.w
				});
				TweenMax.fromTo(info.wrapper, .2, {
					y: 0
				}, {
					y: c * 10,
					ease: Power4.easeInOut
				});
				TweenMax.to(info.wrapper, .2, {
					y: 0,
					delay: .2,
				});
			} else if (qodefCore.scroll + info.h + info.adj > info.start + info.end && info.data('state') !== 'bottom') {
				info.data('state', 'bottom');
				info.wrapper.css({
					'position': 'absolute',
					'top': info.end - info.h - info.adj,
					'left': 0,
				});
				TweenMax.fromTo(info.wrapper, .1, {
					y: 0
				}, {
					y: -5,
				});
				TweenMax.to(info.wrapper, .3, {
					y: 0,
					delay: .1,
				});
			}
		},
		callStack: function (info) {
			this.calc(info);
			this.infoPosition(info);
		}
	};
	
})(jQuery);

(function ($) {
	"use strict";
	
	var shortcode = 'resonator_core_blog_list';
	
	qodefCore.shortcodes[shortcode] = {};
	
	if (typeof qodefCore.listShortcodesScripts === 'object') {
		$.each(qodefCore.listShortcodesScripts, function (key, value) {
			qodefCore.shortcodes[shortcode][key] = value;
		});
	}

	qodefCore.shortcodes[shortcode].qodefResizeIframes = qodef.qodefResizeIframes;
	qodefCore.shortcodes[shortcode].qodefAudioPlayer = qodef.qodefAudioPlayer;

})(jQuery);

(function ($) {
	"use strict";
	
	var fixedHeaderAppearance = {
		showHideHeader: function ($pageOuter, $header) {
			if (qodefCore.windowWidth > 1024) {
				if (qodefCore.scroll <= 0) {
					qodefCore.body.removeClass('qodef-header--fixed-display');
					$pageOuter.css('padding-top', '0');
					$header.css('margin-top', '0');
				} else {
					qodefCore.body.addClass('qodef-header--fixed-display');
					$pageOuter.css('padding-top', parseInt(qodefGlobal.vars.headerHeight + qodefGlobal.vars.topAreaHeight) + 'px');
					$header.css('margin-top', parseInt(qodefGlobal.vars.topAreaHeight) + 'px');
				}
			}
		},
		init: function () {
            
            if (!qodefCore.body.hasClass('qodef-header--vertical')) {
                var $pageOuter = $('#qodef-page-outer'),
                    $header = $('#qodef-page-header');
                
                fixedHeaderAppearance.showHideHeader($pageOuter, $header);
                
                $(window).scroll(function () {
                    fixedHeaderAppearance.showHideHeader($pageOuter, $header);
                });
                
                $(window).resize(function () {
                    $pageOuter.css('padding-top', '0');
                    fixedHeaderAppearance.showHideHeader($pageOuter, $header);
                });
            }
		}
	};
	
	qodefCore.fixedHeaderAppearance = fixedHeaderAppearance.init;
	
})(jQuery);
(function ($) {
	"use strict";
	
	var stickyHeaderAppearance = {
		header: '',
		docYScroll: 0,
		init: function () {
			var displayAmount = stickyHeaderAppearance.displayAmount();
			
			// Set variables
			stickyHeaderAppearance.header = $('.qodef-header-sticky');
			stickyHeaderAppearance.docYScroll = $(document).scrollTop();
			
			// Set sticky visibility
			stickyHeaderAppearance.setVisibility(displayAmount);
			
			$(window).scroll(function () {
				stickyHeaderAppearance.setVisibility(displayAmount);
			});
		},
		displayAmount: function () {
			if (qodefGlobal.vars.qodefStickyHeaderScrollAmount !== 0) {
				return parseInt(qodefGlobal.vars.qodefStickyHeaderScrollAmount, 10);
			} else {
				return parseInt(qodefGlobal.vars.headerHeight + qodefGlobal.vars.adminBarHeight, 10);
			}
		},
		setVisibility: function (displayAmount) {
			var isStickyHidden = qodefCore.scroll < displayAmount;
			
			if (stickyHeaderAppearance.header.hasClass('qodef-appearance--up')) {
				var currentDocYScroll = $(document).scrollTop();
				
				isStickyHidden = (currentDocYScroll > stickyHeaderAppearance.docYScroll && currentDocYScroll > displayAmount) || (currentDocYScroll < displayAmount);
				
				stickyHeaderAppearance.docYScroll = $(document).scrollTop();
			}
			
			stickyHeaderAppearance.showHideHeader(isStickyHidden);
		},
		showHideHeader: function (isStickyHidden) {
			if (isStickyHidden) {
				qodefCore.body.removeClass('qodef-header--sticky-display');
			} else {
				qodefCore.body.addClass('qodef-header--sticky-display');
			}
		},
	};
	
	qodefCore.stickyHeaderAppearance = stickyHeaderAppearance.init;
	
})(jQuery);
(function($) {
    "use strict";

    $(document).ready(function(){
        qodefSearchFullscreen.init();
    });

	var qodefSearchFullscreen = {
	    init: function(){
            var $searchOpener = $('a.qodef-search-opener'),
                $searchHolder = $('.qodef-fullscreen-search-holder'),
                $searchClose = $searchHolder.find('.qodef-m-close');

            if ($searchOpener.length && $searchHolder.length) {
                $searchOpener.on('click', function (e) {
                    e.preventDefault();
                    if(qodefCore.body.hasClass('qodef-fullscreen-search--opened')){
                        qodefSearchFullscreen.closeFullscreen($searchHolder);
                    }else{
                        qodefSearchFullscreen.openFullscreen($searchHolder);
                    }
                });
                $searchClose.on('click', function (e) {
                    e.preventDefault();
                    qodefSearchFullscreen.closeFullscreen($searchHolder);
                });

                //Close on escape
                $(document).keyup(function (e) {
                    if (e.keyCode === 27 && qodefCore.body.hasClass('qodef-fullscreen-search--opened')) { //KeyCode for ESC button is 27
                        qodefSearchFullscreen.closeFullscreen($searchHolder);
                    }
                });
            }
        },
        openFullscreen: function($searchHolder){
            qodefCore.body.removeClass('qodef-fullscreen-search--fadeout');
            qodefCore.body.addClass('qodef-fullscreen-search--opened qodef-fullscreen-search--fadein');

            setTimeout(function () {
                $searchHolder.find('.qodef-m-form-field').focus();
            }, 900);

            qodefCore.qodefScroll.disable();
        },
        closeFullscreen: function($searchHolder){
            qodefCore.body.removeClass('qodef-fullscreen-search--opened qodef-fullscreen-search--fadein');
            qodefCore.body.addClass('qodef-fullscreen-search--fadeout');

            setTimeout(function () {
                $searchHolder.find('.qodef-m-form-field').val('');
                $searchHolder.find('.qodef-m-form-field').blur();
                qodefCore.body.removeClass('qodef-fullscreen-search--fadeout');
            }, 300);

            qodefCore.qodefScroll.enable();
        }
    };

})(jQuery);

(function ($) {
	"use strict";
	
	$(document).ready(function () {
        qodefSearch.init();
	});
	
	var qodefSearch = {
		init: function () {
            this.search = $('a.qodef-search-opener');

            if (this.search.length) {
                this.search.each(function () {
                    var $thisSearch = $(this);

                    qodefSearch.searchHoverColor($thisSearch);
                });
            }
        },
		searchHoverColor: function ($searchHolder) {
			if (typeof $searchHolder.data('hover-color') !== 'undefined') {
				var hoverColor = $searchHolder.data('hover-color'),
				    originalColor = $searchHolder.css('color');
				
				$searchHolder.on('mouseenter', function () {
					$searchHolder.css('color', hoverColor);
				}).on('mouseleave', function () {
					$searchHolder.css('color', originalColor);
				});
			}
		}
	};
	
})(jQuery);

(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefProgressBarSpinner.init();
	});
	
	var qodefProgressBarSpinner = {
		percentNumber: 0,
		init: function () {
			this.holder = $('#qodef-page-spinner.qodef-layout--progress-bar');
			
			if (this.holder.length) {
				qodefProgressBarSpinner.animateSpinner(this.holder);
			}
		},
		animateSpinner: function ($holder) {
			
			var $numberHolder = $holder.find('.qodef-m-spinner-number-label'),
				$spinnerLine = $holder.find('.qodef-m-spinner-line-front'),
				numberIntervalFastest,
				windowLoaded = false;
			
			$spinnerLine.animate({'width': '100%'}, 10000, 'linear');
			
			var numberInterval = setInterval(function () {
				qodefProgressBarSpinner.animatePercent($numberHolder, qodefProgressBarSpinner.percentNumber);
			
				if (windowLoaded) {
					clearInterval(numberInterval);
				}
			}, 100);
			
			$(window).on('load', function () {
				windowLoaded = true;
				
				numberIntervalFastest = setInterval(function () {
					if (qodefProgressBarSpinner.percentNumber >= 100) {
						clearInterval(numberIntervalFastest);
						$spinnerLine.stop().animate({'width': '100%'}, 500);
						
						setTimeout(function () {
							$holder.addClass('qodef--finished');
							
							setTimeout(function () {
								qodefProgressBarSpinner.fadeOutLoader($holder);
							}, 1000);
						}, 600);
					} else {
						qodefProgressBarSpinner.animatePercent($numberHolder, qodefProgressBarSpinner.percentNumber);
					}
				}, 6);
			});
		},
		animatePercent: function ($numberHolder, percentNumber) {
			if (percentNumber < 100) {
				percentNumber += 5;
				$numberHolder.text(percentNumber);
				
				qodefProgressBarSpinner.percentNumber = percentNumber;
			}
		},
		fadeOutLoader: function ($holder, speed, delay, easing) {
			speed = speed ? speed : 600;
			delay = delay ? delay : 0;
			easing = easing ? easing : 'swing';
			
			$holder.delay(delay).fadeOut(speed, easing);
			
			$(window).on('bind', 'pageshow', function (event) {
				if (event.originalEvent.persisted) {
					$holder.fadeOut(speed, easing);
				}
			});
		}
	};
	
})(jQuery);
(function ($) {
	"use strict";
	
	qodefCore.shortcodes.resonator_core_instagram_list = {};
	
	$(document).ready(function () {
		qodefInstagram.init();
	});
	
	var qodefInstagram = {
		init: function () {
			this.holder = $('.sbi.qodef-instagram-swiper-container');
			
			if (this.holder.length) {
				this.holder.each(function () {
					var $thisHolder = $(this),
						sliderOptions = $thisHolder.parent().attr('data-options'),
						$instagramImage = $thisHolder.find('.sbi_item.sbi_type_image'),
						$imageHolder = $thisHolder.find('#sbi_images');
					
					$thisHolder.attr('data-options', sliderOptions);
					
					$imageHolder.addClass('swiper-wrapper');
					
					if ($instagramImage.length) {
						$instagramImage.each(function () {
							$(this).addClass('qodef-e qodef-image-wrapper swiper-slide');
						});
					}
					
					if (typeof qodef.qodefSwiper === 'object') {
						qodef.qodefSwiper.init($thisHolder);
					}
				});
			}
		},
	};
	
	qodefCore.shortcodes.resonator_core_instagram_list.qodefInstagram = qodefInstagram;
	qodefCore.shortcodes.resonator_core_instagram_list.qodefSwiper = qodef.qodefSwiper;
	
})(jQuery);
(function($) {
    "use strict";

    /*
     **	Re-init scripts on gallery loaded
     */
	$(document).on('yith_wccl_product_gallery_loaded', function () {
		
		if (typeof qodefCore.qodefWooMagnificPopup === "function") {
			qodefCore.qodefWooMagnificPopup.init();
		}
	});

})(jQuery);
(function ($) {
    "use strict";
    
	qodefCore.shortcodes.resonator_core_product_categories_list = {};
	qodefCore.shortcodes.resonator_core_product_categories_list.qodefMasonryLayout = qodef.qodefMasonryLayout;
	qodefCore.shortcodes.resonator_core_product_categories_list.qodefSwiper = qodef.qodefSwiper;

})(jQuery);
(function ($) {
	"use strict";
	
	var shortcode = 'resonator_core_product_list';
	
	qodefCore.shortcodes[shortcode] = {};
	
	if (typeof qodefCore.listShortcodesScripts === 'object') {
		$.each(qodefCore.listShortcodesScripts, function (key, value) {
			qodefCore.shortcodes[shortcode][key] = value;
		});
	}
	
})(jQuery);
(function ($) {
	"use strict";
	
	qodefCore.shortcodes.resonator_core_clients_list = {};
	qodefCore.shortcodes.resonator_core_clients_list.qodefSwiper = qodef.qodefSwiper;
})(jQuery);
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

(function ($) {
    "use strict";
	qodefCore.shortcodes.resonator_core_testimonials_list = {};
	qodefCore.shortcodes.resonator_core_testimonials_list.qodefSwiper = qodef.qodefSwiper;

})(jQuery);
(function ($) {
	"use strict";
	
	var shortcode = 'resonator_core_team_list';
	
	qodefCore.shortcodes[shortcode] = {};
	
	if (typeof qodefCore.listShortcodesScripts === 'object') {
		$.each(qodefCore.listShortcodesScripts, function (key, value) {
			qodefCore.shortcodes[shortcode][key] = value;
		});
	}
	
})(jQuery);
(function ($) {
	"use strict";

	$( document ).ready(
		function () {
			/* article hovered class on title & read more btn */
			qodef.qodefHoverTrigger.init('#qodef-single-podcast-navigation .qodef-e-title-link', '.qodef-podcast-item');
		}
	);

})(jQuery);

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


(function ($) {
	"use strict";

	$(document).ready(function () {
		qodefPodcastPlayerInfoBottom.init();
	});


	var qodefPodcastPlayerInfoBottom = {
		init: function () {
			this.holder = $('.qodef-podcast-player-sc.qodef-layout--info-bottom.qodef-progress-in-modal--yes .qodef-m-play');
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