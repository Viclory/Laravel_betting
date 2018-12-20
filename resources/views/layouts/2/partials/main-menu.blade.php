{{--@section('main-menu')--}}
<div class="main-menu d-none d-lg-flex">
    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-light justify-content-center">
            <a class="p-2 mx-4 text-dark text-center" href="#" data-toggle="collapse" data-target="#search-games" aria-expanded="true" aria-controls="search-games">
                <img class="d-block mx-auto" src="{{ asset('/img/layout2.0/icons/search.png') }}" alt="">
                Search
            </a>
            <a class="p-2 mx-4 text-dark game-type text-center" href="{{ URL::to('/games/popular') }}" data-games-type="popular">
                <img class="d-block mx-auto" src="{{ asset('/img/layout2.0/icons/popular.png') }}" alt="">
                Popular Games
            </a>
            <a class="p-2 mx-4 text-dark game-type text-center" href="{{ URL::to('/games/casino') }}" data-games-type="casino">
                <img class="d-block mx-auto" src="{{ asset('/img/layout2.0/icons/casino-games.png') }}" alt="">
                Casino Games
            </a>
            <a class="p-2 mx-4 text-dark  text-center" href="#" data-toggle="modal" data-target=".available-soon-popup">
                <img class="d-block mx-auto" src="{{ asset('/img/layout2.0/icons/sport.png') }}" alt="">
                Sport
            </a>
            <a class="p-2 mx-4 text-dark game-type text-center" href="{{ URL::to('/games/table') }}">
                <img class="d-block mx-auto" src="{{ asset('/img/layout2.0/icons/table-games.png') }}" alt="">
                Table Games
            </a>
            <a class="p-2 mx-4 text-dark s- text-center" href="{{ URL::to('/promotions') }}">
                <img class="d-block mx-auto" src="{{ asset('/img/layout2.0/icons/promotion.png') }}" alt="">
                Promotions
            </a>
            <a class="p-2 mx-4 text-dark game-type text-center" href="{{ URL::to('/games/all') }}" data-games-type="all">
                <img class="d-block mx-auto" src="{{ asset('/img/layout2.0/icons/all-games.png') }}" alt="">
                All Games
            </a>

            <a class="p-2 mx-4 text-dark text-center" href="#" data-toggle="collapse" data-target="#filters-block" aria-expanded="false" aria-controls="filters-block">
                <img class="d-block mx-auto" src="{{ asset('/img/layout2.0/icons/filter.png') }}" alt="">
                Filter
            </a>

        </nav>

        <div class="filters-wrapper">
            <div class="container">

                <div class="collapse" id="filters-block">
                    <div class="card card-body mb-4">
                        <div class="vendors">
                            @foreach (\app\Helpers\Functions::getGameVendors() as $vendor)
                                <div class="form-group d-inline-block px-2">
                                    <input type="checkbox" name="vendor" value="{{ $vendor->id }}">
                                    <label for="">@if (\strlen($vendor->display_name) > 0) {{ $vendor->display_name }} @else {{ $vendor->name }}@endif</label>
                                </div>
                            @endforeach
                                <div class="form-group d-inline-block px-2">
                                    <input type="checkbox" name="type" value="popular">
                                    <label for="type">Popular Games</label>
                                </div>
                                <div class="form-group d-inline-block px-2">
                                    <input type="checkbox" name="type" value="table">
                                    <label for="type">Table Games</label>
                                </div>
                                <div class="form-group d-inline-block px-2">
                                    <input type="checkbox" name="type" value="all">
                                    <label for="type">All Games</label>
                                </div>

                                <button type="reset" class="btn btn-dark btn-sm clear-filters">Clear filters</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="search-block-wrapper">
            <div class="container">
                <div class="collapse" id="search-games">
                    <div class="card card-body">
                        <div class="vendors">
                            <input type="text" class="form-control-plaintext search-field" name="search" placeholder="Search ...">
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<div class="withdraw">
    <div class="modal fade available-soon-popup" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">available soon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
{{--@endsection--}}