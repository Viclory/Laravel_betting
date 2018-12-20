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
                <form class="form" method="post" action="{{ URL::to('/player/register') }}">
                    <div class="two-cols">
                        <div class="col">
                            <div class="field">
                                <input type="text" class="form-control" placeholder="Ваш логин">
                            </div>
                        </div>
                        <div class="col">
                            <div class="field">
                                <select name="currency" id="currency" class="select" data-placeholder="Валюта">
                                    <option value=""></option>
                                    <?php $currencies = \App\Helpers\Functions::getCurrencies(); ?>
                                    @foreach($currencies as $currency)
                                        <option value="{{$currency->id}}">{{$currency->char_code}}</option>
                                    @endforeach
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
                                <select name="country_id" id="country_id" class="select" data-placeholder="Страна">
                                    <option value="">---</option>
                                    <?php $countries = \App\Helpers\Functions::getCountries(); ?>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
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
                                    <select name="sel-gender" id="sel-gender" class="select" data-placeholder="Пол">
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