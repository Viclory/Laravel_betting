@extends('layouts.casino')


@section('content')
    <div id="page-bg">
        <div id="top-character-bg">
            <div class="container">
                <img src="{{ asset('img/top-character-casino.png') }}" class="character" alt="">

                <div class="we-give">
                    <p>Мы дарим до <span class="money">600$</span> на первый депозит</p>
                    <a href="" class="btn js-open-popup" data-popup="authorization">открыть аккаунт</a>
                </div>
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
                                            <span>Популярные</span>
                                        </a>
                                        <a href="" class="swiper-slide js-filter-games">
                                            <div class="icon slots-icon"></div>
                                            <span>СЛОТЫ</span>
                                        </a>
                                        <a href="" class="swiper-slide js-filter-games">
                                            <div class="icon jackpot-icon"></div>
                                            <span>Джекпот</span>
                                        </a>
                                        <a href="" class="swiper-slide js-filter-games">
                                            <div class="icon on-tables-icon"></div>
                                            <span>На столах</span>
                                        </a>
                                        <a href="" class="swiper-slide js-filter-games">
                                            <div class="icon poker-icon"></div>
                                            <span>ВИДЕО ПОКЕР</span>
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
                                    <span class="js-open-search" title="Открыть поиск">
                                        <span class="icon"></span>
                                        Поиск
                                    </span>

                                <form action="#" class="games-search-form">
                                    <input type="text" class="form-control" placeholder="Поиск по играм">
                                    <button type="button" class="search-btn" title="Поиск"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </header>
                <span class="js-open-popup btn half-btn" data-popup="provider-popup">Провайдер</span>
            </div>
            <div class="container">
                <div class="games-list">

                    <header class="header popular-games-section">
                        <span class="type">Популярные</span>
                        <span class="count-text">
                            <span class="text">Популярных игр /</span>
                            <span class="count"></span>
                        </span>
                    </header>
                    {{--<div class="popular-games">--}}

                    <!--
                    <div class="game-item">
                        <a href="" class="game-link js-open-popup" data-touch-popup="choose-game-popup" data-popup="authorization" style="background-image: url('{{ asset('img/uploads/game-img1.jpg') }}');">
                            <div class="overlay">
                                <span data-text="Играть бесплатно" class="js-open-game" data-src="https://bettend.tain.com/embedded/app/mccasino/fun/game?launch=source&source.provider=PLAYNGO&source.id=342&source.channel=desktop&lang=ru" data-game-bg="static-bg">Играть бесплатно</span>
                            </div>
                        </a>
                    </div>
                    <div class="game-item">
                        <a href="" class="game-link js-open-popup" data-touch-popup="choose-game-popup" data-popup="authorization" style="background-image: url('{{ asset('img/uploads/game-img2.jpg') }}');">
                            <span class="sum-label">€ 6.500,95</span>
                            <div class="overlay">
                                <span data-text="Играть бесплатно" class="js-open-game" data-src="https://bettend.tain.com/embedded/app/mccasino/fun/game?launch=source&source.provider=NETENT&source.id=shangrila_not_mobile_sw&source.channel=desktop&lang=ru" data-game-bg="game-bg2">Играть бесплатно</span>
                            </div>
                        </a>
                    </div>
                    <div class="game-item">
                        <a href="" class="game-link js-open-popup" data-touch-popup="choose-game-popup" data-popup="authorization" style="background-image: url('{{ asset('img/uploads/game-img3.jpg') }}');">
                            <div class="overlay">
                                <span data-text="Играть бесплатно" class="js-open-game" data-src="https://bettend.tain.com/embedded/app/mccasino/fun/game?launch=source&source.provider=NETENT&source.id=finn_not_mobile_sw&source.channel=desktop&lang=ru" data-game-bg="game-bg3">Играть бесплатно</span>
                            </div>
                        </a>
                    </div>
                    <div class="game-item">
                        <a href="" class="game-link js-open-popup" data-touch-popup="choose-game-popup" data-popup="authorization" style="background-image: url('{{ asset('img/uploads/game-img4.jpg') }}');">
                            <div class="overlay">
                                <span data-text="Играть бесплатно" class="js-open-game" data-src="https://bettend.tain.com/embedded/app/mccasino/fun/game?launch=source&source.provider=GENII&source.id=SirensSerenadeVideoSlot_Flash&source.channel=desktop&lang=ru" data-game-bg="game-bg4">Играть бесплатно</span>
                            </div>
                        </a>
                    </div>
                    <div class="game-item">
                        <a href="" class="game-link js-open-popup" data-touch-popup="choose-game-popup" data-popup="authorization" style="background-image: url('{{ asset('img/uploads/game-img5.jpg') }}');">
                            <div class="overlay">
                                <span data-text="Играть бесплатно" class="js-open-game" data-src="https://bettend.tain.com/embedded/app/mccasino/fun/game?launch=source&source.provider=F1X2&source.id=7007&source.channel=desktop&lang=ru" data-game-bg="static-bg">Играть бесплатно</span>
                            </div>
                        </a>
                    </div>
                    <div class="game-item">
                        <a href="" class="game-link js-open-popup" data-touch-popup="choose-game-popup" data-popup="authorization" style="background-image: url('{{ asset('img/uploads/game-img1.jpg') }}');">
                            <div class="overlay">
                                <span data-text="Играть бесплатно" class="js-open-game" data-src="https://bettend.tain.com/embedded/app/mccasino/fun/game?launch=source&source.provider=PLAYNGO&source.id=342&source.channel=desktop&lang=ru" data-game-bg="static-bg">Играть бесплатно</span>
                            </div>
                        </a>
                    </div>
                    <div class="game-item">
                        <a href="" class="game-link js-open-popup" data-touch-popup="choose-game-popup" data-popup="authorization" style="background-image: url('{{ asset('img/uploads/game-img2.jpg') }}');">
                            <div class="overlay">
                                <span data-text="Играть бесплатно" class="js-open-game" data-src="https://bettend.tain.com/embedded/app/mccasino/fun/game?launch=source&source.provider=NETENT&source.id=shangrila_not_mobile_sw&source.channel=desktop&lang=ru" data-game-bg="game-bg2">Играть бесплатно</span>
                            </div>
                        </a>
                    </div>
                    <div class="game-item">
                        <a href="" class="game-link js-open-popup" data-touch-popup="choose-game-popup" data-popup="authorization" style="background-image: url('{{ asset('img/uploads/game-img3.jpg') }}');">
                            <div class="overlay">
                                <span data-text="Играть бесплатно" class="js-open-game" data-src="https://bettend.tain.com/embedded/app/mccasino/fun/game?launch=source&source.provider=NETENT&source.id=finn_not_mobile_sw&source.channel=desktop&lang=ru" data-game-bg="game-bg3">Играть бесплатно</span>
                            </div>
                        </a>
                    </div>
                    <div class="game-item">
                        <a href="" class="game-link js-open-popup" data-touch-popup="choose-game-popup" data-popup="authorization" style="background-image: url('{{ asset('img/uploads/game-img4.jpg') }}');">
                            <div class="overlay">
                                <span data-text="Играть бесплатно" class="js-open-game" data-src="https://bettend.tain.com/embedded/app/mccasino/fun/game?launch=source&source.provider=GENII&source.id=SirensSerenadeVideoSlot_Flash&source.channel=desktop&lang=ru" data-game-bg="game-bg4">Играть бесплатно</span>
                            </div>
                        </a>
                    </div>
                    <div class="game-item">
                        <a href="" class="game-link js-open-popup" data-touch-popup="choose-game-popup" data-popup="authorization" style="background-image: url('{{ asset('img/uploads/game-img5.jpg') }}');">
                            <div class="overlay">
                                <span data-text="Играть бесплатно" class="js-open-game" data-src="https://bettend.tain.com/embedded/app/mccasino/fun/game?launch=source&source.provider=F1X2&source.id=7007&source.channel=desktop&lang=ru" data-game-bg="static-bg">Играть бесплатно</span>
                            </div>
                        </a>
                    </div>

                    -->
                    {{--</div>--}}


                    <header class="header">
                        <span class="type">Новинки</span>
                        <span class="count-text">
                                    <span class="text">Новых игр /</span>
                                    <span class="count">78</span>
                                </span>
                    </header>
                    <div class="game-item">
                        <a href="" class="game-link js-open-popup" data-touch-popup="choose-game-popup" data-popup="authorization" style="background-image: url('{{ asset('img/uploads/game-img1.jpg') }}');">
                            <div class="overlay">
                                <span data-text="Играть бесплатно" class="js-open-game" data-src="https://bettend.tain.com/embedded/app/mccasino/fun/game?launch=source&source.provider=PLAYNGO&source.id=342&source.channel=desktop&lang=ru" data-game-bg="static-bg">Играть бесплатно</span>
                            </div>
                        </a>
                    </div>
                    <div class="game-item">
                        <a href="" class="game-link js-open-popup" data-touch-popup="choose-game-popup" data-popup="authorization" style="background-image: url('{{ asset('img/uploads/game-img2.jpg') }}');">
                            <div class="overlay">
                                <span data-text="Играть бесплатно" class="js-open-game" data-src="https://bettend.tain.com/embedded/app/mccasino/fun/game?launch=source&source.provider=NETENT&source.id=shangrila_not_mobile_sw&source.channel=desktop&lang=ru" data-game-bg="game-bg2">Играть бесплатно</span>
                            </div>
                        </a>
                    </div>
                    <div class="game-item">
                        <a href="" class="game-link js-open-popup" data-touch-popup="choose-game-popup" data-popup="authorization" style="background-image: url('{{ asset('img/uploads/game-img3.jpg') }}');">
                            <div class="overlay">
                                <span data-text="Играть бесплатно" class="js-open-game" data-src="https://bettend.tain.com/embedded/app/mccasino/fun/game?launch=source&source.provider=NETENT&source.id=finn_not_mobile_sw&source.channel=desktop&lang=ru" data-game-bg="game-bg3">Играть бесплатно</span>
                            </div>
                        </a>
                    </div>
                    <div class="game-item">
                        <a href="" class="game-link js-open-popup" data-touch-popup="choose-game-popup" data-popup="authorization" style="background-image: url('{{ asset('img/uploads/game-img4.jpg') }}');">
                            <div class="overlay">
                                <span data-text="Играть бесплатно" class="js-open-game" data-src="https://bettend.tain.com/embedded/app/mccasino/fun/game?launch=source&source.provider=GENII&source.id=SirensSerenadeVideoSlot_Flash&source.channel=desktop&lang=ru" data-game-bg="game-bg4">Играть бесплатно</span>
                            </div>
                        </a>
                    </div>
                    <div class="game-item">
                        <a href="" class="game-link js-open-popup" data-touch-popup="choose-game-popup" data-popup="authorization" style="background-image: url('{{ asset('img/uploads/game-img5.jpg') }}');">
                            <div class="overlay">
                                <span data-text="Играть бесплатно" class="js-open-game" data-src="https://bettend.tain.com/embedded/app/mccasino/fun/game?launch=source&source.provider=F1X2&source.id=7007&source.channel=desktop&lang=ru" data-game-bg="static-bg">Играть бесплатно</span>
                            </div>
                        </a>
                    </div>
                    <div class="game-item">
                        <a href="" class="game-link js-open-popup" data-touch-popup="choose-game-popup" data-popup="authorization" style="background-image: url('{{ asset('img/uploads/game-img1.jpg') }}');">
                            <div class="overlay">
                                <span data-text="Играть бесплатно" class="js-open-game" data-src="https://bettend.tain.com/embedded/app/mccasino/fun/game?launch=source&source.provider=PLAYNGO&source.id=342&source.channel=desktop&lang=ru" data-game-bg="static-bg">Играть бесплатно</span>
                            </div>
                        </a>
                    </div>
                    <div class="game-item">
                        <a href="" class="game-link js-open-popup" data-touch-popup="choose-game-popup" data-popup="authorization" style="background-image: url('{{ asset('img/uploads/game-img2.jpg') }}');">
                            <div class="overlay">
                                <span data-text="Играть бесплатно" class="js-open-game" data-src="https://bettend.tain.com/embedded/app/mccasino/fun/game?launch=source&source.provider=NETENT&source.id=shangrila_not_mobile_sw&source.channel=desktop&lang=ru" data-game-bg="game-bg2">Играть бесплатно</span>
                            </div>
                        </a>
                    </div>
                    <div class="game-item">
                        <a href="" class="game-link js-open-popup" data-touch-popup="choose-game-popup" data-popup="authorization" style="background-image: url('{{ asset('img/uploads/game-img3.jpg') }}');">
                            <div class="overlay">
                                <span data-text="Играть бесплатно" class="js-open-game" data-src="https://bettend.tain.com/embedded/app/mccasino/fun/game?launch=source&source.provider=NETENT&source.id=finn_not_mobile_sw&source.channel=desktop&lang=ru" data-game-bg="game-bg3">Играть бесплатно</span>
                            </div>
                        </a>
                    </div>
                    <div class="game-item">
                        <a href="" class="game-link js-open-popup" data-touch-popup="choose-game-popup" data-popup="authorization" style="background-image: url('{{ asset('img/uploads/game-img4.jpg') }}');">
                            <div class="overlay">
                                <span data-text="Играть бесплатно" class="js-open-game" data-src="https://bettend.tain.com/embedded/app/mccasino/fun/game?launch=source&source.provider=GENII&source.id=SirensSerenadeVideoSlot_Flash&source.channel=desktop&lang=ru" data-game-bg="game-bg4">Играть бесплатно</span>
                            </div>
                        </a>
                    </div>
                    <div class="game-item">
                        <a href="" class="game-link js-open-popup" data-touch-popup="choose-game-popup" data-popup="authorization" style="background-image: url('{{ asset('img/uploads/game-img5.jpg') }}');">
                            <div class="overlay">
                                <span data-text="Играть бесплатно" class="js-open-game" data-src="https://bettend.com/" data-game-bg="static-bg">Играть бесплатно</span>
                            </div>
                        </a>
                    </div>

                </div>
                <div class="ajax-upload-box">
                    <a href="pages\more-games.html" class="js-load-more btn">загрузить еще</a>

                    <p class="message" data-text="Все игры загружены">Все игры загружены</p>
                </div>
            </div>
        </main>
@endsection