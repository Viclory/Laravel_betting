(function ($) {

    var $html = $('html'), isTouch = $html.hasClass('touchevents');
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
    function jsClock(){
        setInterval(function() {
            var date = new Date();
            var hours = date.getHours();
            var minutes = date.getMinutes();
            if (minutes < 10){
                minutes = '0' + minutes;
            }
            $('.js-clock').html(
                hours + ":" + minutes
            );
        }, 1000);
    }

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



    /*Main screen*/
    $('#main-screen .js-anchor').click(function(){
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
    $('.accordion .title').click(function(){
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
            setTimeout(function(){
                gamesFilterSlider.update();
            }, 200);
        }
    });

    $('.games-filter .js-filter-games').click(function(e){
        e.preventDefault();
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

    /*Game box*/
    var gameActions = function(){
        var scrollTopTouch;
        $('.js-open-game').click(function(e){
            e.stopPropagation();
            e.preventDefault();

            if($html.hasClass('touchevents')){
                scrollTopTouch = $(window).scrollTop();
            }

            $html.addClass('opened-game game-page');
            $('#header').removeClass('sticky');

            var gameBoxBg = $(this).attr('data-game-bg');
            var gameIframeSrc = $(this).attr('data-src');


            $('#game-box').addClass(gameBoxBg);
            $('#game-frame').attr('src', gameIframeSrc);

            /*Init*/
            if($('.js-clock').length){
                jsClock();
            }

            $('.js-close-popup').trigger('click');
        });

        $('.js-close-game').click(function(){
            $html.removeClass('opened-game game-page scroll-top');
            $('#game-box').attr('class', '');
            $('#game-frame').attr('src', '');
            var scrollTop = $(window).scrollTop();
            if($html.hasClass('no-touchevents')){
                $('html, body').scrollTop(scrollTop - 1);
            }
            else{
                $('html, body').scrollTop(scrollTopTouch - 1);
            }


            if($('#game-iframe-box .js-full-screen').hasClass('active')){
                toggleFullScreen(document.body);
            }

        });
    }
    gameActions();


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


    $('#game-iframe-box .js-full-screen').click(function(){
        toggleFullScreen(document.body);
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
        if(loading){
            alert('Please wait');
        }
        else{
            var url = $(this).attr('href');
            moreGames(url, true);
            ajaxUploadBox = $(this).parents('.ajax-upload-box');
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

    /*Popup*/
    $('.js-open-popup:not(.game-link)').click(function(e){
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

    $('.game-link.js-open-popup').click(function(e){
        e.preventDefault();
        $('#popup').find('.visible').removeClass('visible').addClass('hidden');
        var dataPopup;
        if($html.hasClass('no-touchevents')){
            dataPopup = $(this).attr('data-popup');
        }
        else{
            dataPopup = $(this).attr('data-touch-popup');
            var btnGameSrc = $(this).find('.js-open-game').attr('data-src');
            $('.choose-game-popup .js-open-game').attr('data-src', btnGameSrc);
        }
        $html.addClass('opened-popup');
        $("." + dataPopup).removeClass('hidden').addClass('visible');
    });

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
    $('.recover-password .form button').click(function(e){
        $(this).parents('.recover-password').children('.max-w').hide();
        $(this).parents('.recover-password').find('.submit-ok-box').show();
    });

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
        if (dataStep == 'registration-complete') {

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
        if(!$(this).hasClass('disabled')){
            $('.js-close-popup').trigger('click');
        }
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
        initFormValidation('registration', $('#quick_registration'));
        initFormValidation('login_form', $('#login_form'));
    });

    /*Window load*/
    $(window).on('load', function(){
        $.ready.then(function(){
            $html.addClass('page-load');

            if(window.location.hash){
                var count = 40;
                if(windowWidth <= 780){
                    count = 22
                }
                setTimeout(function() {
                    $('html, body').scrollTop(0);
                    $('html, body').animate({
                        scrollTop: $(window.location.hash).offset().top - count
                    }, 500)
                }, 0);
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