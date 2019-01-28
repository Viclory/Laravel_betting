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

            @include('partials.games-filter-box', ['active' => 'casino'])


            <div class="container games-wrapper">

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

                <!-- LAST GAMES -->
                <div class="games-list last-games-items hidden">
                    <header class="header last-games-section">
                        <span class="type">{{ __('games.last_games_results') }}</span>
                        <span class="count-text">
                            <span class="text">{{ __('games.found_games') }} /</span>
                            <span class="count"></span>
                        </span>
                    </header>
                </div>

                <div class="ajax-upload-box">
                    <a href="#" class="js-load-more btn">{{ __('games.load_more') }}</a>

                    <p class="message" data-text="Все игры загружены">{{ __('games.all_games_are_loaded') }}</p>
                </div>
            </div>
        </main>
@endsection