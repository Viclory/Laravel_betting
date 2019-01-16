
<!DOCTYPE html>
<html lang="{{ \App::getLocale() }}" class="has-top-character  >
<head>
    <meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="format-detection" content="telephone=no" />
<title>Casino | Казино</title>
<link rel="stylesheet" href="css/style.css" />
<script src="js/pace.min.js"></script>
</head>
<body>


<div id="all">

    @include('partials.header', ['active' => 'casino-live'])

    <div id="page-bg">

        <div id="top-character-bg">
            <div class="container">
                <img src="{{ asset('/img/top-character-casino-live.png') }}" class="character" alt="" />

                @include('partials.we-give')
            </div>
        </div>

        <main id="main">
            @include('partials.games-filter-box', ['active' => 'casino-live'])

            <div class="container">
                <!-- POPULAR GAMES -->
                <div class="games-list popular-games-items">
                    <header class="header popular-games-section">
                        <span class="type">{{ __('games.popular_games') }}</span>
                        <span class="count-text">
                            <span class="text">{{ __('games.found_games') }} /</span>
                            <span class="count"></span>
                        </span>
                    </header>
                </div>

                <!-- NEW GAMES -->
                <div class="games-list new-games-items">
                    <header class="header new-games-section">
                        <span class="type">{{ __('games.new_games') }}</span>
                        <span class="count-text">
                            <span class="text">{{ __('games.found_games') }} /</span>
                            <span class="count"></span>
                        </span>
                    </header>
                </div>

                <!-- ALL GAMES -->
                <div class="games-list all-games-items">
                    <header class="header all-games-section">
                        <span class="type">{{ __('games.all_games') }}</span>
                        <span class="count-text">
                            <span class="text">{{ __('games.found_games') }} /</span>
                            <span class="count"></span>
                        </span>
                    </header>
                </div>

                <!-- SLOTS GAMES -->
                <div class="games-list slots-games-items hidden">
                    <header class="header slots-games-section">
                        <span class="type">{{ __('games.slots') }}</span>
                        <span class="count-text">
                            <span class="text">{{ __('games.slots') }} /</span>
                            <span class="count"></span>
                        </span>
                    </header>
                </div>

                <!-- JACKPOT GAMES -->
                <div class="games-list jackpot-games-items hidden">
                    <header class="header jackbot-games-section">
                        <span class="type">{{ __('games.jackpot') }}</span>
                        <span class="count-text">
                            <span class="text">{{ __('games.jackpot') }} /</span>
                            <span class="count"></span>
                        </span>
                    </header>
                </div>

                <!-- TABLE GAMES -->
                <div class="games-list jackpot-games-items hidden">
                    <header class="header table-games-section">
                        <span class="type">{{ __('games.table') }}</span>
                        <span class="count-text">
                            <span class="text">{{ __('games.table') }} /</span>
                            <span class="count"></span>
                        </span>
                    </header>
                </div>

                <!-- VIDEO-POKER GAMES -->
                <div class="games-list jackpot-games-items hidden">
                    <header class="header videopoker-games-section">
                        <span class="type">{{ __('games.video_poker') }}</span>
                        <span class="count-text">
                            <span class="text">{{ __('games.table') }} /</span>
                            <span class="count"></span>
                        </span>
                    </header>
                </div>

                <!-- SEARCH GAMES -->
                <div class="games-list search-games-items hidden">
                    <header class="header search-games-section">
                        <span class="type">{{ __('games.search_games_results') }}</span>
                        <span class="count-text">
                            <span class="text">{{ __('games.found_games') }} /</span>
                            <span class="count"></span>
                        </span>
                    </header>
                </div>

                <div class="ajax-upload-box">
                    <a href="pages\more-games.html" class="js-load-more btn">{{ __('games.load_more') }}</a>

                    <p class="message" data-text="Все игры загружены">{{ __('games.all_games_are_loaded') }}</p>
                </div>
            </div>
        </main>



        <div id="top-page-bg" class="responsimg" data-responsimg780="{{ asset('/img/top-page-casino-live-bg.png') }}" data-responsimg10="{{ asset('/img/top-page-casino-live-bg-mobile.png') }}"></div>
        <div id="bottom-page-bg" class="responsimg" data-responsimg780="{{ asset('/img/bottom-page-bg.png') }}" data-responsimg10="{{ asset('/img/bottom-page-bg-mobile.png') }}"></div>

        <div id="game-all">
            <div id="game-box">
                <div class="align-m">
                    <div class="container">
                        <div id="game-iframe-box">
                            <div class="sub-box">
                                <img src="{{ asset('/img/game-iframe-proportion.png') }}" alt="">
                                <iframe id="game-frame" src="#" data-ratio="16/9"></iframe>
                            </div>
                            <div class="controls">
                                <div class="control-btn js-full-screen">
                                    <div class="pretty-hint">
                                        <div class="align-m">
                                            <p>{{ __('common.fullscreen_mode') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <span class="control-btn js-game-nav"></span>
                                <span class="control-btn js-game-like"></span>
                            </div>
                            <svg class="loader" width="70px" height="70px" viewbox="0 0 128 128"><g><circle cx="16" cy="64" r="16" fill="#f3d862" fill-opacity="1"></circle><circle cx="16" cy="64" r="14.344" fill="#f3d862" fill-opacity="1" transform="rotate(45 64 64)"></circle><circle cx="16" cy="64" r="12.531" fill="#f3d862" fill-opacity="1" transform="rotate(90 64 64)"></circle><circle cx="16" cy="64" r="10.75" fill="#f3d862" fill-opacity="1" transform="rotate(135 64 64)"></circle><circle cx="16" cy="64" r="10.063" fill="#f3d862" fill-opacity="1" transform="rotate(180 64 64)"></circle><circle cx="16" cy="64" r="8.063" fill="#f3d862" fill-opacity="1" transform="rotate(225 64 64)"></circle><circle cx="16" cy="64" r="6.438" fill="#f3d862" fill-opacity="1" transform="rotate(270 64 64)"></circle><circle cx="16" cy="64" r="5.375" fill="#f3d862" fill-opacity="1" transform="rotate(315 64 64)"></circle><animatetransform attributename="transform" type="rotate" values="45 64 64;90 64 64;135 64 64;180 64 64;225 64 64;270 64 64;315 64 64;0 64 64" calcmode="discrete" dur="720ms" repeatcount="indefinite"></animatetransform></g></svg>
                            <div class="game-bg2-left game-bg"></div>
                            <div class="game-bg2-right game-bg"></div>
                        </div>
                    </div>
                    <div class="message-box">
                        <div class="game-message">
                            <p>Вы находитесь в режиме игры. Используйте навигацию вверху, чтобы переключаться между параметрами: <img src="i\message-icon1.png" alt=""><img src="i\message-icon2.png" alt=""></p>
                            <span class="js-close-message" title="Закрыть"></span>
                        </div>
                        <div class="game-message">
                            <p> Вы находитесь в гостевом режиме. <a href="" data-popup="authorization" class="js-open-popup">Войдите</a> или <a href="" data-popup="registration-popup" class="js-open-popup">зарегистрируйтесь</a>, чтобы играть по-настоящему.</p>
                            <span class="js-close-message" title="Закрыть"></span>
                        </div>
                    </div>
                    <div class="close-box">
                        <span class="js-close-game" title="Закрыть"></span>
                    </div>
                    <div class="game-bg3-left game-bg"></div>
                    <div class="game-bg3-right game-bg"></div>
                    <div class="game-bg4-left game-bg"></div>
                    <div class="game-bg4-right game-bg"></div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
</div>

<div id="page-overlay"></div>

@include('partials.page-preloader')

<div id="popup">
    <div class="container">
        @include('partials.provider-popup')

        @if(!Auth::user())
            @include('partials.recover-password-popup')
            @include('partials.login-popup')
        @endif


        <div class="simple-popup payment-order hidden">
            <p class="h2" data-text="Депозит с neteller">Депозит с neteller</p>
            <div class="max-w">
                <p class="large">Min deposit amount: 1.16 USD<br /> Max deposit amount: 116.50 USD<br /> Remaining deposit amount: 116.50 USD</p>
                <form action="#" class="form">
                    <div class="field">
                        <input type="text" class="form-control" placeholder="Amount" />
                        <button type="button" class="btn sub-color field-btn">USD</button>
                    </div>
                    <button type="button" class="btn full-width">продолжить</button>
                </form>
            </div>
            <span class="js-close-popup" title="Закрыть"></span>
        </div>
        <div class="simple-popup top-up-balance hidden">
            <p class="h2" data-text="Пополнить баланс">Пополнить баланс</p>
            <div class="max-w">
                <form action="#" class="form">
                    <div class="field">
                        <select name="sel1" id="sel1" class="img-select">
                            <option value="NETELLER" data-img="uploads/select-img1.png">NETELLER</option>
                            <option value="NETELLER 2" data-img="uploads/select-img2.png">NETELLER 2</option>
                            <option value="NETELLER 3" data-img="uploads/select-img3.png">NETELLER 3</option>
                            <option value="NETELLER 4" data-img="uploads/select-img4.png">NETELLER 4</option>
                        </select>
                    </div>
                    <div class="field">
                        <input type="text" class="form-control" placeholder="Введите промокод" />
                        <p><a href="">Условия и правила</a></p>
                    </div>
                    <button type="button" class="btn full-width">выбрать</button>
                </form>
            </div>
            <span class="js-close-popup" title="Закрыть"></span>
        </div>

        <div class="choose-game-popup hidden">
            <img src="uploads\choose-game-popup-img.jpg" alt="">
            <div class="btns-box">
                <a href="" class="btn js-open-popup" data-popup="authorization">на деньги</a>
                <a href="" class="btn sub-color js-open-game" data-src="" data-game-bg="static-bg">попробуй</a>
            </div>
            <span class="js-close-popup" title="Закрыть"></span>
        </div>

        @if(!\Auth::user())
        @include('partials.registration-popup')
        @endif

        @include('partials.assistance-popup')
    </div>
</div>

@include('partials.included_scripts')

</body>
</html>
