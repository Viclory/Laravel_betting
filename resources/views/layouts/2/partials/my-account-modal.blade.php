<div class="modal my-account-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">My Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">
                <div class="container-fluid align-items-center align-content-center justify-content-center align-middle text-center">
                    <div class="row">
                        <div class="col">
                            <a class="my-account-button d-inline-flex justify-content-center" href="#" data-toggle="modal" data-target=".my-profile-modal" data-dismiss="modal">
                                My Profile
                                {{--<img src="{{ asset('img/layout2.0/buttons/my-profile-btn.png') }}" alt="">--}}
                            </a>
                            <a class="my-account-button d-inline-flex justify-content-center" href="#" data-toggle="modal" data-target=".player-kyc-docs-modal" data-dismiss="modal">
                                Kyc Documents
                                {{--<img src="{{ asset('img/layout2.0/buttons/kyc-btn.png') }}" alt="">--}}
                            </a>

                        </div>

                        <div class="col">
                            <a class="my-account-button d-inline-flex justify-content-center" href="#" data-toggle="modal" data-target=".deposit-popup" data-dismiss="modal">
                                Deposit
                                {{--<img src="{{ asset('img/layout2.0/buttons/deposit-btn.png') }}" alt="">--}}
                            </a>
                            <a class="my-account-button d-inline-flex justify-content-center" href="#" data-toggle="modal" data-target=".withdraw-popup" data-dismiss="modal">
                                Withdraw
                                {{--<img src="{{ asset('img/layout2.0/buttons/withdrawal-btn.png') }}" alt="">--}}
                            </a>
                        </div>
                        <div class="col">
                            <a class="my-account-button d-inline-flex justify-content-center" href="#" data-toggle="modal" data-target=".cool-off-period-popup" data-dismiss="modal">
                                Responsible Gambling
                                {{--<img src="{{ asset('img/layout2.0/buttons/deposit-btn.png') }}" alt="">--}}
                            </a>
                        </div>
                    </div>

                <!--<a href="{{ URL::to('/game-history') }}"><h3>Game History</h3></a>-->
                <!--<a href="{{ URL::to('/active-games') }}"><h3>Active Games</h3></a>-->
                <!--<a href="{{ URL::to('/favourite-games') }}"><h3>Favourite Games</h3></a>-->
                <!--<a href="{{ URL::to('/favourite-sports') }}"><h3>Favourite Sports</h3></a>-->

                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

@if(Auth::user() != null)
@include('layouts.2.partials.my-profile-modal')
@include('layouts.2.partials.player-kyc-docs-modal')
@include('layouts.2.partials.cool-of-period-popup')
@endif