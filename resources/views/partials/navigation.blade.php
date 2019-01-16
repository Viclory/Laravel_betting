<a href="{{ URL::to('/') }}" id="logo" title="На главную"></a>
<nav id="nav">
    <ul>
        <li @if($active == 'casino') class="active"@endif>
            <a href="{{ URL::to('/casino') }}">Casino</a>
        </li>
        <li @if($active == 'casino-live') class="active"@endif>
            <a href="{{ URL::to('/casino-live') }}">Casino live</a>
        </li>
        <li @if($active == 'sport') class="active"@endif>
            <a href="{{ URL::to('/sport') }}">Sport</a>
        </li>
        <li>
            <a href="{{ URL::to('/bingo') }}">Bingo</a>
        </li>
        <li>
            <a href="index-4.html#bonus-anchor">Bonus</a>
        </li>
    </ul>
    <span id="js-close-nav" title="Закрыть меню"></span>
</nav>