(function ($) {

    var $html = $('html'), isTouch = $html.hasClass('touchevents');
    var $body = $('body');
    var windowWidth = Math.max($(window).width(), window.innerWidth);

    // $('.games-list').hide();


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
    var mac = navigator.platform.match(/(Mac|iPhone|iPod|iPad)/i) ? true : false;

    if(mac){
        $html.addClass('ios');
    }

    /*Ios fix zoom on form elems focus*/
    function cancelZoom() {
        var d = document,
            viewport,
            content,
            maxScale = ',maximum-scale=',
            maxScaleRegex = /,*maximum\-scale\=\d*\.*\d*/;

        // this should be a focusable DOM Element
        if (!this.addEventListener || !d.querySelector) {
            return;
        }

        viewport = d.querySelector('meta[name="viewport"]');
        content = viewport.content;

        function changeViewport(event) {
            viewport.content = content + (event.type == 'blur' ? (content.match(maxScaleRegex, '') ? '' : maxScale + 10) : maxScale + 1);
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
        var $state = $('<div class="sub-box">' + '<div class="value">' + item.text + '</div>' + '<div class="img"><img src='+$(item.element).data('img')+' /></div>' + '</div>');
        return $state;
    };


    if($('.form .field').length){
        var zIndex = 10
        $('.form .field').each(function(){
            $(this).css('zIndex', zIndex);
            zIndex++;
        });
    }

    /*Header*/
    $('.touchevents #langs-box .current-lang').click(function(e){
        e.stopPropagation();
        if(!$(this).parents('#langs-box').hasClass('opened')){
            $(this).parents('#langs-box').addClass('opened');
        }
        else{
            $(this).parents('#langs-box').removeClass('opened');
        }
    });
    $('.touchevents #langs-box .dropdown').click(function(e){
        e.stopPropagation();
    });

    $('.touchevents #all').click(function(){
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
    // function jsClock(){
    //     if($('.js-clock').length){
    //         $('.js-clock').each(function () {
    //             var $el = $(this);
    //             if (!$el.hasClass('clock-started')) {
    //                 $el.addClass('clock-started');
    //                 setInterval(function() {
    //                     var date = new Date();
    //                     var hours = date.getHours();
    //                     var minutes = date.getMinutes();
    //                     if (minutes < 10){
    //                         minutes = '0' + minutes;
    //                     }
    //                     $el.html(hours + ":" + minutes);
    //                 }, 1000);
    //             }
    //         });
    //     }
    // }
    // jsClock();

    /*Nav*/
    $('#js-open-nav').click(function(e){
        e.stopPropagation();
        if(!$html.hasClass('opened-nav')){
            $html.addClass('opened-nav');
        }
    });

    $('#js-close-nav').click(function(e){
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
    $('.no-touchevents .we-give .btn').mouseenter(function(){
        $(this).parents('.we-give').removeClass('on-hover');
        $(this).parents('.we-give').addClass('on-hover');
        setTimeout(function(){
            $('.we-give').removeClass('on-hover');
        }, 1200);
    });

    /*Games filter*/
    $('.js-open-search').click(function(){
        if(!$html.hasClass('opened-games-search')){
            $html.addClass('opened-games-search');
        }
        else{
            $html.removeClass('opened-games-search');
        }
        setTimeout(function(){
            gamesFilterSlider.update();
        }, 200);
    });

    $('.games-search-box').click(function(e){
        e.stopPropagation();
    });

    $('#all').click(function(){
        if($html.hasClass('opened-games-search')){
            $html.removeClass('opened-games-search');
            emptySearch();
            setTimeout(function(){
                gamesFilterSlider.update();
            }, 200);
        }
    });

    $('.games-filter .js-filter-games').click(function(e){
        // loader(true);
        remove_empty_sections = true;
        e.preventDefault();
        if (selected_vendor != null) {
            $('.provider-popup ul.choose-list li.active').removeClass('active');
            selected_vendor = null;
        }
        if ($('input[name="games-search-box"]').val().length > 0) {
            $('input[name="games-search-box"]').val('');
            search($('input[name="games-search-box"]'));
        }
        if($html.hasClass('opened-games-search')){
            $html.removeClass('opened-games-search');
        }
        setTimeout(function(){
            gamesFilterSlider.update();
        }, 200);

        if(!$(this).hasClass('active')){
            $('.games-filter .js-filter-games').removeClass('active');
            $(this).addClass('active');
        }
        else{
            $(this).removeClass('active');
        }

        selected_games_type = $(this).attr('data-game-type');

        // console.log(selected_games_type);

        if (selected_games_type != 'last') {

            params = collectParams();

            clearGames();

            getPopularGames(params);
            getNewGames(params);
            getAllGames(params);
        } else {
            clearGames();
            getLastGames();
        }
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

        $("#games-filter-box .header").stick_in_parent().on("sticky_kit:stick", function(e){
            setTimeout(function(){
                gamesFilterSlider.update();
            }, 200);
        }).on("sticky_kit:unstick", function(e){
            setTimeout(function(){
                gamesFilterSlider.update();
            }, 200);
        });
    }


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

    // $(document).on('click', '.js-open-game', function(e){
    //     e.stopPropagation();
    //     e.preventDefault();
    //     console.log('xxxxxxxxxxxxxxxxx');
    //
    //     var $link = $(this).parents('a');
    //
    //     var provider = $link.data('provider');
    //     var id = $link.data('id');
    //     var mode = $link.data('mode');
    //
    //
    //     if ($('#user_agent').val() == 'mobile') {
    //         var mobile_launch_url = $(data).find('#game-frame').attr('src');
    //         window.location = mobile_launch_url + '&mobileLobbyUrl=' + window.location.origin + window.location.pathname;
    //         return false;
    //     }
    //
    //     // $('#game-all').html(data);
    //
    //     if($('html').hasClass('touchevents')){
    //         scrollTopTouch = $(window).scrollTop();
    //     }
    //
    //     $('html').addClass('opened-game game-page');
    //     $('#header').removeClass('sticky');
    //
    //     var gameBoxBg = $(this).attr('data-game-bg');
    //     var gameIframeSrc = $(this).attr('data-src');
    //
    //     $('#game-box').addClass(gameBoxBg);
    //     $('#game-frame').attr('src', gameIframeSrc);
    //
    //     gameLaunchWidth = $('html').find('#game-frame').attr('data-launch-width');
    //     gameLaunchHeight = $('html').find('#game-frame').attr('data-launch-height');
    //     gameProportion = gameLaunchWidth / gameLaunchHeight;
    //     windowGameHeight = $(window).height() - 160;
    //
    //     $('#game-iframe-box .sub-box').css({width:windowGameHeight * gameProportion, height: windowGameHeight});
    //
    //     /*Init*/
    //     jsClock();
    //
    //     $('.js-close-popup').trigger('click');
    //
    //     var msg_key = 'msg-' + (new Date().getTime());
    //
    //     $('.game-message.msg1').addClass(msg_key);
    //     setTimeout(function () {
    //         $('.game-message.msg1.' + msg_key).fadeIn(200);
    //     }, 5000);
    //
    //     $('.game-message.msg2').addClass(msg_key);
    //     setTimeout(function () {
    //         $('.game-message.msg2.' + msg_key).fadeIn(200);
    //     }, 40000);
    // });

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




    $('#game-iframe-box .js-full-screen').click(function(){
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

    $('.js-game-like').click(function(){
        if(!$(this).hasClass('active')){
            $(this).addClass('active');
        }
        else{
            $(this).removeClass('active');
        }
    });


    $('.message-box .js-close-message').click(function(){
        $(this).parents('.game-message').fadeOut(200);
    });

    $('.js-game-nav').click(function(){
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
        loader(true);
        if(loading){
            alert('Please wait');
        }
        else{
            // /var url = $(this).attr('href');
            // moreGames(url, true);
            // ajaxUploadBox = $(this).parents('.ajax-upload-box');

            // var type = $(this).parents('.games-section').attr('data-games-type');
            var exclude = [];
            var games_category = '';

            $('.games-list:visible').each(function(){
                if ($(this).hasClass('popular-games-items')) {
                    games_category = 'popular';
                } else if($(this).hasClass('new-games-items')) {
                    games_category = 'new';
                } else if($(this).hasClass('all-games-items')) {
                    games_category = 'all';
                } else if($(this).hasClass('vendor-games-items')) {
                    games_category = 'vendor';
                }
                exclude[games_category] = [];

                $(this).find('.game-item').each(function(){
                    exclude[games_category].push($(this).find('a').attr('data-game-id'));
                });

            });

            for (var i in exclude)
            {
                var tmp = exclude[i];
                exclude[i] = tmp.join(',');
            }

            var params = {
                exclude_popular: exclude["popular"],
                exclude_new: exclude["new"],
                exclude_all: exclude["all"],
                exclude_vendor: exclude["vendor"],
                casino_type: casino_type,
                limit: load_more_limit,
                game_type: $('.games-filter a.active').attr('data-game-type'),
                merchant_id: merchant_id,
                request_total_count: true
            };

            if (selected_vendor != null) {
                $.extend(params, {vendor: selected_vendor});
            }

            console.log('selectedvendor:' + selected_vendor);

            if (selected_vendor != null) {

                $.extend(params, {type: 'vendor', append: true});
                applyFilters(params);

                // placeGames(games,'vendor', true);
            } else {
                $.extend(params, {type: games_category, append: true});
                applyFilters(params);
                // placeGames(games,games_category, true);
            }

            return false;
        }
    });

    function moreGames(url) {
        current_url = url;
        $.ajax({
            url: url,
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
                    newHref = $data.find('.js-load-more').attr('href');
                    ajaxUploadBox.find('.js-load-more').attr('href', newHref);
                }
                else{
                    ajaxUploadBox.addClass('finished').find('.js-load-more').hide();
                }

                /*Reinit*/
                gameActions();

                loading = false;
            },
            error: function () {
                loading = false;
                alert('Page not found!');
            }
        });
    }





    $('.js-close-popup').click(function(e){
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


    /*Private office popup*/
    if($('.private-office-tabs').length){
        $('.private-office-tabs').easyResponsiveTabs({
            type: 'default',
            width: 'auto',
            fit: true,
            tabidentify: 'tabs'
        });

        var dataBox = $('.office-nav .nav-item.active').attr('data-box');
        $(".office-items ." + dataBox).show();
    }

    $('.office-nav .nav-item').click(function(e){
        e.preventDefault();

        if(!$(this).hasClass('active')){
            $('.office-nav .nav-item').removeClass('active');
            $(this).addClass('active');
            var dataBox = $(this).attr('data-box');
            $('.office-items .office-item').hide();
            $(".office-items ." + dataBox).fadeIn(150);
        }
    });

    // $('.js-leave-popup').click(function(e){
    //     e.preventDefault();
    //     $('.js-close-popup').trigger('click');
    // });


    $('.private-office-popup .nav-item, .private-office-popup .tab-btn, .private-office-popup .resp-accordion').click(function(){
        var resizeEvent = new Event('resize');
        window.dispatchEvent(resizeEvent);
    });

    /*Simple popup*/

    /*Fake submit*/
    // $('.recover-password .form button').click(function(e){
        // e.preventDefault();
        // $(e.target).parents('form').trigger('submit');
        // return false;
        // $(this).parents('.recover-password').children('.max-w').hide();

        // recover password sent
        //$(this).parents('.recover-password').find('.submit-ok-box').show();
    // });

    /*Assistance popup*/
    $('.assistance-items a[data-child]').click(function(e){
        e.preventDefault();

        $('#popup > .container').scrollTop(0);

        var dataChild = $(this).attr('data-child');
        $('.assistance-popup .main-box').hide();
        $("." + dataChild).show();
        $('.assistance-popup .back-link').show();
    });

    $('.assistance-popup .back-link').click(function(e){
        e.preventDefault();
        $('.assistance-popup .assistance-child').hide();
        $('.assistance-popup .main-box').show();
        $(this).hide();
    });

    /*Registration popup*/
    $('.js-further-step').click(function(e){
        e.preventDefault();

        var dataStep = $(this).attr('data-step');
        if (dataStep == 'quick-registration-complete') {

            var reg_form = $(this).parents('form');
            clearErrors($(reg_form));
            // initFormValidation('registration', reg_form);

            if ($(reg_form).validate().form()) {
                $(reg_form).submit();
            }
            // console.log();
            // validateForm('registration', reg_form);

            // $(reg_form).validate();
            //$(reg_form).find('button[type="submit"]').trigger('click');
            //console.log($(reg_form));
            //$(reg_form).validate();

            // if (!validateForm('registration', reg_form)) {
            //     console.log('reg form is not valid');
            //     return false;
            // }
            //alert('validation');

            return false;

        } else if(dataStep == 'full-registration-complete') {

            if ($('form#full-registration-step1').validate().form() && $('form#full-registration-step2').validate().form()) {

                var form_step1 = $('form#full-registration-step1');
                var form_step2 = $('form#full-registration-step2');
                var registerObj = {
                    username: $(form_step1).find('input[name="login"]').val(),
                    name: $(form_step1).find('input[name="player_firstname"]').val() + ' ' + $(form_step1).find('input[name="player_lastname"]').val(),
                    gender: $(form_step1).find('[name="gender"]').val(),
                    email: $(form_step1).find('input[name="email"]').val(),
                    currency: $(form_step1).find('[name="currency"]').val(),
                    dob: $(form_step1).find('[name="calendar2_[year]"]').val() + '-' + $(form_step1).find('[name="calendar2_[month]"]').val() + '-' + $(form_step1).find('[name="calendar2_[day]"]').val(),

                    country_id: $(form_step2).find('[name="country"]').val(),
                    city: $(form_step2).find('[name="city"]').val(),
                    address: $(form_step2).find('[name="address"]').val(),
                    zip: $(form_step2).find('[name="zip"]').val(),
                    phone: $(form_step2).find('[name="phone"]').val(),
                    promocode: $(form_step2).find('[name="promocode"]').val(),
                    password: $(form_step2).find('[name="password"]').val(),
                    merchant_id: $(form_step1).find('input[name="merchant_id"]').val(),
                };

                $.post(
                    $('form#quick_registration').attr('action'),
                    registerObj,
                    function(result){
                        var res = $.parseJSON(result);
                        if (res.status > 0) {
                            top.location.href='/player/just-registered';
                        } else {
                            alert(res.message);
                        }
                    }
                );
            }
            return false;
        }

        $(this).parents('.child').addClass('hidden');

        $("." + dataStep).removeClass('hidden');

        $('#popup > .container').scrollTop(0);
    });

    $('#login_form button').on('click', function(){
        // alert('login');

        // var login_form = $(this).parents('form');
        // initFormValidation('login_form', login_form);

        if ($(login_form).validate().form()) {
            $(login_form).submit();
        }

    });


    $('.js-to-step').click(function(e){
        e.preventDefault();

        if (!$('#full-registration-step1').validate().form()) {
            return false;
        }

        $(this).parents('.step').addClass('hidden');

        var dataStep = $(this).attr('data-step');
        $("." + dataStep).removeClass('hidden');

        $('#popup > .container').scrollTop(0);
    });

    $("#calendar1").dateDropdowns({
        wrapperClass: 'calendar-box',
        submitFieldName: 'calendar1',
        dayLabel: 'День',
        monthLabel: 'Месяц',
        yearLabel: 'Год',
        monthLongValues: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
        daySuffixes: false,
        monthSuffixes: false
    });

    $("#calendar2").dateDropdowns({
        wrapperClass: 'calendar-box',
        submitFieldName: 'calendar2',
        dayLabel: 'День',
        monthLabel: 'Месяц',
        yearLabel: 'Год',
        monthLongValues: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
        daySuffixes: false,
        monthSuffixes: false
    });

    $("#calendar3").dateDropdowns({
        wrapperClass: 'calendar-box',
        submitFieldName: 'calendar2',
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
    $('.choose-list a').click(function(e){
        e.preventDefault();
        if(!$(this).parents('li').hasClass('active')){
            $('.choose-list li').removeClass('active');
            $(this).parents('li').addClass('active');
            $(this).parents('.control-box').find('.btn').removeClass('disabled');
        }
        else{
            $(this).parents('li').removeClass('active');
            $(this).parents('.control-box').find('.btn').addClass('disabled');
        }
    });

    $('.js-confirm').click(function(e){
        if(!$('.choose-list').find('.active').length){
            e.preventDefault();
        }
    });

    $('.provider-popup .js-confirm').click(function(e){
        e.preventDefault();
        // if(!$(this).hasClass('disabled')){
            $('.js-close-popup').trigger('click');
        // }
        selected_vendor = $(this).parents('.provider-popup').find('ul.choose-list li.active a').attr('data-vendor-id');

        params = collectParams();

        $.extend(params, {request_total_count: true});

        games = applyFilters(params);

        clearGames();

        placeGames(games, 'vendor');

        // getPopularGames(params);
        // getNewGames(params);
        // getAllGames(params);
    });


    $('#popup .container').click(function(e){
        if($(e.target).is("#popup .container")){
            $('.js-close-popup').trigger('click');
        }
    });


    /*Page overlay*/
    $('#page-overlay').click(function(){
        if($html.hasClass('opened-nav')){
            $html.removeClass('opened-nav');
        }
    });

    $('footer.footer a.select-lang').on('click', function(e){
        e.preventDefault();
        if (!$(this).hasClass('disabled')) {
            var selected_lang = $(this).parents('.select-language-popup').find('ul.choose-list li.active a').attr('data-text');
            $.cookie('locale', selected_lang);
            top.location.href = '/lang/' + selected_lang;
        }
    });


    /*Keyboard controls*/
    $(document).keyup(function(e){
        if(e.keyCode == 27){
            $('#page-overlay, .js-close-popup, .js-close-game').trigger('click');
            if($html.hasClass('opened-games-search')){
                $html.removeClass('opened-games-search');
            }
        }
    });



    /*Document ready*/
    $(function(){
        function checkPendingRequest() {
            if ($.active > 0) {
                window.setTimeout(checkPendingRequest, 1000);
                loader(true);
                //Mostrar peticiones pendientes ejemplo: $("#control").val("Peticiones pendientes" + $.active);
            } else {
                loader(false);
                // alert("No hay peticiones pendientes");
            }
        };

        window.setInterval(checkPendingRequest, 1000);
    });

    /*Window load*/
    $(window).on('load', function(){
        if ($.cookie('locale') == undefined) {
            // show languages popup
            // console.log($('.select-language-popup').length);
            //$('[data-popup="language-popup"]').trigger('click');
        }
        initFormValidation('registration', $('#quick_registration'));
        initFormValidation('login_form', $('#login_form'));
        initFormValidation('recover_password', $('#recover_password'));
        initFormValidation('full-registration-step1', $('#full-registration-step1'));
        initFormValidation('full-registration-step2', $('#full-registration-step2'));
        initFormValidation('chage_password', $('#change_password'));
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

    $(window).scroll(function(){

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

var waitForFinalEvent = (function () {
    var timer = 0;
    return function (callback, ms) {
        clearTimeout(timer);
        timer = setTimeout(callback, ms);
    };
})();

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

