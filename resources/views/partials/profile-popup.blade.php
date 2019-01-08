<?php $player_info = \App\Helpers\Functions::getPlayerInfo(); ?>
<div class="private-office-popup hidden">
    <div class="sub-box">
        <div class="office-nav">
            <a href="{{ URL::to('/logout') }}" class="js-leave-popup">{{ __('auth.logout') }}</a>
            <a href="" class="nav-item active" data-box="profile-box">
                <span class="icon">
                    <img src="{{ asset('img/profile-icon.png') }}" alt="">
                </span>
                {{ __('common.profile') }}
            </a>
            <a href="" class="nav-item" data-box="deposit-box">
                <span class="icon">
                    <img src="{{ asset('img/deposit-icon.png') }}" alt="">
                </span>
                {{ __('common.deposit') }}
            </a>
            <a href="" class="nav-item" data-box="withdrawal-box">
                <span class="icon">
                    <img src="{{ asset('img/withdrawal-icon.png') }}" alt="">
                </span>
                {{ __('common.withdraw') }}
            </a>
            <a href="" class="nav-item" data-box="bonus-box">
                <span class="icon">
                    <img src="{{ asset('img/bonus-icon.png') }}" alt="">
                </span>
                {{ __('common.bonuses') }}
            </a>
        </div>

        <div class="office-items">
            <div class="profile-box office-item">
                <div class="private-office-tabs">
                    <ul class="tabs-list tabs">
                        <li>
                            <span class="tab-btn">
                                <span class="desktop-text">{{ __('common.personal_data') }}</span>
                                <span class="mobile-text">Данные</span>
                            </span>
                        </li>
                        <li>
                            <span class="tab-btn">Проверка</span>
                        </li>
                        <li>
                            <span class="tab-btn">{{ __('common.change_password') }}</span>
                        </li>
                    </ul>
                    <div class="tabs-content tabs">
                        <div class="tab">
                            <form action="#" class="form">
                                <div class="two-cols">
                                    <div class="col">
                                        <div class="field">
                                            <input type="text" class="form-control" value="{{ $player_info->username }}" placeholder="{{ __('common.your_login') }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="field">
                                            <input type="text" class="form-control" value="{{ $player_info->name }}" placeholder="{{ __('common.your_name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="two-cols">
                                    <div class="col">
                                        <div class="field">
                                            <input type="text" class="form-control" placeholder="{{ __('common.your_surname') }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="field">
                                            <select name="sel-gender2" id="sel-gender2" class="select">
                                                <option value="male">{{ __('common.male') }}</option>
                                                <option value="female">{{ __('common.female') }}</option>
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
                                            <input type="text" class="form-control" placeholder="{{ __('common.city') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="two-cols">
                                    <div class="col">
                                        <div class="field">
                                            <input type="text" class="form-control" placeholder="{{ __('common.address') }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="field">
                                            <input type="text" class="form-control" placeholder="{{ __('common.zip') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="two-cols">
                                    <div class="col">
                                        <div class="field">
                                            <input type="text" class="form-control" value="{{ $player_info->email }}" placeholder="Email">
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
                                            <input type="text" class="form-control" value="{{ $player_info->dob }}" placeholder="1989-08-11">
                                        </div>
                                    </div>
                                </div>
                                <button class="btn">{{ __('common.save') }}</button>
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
                                            <input type="password" class="form-control" placeholder="{{ __('common.new_password') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="two-cols">
                                    <div class="col">
                                        <div class="field">
                                            <input type="password" class="form-control" placeholder="{{ __('common.repeat_password') }}">
                                        </div>
                                    </div>
                                </div>
                                <button class="btn">{{ __('common.save') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="deposit-box office-item">
                <div class="private-office-tabs">
                    <ul class="tabs-list tabs">
                        <li>
                            <span class="tab-btn">{{ __('common.balance') }}</span>
                        </li>
                        <li>
                            <span class="tab-btn">{{ __('common.history') }}</span>
                        </li>
                        <li>
                            <span class="tab-btn">{{ __('common.payment_history') }}</span>
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
                            {{ __('common.payment_history') }}
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
                                                        <option value="NETELLER" data-img="{{ asset('img/uploads/select-img1.png') }}">NETELLER</option>
                                                        <option value="NETELLER 2" data-img="{{ asset('img/uploads/select-img2.png') }}">NETELLER 2</option>
                                                        <option value="NETELLER 3" data-img="{{ asset('img/uploads/select-img3.png') }}">NETELLER 3</option>
                                                        <option value="NETELLER 4" data-img="{{ asset('img/uploads/select-img4.png') }}">NETELLER 4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn">{{ __('common.withdraw') }}</button>
                                    </form>
                                </div>
                                <div class="item">
                                    <div class="additional-info">
                                        <p>Lorem Ipsum is simply dummy text of the printing<br>+11 1111 11 1111<br>Lorem Ipsum</p>
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