@extends('layouts.app')

@section('content')
    <div id="page-bg">

        <div class="container">

            <p class="h1" id="bonus-anchor" data-text="Бонусы">Бонусы</p>

            <div class="bonus-list">
                <div class="item">
                    <div class="text">
                        <h2>Приветственный бонус</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <ul>
                            <li><mark>Депозит 1</mark> Lorem Ipsum is simply dummy text.</li>
                            <li><mark>Депозит 2</mark> Lorem Ipsum is simply dummy text.</li>
                            <li><mark>Депозит 3</mark> Lorem Ipsum is simply dummy text.</li>
                        </ul>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                    </div>
                    <div class="img">
                        <img src="{{ asset('img/bonus-img1.png') }}" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="text">
                        <h2>Промокоды</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <ul>
                            <li>1-й Lorem Ipsum is simply dummy text <mark>LEPRECON</mark></li>
                            <li>2-й Lorem Ipsum is simply dummy text <mark>LEPRECON</mark></li>
                            <li>3-й Lorem Ipsum is simply dummy text <mark>LEPRECON</mark></li>
                        </ul>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                    </div>
                    <div class="img">
                        <img src="{{ asset('img/bonus-img2.png') }}" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="text">
                        <h2>Кэш-бэк</h2>
                        <p>Lorem Ipsum is simply dummy text</p>
                        <ul>
                            <li><mark>Lorem Ipsum</mark> Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                            <li><mark>Lorem Ipsum</mark> Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                        </ul>
                    </div>
                    <div class="img">
                        <img src="{{ asset('img/bonus-img3.png') }}" alt="">
                    </div>
                    <a href="" class="sub-link">Условия и правила</a>
                </div>
                <div class="item">
                    <div class="text">
                        <h2>Фри спины</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <ul>
                            <li><mark>Lorem Ipsum</mark> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>
                            <li><mark>Lorem Ipsum</mark> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>
                        </ul>
                    </div>
                    <div class="img">
                        <img src="{{ asset('img\bonus-img2.png') }}" alt="">
                    </div>
                    <a href="" class="sub-link">Условия и правила</a>
                </div>
            </div>
            <p class="sub-title center"><span data-text="Lorem Ipsum is simply dummy text of the printing and typesetting industry">Lorem Ipsum is simply dummy text of the printing and typesetting industry</span></p>
            <div class="accordion">
                <div class="item active">
                    <div class="title">
                        <h2>Условия и правила</h2>
                    </div>
                    <div class="text">
                        <h3>Общие условия и условия бонусов</h3>
                        <p>1. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <p>2. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <p>3. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <p>4. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <p>5. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <p>6. Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <p>7. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <p>8. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                    </div>
                </div>
            </div>
        </div>

        <div id="top-page-bg" class="responsimg" data-responsimg780="{{ asset('img/top-page-bg.png') }}" data-responsimg10="{{ asset('img/top-page-bg-mobile.png') }}"></div>
        <div id="bottom-page-bg" class="responsimg" data-responsimg780="{{ asset('img/bottom-page-bg.png') }}" data-responsimg10="{{ asset('img/bottom-page-bg-mobile.png') }}"></div>
    </div>
@endsection