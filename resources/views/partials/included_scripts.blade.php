<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/jquery.cookie.js') }}"></script>
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