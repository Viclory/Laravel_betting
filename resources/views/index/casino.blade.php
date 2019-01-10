@extends('layouts.casino')


@section('content')
    <div id="page-bg">
        <div id="top-character-bg">
            <div class="container">
                <img src="{{ asset('img/top-character-casino.png') }}" class="character" alt="">

                @include('partials.we-give')
            </div>
        </div>
        <main id="main">
            <div id="games-filter-box">
                <header class="header">
                    <div class="container">
                        <div class="sub-box">
                            <div class="games-filter">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <a href="" class="swiper-slide js-filter-games">
                                            <div class="icon popular-icon"></div>
                                            <span>{{ __('common.popular') }}</span>
                                        </a>
                                        <a href="" class="swiper-slide js-filter-games">
                                            <div class="icon slots-icon"></div>
                                            <span>{{ __('common.slots') }}</span>
                                        </a>
                                        <a href="" class="swiper-slide js-filter-games">
                                            <div class="icon jackpot-icon"></div>
                                            <span>{{ __('common.jackpot') }}</span>
                                        </a>
                                        <a href="" class="swiper-slide js-filter-games">
                                            <div class="icon on-tables-icon"></div>
                                            <span>{{ __('common.table_games') }}</span>
                                        </a>
                                        <a href="" class="swiper-slide js-filter-games">
                                            <div class="icon poker-icon"></div>
                                            <span>{{ __('common.video_poker') }}</span>
                                        </a>
                                        <a href="" class="swiper-slide js-filter-games">
                                            <div class="icon last-games-icon"></div>
                                            <span>прошлые игры</span>
                                        </a>
                                    </div>
                                </div>
                                <button class="slider-btn swiper-button-next"></button>
                                <button class="slider-btn swiper-button-prev"></button>
                            </div>
                            <div class="games-search-box">
                                    <span class="js-open-search" title="{{ __('common.open_search') }}">
                                        <span class="icon"></span>
                                        {{ __('common.search') }}
                                    </span>

                                <form action="#" class="games-search-form">
                                    <input type="text" class="form-control" placeholder="Поиск по играм">
                                    <button type="button" class="search-btn" title="{{ __('common.search') }}"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </header>
                <span class="js-open-popup btn half-btn" data-popup="provider-popup">Провайдер</span>
            </div>
            <div class="container">
                <div class="games-list popular-games-items">
                    <header class="header popular-games-section">
                        <span class="type">Популярные</span>
                        <span class="count-text">
                            <span class="text">Популярных игр /</span>
                            <span class="count"></span>
                        </span>
                    </header>
                </div>
                <div class="games-list new-games-items">
                    <header class="header">
                        <span class="type">Новинки</span>
                        <span class="count-text">
                            <span class="text">Новых игр /</span>
                            <span class="count">78</span>
                        </span>
                    </header>
                </div>
                <div class="ajax-upload-box">
                    <a href="pages\more-games.html" class="js-load-more btn">загрузить еще</a>

                    <p class="message" data-text="Все игры загружены">Все игры загружены</p>
                </div>
            </div>
        </main>
@endsection