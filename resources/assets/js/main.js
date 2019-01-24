(function ($) {

    var waitForFinalEvent = (function () {
        var timer = 0;
        return function (callback, ms) {
            clearTimeout(timer);
            timer = setTimeout(callback, ms);
        };
    })();

    var $html = $('html'); //, isTouch = $html.hasClass('touchevents');
    var $body = $('body');
    var windowWidth = Math.max($(window).width(), window.innerWidth);

    /*Detect IE*/
    function detectIE() {
        var ua = window.navigator.userAgent;
        var msie = ua.indexOf('MSIE');
        var trident = ua.indexOf('Trident/');
        var edge = ua.indexOf('Edge/');
        if(msie > 0){
            $html.addClass('ie');
        }
        else if(trident > 0){
            $html.addClass('ie');
        }
        else if(edge > 0){
            $html.addClass('edge');
        }
        else{
            $html.addClass('not-ie');
        }
        return false;
    }

    detectIE();

    /*Detect ios*/
    var mac = !!navigator.platform.match(/(Mac|iPhone|iPod|iPad)/i);

    if(mac){
        $html.addClass('ios');
    }

    /*Ios fix zoom on form elems focus*/
    function cancelZoom() {
        var d = document,
            viewport,
            content,
            maxScale = ',maximum-scale=',
            maxScaleRegex = /,*maximum-scale=\d*\.*\d*/;

        // this should be a focusable DOM Element
        if (!this.addEventListener || !d.querySelector) {
            return;
        }

        viewport = d.querySelector('meta[name="viewport"]');
        content = viewport.content;

        function changeViewport(event) {
            viewport.content = content + (event.type === 'blur' ? (content.match(maxScaleRegex, '') ? '' : maxScale + 10) : maxScale + 1);
        }

        // We could use DOMFocusIn here, but it's deprecated.
        this.addEventListener('focus', changeViewport, true);
        this.addEventListener('blur', changeViewport, false);
    }

    $.fn.cancelZoom = function () {
        return this.each(cancelZoom);
    };

    if($html.hasClass('ios')) {
        $('input:text,select,textarea').cancelZoom();
    }

    /*Detect Android*/
    var ua = navigator.userAgent.toLowerCase();
    var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");
    if (isAndroid) {
        $html.addClass('android');
    }
    else {
        $html.addClass('not-android');
    }


    /*RequestAnimationFrame Animate*/

   /* var runningAnimationFrame = true;
    var scrolledY;
    window.requestAnimationFrame = (function () {
        return window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        window.oRequestAnimationFrame ||
        window.msRequestAnimationFrame ||
        function (callback, element) {
            return window.setTimeout(callback, 1000 / 60);
        };
    })();

    function loop(){
        if(runningAnimationFrame){
            scrolledY = $(window).scrollTop();

            requestAnimationFrame(loop);
        }
    }
    requestAnimationFrame(loop);*/


    /*Responsive img*/
    if($('.responsimg').length){
        $('.responsimg').responsImg();
    }

    /*Select*/
    if($(".select").length){
        $(".select").select2({
            minimumResultsForSearch: Infinity
        });
    }

    if($(".img-select").length){
        $(".img-select").select2({
            minimumResultsForSearch: Infinity,
            templateResult: selectFormat,
            templateSelection: selectFormat
        });
    }
    function selectFormat(item){
        return $('<div class="sub-box">' + '<div class="value">' + item.text + '</div>' + '<div class="img"><img src='+$(item.element).data('img')+' /></div>' + '</div>');
    }


    if($('.form .field').length){
        var zIndex = 10;
        $('.form .field').each(function(){
            $(this).css('zIndex', zIndex);
            zIndex++;
        });
    }

    /*Header*/
    $('.touchevents #langs-box .current-lang').on('click', function(e){
        e.stopPropagation();
        if(!$(this).parents('#langs-box').hasClass('opened')){
            $(this).parents('#langs-box').addClass('opened');
        }
        else{
            $(this).parents('#langs-box').removeClass('opened');
        }
    });
    $('.touchevents #langs-box .dropdown').on('click', function(e){
        e.stopPropagation();
    });

    $('.touchevents #all').on('click', function(){
        if($('#langs-box').hasClass('opened')){
            $('#langs-box').removeClass('opened');
        }
    });


    var scrollDefaultPosition = 0;
    var wST = $(window).scrollTop();

    function stickyHeader(){
        wST = $(window).scrollTop();

        if(wST > scrollDefaultPosition){
            if($html.hasClass('scroll-top')){
                $html.removeClass('scroll-top');
                $('#header').removeClass('sticky');
            }
        }
        else if(scrollDefaultPosition > wST && !$html.hasClass('opened-game')){
            if(!$html.hasClass('scroll-top')) {
                $html.addClass('scroll-top');
                $('#header').addClass('sticky');
            }
        }
        if(wST <= 1){
            $('#header').removeClass('sticky');
        }
        scrollDefaultPosition = wST;
    }
    if($('#header').length){
        stickyHeader();
    }

    /*Clock*/
    function jsClock(){
        if($('.js-clock').length){
            $('.js-clock').each(function () {
                var $el = $(this);
                if (!$el.hasClass('clock-started')) {
                    $el.addClass('clock-started');
                    setInterval(function() {
                        var date = new Date();
                        var hours = date.getHours();
                        var minutes = date.getMinutes();
                        if (minutes < 10){
                            minutes = '0' + minutes;
                        }
                        $el.html(hours + ":" + minutes);
                    }, 1000);
                }
            });
        }
    }
    jsClock();

    /*Nav*/
    $('#js-open-nav').on('click', function(e){
        e.stopPropagation();
        if(!$html.hasClass('opened-nav')){
            $html.addClass('opened-nav');
        }
    });

    $('#js-close-nav').on('click', function(e){
        e.stopPropagation();
        if($html.hasClass('opened-nav')){
            $html.removeClass('opened-nav');
        }
    });

    function navPosition(){
        if(windowWidth <= 1000 && $('#header #nav').length){
            $('#nav').insertAfter('#all');
        }
        else if(windowWidth > 1000 && !$('#header #nav').length){
            $('#nav').insertAfter('#logo');
        }
    }
    if($('#nav').length){
        navPosition();
    }


    $body.on('click', "#main-nav a[href*='#'], #nav a[href*='#']", function(e){


        var href = $(this).attr('href');

        var count = 40;
        if(windowWidth <= 780){
            count = 22
        }

        if($(href).length){
            e.preventDefault();
            var scrollToPosition = $(href).offset().top;
        }

        if($html.hasClass('opened-nav')){
            $html.removeClass('opened-nav');
        }

        $('html, body').animate({
            scrollTop: scrollToPosition - count
        }, 300);
    });

    $body.on('click', "a.js-anchor[href*='#']", function (e) {
        var href = $(this).attr('href');

        var count = 40;
        if (windowWidth <= 780) {
            count = 22
        }

        var id = '#' + href.split('#')[1];

        if ($(id).length) {
            e.preventDefault();

            if ($(id).closest('.accordion').length) {
                if ($(id).hasClass('item') && !$(id).hasClass('active')) {
                    $(id).closest('.accordion').find('.item').removeClass('active').find('.text').hide();
                    $(id).addClass('active').find('.text').show();
                } else if (!$(id).closest('.item').hasClass('active')) {
                    $(id).closest('.accordion').find('.item').removeClass('active').find('.text').hide();
                    $(id).closest('.item').addClass('active').find('.text').show();
                }
            }

            var scrollToPosition = $(id).offset().top;

            $('html, body').animate({
                scrollTop: scrollToPosition - count
            }, 300);
        }
    });

    /*Main screen*/
    $('#main-screen .js-anchor').on('click', function(){
        var scrollCount = $(this).parents('#main-screen').height();

        $('html, body').animate({
            scrollTop: scrollCount + 36
        }, 250);
    });

    function mainScreenPosition(){
        if(windowWidth <= 780 && !$('#page-bg #main-screen').length){
            var mainScreen = $('#main-screen').detach();
            $('#page-bg').prepend(mainScreen);
        }
        else if(windowWidth > 780 && $('#page-bg #main-screen').length){
            $('#main-screen').insertBefore('#page-bg');
        }
    }
    if($('#main-screen').length){
        mainScreenPosition();
    }

    /*Accordion*/
    if($('.accordion .active').length){
        $('.accordion .active .text').show();
    }
    $('.accordion .title').on('click', function(){
        var scrollCount = 16;

        var el = $(this).parents('.item');
        if(el.hasClass('active')) {
            el.removeClass('active').find('.text').slideUp(250);
        }
        else {
            $('.accordion .item').removeClass('active');
            $('.accordion .item').find('.text').hide();
            el.addClass('active').find('.text').slideDown(250);
        }

        if(!$(this).parents('.accordion').hasClass('sub-appearance')){
            $('html, body').animate({
                scrollTop: $(this).offset().top - scrollCount
            }, 300);
        }
    });

    $('.accordion.sub-appearance .item .text a').on('click', function(e){
        if($(this).next('.dropdown').length){
            e.preventDefault();
            if(!$(this).hasClass('active')){
                $(this).addClass('active').next('.dropdown').slideDown(150);
            }
            else{
                $(this).removeClass('active').next('.dropdown').slideUp(150);
            }
        }
    });

    /*Bonus list*/
    if($('.bonus-list').length){
        $('.bonus-list .item').each(function(){
            if($(this).find('.sub-link').length){
                $(this).addClass('has-sub-link');
            }
        });
    }

    /*We give*/
    $('.no-touchevents .we-give .btn').on('mouseenter', function(){
        $(this).parents('.we-give').removeClass('on-hover');
        $(this).parents('.we-give').addClass('on-hover');
        setTimeout(function(){
            $('.we-give').removeClass('on-hover');
        }, 1200);
    });

    if($('.games-filter').length){
        var gamesFilterSlider = new Swiper('.games-filter .swiper-container', {
            slidesPerView: 'auto',
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            }
        });

        $("#games-filter-box .header").stick_in_parent({
            parent: '#all',
            sticky_class: 'sticky',
            offset_top: -140
        });

        $("#games-filter-box .header").stick_in_parent().on("sticky_kit:stick", function(){
            setTimeout(function(){
                gamesFilterSlider.update();
            }, 200);
        }).on("sticky_kit:unstick", function(){
            setTimeout(function(){
                gamesFilterSlider.update();
            }, 200);
        });
    }

    /*Games filter*/
    $('.js-open-search').on('click', function(){
        if(!$html.hasClass('opened-games-search')){
            $html.addClass('opened-games-search');
            $('.jq_search_input').focus();
        }
        else{
            $html.removeClass('opened-games-search');
        }
        setTimeout(function(){
            gamesFilterSlider.update();
        }, 200);
    });

    /*$('.games-search-box').on('click', function(e){
        if (!$(e.target).hasClass('jq_search_btn')) {
            e.stopPropagation();
        }
    });*/

    $('#all').on('click', function(e){
        if ($(e.target).hasClass('jq_search_btn') || $(e.target).hasClass('jq_search_input') || $(e.target).hasClass('js-open-search') || $(e.target).closest('.js-open-search').length) {
            return;
        }
        if($html.hasClass('opened-games-search')){
            $html.removeClass('opened-games-search');
            setTimeout(function(){
                gamesFilterSlider.update();
            }, 200);
        }
    });

    $(document).on('click', '.games-filter .js-filter-games', function (e) {
        e.preventDefault();
        if ($(this).hasClass('active')) {
            return;
        }

        if ($html.hasClass('opened-games-search')) {
            $html.removeClass('opened-games-search');
        }
        setTimeout(function () {
            gamesFilterSlider.update();
        }, 200);

        //if (!$(this).hasClass('active')) {
        $('.games-filter .js-filter-games').removeClass('active');
        $(this).addClass('active');
        //} else {
        //    $(this).removeClass('active');
        //}

        var route_new_url = $('#sort_url').val();

        $('.jq_search_input').val('');

        var tag = $(this).data('tag');

        $('.provider_list li').removeClass('active');

        $('.ajaxLoader').show();

        $.get(route_new_url, {tag: tag}, function (data) {
            //var replacer_content = $(data).filter('.casino-page-content');
            $('.jq_casino_content').html(data);
            $('.ajaxLoader').hide();
        }, 'html').fail(function (t) {
            $('.ajaxLoader').hide();
        });
    });

    var delay = (function () {
        var timer = 0;
        return function (callback, ms) {
            clearTimeout(timer);
            timer = setTimeout(callback, ms);
        };
    })();

    $(document).on('input', '.jq_search_input', function (e) {
        var route_new_url = $('#sort_url').val();

        var text = $(this).val();

        delay(function () {
            $('.jq_search_input').addClass('bg-waiting');
            $('.jq_search_input').prop('readonly', true);
            $('.jq_search_btn').prop('disabled', true);

            var tag = $('#games-filter-box').find('.js-filter-games.active:first').data('tag') || '';
            var provider = $('.provider_list li.active:first').data('provider') || '';

            $.get(route_new_url, {tag: tag, provider: provider, s: text}, function (data) {
                $('.jq_casino_content').html(data);
                setTimeout(function () {
                    $('.jq_search_input').removeClass('bg-waiting');
                }, 400);
                $('.jq_search_input').prop('readonly', false);
                $('.jq_search_btn').prop('disabled', false);
            }, 'html').fail(function () {
                setTimeout(function () {
                    $('.jq_search_input').removeClass('bg-waiting');
                }, 400);
                $('.jq_search_input').prop('readonly', false);
                $('.jq_search_btn').prop('disabled', false);
            });
        }, 1000);

        return false;
    });

    $(document).on('click', '.jq_search_btn', function (e) {
        e.preventDefault();

        var route_new_url = $('#sort_url').val();

        var text = $('.jq_search_input').val();

        delay(function () {
            $('.jq_search_input').addClass('bg-waiting');
            $('.jq_search_input').prop('readonly', true);
            $('.jq_search_btn').prop('disabled', true);

            var tag = $('#games-filter-box').find('.js-filter-games.active:first').data('tag') || '';
            var provider = $('.provider_list li.active:first').data('provider') || '';

            $.get(route_new_url, {tag: tag, provider: provider, s: text}, function (data) {
                $('.jq_casino_content').html(data);
                setTimeout(function () {
                    $('.jq_search_input').removeClass('bg-waiting');
                }, 400);
                $('.jq_search_input').prop('readonly', false);
                $('.jq_search_btn').prop('disabled', false);
            }, 'html').fail(function () {
                setTimeout(function () {
                    $('.jq_search_input').removeClass('bg-waiting');
                }, 400);
                $('.jq_search_input').prop('readonly', false);
                $('.jq_search_btn').prop('disabled', false);
            });
        }, 50);

        return false;
    });

    //*******************************************************************************************//

    var scrollFilterDefaultPosition = 0;
    var wFilterST = $(window).scrollTop();

    function stickyFilterHeader(){
        wFilterST = $(window).scrollTop();
        if(wFilterST > scrollFilterDefaultPosition){
            if($('#games-filter-box .header').hasClass('sticky')){
                $('#games-filter-box .header').removeClass('top-indent');
            }
        }
        if(scrollFilterDefaultPosition > wFilterST){
            if($('#games-filter-box .header').hasClass('sticky')){
                $('#games-filter-box .header').addClass('top-indent');
            }
        }
        scrollFilterDefaultPosition = wFilterST;
    }
    if($('.games-filter').length){
        stickyFilterHeader();
    }


    if($('.bonus-rotator').length){
        var bonusRotator = new Swiper('.bonus-rotator .swiper-container', {
            slidesPerView: '1',
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false
            }
        });

        function readMoreUrl(){
            var readMoreUrl =  $('.bonus-rotator').find('.swiper-slide-active').attr('data-ream-more');
            $('.bonus-rotator').parents('.we-give').find('.btn').attr('href', readMoreUrl);
        }
        readMoreUrl();

        bonusRotator.on('slideChangeTransitionEnd ', function(){
            readMoreUrl();
        });

        $(".swiper-container").hover(function() {
            bonusRotator.autoplay.stop();
        }, function() {
            bonusRotator.autoplay.start();
        });
    }

    var scrollTopTouch;

    /*Game box*/
    var gameLaunchWidth, gameLaunchHeight, gameProportion, windowGameHeight;
    //function gameActions(){
    $(document).on('click', '.js-open-game', function(e){
        e.stopPropagation();
        e.preventDefault();

        console.log('mainjs');

        var $link = $(this).parents('a');

        var provider = $link.data('provider');
        var id = $link.data('id');
        var mode = $link.data('mode');


        console.log('qweqwe - ajaxloaderhide -- assad');

                if ($('#user_agent').val() == 'mobile') {
                    var mobile_launch_url = $(data).find('#game-frame').attr('src');
                    window.location = mobile_launch_url + '&mobileLobbyUrl=' + window.location.origin + window.location.pathname;
                    return false;
                }

                // $('#game-all').html(data);

                if($html.hasClass('touchevents')){
                    scrollTopTouch = $(window).scrollTop();
                }

                $html.addClass('opened-game game-page');
                $('#header').removeClass('sticky');

                var gameBoxBg = $link.attr('data-game-bg');
                var gameIframeSrc = $link.attr('data-src');

                console.log(gameBoxBg);
                console.log(gameIframeSrc);


                $('#game-box').addClass(gameBoxBg);
                $('#game-frame').attr('src', gameIframeSrc);

                gameLaunchWidth = $html.find('#game-frame').attr('data-launch-width');
                gameLaunchHeight = $html.find('#game-frame').attr('data-launch-height');
                gameProportion = gameLaunchWidth / gameLaunchHeight;
                windowGameHeight = $(window).height() - 160;

                $('#game-iframe-box .sub-box').css({width:windowGameHeight * gameProportion, height: windowGameHeight});

                /*Init*/
                jsClock();

                // $('.js-close-popup').trigger('click');

                var msg_key = 'msg-' + (new Date().getTime());

                $('.game-message.msg1').addClass(msg_key);
                setTimeout(function () {
                    $('.game-message.msg1.' + msg_key).fadeIn(200);
                }, 5000);

                $('.game-message.msg2').addClass(msg_key);
                setTimeout(function () {
                    $('.game-message.msg2.' + msg_key).fadeIn(200);
                }, 40000);

                /*var game_width_launch = $('.fixed_game_window .game-window-wrapper').data('launch-width');
                var game_height_launch = $('.fixed_game_window .game-window-wrapper').data('launch-height');

                var index_width = game_width_launch / game_height_launch;
                var window_height_without_headder = $(window).height() - 95;
                var new_window_width = window_height_without_headder * index_width;

                $('.game-window-wrapper').width(new_window_width);
                $('.game-window-wrapper').height(window_height_without_headder);
                $('.game-window-wrapper').data('prev_widht', new_window_width);
                $('.game-window-wrapper').data('prev_height', window_height_without_headder);*/

                /*if ($('#user_currency').val() == '') {
                    setTimeout(function () {
                        $('.jq_notification-Lepricon_register').animate({
                            left: 0
                        }, 400, function () {
                            $(this).css("display", "block");
                        });
                    }, 40000);
                }*/
            // },
            // error: function () {
            //     $('.ajaxLoader').hide();
            // },
            // type: 'POST',
            // url: '/game_ajax',
            // dataType: 'html'
        // });

    });
    //}
    //gameActions();

    var msg_key = 'msg-' + (new Date().getTime());
    if ($('.game-message.msg1').length) {
        $('.game-message.msg1').addClass(msg_key);
        setTimeout(function () {
            $('.game-message.msg1.' + msg_key).fadeIn(200);
        }, 5000);
    }

    if ($('.game-message.msg2').length) {
        $('.game-message.msg2').addClass(msg_key);
        setTimeout(function () {
            $('.game-message.msg2.' + msg_key).fadeIn(200);
        }, 40000);
    }

    $(document).on('click', '.js-close-game', function(){
        if ($html.hasClass('game-single-page')) {
            return;
        }
        $html.removeClass('opened-game game-page scroll-top');
        setTimeout(function () {
            // $('#game-all').html('');
        }, 200);
        $('#game-box').attr('class', '');
        $('#game-frame').attr('src', '');
        var scrollTop = $(window).scrollTop();
        if($html.hasClass('no-touchevents')){
            $('html, body').scrollTop(scrollTop - 1);
        } else{
            $('html, body').scrollTop(scrollTopTouch - 1);
        }

        if($('#game-iframe-box .js-full-screen').hasClass('active')){
            toggleFullScreen(document.body);
        }
    });

    function toggleFullScreen(elem) {
        if((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
            if (elem.requestFullScreen) {
                elem.requestFullScreen();
            } else if (elem.mozRequestFullScreen) {
                elem.mozRequestFullScreen();
            } else if (elem.webkitRequestFullScreen) {
                elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
            } else if (elem.msRequestFullscreen) {
                elem.msRequestFullscreen();
            }
        } else {
            if (document.cancelFullScreen) {
                document.cancelFullScreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }
        }
    }


    $(document).on('click', '#game-iframe-box .js-full-screen', function(){
        toggleFullScreen(document.body);
    });

    /* Standard syntax */
    document.addEventListener("fullscreenchange", function () {
        setTimeout(function () {
            windowGameHeight = $(window).height() - 160;
            $('#game-iframe-box .sub-box').css({width: windowGameHeight * gameProportion, height: windowGameHeight});
        }, 600);
    });

    /* Firefox */
    document.addEventListener("mozfullscreenchange", function () {
        setTimeout(function () {
            windowGameHeight = $(window).height() - 160;
            $('#game-iframe-box .sub-box').css({width: windowGameHeight * gameProportion, height: windowGameHeight});
        }, 600);
    });

    /* Chrome, Safari and Opera */
    document.addEventListener("webkitfullscreenchange", function () {
        setTimeout(function () {
            windowGameHeight = $(window).height() - 160;
            $('#game-iframe-box .sub-box').css({width: windowGameHeight * gameProportion, height: windowGameHeight});
        }, 600);
    });

    /* IE / Edge */
    document.addEventListener("msfullscreenchange", function () {
        setTimeout(function () {
            windowGameHeight = $(window).height() - 160;
            $('#game-iframe-box .sub-box').css({width: windowGameHeight * gameProportion, height: windowGameHeight});
        }, 1600);
    });


    if (document.addEventListener) {
        document.addEventListener('webkitfullscreenchange', exitHandler, false);
        document.addEventListener('mozfullscreenchange', exitHandler, false);
        document.addEventListener('fullscreenchange', exitHandler, false);
        document.addEventListener('MSFullscreenChange', exitHandler, false);
    }

    function exitHandler(){
        if(document.webkitIsFullScreen || document.mozFullScreen || document.msFullscreenElement !== null){
            if(!$('#game-iframe-box .js-full-screen').hasClass('active')){
                $('#game-iframe-box .js-full-screen').addClass('active').find('p').text('Обычный режим');
            }
            else{
                $('#game-iframe-box .js-full-screen').removeClass('active').find('p').text('Полноэкранный режим');
            }
        }
    }

    $(document).on('click', '.js-game-like', function () {
        var $el = $(this);
        if ($el.hasClass('is-busy')) {
            return;
        }
        if (!$(this).hasClass('active')) {
            $(this).addClass('active');
        } else {
            $(this).removeClass('active');
        }
        $el.addClass('is-busy');
        var game_id = $(this).data('game_id');
        $.ajax({
            data: {
                game_id: game_id
            },
            success: function () {
                setTimeout(function () {
                    $el.removeClass('is-busy');
                }, 200);
            },
            error: function () {
                setTimeout(function () {
                    $el.removeClass('is-busy');
                }, 200);
            },
            type: 'POST',
            url: '/favorite-game'
        });
    });


    $(document).on('click', '.message-box .js-close-message', function(){
        $(this).parents('.game-message').fadeOut(200);
    });

    $(document).on('click', '.js-game-nav', function(){
        if(!$('#header').hasClass('hidden')){
            $('#header').addClass('hidden');
        }
        else{
            $('#header').removeClass('hidden');
        }
    });

    /*Ajax more games*/
    /*infinite loading*/
    var current_url;
    var loading = false;
    var ajaxUploadBox;

    $body.on('click', ".js-load-more", function(e){
        e.preventDefault();
        if(loading){
            alert('Please wait');
        } else{

            var route_new_url = $('#sort_url').val();

            var tag = $('#games-filter-box').find('.js-filter-games.active:first').data('tag') || '';
            var provider = $('.provider_list li.active:first').data('provider') || '';
            var offset = $(this).data('tape_offset');

            moreGames(route_new_url, {tag: tag, provider: provider, offset: offset});

            ajaxUploadBox = $(this).parents('.ajax-upload-box');
        }
    });

    function moreGames(url, url_data) {
        current_url = url;
        $.ajax({
            url: url,
            data: url_data,
            dataType: 'html',
            beforeSend: function () {
                loading = true;
            },
            success: function(data) {
                var content, newHref, $data = $('<div/>');
                $data.html(data);

                content =  $data.find('.games-list').html();

                $('.games-list').append(content);

                setTimeout(function(){
                    $('.games-list .game-item').removeClass('hidden');
                }, 250);

                if($data.find('.js-load-more').length){
                    newHref = $data.find('.js-load-more').data('tape_offset');
                    ajaxUploadBox.find('.js-load-more').data('tape_offset', newHref);
                }
                else{
                    ajaxUploadBox.addClass('finished').find('.js-load-more').hide();
                }

                /*Reinit*/
                //gameActions();

                loading = false;
            },
            error: function () {
                loading = false;
                alert('Page not found!');
            }
        });
    }

    /*Popup*/
    $(document).on('click', '.js-open-popup:not(.game-link)', function(e){
        e.preventDefault();
        $('#popup').find('.visible').removeClass('visible').addClass('hidden');
        var dataPopup = $(this).attr('data-popup');
        $html.addClass('opened-popup');
        $("." + dataPopup).removeClass('hidden').addClass('visible');


        /*Tain iframe resize recalc hack*/
        var resizeEvent = new Event('resize');
        window.dispatchEvent(resizeEvent);

        setTimeout(function(){
            var resizeEvent = new Event('resize');
            window.dispatchEvent(resizeEvent);
        }, 250);
    });

    $(document).on('click', '.js-open-popup.game-link', function(e){
        e.preventDefault();
        if ($(e.target).hasClass('js-open-game')) {
            return;
        }
        $('#popup').find('.visible').removeClass('visible').addClass('hidden');
        var dataPopup;
        if($html.hasClass('no-touchevents')){
            dataPopup = $(this).attr('data-popup');
        } else{
            dataPopup = $(this).attr('data-touch-popup');
            //var btnGameSrc = $(this).find('.js-open-game').attr('data-src');
            //$('.choose-game-popup .js-open-game').attr('data-src', btnGameSrc);
        }

        var $popup = $('.' + dataPopup);

        if (dataPopup == 'choose-game-popup') {

            var image = $(this).closest('.game-item').attr('data-bg');
            var game_id = $(this).data('game_id');
            var game_provider = $(this).data('game_provider');

            if (image) {
                $popup.find('.choose-game-popup-image').attr('style', 'background-image:url("' + image + '")');
            } else {
                $popup.find('.choose-game-popup-image').attr('style', '');
            }

            $popup.find('.jq_real').data('id', game_id);
            $popup.find('.jq_real').data('mode', 'real');
            $popup.find('.jq_real').data('provider', game_provider);

            $popup.find('.jq_fun').data('id', game_id);
            $popup.find('.jq_fun').data('mode', 'fun');
            $popup.find('.jq_fun').data('provider', game_provider);

            $popup.find('.jq_real').attr('href', '/game/' + game_provider + '/' + game_id + '/real');
            $popup.find('.jq_fun').attr('href', '/game/' + game_provider + '/' + game_id + '/fun');
        }

        $html.addClass('opened-popup');
        $popup.removeClass('hidden').addClass('visible');
    });

    $(document).on('click', '.js-close-popup', function(e){
        e.preventDefault();
        $html.removeClass('opened-popup');
        $('#popup').find('.visible').removeClass('visible').addClass('hidden');

        if($(this).parents('.assistance-popup')){
            setTimeout(function() {
                $('.assistance-popup .assistance-child, .assistance-popup .back-link').hide();
                $('.assistance-popup .main-box').show();
            }, 200);
        }
    });

    /*BINGO*/
    if ($html.hasClass('bingo-page')) {
        setTimeout(function get_bingo() {
            update_bingo_list();
            setTimeout(get_bingo, 1000);
        }, 1000);
    }

    function update_bingo_list() {

        var bingo_time_to_ajax = $('#ajax_time').val();

        $('#ajax_time').val(parseInt(bingo_time_to_ajax) + 1);

        if (bingo_time_to_ajax == 15) {

            $('#ajax_time').val(1);

            $.ajax({
                success: function (data) {
                    if (data.length != 0) {
                        for (var k = 0; k < data.length; k++) {
                            var bId = data[k].bingo.source.id,
                                gameinfo = data[k].bingo.gameinfo,
                                $game = $('#game-' + bId);

                            var $numpl = $game.find('.b_numsessionplayers');
                            $numpl.html(num_case(gameinfo.numsessionplayers, $numpl.data('one'), $numpl.data('few'), $numpl.data('many')));
                            $game.find('.time').data('bingo_time', gameinfo.timeleft);
                            $game.find('.b_pot').text(parseFloat(data[k].pots.jackpot).toFixed(2));
                            $game.find('.b_cardprice').text(gameinfo.cardprice);
                            $game.find('.b_jackpots').text(gameinfo.jackpots);
                        }
                    }
                },
                type: 'POST',
                url: '/bingo-list',
                dataType: 'json'
            });
        }

        $('.jq_countdown').each(function () {
            var count = $(this).data('bingo_time');
            var new_count = count - 1;
            if (new_count > 0) {
                $(this).data('bingo_time', new_count);

                var minutes = Math.floor(new_count % 3600 / 60);
                if (minutes <= 9) {
                    minutes = '0' + minutes;
                }
                var seconds = Math.floor(new_count % 3600 % 60);
                if (seconds <= 9) {
                    seconds = '0' + seconds;
                }

                $(this).text(minutes + ":" + seconds);
            } else {
                $(this).data('bingo_time', 0);
                $(this).text('00:00');
            }
        });
    }

    function num_case(num, one, few, many, tpl) {
        tpl = tpl || '<strong>{num}</strong> {text}';
        var num2 = num;
        var text = '';
        if (num2 > 100) {
            num2 = num2 % 100;
        }
        if (num2 >= 5 && num2 <= 20) {
            text = many;
        } else if (num2 > 20 || num2 < 5) {
            var ost = num2 % 10;
            if (ost == 1) {
                text = one;
            } else if (ost > 1 && ost < 5) {
                text = few;
            } else {
                text = many;
            }
        }
        return tpl.replace('{num}', num).replace('{text}', text);
    }
    /*End BINGO*/

    /*Private office popup*/
    if($('.private-office-tabs').length){
        $('.private-office-tabs').easyResponsiveTabs({
            type: 'default',
            width: 'auto',
            fit: true,
            tabidentify: 'tabs',
            activate: function() {
                var plchldr = $('.tab.resp-tab-content-active').find('.iframe-placeholder');
                if (plchldr.length) {
                    var src = plchldr.data('iframe');
                    plchldr.replaceWith('<iframe src="' + src + '" width="100%" frameborder="0" class="js-iframe"></iframe>');
                    $('.tab.resp-tab-content-active .js-iframe').each(function () {
                        $(this).iFrameResize([{
                            enablePublicMethods: true,
                            heightCalculationMethod: 'lowestElement'
                        }]);
                    });
                }
            }
        });

        var dataBox = $('.office-nav .nav-item.active').attr('data-box');
        $(".office-items ." + dataBox).show();
    }

    if ($('.deposit-tabs').length) {
        $('.deposit-tabs').easyResponsiveTabs({
            type: 'default',
            width: 'auto',
            fit: true,
            tabidentify: 'tabs2'
        });
    }

    $('.office-nav .nav-item').on('click', function(e){
        e.preventDefault();

        if(!$(this).hasClass('active')){
            $('.office-nav .nav-item').removeClass('active');
            $(this).addClass('active');
            var dataBox = $(this).attr('data-box');
            $('.office-items .office-item').hide();
            $(".office-items ." + dataBox).fadeIn(150);
        }
    });

    $('.js-leave-popup:not(.js-not-leave-popup)').on('click', function(e){
        e.preventDefault();
        $('.js-close-popup').trigger('click');
    });


    $('.private-office-popup .nav-item, .private-office-popup .tab-btn, .private-office-popup .resp-accordion').on('click', function(){
        var resizeEvent = new Event('resize');
        window.dispatchEvent(resizeEvent);
    });

    /*Simple popup*/

    /*Fake submit*/
    $('.recover-password .form button').on('click', function(){
        $(this).parents('.recover-password').children('.max-w').hide();
        $(this).parents('.recover-password').find('.submit-ok-box').show();
    });

    /*Assistance popup*/
    $('.assistance-items a[data-child]').on('click', function(e){
        e.preventDefault();

        $('#popup > .container').scrollTop(0);

        var dataChild = $(this).attr('data-child');
        $('.assistance-popup .main-box').hide();
        $("." + dataChild).show();
        $('.assistance-popup .back-link').show();
    });

    $('.assistance-popup .back-link').on('click', function(e){
        e.preventDefault();
        $('.assistance-popup .assistance-child').hide();
        $('.assistance-popup .main-box').show();
        $(this).hide();
    });

    /*Registration popup*/
    $('.js-further-step').on('click', function(e){
        e.preventDefault();

        $(this).parents('.child').addClass('hidden');

        var dataStep = $(this).attr('data-step');
        $("." + dataStep).removeClass('hidden');

        $('#popup > .container').scrollTop(0);
    });


    $('.js-to-step').on('click', function(e){
        e.preventDefault();

        $(this).parents('.step').addClass('hidden');

        var dataStep = $(this).attr('data-step');
        $("." + dataStep).removeClass('hidden');

        $('#popup > .container').scrollTop(0);
    });

    $("#quick-input-birthDate").dateDropdowns({
        wrapperClass: 'calendar-box',
        submitFieldName: 'birthDate',
        dayLabel: 'День',
        monthLabel: 'Месяц',
        yearLabel: 'Год',
        monthLongValues: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
        daySuffixes: false,
        monthSuffixes: false
    });

    $("#input-birthDate").dateDropdowns({
        wrapperClass: 'calendar-box',
        submitFieldName: 'birthDate',
        dayLabel: 'День',
        monthLabel: 'Месяц',
        yearLabel: 'Год',
        monthLongValues: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
        daySuffixes: false,
        monthSuffixes: false
    });

    $("#calendar3").dateDropdowns({
        wrapperClass: 'calendar-box',
        submitFieldName: 'birthDate',
        dayLabel: 'День',
        monthLabel: 'Месяц',
        yearLabel: 'Год',
        monthLongValues: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
        daySuffixes: false,
        monthSuffixes: false
    });

    $('.calendar-select').select2({
        minimumResultsForSearch: Infinity
    });


    /*Control box*/
    $('.choose-list a').on('click', function (e) {
        e.preventDefault();
        if ($(this).parents('li').hasClass('inactive') || $(this).parents('li').hasClass('disabled')) {
            return;
        }
        if (!$(this).parents('li').hasClass('active')) {
            $('.choose-list li').removeClass('active');
            $(this).parents('li').addClass('active');
            $(this).parents('.control-box').find('.btn').removeClass('disabled');
        }
        else {
            $(this).parents('li').removeClass('active');
            $(this).parents('.control-box').find('.btn:not(.sel-provider)').addClass('disabled');
        }
        if ($(this).closest('.provider_list').length) {
            var route_new_url = $('#sort_url').val();

            $('.jq_search_input').val('');

            var tag = $('#games-filter-box').find('.js-filter-games.active:first').data('tag') || '';
            var provider = $(this).closest('.provider_list').find('li.active:first').data('provider') || '';

            $.get(route_new_url, {tag: tag, provider: provider}, function (data) {
                $('.jq_casino_content').html(data);
            }, 'html');
        }
    });

    $('.js-confirm:not(.sel-lang):not(.sel-provider)').on('click', function (e) {
        if (!$('.choose-list').find('.active').length) {
            e.preventDefault();
        }
    });

    // Select language
    $('.js-confirm.sel-lang').on('click', function (e) {
        e.preventDefault();
        if ($('.choose-list').find('.active').length) {
            $.ajax({
                data: {
                    set_lang: $('.choose-list').find('.active').data('code')
                },
                success: function () {
                    window.location.reload(true);
                    //$(this).closest(".col-right-func-select-options-wrapper").slideToggle(400);
                },
                type: 'POST',
                async: false,
                url: '/set-language',
                dataType: 'json'
            });
        }
    });

    $('.provider-popup .js-confirm').on('click', function(e){
        e.preventDefault();
        if(!$(this).hasClass('disabled')){
            $('.js-close-popup').trigger('click');
        }
    });


    $('#popup .container').on('click', function(e){
        if($(e.target).is("#popup .container")){
            $('.js-close-popup').trigger('click');
        }
    });


    /*Page overlay*/
    $('#page-overlay').on('click', function(){
        if($html.hasClass('opened-nav') && !$html.hasClass('game-single-page')){
            $html.removeClass('opened-nav');
        }
    });


    /*Add to device screen*/
    $('#js-add-to-device-screen').on('click', function(){
        $('#to-device-screen-popup').addClass('visible');
    });
    $('#to-device-screen-popup .js-close').on('click', function(){
        $('#to-device-screen-popup, #js-add-to-device-screen').fadeOut(150);
    });


    /*Keyboard controls*/
    $(document).on('keyup', function(e){
        if(e.keyCode === 27 && $html.hasClass('opened-popup')){
            $('#page-overlay, .js-close-popup').trigger('click');
        }
        if(e.keyCode === 27 && !$html.hasClass('game-single-page') && !$html.hasClass('opened-popup')){
            $('.js-close-game').trigger('click');
            if($html.hasClass('opened-games-search')){
                $html.removeClass('opened-games-search');
            }
        }
    });

    /*Document ready*/
    $(function(){


    });

    /*Window load*/
    $(window).on('load', function(){
        $.ready.then(function(){
            $html.addClass('page-load');

            if(window.location.hash){

                var id = '#' + window.location.hash.split('#')[1];
                var count = 40;
                if(windowWidth <= 780){
                    count = 22
                }

                if ($(id).length) {

                    if ($(id).closest('.accordion').length) {
                        if ($(id).hasClass('item') && !$(id).hasClass('active')) {
                            $(id).closest('.accordion').find('.item').removeClass('active').find('.text').hide();
                            $(id).addClass('active').find('.text').show();
                        } else if (!$(id).closest('.item').hasClass('active')) {
                            $(id).closest('.accordion').find('.item').removeClass('active').find('.text').hide();
                            $(id).closest('.item').addClass('active').find('.text').show();
                        }
                    }

                    var scrollToPosition = $(id).offset().top;

                    $('html, body').animate({
                        scrollTop: scrollToPosition - count
                    }, 300);
                }
            }

            if($('.games-filter').length) {
                gamesFilterSlider.update();
            }
        });
    });


    /*Tain iframe*/
    if($('.js-iframe').length){
        $('.js-iframe').each(function(){
            $(this).iFrameResize([{
                enablePublicMethods     : true,
                heightCalculationMethod : 'lowestElement'
            }] );
        });
    }



    var resizeEnd;
    $(window).on('resize', function(){
        windowWidth = Math.max($(window).width(), window.innerWidth);


        waitForFinalEvent(function(){
            if($('#nav').length){
                navPosition();
            }
            if($('#main-screen').length){
                mainScreenPosition();
            }
        }, 100);

        clearTimeout(resizeEnd);
        resizeEnd = setTimeout(function(){
            if($('.games-filter').length) {
                gamesFilterSlider.update();
            }
        }, 500);
    });

    $(window).on('orientationchange', function(){
        windowWidth = Math.max($(window).width(), window.innerWidth);


        waitForFinalEvent(function(){
            if($('#nav').length){
                navPosition();
            }
            if($('#main-screen').length){
                mainScreenPosition();
            }
            if($('.games-filter').length) {
                gamesFilterSlider.update();
            }
        }, 450);
    });

    $(window).on('scroll', function(){

        if($('#header').length){
            stickyHeader();
        }

        if($('.games-filter').length){
            stickyFilterHeader();
        }

        clearTimeout(resizeEnd);
        resizeEnd = setTimeout(function(){

        }, 150);
    });

})(jQuery);
