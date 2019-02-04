<!DOCTYPE html>
<html lang="{{ \App::getLocale() }}" class="has-top-character casino-page">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <title>Casino | Казино</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <script>
        var casino_type = "{{ $casino_type }}";
        var merchant_id = "{{ env('MERCHANT_ID') }}";
        var overlay_text = "{{ __('games.play_for_free') }}";
    </script>
</head>
<body>
<div id="all">
    <header id="header">
        <div class="container">
            @include('partials.navigation', ['active' => 'casino'])
            <div class="js-clock"></div>
            <div class="controls">

                @if (Auth::user())
                    <?php $balanceObj = App\StaygamingBO::getBalanceByPlayerId(Auth::user()->player_id); ?>
                <a href="" data-popup="payment-order" class="icon-btn deposit js-open-popup">
                    <span class="icon"></span>
                    <span class="sum">{{ \floor($balanceObj->result->balance) }} <span class="currency">{{ $balanceObj->result->currency }}</span></span>
                </a>
                <a href="" data-popup="private-office-popup" class="icon-btn account js-open-popup">
                    <span class="icon"></span>
                </a>
                @else
                    <a href="#" data-popup="registration-popup" class="btn sub-color small-btn js-open-popup">{{ __('auth.registration') }}</a>
                    <a href="" data-popup="authorization" class="icon-btn login js-open-popup">
                        <span class="icon"></span>
                    </a>
                @endif

                <a href="" data-popup="assistance-popup" class="icon-btn assistance js-open-popup">
                    <span class="icon"></span>
                </a>

                @include('partials.languages-selector')

            </div>
            <span id="js-open-nav" title="{{ __('common.open_menu') }}">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </div>
    </header>




    @yield('content')




    <div id="top-page-bg" class="responsimg" data-responsimg780="{{ asset('img/top-page-bg.png') }}" data-responsimg10="{{ asset('img/top-page-bg-mobile.png') }}"></div>
    <div id="bottom-page-bg" class="responsimg" data-responsimg780="{{ asset('img/bottom-page-bg.png') }}" data-responsimg10="{{ asset('img/bottom-page-bg-mobile.png') }}"></div>
    <div id="game-all">
        <div id="game-box">
            <div class="align-m">
                <div class="container">
                    <div id="game-iframe-box">
                        <div class="sub-box">
                            <img src="{{ asset('img\game-iframe-proportion.png') }}" alt="">
                            <iframe id="game-frame" src="" data-ratio="16/9" data-launch-width="320" data-launch-height="240"></iframe>
                        </div>
                        <div class="controls">
                            <div class="control-btn js-full-screen">
                                <div class="pretty-hint">
                                    <div class="align-m">
                                        <p>Полноэкранный режим</p>
                                    </div>
                                </div>
                            </div>
                            <span class="control-btn js-game-nav"></span>
                            <span class="control-btn js-game-like"></span>
                        </div>
                        <svg class="loader" width="70px" height="70px" viewbox="0 0 128 128">
                            <g>
                                <circle cx="16" cy="64" r="16" fill="#f3d862" fill-opacity="1"></circle>
                                <circle cx="16" cy="64" r="14.344" fill="#f3d862" fill-opacity="1" transform="rotate(45 64 64)"></circle>
                                <circle cx="16" cy="64" r="12.531" fill="#f3d862" fill-opacity="1" transform="rotate(90 64 64)"></circle>
                                <circle cx="16" cy="64" r="10.75" fill="#f3d862" fill-opacity="1" transform="rotate(135 64 64)"></circle>
                                <circle cx="16" cy="64" r="10.063" fill="#f3d862" fill-opacity="1" transform="rotate(180 64 64)"></circle>
                                <circle cx="16" cy="64" r="8.063" fill="#f3d862" fill-opacity="1" transform="rotate(225 64 64)"></circle>
                                <circle cx="16" cy="64" r="6.438" fill="#f3d862" fill-opacity="1" transform="rotate(270 64 64)"></circle>
                                <circle cx="16" cy="64" r="5.375" fill="#f3d862" fill-opacity="1" transform="rotate(315 64 64)"></circle>
                                <animatetransform attributename="transform" type="rotate" values="45 64 64;90 64 64;135 64 64;180 64 64;225 64 64;270 64 64;315 64 64;0 64 64" calcmode="discrete" dur="720ms" repeatcount="indefinite"></animatetransform>
                            </g>
                        </svg>
                        <div class="game-bg2-left game-bg"></div>
                        <div class="game-bg2-right game-bg"></div>
                    </div>
                </div>
                <div class="message-box">
                    <div class="game-message">
                        <p>Вы находитесь в режиме игры. Используйте навигацию вверху, чтобы переключаться между параметрами:
                            <img src="{{ asset('img\message-icon1.png') }}" alt=""><img src="{{ asset('img\message-icon2.png') }}" alt=""></p>
                        <span class="js-close-message" title="Закрыть"></span>
                    </div>
                    @if(!\Auth::user())
                    <div class="game-message">
                        <p> Вы находитесь в гостевом режиме. <a href="" data-popup="authorization" class="js-open-popup">Войдите</a>
                            или <a href="" data-popup="registration-popup" class="js-open-popup">зарегистрируйтесь</a>,
                            чтобы играть по-настоящему.</p>
                        <span class="js-close-message" title="Закрыть"></span>
                    </div>
                    @endif
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

<div id="popup">
    <div class="container">

        @include('partials.provider-popup')

        @if(\Auth::user())
            @include('partials.profile-popup')
        @else
            @include('partials.recover-password-popup')
            @include('partials.login-popup')
        @endif

        @include('partials.deposit-popup')

        <div class="simple-popup top-up-balance hidden">
            <p class="h2" data-text="Пополнить баланс">Пополнить баланс</p>

            <div class="max-w">
                <form action="#" class="form">
                    <div class="field">
                        <select name="sel1" id="sel1" class="img-select">
                            <option value="NETELLER" data-img="{{ asset('img/uploads/select-img1.png') }}">NETELLER</option>
                            <option value="NETELLER 2" data-img="{{ asset('img/uploads/select-img2.png') }}">NETELLER 2</option>
                            <option value="NETELLER 3" data-img="{{ asset('img/uploads/select-img3.png') }}">NETELLER 3</option>
                            <option value="NETELLER 4" data-img="{{ asset('img/uploads/select-img4.png') }}">NETELLER 4</option>
                        </select>
                    </div>
                    <div class="field">
                        <input type="text" class="form-control" placeholder="Введите промокод">

                        <p><a href="">Условия и правила</a></p>
                    </div>
                    <button type="button" class="btn full-width">выбрать</button>
                </form>
            </div>
            <span class="js-close-popup" title="Закрыть"></span>
        </div>

        @include('partials.choose-game-popup')

        @if(!Auth::user())
            @include('partials.registration-popup')
        @endif

        @include('partials.assistance-popup')
    </div>
</div>

@include('partials.included_scripts')
</body>
</html>