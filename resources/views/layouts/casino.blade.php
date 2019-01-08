<!DOCTYPE html>
<html lang="{{ \App::getLocale() }}" class="has-top-character casino-page">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <title>Casino | Казино</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/pace.min.js') }}"></script>
</head>
<body>
<div id="all">
    <header id="header">
        <div class="container">
            <a href="{{ URL::to('/') }}" id="logo" title="На главную"></a>
            <nav id="nav">
                <ul>
                    <li class="active">
                        <a href="{{ URL::to('/casino') }}">Casino</a>
                    </li>
                    <li>
                        <a href="casino-live.html">Casino live</a>
                    </li>
                    <li>
                        <a href="sport.html">Sport</a>
                    </li>
                    <li>
                        <a href="bingo.html">Bingo</a>
                    </li>
                    <li>
                        <a href="index-4.html#bonus-anchor">Bonus</a>
                    </li>
                </ul>
                <span id="js-close-nav" title="Закрыть меню"></span>
            </nav>
            <div class="js-clock"></div>
            <div class="controls">

                @if (Auth::user())
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
                            <iframe id="game-frame" src="" data-ratio="16/9"></iframe>
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
                    <div class="game-message">
                        <p> Вы находитесь в гостевом режиме. <a href="" data-popup="authorization" class="js-open-popup">Войдите</a>
                            или <a href="" data-popup="registration-popup" class="js-open-popup">зарегистрируйтесь</a>,
                            чтобы играть по-настоящему.</p>
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
<div id="page-preloader">
    <img src="{{ asset('img/prelodaer-logo.png') }}" alt="">

    <div id="loading-progress">
        <svg class="lds-spin" width="160px" height="160px" viewbox="0 0 100 100" preserveaspectratio="xMidYMid">
            <g transform="translate(75,50)">
                <g transform="rotate(0)">
                    <circle cx="0" cy="0" r="1.5" fill="#7ec931" fill-opacity="1">
                        <animatetransform attributename="transform" type="scale" begin="-1.2833333333333332s" values="3.5 3.5;1 1" keytimes="0;1" dur="1.4s" repeatcount="indefinite"></animatetransform>
                        <animate attributename="fill-opacity" keytimes="0;1" dur="1.4s" repeatcount="indefinite" values="1;0" begin="-1.2833333333333332s"></animate>
                    </circle>
                </g>
            </g>
            <g transform="translate(71.65063509461098,62.5)">
                <g transform="rotate(29.999999999999996)">
                    <circle cx="0" cy="0" r="1.5" fill="#7ec931" fill-opacity="0.9166666666666666">
                        <animatetransform attributename="transform" type="scale" begin="-1.1666666666666667s" values="3.5 3.5;1 1" keytimes="0;1" dur="1.4s" repeatcount="indefinite"></animatetransform>
                        <animate attributename="fill-opacity" keytimes="0;1" dur="1.4s" repeatcount="indefinite" values="1;0" begin="-1.1666666666666667s"></animate>
                    </circle>
                </g>
            </g>
            <g transform="translate(62.5,71.65063509461096)">
                <g transform="rotate(59.99999999999999)">
                    <circle cx="0" cy="0" r="1.5" fill="#7ec931" fill-opacity="0.8333333333333334">
                        <animatetransform attributename="transform" type="scale" begin="-1.05s" values="3.5 3.5;1 1" keytimes="0;1" dur="1.4s" repeatcount="indefinite"></animatetransform>
                        <animate attributename="fill-opacity" keytimes="0;1" dur="1.4s" repeatcount="indefinite" values="1;0" begin="-1.05s"></animate>
                    </circle>
                </g>
            </g>
            <g transform="translate(50,75)">
                <g transform="rotate(90)">
                    <circle cx="0" cy="0" r="1.5" fill="#7ec931" fill-opacity="0.75">
                        <animatetransform attributename="transform" type="scale" begin="-0.9333333333333332s" values="3.5 3.5;1 1" keytimes="0;1" dur="1.4s" repeatcount="indefinite"></animatetransform>
                        <animate attributename="fill-opacity" keytimes="0;1" dur="1.4s" repeatcount="indefinite" values="1;0" begin="-0.9333333333333332s"></animate>
                    </circle>
                </g>
            </g>
            <g transform="translate(37.50000000000001,71.65063509461098)">
                <g transform="rotate(119.99999999999999)">
                    <circle cx="0" cy="0" r="1.5" fill="#7ec931" fill-opacity="0.6666666666666666">
                        <animatetransform attributename="transform" type="scale" begin="-0.8166666666666665s" values="3.5 3.5;1 1" keytimes="0;1" dur="1.4s" repeatcount="indefinite"></animatetransform>
                        <animate attributename="fill-opacity" keytimes="0;1" dur="1.4s" repeatcount="indefinite" values="1;0" begin="-0.8166666666666665s"></animate>
                    </circle>
                </g>
            </g>
            <g transform="translate(28.34936490538903,62.5)">
                <g transform="rotate(150.00000000000003)">
                    <circle cx="0" cy="0" r="1.5" fill="#7ec931" fill-opacity="0.5833333333333334">
                        <animatetransform attributename="transform" type="scale" begin="-0.6999999999999998s" values="3.5 3.5;1 1" keytimes="0;1" dur="1.4s" repeatcount="indefinite"></animatetransform>
                        <animate attributename="fill-opacity" keytimes="0;1" dur="1.4s" repeatcount="indefinite" values="1;0" begin="-0.6999999999999998s"></animate>
                    </circle>
                </g>
            </g>
            <g transform="translate(25,50)">
                <g transform="rotate(180)">
                    <circle cx="0" cy="0" r="1.5" fill="#7ec931" fill-opacity="0.5">
                        <animatetransform attributename="transform" type="scale" begin="-0.5833333333333334s" values="3.5 3.5;1 1" keytimes="0;1" dur="1.4s" repeatcount="indefinite"></animatetransform>
                        <animate attributename="fill-opacity" keytimes="0;1" dur="1.4s" repeatcount="indefinite" values="1;0" begin="-0.5833333333333334s"></animate>
                    </circle>
                </g>
            </g>
            <g transform="translate(28.34936490538903,37.50000000000001)">
                <g transform="rotate(209.99999999999997)">
                    <circle cx="0" cy="0" r="1.5" fill="#7ec931" fill-opacity="0.4166666666666667">
                        <animatetransform attributename="transform" type="scale" begin="-0.4666666666666666s" values="3.5 3.5;1 1" keytimes="0;1" dur="1.4s" repeatcount="indefinite"></animatetransform>
                        <animate attributename="fill-opacity" keytimes="0;1" dur="1.4s" repeatcount="indefinite" values="1;0" begin="-0.4666666666666666s"></animate>
                    </circle>
                </g>
            </g>
            <g transform="translate(37.499999999999986,28.349364905389038)">
                <g transform="rotate(239.99999999999997)">
                    <circle cx="0" cy="0" r="1.5" fill="#7ec931" fill-opacity="0.3333333333333333">
                        <animatetransform attributename="transform" type="scale" begin="-0.3499999999999999s" values="3.5 3.5;1 1" keytimes="0;1" dur="1.4s" repeatcount="indefinite"></animatetransform>
                        <animate attributename="fill-opacity" keytimes="0;1" dur="1.4s" repeatcount="indefinite" values="1;0" begin="-0.3499999999999999s"></animate>
                    </circle>
                </g>
            </g>
            <g transform="translate(49.99999999999999,25)">
                <g transform="rotate(270)">
                    <circle cx="0" cy="0" r="1.5" fill="#7ec931" fill-opacity="0.25">
                        <animatetransform attributename="transform" type="scale" begin="-0.2333333333333333s" values="3.5 3.5;1 1" keytimes="0;1" dur="1.4s" repeatcount="indefinite"></animatetransform>
                        <animate attributename="fill-opacity" keytimes="0;1" dur="1.4s" repeatcount="indefinite" values="1;0" begin="-0.2333333333333333s"></animate>
                    </circle>
                </g>
            </g>
            <g transform="translate(62.5,28.349364905389034)">
                <g transform="rotate(300.00000000000006)">
                    <circle cx="0" cy="0" r="1.5" fill="#7ec931" fill-opacity="0.16666666666666666">
                        <animatetransform attributename="transform" type="scale" begin="-0.11666666666666665s" values="3.5 3.5;1 1" keytimes="0;1" dur="1.4s" repeatcount="indefinite"></animatetransform>
                        <animate attributename="fill-opacity" keytimes="0;1" dur="1.4s" repeatcount="indefinite" values="1;0" begin="-0.11666666666666665s"></animate>
                    </circle>
                </g>
            </g>
            <g transform="translate(71.65063509461096,37.499999999999986)">
                <g transform="rotate(329.99999999999994)">
                    <circle cx="0" cy="0" r="1.5" fill="#7ec931" fill-opacity="0.08333333333333333">
                        <animatetransform attributename="transform" type="scale" begin="0s" values="3.5 3.5;1 1" keytimes="0;1" dur="1.4s" repeatcount="indefinite"></animatetransform>
                        <animate attributename="fill-opacity" keytimes="0;1" dur="1.4s" repeatcount="indefinite" values="1;0" begin="0s"></animate>
                    </circle>
                </g>
            </g>
        </svg>
    </div>
</div>
<div id="popup">
    <div class="container">
        <div class="control-box provider-popup hidden">
            <header class="header">
                <img src="{{ asset('img/footer-logo.png') }}" alt="">
            </header>
            <div class="content-box">
                <div class="sub-box">
                    <ul class="choose-list">
                        <li>
                            <a href="" data-text="Net Entettainment">Net Entettainment</a>
                        </li>
                        <li>
                            <a href="" data-text="Net Entettainment">Net Entettainment</a>
                        </li>
                        <li>
                            <a href="" data-text="Microgaming">Microgaming</a>
                        </li>
                        <li>
                            <a href="" data-text="Microgaming">Microgaming</a>
                        </li>
                        <li>
                            <a href="" data-text="IGT">IGT</a>
                        </li>
                        <li>
                            <a href="" data-text="IGT">IGT</a>
                        </li>
                        <li>
                            <a href="" data-text="Green Tube">Green Tube</a>
                        </li>
                        <li>
                            <a href="" data-text="Green Tube">Green Tube</a>
                        </li>
                        <li>
                            <a href="" data-text="Betsoft">Betsoft</a>
                        </li>
                        <li>
                            <a href="" data-text="Betsoft">Betsoft</a>
                        </li>
                    </ul>
                </div>
            </div>
            <footer class="footer">
                <a href="index-4.html" class="btn js-confirm disabled">Подтвердить</a>
            </footer>
            <span class="js-close-popup" title="Закрыть"></span>
        </div>
        <div class="private-office-popup hidden">
            <div class="sub-box">
                <div class="office-nav">
                    <a href="{{ URL::to('/logout') }}" class="js-leave-popup">Выйти</a>
                    <a href="" class="nav-item active" data-box="profile-box">
                            <span class="icon">
                                <img src="{{ asset('img/profile-icon.png') }}" alt="">
                            </span>
                        Профиль
                    </a>
                    <a href="" class="nav-item" data-box="deposit-box">
                            <span class="icon">
                                <img src="{{ asset('img/deposit-icon.png') }}" alt="">
                            </span>
                        Депозит
                    </a>
                    <a href="" class="nav-item" data-box="withdrawal-box">
                            <span class="icon">
                                <img src="{{ asset('img/withdrawal-icon.png') }}" alt="">
                            </span>
                        Вывод
                    </a>
                    <a href="" class="nav-item" data-box="bonus-box">
                            <span class="icon">
                                <img src="{{ asset('img/bonus-icon.png') }}" alt="">
                            </span>
                        Бонусы
                    </a>
                </div>
                <div class="office-items">
                    <div class="profile-box office-item">
                        <div class="private-office-tabs">
                            <ul class="tabs-list tabs">
                                <li>
                                        <span class="tab-btn">
                                            <span class="desktop-text">Персональные данные</span>
                                            <span class="mobile-text">Данные</span>
                                        </span>
                                </li>
                                <li>
                                    <span class="tab-btn">Проверка</span>
                                </li>
                                <li>
                                    <span class="tab-btn">Изменить пароль</span>
                                </li>
                            </ul>
                            <div class="tabs-content tabs">
                                <div class="tab">
                                    <form action="#" class="form">
                                        <div class="two-cols">
                                            <div class="col">
                                                <div class="field">
                                                    <input type="text" class="form-control" placeholder="Ваш логин">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="field">
                                                    <input type="text" class="form-control" placeholder="Имя">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="two-cols">
                                            <div class="col">
                                                <div class="field">
                                                    <input type="text" class="form-control" placeholder="Фамилия">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="field">
                                                    <select name="sel-gender2" id="sel-gender2" class="select">
                                                        <option value="Мужской">Мужской</option>
                                                        <option value="Женский">Женский</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="two-cols">
                                            <div class="col">
                                                <div class="field">
                                                    <input type="text" class="form-control" placeholder="Российская Федерация">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="field">
                                                    <input type="text" class="form-control" placeholder="Город">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="two-cols">
                                            <div class="col">
                                                <div class="field">
                                                    <input type="text" class="form-control" placeholder="Адрес">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="field">
                                                    <input type="text" class="form-control" placeholder="Индекс">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="two-cols">
                                            <div class="col">
                                                <div class="field">
                                                    <input type="text" class="form-control" placeholder="dolfec@gmail.com">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="field">
                                                    <input type="text" class="form-control" placeholder="Телефон">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="two-cols">
                                            <div class="col">
                                                <div class="field">
                                                    <input type="text" class="form-control" placeholder="1989-08-11">
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn">сохранить</button>
                                    </form>
                                </div>
                                <div class="tab">
                                    Проверка
                                </div>
                                <div class="tab">
                                    <form action="#" class="form change-password">
                                        <div class="two-cols">
                                            <div class="col">
                                                <div class="field">
                                                    <input type="password" class="form-control" placeholder="Новый пароль">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="two-cols">
                                            <div class="col">
                                                <div class="field">
                                                    <input type="password" class="form-control" placeholder="Повторите пароль">
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn">сохранить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="deposit-box office-item">
                        <div class="private-office-tabs">
                            <ul class="tabs-list tabs">
                                <li>
                                    <span class="tab-btn">Баланс</span>
                                </li>
                                <li>
                                    <span class="tab-btn">История</span>
                                </li>
                                <li>
                                    <span class="tab-btn">История оплаты</span>
                                </li>
                            </ul>
                            <div class="tabs-content tabs">
                                <div class="tab">
                                    <div class="data-list">
                                        <div class="item">
                                            <p>Вы сняли денег:</p>

                                            <p class="sum"><strong>0.00</strong> рублей</p>
                                        </div>
                                        <div class="item">
                                            <p>Ваши бонусы:</p>

                                            <p class="sum"><strong>20.00</strong> рублей</p>
                                        </div>
                                        <div class="item">
                                            <p>Ваш баланс:</p>

                                            <p class="sum"><strong>10 000.00</strong> рублей</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    История
                                </div>
                                <div class="tab">
                                    История оплаты
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="withdrawal-box office-item">
                        <div class="private-office-tabs">
                            <ul class="tabs-list tabs">
                                <li>
                                    <span class="tab-btn">Новый</span>
                                </li>
                                <li>
                                    <span class="tab-btn">Выполнен</span>
                                </li>
                            </ul>
                            <div class="tabs-content tabs">
                                <div class="tab">
                                    <div class="data-list">
                                        <div class="item">
                                            <p>Ваш баланс:</p>

                                            <p class="sum"><strong>0.00</strong> рублей</p>
                                        </div>
                                        <div class="item">
                                            <p>Выберите способ вывода средств</p>

                                            <form class="form" action="#">
                                                <div class="two-cols">
                                                    <div class="col">
                                                        <div class="field">
                                                            <select name="sel11" id="sel11" class="img-select">
                                                                <option value="NETELLER" data-img="{{ asset('img/uploads/select-img1.png') }}">NETELLER
                                                                </option>
                                                                <option value="NETELLER 2" data-img="{{ asset('img/uploads/select-img2.png') }}">NETELLER 2
                                                                </option>
                                                                <option value="NETELLER 3" data-img="{{ asset('img/uploads/select-img3.png') }}">NETELLER 3
                                                                </option>
                                                                <option value="NETELLER 4" data-img="{{ asset('img/uploads/select-img4.png') }}">NETELLER 4
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn">Вывод</button>
                                            </form>
                                        </div>
                                        <div class="item">
                                            <div class="additional-info">
                                                <p>Lorem Ipsum is simply dummy text of the printing<br>+11 1111 11 1111<br>Lorem Ipsum
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    Выполнен
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bonus-box office-item">
                        <div class="private-office-tabs">
                            <ul class="tabs-list tabs">
                                <li>
                                    <span class="tab-btn">Бонус вкладка</span>
                                </li>
                                <li>
                                    <span class="tab-btn">Бонус вкладка2</span>
                                </li>
                            </ul>
                            <div class="tabs-content tabs">
                                <div class="tab">
                                    Бонус вкладка
                                </div>
                                <div class="tab">
                                    Бонус вкладка2
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <span class="js-close-popup" title="Закрыть"></span>
        </div>
        <div class="simple-popup center recover-password hidden">
            <p class="h2" data-text="Запросить пароль">Запросить пароль</p>

            <div class="max-w">
                <p>Пожалуйста, введите свой адрес электронной почты, зарегистрированный у нас, и мы отправим вам информацию о
                    том, как сменить пароль.</p>

                <form action="#" class="form">
                    <div class="field error-field">
                        <input type="text" class="form-control icon-mail" placeholder="Ваша почта">

                        <div class="field-error">
                            <div class="align-m">
                                <p>Такой почты нет</p>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn full-width">приступить</button>
                </form>
            </div>
            <div class="submit-ok-box">
                <p>Спасибо, мы попытались отправить вам электронное письмо с инструкциями. Если вы не получили электронное
                    письмо в течение нескольких минут, возможно, вы указали неправильное имя пользователя или адрес электронной
                    почты. Рекомендуем повторить попытку.</p>

                <p>Если вы все еще не получите его, свяжитесь с нашей <a href="">службой&nbsp;поддержки</a>.</p>
            </div>
            <footer class="footer">
                <div class="max-w">
                    <p>Вы еще не зарегистрированы? <a href="" data-popup="registration-popup" class="js-open-popup">Создать&nbsp;аккаунт</a>
                    </p>
                </div>
            </footer>
            <span class="js-close-popup" title="Закрыть"></span>
        </div>
        @if(!Auth::user())
            @include('partials.login-popup')
        @endif
        <div class="simple-popup payment-order hidden">
            <p class="h2" data-text="Депозит с neteller">Депозит с neteller</p>

            <div class="max-w">
                <p class="large">Min deposit amount: 1.16 USD<br> Max deposit amount: 116.50 USD<br> Remaining deposit
                    amount: 116.50 USD</p>

                <form action="#" class="form">
                    <div class="field">
                        <input type="text" class="form-control" placeholder="Amount">
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
        <div class="registration-popup hidden">
            <div class="sub-box">
                <div class="registration-box">
                    <div class="choose-registration child">
                        <p class="title">Выберите вариант <br>регистрации</p>
                        <a href="" data-step="quick-registration" class="btn js-further-step">Быстрая регистрация</a>
                        <a href="" data-step="full-registration" class="btn js-further-step">Полная регистрация</a>
                    </div>
                    <div class="quick-registration hidden child">
                        <p class="title">Создайте бесплатный аккаунт<br>Быстрая регистрация</p>

                        <form class="form">
                            <div class="two-cols">
                                <div class="col">
                                    <div class="field">
                                        <input type="text" class="form-control" placeholder="Ваш логин">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="field">
                                        <select name="sel-currency" id="sel-currency" class="select" data-placeholder="Валюта">
                                            <option></option>
                                            <option value="Доллары">Доллары</option>
                                            <option value="Рубли">Рубли</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="two-cols">
                                <div class="col">
                                    <div class="field">
                                        <input type="password" class="form-control" placeholder="Пароль">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="field">
                                        <input type="password" class="form-control" placeholder="Повторите пароль">
                                    </div>
                                </div>
                            </div>
                            <div class="two-cols">
                                <div class="col">
                                    <div class="field">
                                        <input type="text" class="form-control" placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="field">
                                        <select name="sel-country" id="sel-country" class="select" data-placeholder="Страна">
                                            <option></option>
                                            <option value="Австралия">Австралия</option>
                                            <option value="Беларусь">Беларусь</option>
                                            <option value="Канада">Канада</option>
                                            <option value="Россия">Россия</option>
                                            <option value="США">США</option>
                                            <option value="Филиппины">Филиппины</option>
                                            <option value="Япония">Япония</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="two-cols">
                                <div class="col">
                                    <div class="field">
                                        <input type="text" class="form-control" placeholder="Введите промокод">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="field">
                                        <div id="calendar1"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <div class="checkbox-item">
                                    <input id="rules-inp" name="rules-inp" type="checkbox">
                                    <label for="rules-inp">Я прочитал(а) и принял(а) <a href="">Правила и условия</a></label>
                                </div>
                            </div>
                            <div class="btns-box">
                                <a href="" data-step="choose-registration" class="btn sub-color js-further-step">Назад</a>
                                <a href="" data-step="registration-complete" class="btn js-further-step">регистрация</a>
                            </div>
                        </form>
                    </div>
                    <div class="full-registration hidden child">
                        <div class="step step1">
                            <p class="title">Создайте бесплатный аккаунт в два простых шага</p>

                            <form class="form">
                                <div class="two-cols">
                                    <div class="col">
                                        <div class="field">
                                            <input type="text" class="form-control" placeholder="Ваш логин">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="field">
                                            <input type="text" class="form-control" placeholder="Ваше имя">
                                        </div>
                                    </div>
                                </div>
                                <div class="two-cols">
                                    <div class="col">
                                        <div class="field">
                                            <input type="text" class="form-control" placeholder="Ваша фамилия">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="field">
                                            <select name="sel-country" id="sel-gender" class="select" data-placeholder="Пол">
                                                <option></option>
                                                <option value="Мужчина">Мужчина</option>
                                                <option value="Женщина">Женщина</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="two-cols">
                                    <div class="col">
                                        <div class="field">
                                            <input type="text" class="form-control" placeholder="E-mail">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="field">
                                            <select name="sel-currency2" id="sel-currency2" class="select" data-placeholder="Валюта">
                                                <option></option>
                                                <option value="Доллары">Доллары</option>
                                                <option value="Рубли">Рубли</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <div id="calendar2"></div>
                                </div>
                                <div class="btns-box">
                                    <a href="" data-step="choose-registration" class="btn sub-color js-further-step">Назад</a>
                                    <a href="" data-step="step2" class="btn js-to-step fix-width">Далее</a>
                                </div>
                            </form>
                        </div>
                        <div class="step step2 hidden">
                            <p class="title">Регистрация почти завершена - последний шаг</p>

                            <form class="form">
                                <div class="two-cols">
                                    <div class="col">
                                        <div class="field">
                                            <select name="sel-country2" id="sel-country2" class="select" data-placeholder="Страна">
                                                <option></option>
                                                <option value="Австралия">Австралия</option>
                                                <option value="Беларусь">Беларусь</option>
                                                <option value="Канада">Канада</option>
                                                <option value="Россия">Россия</option>
                                                <option value="США">США</option>
                                                <option value="Филиппины">Филиппины</option>
                                                <option value="Япония">Япония</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="field">
                                            <input type="text" class="form-control" placeholder="Город">
                                        </div>
                                    </div>
                                </div>
                                <div class="two-cols">
                                    <div class="col">
                                        <div class="field">
                                            <input type="text" class="form-control" placeholder="Адрес">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="field">
                                            <input type="text" class="form-control" placeholder="Почтовый индекс">
                                        </div>
                                    </div>
                                </div>
                                <div class="two-cols">
                                    <div class="col">
                                        <div class="field">
                                            <input type="text" class="form-control" placeholder="Телефон">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="field">
                                            <input type="text" class="form-control" placeholder="Введите промокод">
                                        </div>
                                    </div>
                                </div>
                                <div class="two-cols">
                                    <div class="col">
                                        <div class="field">
                                            <input type="password" class="form-control" placeholder="Пароль">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="field">
                                            <input type="password" class="form-control" placeholder="Повторите пароль">
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="checkbox-item">
                                        <input id="rules-inp2" name="rules-inp2" type="checkbox" checked="">
                                        <label for="rules-inp2">Я прочитал(а) и принял(а) <a href="">Правила и условия</a></label>
                                    </div>
                                </div>
                                <div class="btns-box">
                                    <a href="" data-step="step1" class="btn sub-color js-to-step">Назад</a>
                                    <a href="" data-step="registration-complete" class="btn js-further-step">Регистрация</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="registration-complete hidden child">
                        <p class="title">Регистрация завершена.<br>Подтвердите ваш E-mail.</p>

                        <p>Чтобы подтвердить E-mail, перейдите в Вашу электронную почту, откройте наше письмо и перейдите по ссылке.</p>
                    </div>
                </div>
                <div class="bg-box">
                    <img src="{{ asset('img/registration-character.png') }}" alt="">

                    <p class="are-you-ready">
                        <span class="golden-text" data-text="А ты готов">А ты готов</span>
                        <span class="golden-text large" data-text="выигрывать">выигрывать</span>
                    </p>
                </div>
            </div>
            <span class="js-close-popup" title="Закрыть"></span>
        </div>
        <div class="assistance-popup hidden">
            <div class="header">
                <div class="col">
                    <a href="" class="back-link">Назад</a>
                </div>
                <div class="col">
                    <a href="" class="js-close-popup">Закрыть окно</a>
                </div>
            </div>
            <div class="main-box">
                <p class="h2">Как мы можем <br>вам помочь?</p>

                <p>Отправьте нам электронное сообщение или пообщайтесь с нами в чате, просмотрите FAQ или свяжитесь с нами в
                    социальных сетях</p>

                <p>Онлайн-чат открыт с 08:00 до 00:00</p>

                <div class="assistance-items">
                    <div class="item">
                        <div class="icon">
                            <img src="{{ asset('img/chat-icon.png') }}" alt="">
                        </div>
                        <div class="text">
                            <p><a href="" data-child="chat-box">Онлайн-чат</a></p>

                            <p>Чат с нашей командой поддержки</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="icon">
                            <img src="{{ asset('img/mail-icon.png') }}" alt="">
                        </div>
                        <div class="text">
                            <p><a href="" data-child="message-box">Отправить сообщение для поддержки</a></p>

                            <p>Ответ получите в течение 12 часов</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="icon">
                            <img src="{{ asset('img/interrogation-icon.png') }}" alt="">
                        </div>
                        <div class="text">
                            <p><a href="" data-child="faq-box">Часто задаваемые вопросы</a></p>

                            <p>Тут вы найдете ответ на ваш вопрос</p>
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="social-links">
                        <a href="https://vk.com/" class="vkontakte" target="_blank" title="Vkontakte">vk</a>
                        <a href="https://twitter.com/" class="twitter" target="_blank" title="Twitter"></a>
                        <a href="https://facebook.com/" class="facebook" target="_blank" title="Facebook">f</a>
                    </div>
                    <p>Свяжитесь с нами по email:</p>

                    <p><a href="mailto:email@email.com">email@email.com</a></p>
                </footer>
            </div>
            <div class="faq-box assistance-child">
                <p class="h2">Часто задаваемые вопросы</p>

                <p>Что обсуждалось в последнее время?</p>

                <div class="accordion sub-appearance">
                    <div class="item">
                        <div class="title">
                            <p>Account</p>
                        </div>
                        <div class="text">
                            <ul>
                                <li>
                                    <a href="">How can i open an account at LepreconCasino?</a>
                                </li>
                                <li>
                                    <a href="">How can i open an account at LepreconCasino?</a>
                                </li>
                                <li>
                                    <a href="">How can i open an account at LepreconCasino?</a>
                                </li>
                                <li>
                                    <a href="">How can i open an account at LepreconCasino?</a>
                                </li>
                                <li>
                                    <a href="">How can i open an account at LepreconCasino?</a>
                                </li>
                                <li>
                                    <a href="">How can i open an account at LepreconCasino?</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <p>Account</p>
                        </div>
                        <div class="text">
                            <ol>
                                <li>
                                    <a href="">How can i open an account at LepreconCasino?</a>
                                </li>
                                <li>
                                    <a href="">How can i open an account at LepreconCasino?</a>
                                </li>
                                <li>
                                    <a href="">How can i open an account at LepreconCasino?</a>
                                </li>
                                <li>
                                    <a href="">How can i open an account at LepreconCasino?</a>
                                </li>
                                <li>
                                    <a href="">How can i open an account at LepreconCasino?</a>
                                </li>
                                <li>
                                    <a href="">How can i open an account at LepreconCasino?</a>
                                </li>
                            </ol>
                            <p>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor
                                sit amet Lorem ipsum dolor sit amet </p>
                        </div>
                    </div>
                    <div class="item active">
                        <div class="title">
                            <p>Account</p>
                        </div>
                        <div class="text">
                            <ul>
                                <li>
                                    <a href="">How can i open an account at LepreconCasino?</a>
                                </li>
                                <li>
                                    <a href="">How can i open an account at LepreconCasino?</a>
                                </li>
                                <li>
                                    <a href="">How can i open an account at LepreconCasino?</a>
                                </li>
                                <li>
                                    <a href="">How can i open an account at LepreconCasino?</a>
                                </li>
                                <li>
                                    <a href="">How can i open an account at LepreconCasino?</a>
                                </li>
                                <li>
                                    <a href="">How can i open an account at LepreconCasino?</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <p>Account</p>
                        </div>
                        <div class="text">
                            <ul>
                                <li>
                                    <a href="">How can i open an account at LepreconCasino?</a>
                                </li>
                                <li>
                                    <a href="">How can i open an account at LepreconCasino?</a>
                                </li>
                                <li>
                                    <a href="">How can i open an account at LepreconCasino?</a>
                                </li>
                                <li>
                                    <a href="">How can i open an account at LepreconCasino?</a>
                                </li>
                                <li>
                                    <a href="">How can i open an account at LepreconCasino?</a>
                                </li>
                                <li>
                                    <a href="">How can i open an account at LepreconCasino?</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chat-box assistance-child">
                <form action="#" class="form">
                    <div class="field required">
                        <label class="field-name">Ваш адрес электронной почты</label>

                        <div class="inp-box">
                            <input type="text" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <p>Ваш запрос, связанный с: *</p>

                    <div class="field">
                        <div class="radio-item">
                            <input id="radio-inp" name="radio-inp" type="radio">
                            <label for="radio-inp">Бонусы и бесплатные спины</label>
                        </div>
                        <div class="radio-item">
                            <input id="radio-inp2" name="radio-inp" type="radio">
                            <label for="radio-inp2">Оплата</label>
                        </div>
                        <div class="radio-item">
                            <input id="radio-inp3" name="radio-inp" type="radio">
                            <label for="radio-inp3">Аккаунт</label>
                        </div>
                        <div class="radio-item">
                            <input id="radio-inp4" name="radio-inp" type="radio">
                            <label for="radio-inp4">Другое</label>
                        </div>
                    </div>
                    <button type="button" class="btn full-width">начать чат</button>
                </form>
            </div>
            <div class="message-box assistance-child">
                <p class="h2">Отправить сообщение для поддержки</p>

                <p>Ответ будет в течение 12 часов</p>

                <form action="#" class="form">
                    <div class="field required">
                        <label class="field-name">Ваш адрес электронной почты</label>

                        <div class="inp-box">
                            <input type="text" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="field">
                        <div class="inp-box">
                            <input type="text" class="form-control" placeholder="Тема сообщения">
                        </div>
                    </div>
                    <div class="field">
                        <div class="inp-box">
                            <textarea class="form-control" rows="10" cols="10" placeholder="Сообщениие"></textarea>
                        </div>
                    </div>
                    <button type="button" class="btn full-width">отправить сообщениие</button>
                </form>
            </div>
        </div>
    </div>
</div>

@include('partials.included_scripts')
</body>
</html>