(function ($) {

// loader
$(function () {
	setTimeout(function() {
		$('#js-loading-animation').delay(800).fadeOut(800);
		$('#js-loading-overlay').delay(1600).fadeOut(800);
	}, 500);
});

// Loader animation cookie
$(function() {
	var loader = $('.loading-animation-cookie');
	if($.cookie('access') == undefined) {
		loader.css('display','block');
		$.cookie('access', 'on' );
	} else {
		loader.css('display','none')
	}
});

// Fixed footer menu margin
$(function() {
	var footer = $('#js-footer');
	if ($('.fixed-footer-menu').length && $('.cta-rectangle').length) {
		$(footer).addClass('fixed-footer__padding--l');
	} else if ($('.fixed-footer-menu').length) {
		$(footer).addClass('fixed-footer__padding--m');
	} else if ($('.cta-rectangle').length){
		$(footer).addClass('fixed-footer__padding--s');
	}
});

// Menu drop
$(function () {
	var menu = $('#js-header-menu-drop');
	if ($(menu).length) {
		var menuHeight =	menu.height();
		var startPos = 0;
		$(window).scroll(function() {
			var currentPos = $(this).scrollTop();
			if (currentPos > startPos) {
					menu.removeClass('sticky-menu');
			} else if (currentPos < startPos) {
					menu.removeClass('hidden').addClass('sticky-menu');
				if(currentPos <= menuHeight*3) {
					menu.removeClass('sticky-menu');
				}
			}
			startPos = currentPos;
		});
	}
});

// clickするごとに交互に処理を行う
$.fn.clickToggle = function (a, b) {
	return this.each(function () {
		var clicked = false;
		$(this).on('click', function () {
			clicked = !clicked;
			if (clicked) {
				return a.apply(this, arguments);
			}
			return b.apply(this, arguments);
		});
	});
};

// Floating Page top［PC］を表示
$(function() {
	var floatingTop = $('#js-smooth-scroll');
	if ($(floatingTop).length) {
	var doch = $(document).innerHeight(); //ページ全体の高さ
	var winh = $(window).innerHeight(); //ウィンドウの高さ
	var bottom = doch - winh; //ページ全体の高さ - ウィンドウの高さ = ページの最下部位置
		$(window).scroll(function () {
			if (bottom * 0.4 <= $(window).scrollTop()) {
				floatingTop.addClass('is-show');
			} else {
				floatingTop.removeClass('is-show');
			}
		});
	}
});

// Rectangle Floating CTA［PC］を表示
$(function() {
	var floatingBtn = $('#cta-floating-pc.cta-rectangle');
	if ($(floatingBtn).length) {
	var doch = $(document).innerHeight(); //ページ全体の高さ
	var winh = $(window).innerHeight(); //ウィンドウの高さ
	var bottom = doch - winh; //ページ全体の高さ - ウィンドウの高さ = ページの最下部位置
		$(window).scroll(function () {
			if (bottom * 0.1 <= $(window).scrollTop()) {
				floatingBtn.addClass('is-show');
			} else {
				floatingBtn.removeClass('is-show');
			}
		});
	}
});

// Rectangle Floating CTA［SP］を表示
$(function() {
	var floatingBtn = $('#cta-floating-sp.cta-rectangle');
	if ($(floatingBtn).length) {
	var doch = $(document).innerHeight(); //ページ全体の高さ
	var winh = $(window).innerHeight(); //ウィンドウの高さ
	var bottom = doch - winh; //ページ全体の高さ - ウィンドウの高さ = ページの最下部位置
		$(window).scroll(function () {
			if (bottom * 0.7 <= $(window).scrollTop()) {
				floatingBtn.addClass('is-show');
			} else {
				floatingBtn.removeClass('is-show');
			}
		});
	}
});

// CTA Floating closeクリック
$(function () {
	var close        = $('#js-cta-floating-close');
	var open         = $('#js-cta-floating-open');
	var squarePC     = $('#cta-floating-pc');
	var squareSP     = $('#cta-floating-sp');
	var floatingIcon = $('#cta-floating-pc .icon-chevron-left');

	close.on('click', function() {
		close.addClass('u-display-none');
		open.removeClass('u-display-none');
		squarePC.removeClass('is-show');
		squarePC.addClass('is-slide');
		squareSP.removeClass('is-show');
		squareSP.addClass('is-slide');
		$.cookie('cta-visibility', 'hidden', { path:'/' });
	});

	open.on('click', function() {
		close.removeClass('u-display-none');
		open.addClass('u-display-none');
		squarePC.addClass('is-show');
		squarePC.removeClass('is-slide');
		squareSP.addClass('is-show');
		squareSP.removeClass('is-slide');
		$.removeCookie('cta-visibility', { path: "/" });
	});

	if ('hidden' == $.cookie('cta-visibility')) {
		close.addClass('u-display-none');
		open.removeClass('u-display-none');
		squarePC.removeClass('is-show');
		squarePC.addClass('is-slide');
		squareSP.removeClass('is-show');
		squareSP.addClass('is-slide');
		floatingIcon.addClass('is-slide');
	}

})

// Square Floating CTA［PC］を表示
$(function() {
	var floatingBtn = $('#cta-floating-pc.cta-square');
	if ($(floatingBtn).length) {
	var doch = $(document).innerHeight(); //ページ全体の高さ
	var winh = $(window).innerHeight(); //ウィンドウの高さ
	var bottom = doch - winh; //ページ全体の高さ - ウィンドウの高さ = ページの最下部位置
		$(window).scroll(function () {
			if (bottom * 0.7 <= $(window).scrollTop()) {
				floatingBtn.addClass('is-show');
			} else {
				floatingBtn.removeClass('is-show');
			}
		});
	}
});

$(function() {
	var floatingIcon = $('#cta-floating-pc .icon-chevron-left');
	if ($(floatingIcon).length) {
	var doch = $(document).innerHeight(); //ページ全体の高さ
	var winh = $(window).innerHeight(); //ウィンドウの高さ
	var bottom = doch - winh; //ページ全体の高さ - ウィンドウの高さ = ページの最下部位置
		$(window).scroll(function () {
			if (bottom * 0.7 <= $(window).scrollTop()) {
				floatingIcon.removeClass('is-slide');
			} else {
				floatingIcon.addClass('is-slide');
			}
		});
	}
});

// Square Floating CTA［SP］を表示
$(function() {
	var floatingBtn = $('#cta-floating-sp.cta-square');
	if ($(floatingBtn).length) {
	var doch = $(document).innerHeight(); //ページ全体の高さ
	var winh = $(window).innerHeight(); //ウィンドウの高さ
	var bottom = doch - winh; //ページ全体の高さ - ウィンドウの高さ = ページの最下部位置
		$(window).scroll(function () {
			if (bottom * 0.9 <= $(window).scrollTop()) {
				floatingBtn.addClass('is-show');
			} else {
				floatingBtn.removeClass('is-show');
			}
		});
	}
});

$(function() {
	var floatingIcon = $('#cta-floating-sp .icon-chevron-left');
	if ($(floatingIcon).length) {
	var doch = $(document).innerHeight(); //ページ全体の高さ
	var winh = $(window).innerHeight(); //ウィンドウの高さ
	var bottom = doch - winh; //ページ全体の高さ - ウィンドウの高さ = ページの最下部位置
		$(window).scroll(function () {
			if (bottom * 0.9 <= $(window).scrollTop()) {
				floatingIcon.removeClass('is-slide');
			} else {
				floatingIcon.addClass('is-slide');
			}
		});
	}
});

// Floating hamburger menu［SP］を表示
$(function() {
	var floatingMenu = $('.hamburger-menu-floating');
	if ($(floatingMenu).length) {
	var doch = $(document).innerHeight(); //ページ全体の高さ
	var winh = $(window).innerHeight(); //ウィンドウの高さ
	var bottom = doch - winh; //ページ全体の高さ - ウィンドウの高さ = ページの最下部位置
		$(window).scroll(function () {
			if (bottom * 0.1 <= $(window).scrollTop() & bottom * 0.6 >= $(window).scrollTop()) {
				floatingMenu.addClass('is-show');
			} else {
				floatingMenu.removeClass('is-show');
			}
		});
	}
});

// Fixed footer menu［SP］を表示
$(function() {
	var footerMenu = $('#js-fixed-footer-menu');
	if ($(footerMenu).length) {
	var doch = $(document).innerHeight(); //ページ全体の高さ
	var winh = $(window).innerHeight(); //ウィンドウの高さ
	var bottom = doch - winh; //ページ全体の高さ - ウィンドウの高さ = ページの最下部位置
		$(window).scroll(function () {
			if (bottom * 0.6 <= $(window).scrollTop()) {
				footerMenu.addClass('is-show');
			} else {
				footerMenu.removeClass('is-show');
			}
		});
	}
});


// Fixed footer menu sp-searchform | sp-language | sp-contact
$(function() {
	var footerItem = $('.js-fixed-item');
	if ($(footerItem).length) {
	var doch = $(document).innerHeight(); //ページ全体の高さ
	var winh = $(window).innerHeight(); //ウィンドウの高さ
	var bottom = doch - winh; //ページ全体の高さ - ウィンドウの高さ = ページの最下部位置
		$(window).scroll(function () {
			if (bottom * 0.93 >= $(window).scrollTop()) {
				footerItem.removeClass('is-active');
			}
		});
	}
});

// ripple
$(".js-ripple").click(function (e) {

	// Remove any old one
	$(".js-btn__ripple").remove();

	// Setup
	var posX = $(this).offset().left,
			posY = $(this).offset().top,
			buttonWidth = $(this).width(),
			buttonHeight =	$(this).height();
	
	// Add the element
	$(this).prepend("<span class='js-btn__ripple'></span>");

 // Make it round!
	if(buttonWidth >= buttonHeight) {
		buttonHeight = buttonWidth;
	} else {
		buttonWidth = buttonHeight; 
	}

	// Get the center of the element
	var x = e.pageX - posX - buttonWidth / 2;
	var y = e.pageY - posY - buttonHeight / 2;

	// Add the ripples CSS and start the animation
	$(".js-btn__ripple").css({
		width: buttonWidth,
		height: buttonHeight,
		top: y + 'px',
		left: x + 'px'
	}).addClass("js-btn__ripple--effect");
});

// フロントページ用 ウィジェットの子要素に親要素を追加
$(function () {
	$('.c-section-widget:not([class$="_section"])').wrapInner('<div class="c-section-widget__inner"><div class="l-content"></div></div>');
});

// Image slider
$(function () {
	var imageSlider = $('#js-header-image-slider');

	imageSlider.slick({
		autoplay: imageSlider.data('autoplay'),
		autoplaySpeed: imageSlider.data('autoplayspeed'),
		speed: imageSlider.data('speed'),
		fade: imageSlider.data('fade'),
		arrows: imageSlider.data('arrows'),
		dots: false,
		pauseOnFocus: false,
		pauseOnHover: false,
		infinite: true,
		waitForAnimate: false,
		cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
	});

	// スライド切り替え前のイベント
	imageSlider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
		var slide = $('.slick-slide');
		imageSlider.find(slide).removeClass('is-active');
		imageSlider.find(slide).eq(currentSlide).addClass('is-active');
	});

});

// Content slider
$(function () {
	var contentSlider = $('#js-header-content-slider');

	contentSlider.slick({
		autoplay: contentSlider.data('autoplay'),
		autoplaySpeed: contentSlider.data('autoplayspeed'),
		speed: contentSlider.data('speed'),
		fade: contentSlider.data('fade'),
		arrows: contentSlider.data('arrows'),
		dots: contentSlider.data('dots'),
		pauseOnFocus: false,
		pauseOnHover: false,
		infinite: true,
		waitForAnimate:false,
		cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
			responsive: [
				{ breakpoint: 769,
					settings: {
						fade: true,
						dots: contentSlider.data('dots'),
					}
				}
			]
	});

// スライド切り替え前
	contentSlider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
		var slide = $('.slick-slide');
		contentSlider.find(slide).removeClass('is-active');
		contentSlider.find(slide).eq(currentSlide).addClass('is-active');
	});

});

// Pick up slider
$(function () {
	var pickupSlider = $('#js-header-pickup-slider');

	pickupSlider.slick({
		initialSlide: 0,
		slidesToShow: 3,
		slidesToScroll: 1,
		centerMode: pickupSlider.data('centermode'),
		autoplay: pickupSlider.data('autoplay'),
		autoplaySpeed: pickupSlider.data('autoplayspeed'),
		speed: pickupSlider.data('speed'),
		fade: false,
		arrows: pickupSlider.data('arrows'),
		dots: pickupSlider.data('dots'),
		pauseOnFocus: false,
		pauseOnHover: false,
		infinite: true,
		waitForAnimate: false,
		cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
			responsive: [
				{ breakpoint: 1025,
					settings: {
						slidesToShow: 3
					}
				},
				{ breakpoint: 769,
					settings: {
						slidesToShow: 3
					}
				},
				{ breakpoint: 545,
					settings: {
						slidesToShow: 1,
						arrows: false,
						centerPadding: '24px'
					}
				}
			]
	});

});

// Page box
$(function () {
	var pageboxSlider          = $('#js-pagebox-slider');
	var pageboxSliderThumbnail = $('#js-pagebox-slider-thumbnail');

	pageboxSlider.slick({
		asNavFor: pageboxSliderThumbnail,
		slidesToShow: 1,
		slidesToScroll: 1,
		fade: true,
		dots: false,
		arrows: false,
		swipe: true,
		cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
	});

	pageboxSliderThumbnail.slick({
		asNavFor: pageboxSlider,
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: pageboxSliderThumbnail.data('autoplay'),
		autoplaySpeed: pageboxSliderThumbnail.data('autoplayspeed'),
		speed: pageboxSliderThumbnail.data('speed'),
		arrows: false,
		focusOnSelect: true,
	});

});

// 動画セクション Header videoの中央配置
$(function () {
	var winH     = $(window).height();
	var video    = $('#js-header-video');
	var videoTag = $('#js-header-video-tag');
	video.outerHeight(winH);
	$(window).on('load',function(){setVideo(videoTag);});
	$(window).on('resize',function(){winH = $(window).height(); videoTag.outerHeight(winH);setVideo(videoTag);});
	function setVideo(object){var imgW=object.width();var imgH=object.height();var winW=$(window).width();var winH=$(window).height();var scaleW=winW/imgW;var scaleH=winH/imgH;var fixScale=Math.max(scaleW,scaleH);var setW=imgW*fixScale;var setH=imgH*fixScale;var moveX=Math.floor((winW-setW)/2);var moveY=Math.floor((winH-setH)/2);object.css({'height':setH,'left':moveX,'top':moveY,'width':setW})}
});

// 動画セクション videoタグの音声再生ボタン
$(function () {
	$('.sound-btn').clickToggle(
		function () {
			$("video").prop('muted', false);
		},
		function () {
			$("video").prop('muted', true);
		}
	);
});

// 動画セクション YouTubeの埋め込み
$(function () {
	var youTube = $('#js-header-youtube');
	if($(youTube).length) {
		youTube.YTPlayer();
		var filters = {
			sepia: youTube.data('sepia'),
			grayscale: youTube.data('grayscale'),
			blur: youTube.data('blur')
		}
		youTube.YTPApplyFilters(filters)
	}
});

// フッター YouTubeの埋め込み
$(function () {
	var youTube = $('#js-footer-youtube');
	if($(youTube).length) {
		youTube.YTPlayer();
	}
});

// 動画セクション YouTubeの音声再生ボタン
$(function () {
	$('.sound-btn').on('click', function() {
		$('#js-header-youtube').YTPToggleVolume();
		$(this).toggleClass('active');
	});
});

// Newsティッカー
$(function () {
	function ticker(){
		if($('#js-header-news li').length<=1) return false;
			$('#js-header-news li:first').slideUp( function() {
				$(this).appendTo($('#js-header-news')).slideDown();
			});
		}
	setInterval(function(){ticker()}, 6000);
});

// Widget customer feedback セクション
$(function () {
	var customerSlider = $('[id^="widget-cust_section-"]');

	customerSlider.slick({
		initialSlide: 0,
		slidesToShow: customerSlider.data('slidestoshow'),
		slidesToScroll: 1,
		autoplay: customerSlider.data('autoplay'),
		autoplaySpeed: 3000,
		speed: 2000,
		dots: customerSlider.data('dots'),
		fade: false,
		arrows: false,
		pauseOnFocus: false,
		pauseOnHover: false,
		infinite: true,
		cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
			responsive: [
			{ breakpoint: 545,
					settings: {
					autoplay: false,
					speed: 250,
					slidesToShow: 1,
					dots: customerSlider.data('dots')
					}
				}
			]
	});

});

// Widget post slider セクション
$(function () {
	var postSlider = $('[id^="widget-post_slider_section-"]');

	postSlider.slick({
		initialSlide: 0,
		slidesToShow: postSlider.data('slidestoshow'),
		slidesToScroll: 1,
		centerMode: postSlider.data('center'),
		centerPadding: '48px',
		autoplay: postSlider.data('autoplay'),
		autoplaySpeed: 3000,
		speed: 3000,
		dots: postSlider.data('dots'),
		fade: false,
		arrows: false,
		pauseOnFocus: false,
		pauseOnHover: false,
		infinite: true,
		cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
			responsive: [
			{ breakpoint: 545,
					settings: {
					autoplay: false,
					speed: 200,
					centerMode: false,
					slidesToShow: 1,
					arrows: false,
					dots: postSlider.data('dots'),
					}
				}
			]
	});

});

// Nav tab
$(function () {
	var tabNav   = $('.js-tab-nav');
	var tabPanel = $('.js-tab-panel');
	$(tabNav).on('click', function() {
		$(tabNav).removeClass('is-active');
		$(this).addClass('is-active');
		$(tabPanel).removeClass('is-show');
		const index = $(this).index();
		$(tabPanel).eq(index).addClass('is-show');
	});
});

// 記事URLをコピー
$(function () {
	var clipboard = new ClipboardJS('.js-clipboard');

	clipboard.on('success', function(e) {
		$('.share-button__clipboard--success').removeClass('u-display-none');
		$('.share-button__clipboard--success').delay(1500).fadeOut("slow");
	});

	clipboard.on('error', function(e) {
		$('.share-button__clipboard-error').removeClass('u-display-none');
		$('.share-button__clipboard-error').delay(1500).fadeOut("slow");
	});

});

// Sticky sidebar
$(function () {
	var elements = $('#js-sidebar-sticky');
	Stickyfill.add(elements);
});

// Sticky share
$(function () {
	var elements = $('.sns-share-sticky');
	Stickyfill.add(elements);
});

// Hamburger menu
$(function () {
	$('.js-hamburger-menu, a[href="#js-hamburger-menu"],.drawer-overlay,.hamburger-close-menu').on('click', function() {
		$('body').toggleClass('is-drawer-open');
		$('.drawer-menu,.drawer-overlay').toggleClass('is-active');
		$('.hamburger-menu-floating').toggleClass('is-active');
	});
});

// Drawer menu
$(function () {
	$('.drawer-menu a').on('click', function() {
		$('body').removeClass('is-drawer-open');
		$('.drawer-menu,.drawer-overlay').removeClass('is-active');
		$('.hamburger-menu-floating').removeClass('is-active');
	});
});

// Header search panel
$(function () {
	$('#js-header-search a').on('click', function() {
		$('#js-header-search').toggleClass('is-active');
		$('#js-header-contact, #js-header-language').removeClass('is-active');
		$('#js-header-searchform-panel').toggleClass('is-active');
		$('#js-header-language-panel,#js-header-contact-panel').removeClass('is-active');
	});
});

// Header contact panel
$(function () {
	$('#js-header-contact a').on('click', function() {
		$('#js-header-contact').toggleClass('is-active');
		$('#js-header-search, #js-header-language').removeClass('is-active');
		$('#js-header-contact-panel').toggleClass('is-active');
		$('#js-header-language-panel,#js-header-searchform-panel').removeClass('is-active');
	});
});

// Header language panel
$(function () {
	$('#js-header-language a').on('click', function() {
		$('#js-header-language').toggleClass('is-active');
		$('#js-header-contact, #js-header-search').removeClass('is-active');
		$('#js-header-language-panel').toggleClass('is-active');
		$('#js-header-contact-panel,#js-header-searchform-panel').removeClass('is-active');
	});
});

// トップへ戻る
$(function () {
	$('a[href="#js-smooth-scroll"], #js-smooth-scroll').on('click', function() {
		$('body, html').animate({ scrollTop: 0 }, 500);
	return false;
	});
});

// モバイルフッタートップへ戻るクリック時の処理
$(function () {
	$('.fixed-footer-menu__inner a[href="#js-smooth-scroll"]').on('click', function() {
		$('.sp-searchform.is-active,.sp-follow-sns.is-active').removeClass('is-active');
	});
});

// モバイルフッターSNSフォロー
$(function () {
	$('a[href="#js-follow-sns"]').on('click', function() {
		$('.sp-follow-sns').toggleClass('is-active');
		$('.sp-searchform.is-active').removeClass('is-active');
		$('.sp-share-sns.is-active').removeClass('is-active');
	});
});

// モバイルフッターSNSシェア
$(function () {
	$('a[href="#js-share-sns"]').on('click', function() {
		$('.sp-share-sns').toggleClass('is-active');
		$('.sp-follow-sns.is-active').removeClass('is-active');
		$('.sp-searchform.is-active').removeClass('is-active');
	});
});

// モバイルフッター検索
$(function () {
	$('a[href="#js-search"]').on('click', function() {
		$('.sp-searchform').toggleClass('is-active');
		$('.sp-follow-sns.is-active').removeClass('is-active');
		$('.sp-share-sns.is-active').removeClass('is-active');
	});
});


// 目次の非表示・表示を切り替え
$(function () {

	$('#js-toc-toggle').on('click', function() {
		var list = $('.contents-outline');
		var btn = $('.toc-btn__switch');
		if (list.is(':hidden')) {
			list.show('fast');
			btn.addClass('selected');
		} else {
			list.hide('fast');
			btn.removeClass('selected');
		}
		return false;
	});

	$('.toc-box ol a, #side-toc ol a').on('click', function() {
		var href	 = $(this).attr("href");
		var target = $('*[toc-anchor="' + href + '"]');
		if (target.length == 0) {
			return false;
		}

	$('html,body').animate({'scrollTop': target.offset().top}, 300);
		return false;
	});
})

//.アコーディオン（開閉）
$(function () {
	$('.js-acordion dt').on('click', function() {
		$(this).toggleClass("is-active");
		$(this).next('.c-acordion__text').slideToggle(300);
	});
});

})(jQuery);
