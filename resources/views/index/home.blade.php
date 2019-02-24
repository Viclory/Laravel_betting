@extends('layouts.app')

@section('content')
    <div id="page-bg">

        <div class="container">

            <p class="h1" id="bonus-anchor" data-text="Bonuses">Bonuses</p>

            <div class="bonus-list">
                <div class="item">
                    {{--<div class="img">--}}

                        <img src="{{ asset('/img/banners/banner_100welcome.jpg') }}" alt="">
                    {{--</div>--}}
                </div>
                <div class="item">
                    <div class="text">
                        <h2>Rules</h2>
                        <p>General terms and bonuses terms and conditions</p>
                        <ul>
                            <li>1. Only new customers can avail of this promotion.</li>
                            <li>2. Each customer can only claim one welcome offer (100% Bonus up to € 500) per person, per household, per shared computer, per shared address, and per shared IP address.</li>
                            <li>3. This promotion is valid until further notice.</li>
                            <li>4. The right to deny any customer the bonus and/or to discontinue the promotion at any time is reserved by the Global Live Casino management.</li>
                            <li>5. Both, Global Live Casino’s General Terms & Conditions and its Welcome Casino Bonus Terms & Conditions apply.</li>
                            {{--<li>6. In order to qualify for this promotions in other currencies, deposit the equivalent of € 20 in your local currency. Please use www.oanda.com to check the current exchange rates.</li>--}}
                            {{--<li><mark>Депозит 1</mark> Lorem Ipsum is simply dummy text.</li>--}}
                            {{--<li><mark>Депозит 2</mark> Lorem Ipsum is simply dummy text.</li>--}}
                            {{--<li><mark>Депозит 3</mark> Lorem Ipsum is simply dummy text.</li>--}}
                        </ul>
                        {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>--}}
                    </div>
                    <div class="img">
                        <img src="{{ asset('img/bonus-img1.png') }}" alt="">
                    </div>
                </div>
                {{--<div class="item">--}}
                    {{--<div class="text">--}}
                        {{--<h2>Промокоды</h2>--}}
                        {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>--}}
                        {{--<ul>--}}
                            {{--<li>1-й Lorem Ipsum is simply dummy text <mark>LEPRECON</mark></li>--}}
                            {{--<li>2-й Lorem Ipsum is simply dummy text <mark>LEPRECON</mark></li>--}}
                            {{--<li>3-й Lorem Ipsum is simply dummy text <mark>LEPRECON</mark></li>--}}
                        {{--</ul>--}}
                        {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>--}}
                    {{--</div>--}}
                    {{--<div class="img">--}}
                        {{--<img src="{{ asset('img/bonus-img2.png') }}" alt="">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="item">--}}
                    {{--<div class="text">--}}
                        {{--<h2>Кэш-бэк</h2>--}}
                        {{--<p>Lorem Ipsum is simply dummy text</p>--}}
                        {{--<ul>--}}
                            {{--<li><mark>Lorem Ipsum</mark> Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>--}}
                            {{--<li><mark>Lorem Ipsum</mark> Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    {{--<div class="img">--}}
                        {{--<img src="{{ asset('img/bonus-img3.png') }}" alt="">--}}
                    {{--</div>--}}
                    {{--<a href="#terms" class="sub-link">Условия и правила</a>--}}
                {{--</div>--}}
                {{--<div class="item">--}}
                    {{--<div class="text">--}}
                        {{--<h2>Фри спины</h2>--}}
                        {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>--}}
                        {{--<ul>--}}
                            {{--<li><mark>Lorem Ipsum</mark> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>--}}
                            {{--<li><mark>Lorem Ipsum</mark> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    {{--<div class="img">--}}
                        {{--<img src="{{ asset('img\bonus-img2.png') }}" alt="">--}}
                    {{--</div>--}}
                    {{--<a href="#terms" class="sub-link">Условия и правила</a>--}}
                {{--</div>--}}
            </div>
            {{--<p class="sub-title center"><span data-text="Rules">Rules</span></p>--}}
            {{--<div class="accordion">--}}
                {{--<div class="item active" id="terms">--}}
                    {{--<div class="title">--}}
                        {{--<h2>Rules</h2>--}}
                    {{--</div>--}}
                    {{--<div class="text">--}}
                        {{--<h3>General terms and bonuses terms and conditions</h3>--}}
                        {{--<p>1. Only new customers can avail of this promotion.</p>--}}
                        {{--<p>2. Each customer can only claim one welcome offer (100% Bonus up to € 500) per person, per household, per shared computer, per shared address, and per shared IP address.</p>--}}
                        {{--<p>3. This promotion is valid until further notice.</p>--}}
                        {{--<p>4. The right to deny any customer the bonus and/or to discontinue the promotion at any time is reserved by the Global Live Casino management.</p>--}}
                        {{--<p>5. Both, Global Live Casino’s General Terms & Conditions and its Welcome Casino Bonus Terms & Conditions apply.</p>--}}
                        {{--<p>6. In order to qualify for this promotions in other currencies, deposit the equivalent of € 20 in your local currency. Please use www.oanda.com to check the current exchange rates.</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="item" id="terms">--}}
                    {{--<div class="title">--}}
                        {{--<h2>Rules</h2>--}}
                    {{--</div>--}}
                    {{--<div class="text">--}}
                        {{--<h3>General terms and bonuses terms and conditions</h3>--}}
                        {{--<p>1. Only new customers can avail of this promotion.</p>--}}
                        {{--<p>2. Each customer can only claim one welcome offer (100% Bonus up to € 500) per person, per household, per shared computer, per shared address, and per shared IP address.</p>--}}
                        {{--<p>3. This promotion is valid until further notice.</p>--}}
                        {{--<p>4. The right to deny any customer the bonus and/or to discontinue the promotion at any time is reserved by the Global Live Casino management.</p>--}}
                        {{--<p>5. Both, Global Live Casino’s General Terms & Conditions and its Welcome Casino Bonus Terms & Conditions apply.</p>--}}
                        {{--<p>6. In order to qualify for this promotions in other currencies, deposit the equivalent of € 20 in your local currency. Please use www.oanda.com to check the current exchange rates.</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>

        <div id="top-page-bg" class="responsimg" data-responsimg780="{{ asset('img/top-page-bg.png') }}" data-responsimg10="{{ asset('img/top-page-bg-mobile.png') }}"></div>
        <div id="bottom-page-bg" class="responsimg" data-responsimg780="{{ asset('img/bottom-page-bg.png') }}" data-responsimg10="{{ asset('img/bottom-page-bg-mobile.png') }}"></div>
    </div>
@endsection