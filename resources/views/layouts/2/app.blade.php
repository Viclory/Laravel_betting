<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />

    <title>{{env('APP_NAME')}}</title>

    <link rel="stylesheet" href="{{ URL::to('css/app.css') }}">

</head>
<body>
    @include('layouts.2.partials.header')

    @yield('banner-slider')

    @if (request()->route()->getName() != 'single-game')
    @include('layouts.2.partials.main-menu')
    @endif

    @include('layouts.2.partials.alerts')

    @yield('content')

    @include('layouts.2.partials.footer')

    <script src="{{ URL::to('js/manifest.js') }}"></script>
    <script src="{{ URL::to('js/vendor.js') }}"></script>
    <script src="{{ URL::to('js/app.js') }}"></script>
    <script src="{{ URL::to('js/validation_.js') }}"></script>
</body>
</html>