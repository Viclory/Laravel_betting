<div class="withdraw">
    <div class="modal fade withdraw-popup" id="player-withdraw-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Withdraw</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">

                    {{--<h3 class="justify-content-center text-center">--}}
                        {{--<p>Our automatic withdrawal section is currently under service.</p>--}}
                        {{--<p>Please contact</p>--}}
                        {{--<p><a class="font-weight-bold" href="mailto:support@playspin.com">support@playspin.com</a></p>--}}
                        {{--<p>for withdrawals</p>--}}
                    {{--</h3>--}}


                    <form class="withdraw-form" role="form" action="{{ URL::to('/withdraw') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="player_id" value="{{Auth::user()->player_id}}">
                        <input type="hidden" id="merchant_id" name="merchant_id" value="{{env('MERCHANT_ID')}}">

                        {{--@if(count($bonuses)>0)--}}
                            {{--<div class="form-group">--}}
                                {{--<label  class="col-sm-2 control-label" for="inputEmail3">Bonus</label>--}}
                                {{--<div class="col-sm">--}}
                                    {{--<select class="form-control" id="bonuses" name="bonus_id">--}}
                                        {{--<option value="0">Select any one of them for get Bonus</option>--}}
                                        {{--@foreach($bonuses as $bonus)--}}
                                            {{--<option value="{{ $bonus->id }}">{{ $bonus->title }}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div/>--}}
                        {{--@endif--}}
                        <div class="form-group">
                            <label  class="col-sm-2 control-label" for="inputEmail3">Amount</label>
                            <div class="col">


                                <input type="number" required class="form-control" id="amount" name="amount" placeholder="Enter amount to withdraw">
                            </div>
                        </div>
                        <div class="form-group form-inline psp-types">
                            <div class="col-md-3 box">
                                <label class="btn" data-toggle="collapse" href="#card_info" role="button" aria-expanded="false" aria-controls="card_info">
                                    <img src="{{ asset('img/payments/logo_creditcard.png') }}" alt="..." class="img-thumbnail img-check">
                                    <input type="radio" name="payment_method" value="CARD" required class="d-none" autocomplete="off">
                                </label>
                            </div>
                            <!--<div class="col-md-3 box">
                                <label class="btn">
                                    <img src="{{ asset('img/payments/skrill1.png') }}" alt="..." class="img-thumbnail img-check">
                                    <input type="radio" name="payment_method" id="MBKR" value="MBKR" required class="d-none" autocomplete="off">
                                </label>
                            </div>
                            <div class="col-md-3 box">
                                <label class="btn">
                                    <img src="{{ asset('img/payments/logo_neteller.png') }}" alt="..." class="img-thumbnail img-check">
                                    <input type="radio" name="payment_method" id="NT" value="NT" class="d-none" autocomplete="off">
                                </label>
                            </div>-->
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Done</button>
                            </div>
                        </div>
                    </form>


                </div>


            </div>
        </div>
    </div>

</div>