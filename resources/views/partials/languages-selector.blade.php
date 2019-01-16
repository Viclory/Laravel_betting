<div id="langs-box">
    @if(\App::getLocale() == 'ru')
        <span class="current-lang">
            <img src="{{ asset('\img\rus-lang.png') }}" alt="">
        </span>
        <div class="dropdown">
            <a href="{{ route('lang.switch', 'vi') }}" title="Eng">
                <img src="{{ asset('\img\en-lang.png') }}" alt="">
                <span>Vietnamese</span>
            </a>
            <a href="{{ route('lang.switch', 'en') }}" title="Eng">
                <img src="{{ asset('\img\en-lang.png') }}" alt="">
                <span>English</span>
            </a>
        </div>
    @else

        <span class="current-lang">
            <img src="{{ asset('\img\en-lang.png') }}" alt="">
        </span>
        <div class="dropdown">
            <a href="{{ route('lang.switch', 'vi') }}" title="Eng">
                <img src="{{ asset('\img\en-lang.png') }}" alt="">
                <span>Vietnamese</span>
            </a>
            <a href="{{ route('lang.switch', 'ru') }}" title="Rus">
                <img src="{{ asset('\img\rus-lang.png') }}" alt="">
                <span>{{ __('common.rus_lang_selector') }}</span>
            </a>
            <a href="{{ route('lang.switch', 'vi') }}" title="Eng">
                <img src="{{ asset('\img\en-lang.png') }}" alt="">
                <span>Spanish</span>
            </a>
            <a href="{{ route('lang.switch', 'vi') }}" title="Eng">
                <img src="{{ asset('\img\en-lang.png') }}" alt="">
                <span>Portugese</span>
            </a>
            <a href="{{ route('lang.switch', 'vi') }}" title="Eng">
                <img src="{{ asset('\img\en-lang.png') }}" alt="">
                <span>China</span>
            </a>
        </div>
    @endif
    {{--<div class="dropdown">--}}
    {{--<a href="{{ route('lang.switch', 'en') }}" title="Eng">--}}
    {{--<img src="{{ asset('\img\en-lang.png') }}" alt="">--}}
    {{--<span>English</span>--}}
    {{--</a>--}}
    {{--<a href="" title="Tur">--}}
    {{--<img src="img\tur-lang.png" alt="">--}}
    {{--<span>English</span>--}}
    {{--</a>--}}
    {{--<a href="" title="Tur">--}}
    {{--<img src="img\tur-lang.png" alt="">--}}
    {{--<span>Turkish</span>--}}
    {{--</a>--}}
    {{--</div>--}}
</div>