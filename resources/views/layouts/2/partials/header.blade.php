<header>
    @if(Auth::user())
		<?php $popup_class = '.deposit-popup'; ?>
		<?php $green_title = 'Deposit'; ?>
    @else
		<?php $popup_class = '.signup-popup'; ?>
		<?php $green_title = 'Signup'; ?>
    @endif
    <nav class="navbar navbar-expand-md navbar-light bg-white">
        <a class="navbar-brand" href="{{ URL::to('/') }}">
            <img class="img-responsive top-logo" src="{{ asset('img/layout2.0/logo.png') }}" alt="">
        </a>

        @if(Auth::user())
            <a href="#" data-toggle="modal" data-target=".deposit-popup" class="signup">
                <img src="{{ asset('img/layout2.0/deposit.png') }}" alt="">
            </a>
            <a href="#" data-toggle="modal" data-target=".deposit-popup" class="btn btn-success mobile-depo-button">
                <i class="fa fa-euro"></i>
                <i class="fa fa-dollar"></i>
            </a>
        @endif


        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarCollapse" style="">
            <div class="mr-auto"></div>

            @if(Auth::user() == null)

            <form class="form-inline mt-2 mt-md-0 justify-content-lg-end" id="login-player-form" method="post" action="{{ URL::to('/player/login') }}">
                {{ csrf_field() }}
                <input type="text" class="form-control form-control-sm" name="username" placeholder="Username">
                <input type="password" class="form-control form-control-sm ml-md-2 my-2 ml-sm-2" name="password" placeholder="Password">
                <button type="button" name="login" class="btn btn-info btn-sm form-control ml-lg-3 ml-sm-2" id="login-player-submit">Login</button>
                <button type="button" class="btn btn-success btn-sm form-control my-2 ml-lg-3 ml-sm-2" href="#" data-toggle="modal" data-target=".signup-popup">Sign Up</button>
            </form>
            @else
		        <?php $balanceObj = App\StaygamingBO::getBalanceByPlayerId(Auth::user()->player_id); ?>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="d-inline-flex mx-3">
                            <span class="player_balance">{{ $balanceObj->result->balance + $balanceObj->result->bonus }}</span>
                            &nbsp;
                            {{ $balanceObj->result->currency }}
                        </div>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" data-toggle="modal" data-target=".my-account-modal" href="{{ URL::to('/my-account') }}">
                                <i class="fa fa-user"></i>
                                My Account
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ URL::to('/logout') }}">
                                <i class="fa fa-sign-out"></i>
                                Logout
                            </a>
                        </div>
                    </div>
            @endif

            <ul class="navbar-nav flex-row d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="languages-selector" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('img/layout2.0/countries/gb.png') }}" width="20" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languages-selector">
                        <a class="dropdown-item" href="#">More languages available soon</a>
                    </div>
                </li>
            </ul>

            @include('layouts.2.partials.main-menu-mobile')
        </div>
    </nav>
</header>























@if (!Auth::user())
@include('layouts.2.partials.signup-popup')
@else
@include('layouts.2.partials.deposit-popup')
@include('layouts.2.partials.withdraw-popup')
@include('layouts.2.partials.my-account-modal')
@endif