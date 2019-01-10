<footer id="footer">
    <div class="container">
        <div class="top-box">
            <div class="sub-nav">
                <div class="col">
                    <ul>
                        <li>
                            <a href="{{ URL::to('/about?section=about-us') }}">{{ __('common.about') }}</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('/about?section=contacts') }}">{{ __('common.contacts') }}</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('/about?section=terms-and-conditions') }}">{{ __('common.terms_and_rules') }}</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('/about?section=responsible-gambling') }}">{{ __('common.responsible_gambling') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="col">
                    <ul>
                        <li>
                            <a href="{{ URL::to('/about?section=betting-rules') }}">{{ __('common.betting_rules') }}</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('/about?section=privacy-policy') }}">{{ __('common.privacy_policy') }}</a>
                        </li>
                        <li>
                            <a href="#">{{ __('common.for_partners') }}</a>
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
            <p>{{ __('common.all_rights_reserved') }} 2018</p>
        </div>
    </div>
</footer>