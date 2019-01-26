<!DOCTYPE html>
<html lang="{{ \App::getLocale() }}" class="index-page">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <title>Leprecon Casino</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <script src="{{ asset('js/pace.min.js') }}"></script>
</head>
<body>


<div id="all">

    <header id="header">
        <div class="container">
            <a href="{{ URL::to('/') }}" id="logo" title="{{ __('common.go_to_main') }}"></a>
            <nav id="nav">
                <ul>
                    <li>
                        <a href="{{ URL::to('/casino') }}">Casino</a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/casino-live') }}">Casino live</a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/sport') }}">Sport</a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/bingo') }}">Bingo</a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/') }}">Bonus</a>
                    </li>
                </ul>
                <span id="js-close-nav" title="Закрыть меню"></span>
            </nav>
            <div class="controls">
                @if(!Auth::user())
                <a href="#" data-popup="registration-popup" class="btn sub-color small-btn js-open-popup">{{ __('auth.registration') }}</a>
                <a href="" data-popup="authorization" class="icon-btn login js-open-popup">
                    <span class="icon"></span>
                </a>
                @else
                    <?php $balanceObj = App\StaygamingBO::getBalanceByPlayerId(Auth::user()->player_id); ?>
                <a href="" data-popup="payment-order" class="icon-btn deposit js-open-popup">
                    <span class="icon"></span>
                    <span class="sum">{{ $balanceObj->result->balance }} <span class="currency">{{ $balanceObj->result->currency }}</span></span>
                </a>
                <a href="" data-popup="private-office-popup" class="icon-btn account js-open-popup">
                    <span class="icon"></span>
                </a>
                @endif
                <a href="" data-popup="assistance-popup" class="icon-btn assistance js-open-popup">
                    <span class="icon"></span>
                </a>
                @include('partials.languages-selector')

            </div>
            <span id="js-open-nav" title="Открыть меню">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </div>
    </header>

    <div id="main-screen">
        <div class="sub-box">
            <div class="container">
                <div class="character-box">
                    <div class="character"></div>
                    <img src="{{ asset('img/character-proportion.gif') }}" class="proportion" alt="">
                </div>
                <div id="main-nav">
                    <a href="{{ URL::to('/casino-live') }}" class="casino-live-link" title="Casino live">
                        <span class="chest" data-text="Casino live">Casino live</span>
                    </a>
                    <a href="{{ URL::to('/casino') }}" class="casino-link" title="Casino">
                        <span class="chest" data-text="Casino">Casino</span>
                    </a>
                    <a href="{{ URL::to('/sport') }}" class="sport-link" title="Sport">
                        <span class="chest" data-text="Sport">Sport</span>
                    </a>
                    <a href="{{ URL::to('/bingo') }}" class="bingo-link" title="Bingo">
                        <span class="chest" data-text="Bingo">Bingo</span>
                    </a>
                    <a href="{{ URL::to('/') }}" class="bonus-link" title="Bonus">
                        <span class="chest" data-text="Bonus">Bonus</span>
                    </a>
                    <img src="{{ asset('img/main-nav-proportion.gif') }}" class="proportion" alt="">
                </div>
            </div>
        </div>
        <span class="js-anchor" title="{{ __('common.down') }}"></span>
    </div>

    @yield('content')

    @include('partials.footer')

</div>

<div id="page-overlay"></div>

@include('partials.page-loader')


<div id="popup">
    <div class="container">
        @if(\Auth::user())
        @include('partials.profile-popup')
        @endif

        <div class="simple-popup center recover-password hidden">
            <!--      <p class="h2" data-text="Запросить пароль">Запросить пароль</p>
                  <div class="max-w">-->
            <!--<p>Пожалуйста, введите свой адрес электронной почты, зарегистрированный у нас, и мы отправим вам информацию о том, как сменить пароль.</p>
            <form action="#" class="form">
                <div class="field error-field">
                    <input type="text" class="form-control icon-mail" placeholder="Ваша почта" />
                    <div class="field-error">
                        <div class="align-m">
                            <p>Такой почты нет</p>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn full-width">приступить</button>
            </form>-->
            <iframe width="100%" frameborder="0" class="js-iframe" src="https://tcptest-leprecon.tain.com/embedded/user/forgotpassword?lang=ru"></iframe>
            <!-- </div>-->
            <div class="submit-ok-box">
                <p>Спасибо, мы попытались отправить вам электронное письмо с инструкциями. Если вы не получили электронное письмо в течение нескольких минут, возможно, вы указали неправильное имя пользователя или адрес электронной почты. Рекомендуем повторить попытку.</p>
                <p>Если вы все еще не получите его, свяжитесь с нашей <a href="">службой&nbsp;поддержки</a>.</p>
            </div>
            <footer class="footer">
                <div class="max-w">
                    <p>Вы еще не зарегистрированы? <a href="#" data-popup="registration-popup" class="js-open-popup">Создать&nbsp;аккаунт</a></p>
                </div>
            </footer>
            <span class="js-close-popup" title="Закрыть"></span>
        </div>

        @include('partials.login-popup')

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
