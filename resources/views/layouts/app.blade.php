<!DOCTYPE html>
<html lang="{{ \App::getLocale() }}" class="index-page">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <title>Leprecon Casino</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
                        <a href="casino-live.html">Casino live</a>
                    </li>
                    <li>
                        <a href="sport.html">Sport</a>
                    </li>
                    <li>
                        <a href="bingo.html">Bingo</a>
                    </li>
                    <li>
                        <a href="#bonus-anchor">Bonus</a>
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
                    <a href="casino-live.html" class="casino-live-link" title="Casino live">
                        <span class="chest" data-text="Casino live">Casino live</span>
                    </a>
                    <a href="{{ URL::to('/casino') }}" class="casino-link" title="Casino">
                        <span class="chest" data-text="Casino">Casino</span>
                    </a>
                    <a href="sport.html" class="sport-link" title="Sport">
                        <span class="chest" data-text="Sport">Sport</span>
                    </a>
                    <a href="bingo.html" class="bingo-link" title="Bingo">
                        <span class="chest" data-text="Bingo">Bingo</span>
                    </a>
                    <a href="#bonus-anchor" class="bonus-link" title="Bonus">
                        <span class="chest" data-text="Bonus">Bonus</span>
                    </a>
                    <img src="{{ asset('img/main-nav-proportion.gif') }}" class="proportion" alt="">
                </div>
            </div>
        </div>
        <span class="js-anchor" title="Вниз"></span>
    </div>

    @yield('content')

    <footer id="footer">
        <div class="container">
            <div class="top-box">
                <div class="sub-nav">
                    <div class="col">
                        <ul>
                            <li>
                                <a href="{{ URL::to('/about') }}">О нас</a>
                            </li>
                            <li>
                                <a href="">Контакты</a>
                            </li>
                            <li>
                                <a href="">Правила и условия</a>
                            </li>
                            <li>
                                <a href="">Ответственная игра</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul>
                            <li>
                                <a href="">Правила приема ставок</a>
                            </li>
                            <li>
                                <a href="">Политика конфиденциальности</a>
                            </li>
                            <li>
                                <a href="">Партнерам</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="social-links">
                    <a href="https://vk.com/" class="vkontakte" target="_blank" title="Vkontakte">vk</a>
                    <a href="https://twitter.com/" class="twitter" target="_blank" title="Twitter"></a>
                    <a href="https://facebook.com/" class="facebook" target="_blank" title="Facebook">f</a>
                </div>
                <img src="{{ asset('img/footer-logo.png') }}" id="footer-logo" alt="">
            </div>
            <div id="logos-box">
                <img src="{{ asset('img/uploads/footer-logo1.jpg') }}" alt="">
                <img src="{{ asset('img/uploads/footer-logo2.jpg') }}" alt="">
                <img src="{{ asset('img/uploads/footer-logo3.jpg') }}" alt="">
                <img src="{{ asset('img/uploads/footer-logo4.jpg') }}" alt="">
                <img src="{{ asset('img/uploads/footer-logo5.jpg') }}" alt="">
                <img src="{{ asset('img/uploads/footer-logo6.jpg') }}" alt="">
            </div>
            <div class="middle-box">
                <div class="text">
                    <p>LEPRECONCASINO – Play Casino, Live Casino, Slots, Bingo and Sportsbook online<br>LEPRECONCASINO has one of the largest selections of casino games. Play casino games like Roulette, Slots, Blackjack and lots more. For new players here at Lepreconcasino our welcome package gives you a 200% on the first deposit.</p>
                </div>
                <div class="img">
                    <img src="{{ asset('img/uploads/footer-img1.jpg') }}" alt="">
                    <img src="{{ asset('img/uploads/footer-img2.jpg') }}" alt="">
                </div>
            </div>
            <div id="copy">
                <div id="copy-logo">
                    <img src="{{ asset('img/copy-logo.jpg') }}" alt="">
                </div>
                <p>Все права защищены 2018</p>
            </div>
        </div>
    </footer>
</div>

<div id="page-overlay"></div>

@include('partials.page-loader')


<div id="popup">
    <div class="container">
        @include('partials.profile-popup')

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

        <div class="simple-popup payment-order hidden">
            <p class="h2" data-text="Депозит с neteller">Депозит с neteller</p>
            <div class="max-w">
                <p class="large">Min deposit amount: 1.16 USD<br> Max deposit amount: 116.50 USD<br> Remaining deposit amount: 116.50 USD</p>
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

        @if(!Auth::user())
        @include('partials.registration-popup')
        @endif

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
                <p>Отправьте нам электронное сообщение или пообщайтесь с нами в чате, просмотрите FAQ или свяжитесь с нами в социальных сетях</p>
                <p>Онлайн-чат открыт с 08:00 до 00:00</p>
                <div class="assistance-items">
                    <div class="item">
                        <div class="icon">
                            <img src="img\chat-icon.png" alt="">
                        </div>
                        <div class="text">
                            <p><a href="" data-child="chat-box">Онлайн-чат</a></p>
                            <p>Чат с нашей командой поддержки</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="icon">
                            <img src="img\mail-icon.png" alt="">
                        </div>
                        <div class="text">
                            <p><a href="" data-child="message-box">Отправить сообщение для поддержки</a></p>
                            <p>Ответ получите в течение 12 часов</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="icon">
                            <img src="img\interrogation-icon.png" alt="">
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
                            <p>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet </p>
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
                    <button type="button" class="btn full-width">отправить  сообщениие</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/modernizr.custom.js') }}"></script>
<script src="{{ asset('js/jquery.responsImg.min.js') }}"></script>
<script src="{{ asset('js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/tabs.min.js') }}"></script>
<script src="{{ asset('js/jquery.date-dropdowns.js') }}"></script>
<script src="{{ asset('js/swiper.min.js') }}"></script>
<script src="{{ asset('js/sticky.min.js') }}"></script>
<script src="{{ asset('js/iframeResizer.min.js') }}"></script>
<script src="{{ asset('js/jquery.validate.js') }}"></script>
@if (\App::getLocale() != 'en')
<script src="{{ asset('js/jquery.validate.messages_' . \App::getLocale() . '.js') }}"></script>
@endif
<script src="{{ asset('js/validation.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>


</body>
</html>
