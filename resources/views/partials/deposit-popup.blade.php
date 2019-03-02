@if(Auth::user())
    <?php $balanceObj = App\StaygamingBO::getBalanceByPlayerId(Auth::user()->player_id); ?>
    <?php $playerInfo = \App\Helpers\Functions::getPlayerInfo(); ?>
    <div class="simple-popup payment-order hidden">
        <p class="h2" data-text="Депозит с neteller">{{ __('depo.depo_with') }} Astropay</p>
        <div class="max-w">
            <p class="large">Min deposit amount: 1.16 USD<br> Max deposit amount: 116.50 USD<br> Remaining deposit amount: 116.50 USD</p>
            <!--
            <form action="#" class="form">
                <div class="field">
                    <input type="text" class="form-control" placeholder="Amount">
                    <button type="button" class="btn sub-color field-btn">{{ $playerInfo->currency->char_code }}</button>
                </div>
                <button type="button" class="btn full-width">{{ __('common.continue') }}</button>
            </form>
            -->

            <form class="deposit-form" role="form" action="{{ URL::to('/deposit') }}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="depo_url" value="{{ \App\Helpers\Functions::getDepositUrl() }}">
                <input type="hidden" class="bo_url" value="{{ env('BO_URL') }}">

                <input type="hidden" name="player_id" value="{{ $playerInfo->id }}"/>
                {{--<input type="hidden" name="new_card" value="1" id="depositNewCard">--}}
                <input type="hidden" name="cardtype" value="VISA">



                <input type="hidden" name="account_type" value="live">
                <input type="hidden" name="first_name" value="{{ $playerInfo->name }}">
                <input type="hidden" name="last_name" value="{{ $playerInfo->name }}">
                <input type="hidden" name="email" required="" value="{{ $playerInfo->email }}">
                <input type="hidden" name="address" required="" value="{{ $playerInfo->address }}">
                <input type="hidden" name="city" required="" value="{{ $playerInfo->city }}">
                <input type="hidden" name="state" value="{{ $playerInfo->city }}">
                <input type="hidden" name="country" value="{{ $playerInfo->country->iso_code_2 }}">
                <input type="hidden" name="country_three" value="{{ $playerInfo->country->iso_code_3 }}"/>
                <input type="hidden" name="zip" value="{{ $playerInfo->zip }}">
                <input type="hidden" name="currency" value="{{ $playerInfo->currency->char_code }}">
                <input type="hidden" name="merchant_id" value="{{env('MERCHANT_ID')}}">
                <input type="hidden" name="mobile" value="{{ $playerInfo->phone }}">


                <input type="hidden" name="bonus_id" value="0">
                <div class="form-group">
                    <label  class="control-label" for="amount">Amount</label>
                    <div>
                        <input type="number" required class="form-control" name="amount" placeholder="Enter amount to deposit">
                    </div>
                </div>
                <div class="form-group form-inline psp-types">
                    <div class="col-md-4 box">
                        <label class="" href="#">
                            <img src="{{ asset('img/payments/logo_creditcard.png') }}" alt="..." class="">
                            <input type="radio" name="payment_method" value="ASTROPAY" required class="d-none" autocomplete="off">
                        </label>
                    </div>
                    {{--<div class="col-md-4 box">--}}
                        {{--<label class="">--}}
                            {{--<img src="{{ asset('img/payments/logo_neteller.png') }}" alt="..." class="">--}}
                            {{--<input type="radio" name="payment_method" value="NT" class="d-none" autocomplete="off">--}}
                        {{--</label>--}}
                    {{--</div>--}}
                <!--
                                <div class="col-md-4 box">
                                    <label class="btn">
                                        <img src="{{ asset('img/payments/skrill1.png') }}" alt="..." class="img-thumbnail img-check">
                                        <input type="radio" name="payment_method" value="MBKR" required class="d-none" autocomplete="off">
                                    </label>
                                </div>
                                -->

                    {{--<div class="col-md-4 box">--}}
                        {{--<label class="btn">--}}
                            {{--<img src="{{ asset('img/payments/zimpler.jpg') }}" alt="..." class="img-thumbnail img-check">--}}
                            {{--<input type="radio" name="payment_method" value="ZIMPLER" class="d-none" autocomplete="off">--}}
                        {{--</label>--}}
                    {{--</div>--}}

                    @if($playerInfo->country->iso_code_2 == 'DE')
                        {{--<div class="col-md-4 box">--}}
                            {{--<label class="btn">--}}
                                {{--<img src="{{ asset('img/payments/giropay.png') }}" alt="..." class="img-thumbnail img-check">--}}
                                {{--<input type="radio" name="payment_method" value="GIROPAY" class="d-none" autocomplete="off">--}}
                            {{--</label>--}}
                        {{--</div>--}}
                    @endif

                    @if(in_array($playerInfo->currency->char_code, array('EUR', 'GBP', 'CAD', 'AUD')))
                        {{--<div class="col-md-4 box">--}}
                            {{--<label class="btn">--}}
                                {{--<img src="{{ asset('img/payments/flexepin.png') }}" alt="..." class="img-thumbnail img-check">--}}
                                {{--<input type="radio" name="payment_method" value="FLEXEPIN" class="d-none" autocomplete="off">--}}
                            {{--</label>--}}
                        {{--</div>--}}
                    @endif

                    @if(in_array($playerInfo->currency->char_code, array('EUR', 'USD', 'CAD', 'GBP')))
                        <div class="col-md-4 box">
                            <label class="">
                                <img src="{{ asset('img/payments/ecopayz.png') }}" alt="..." class="img-check">
                                <input type="radio" name="payment_method" value="ECOVOUCHER" class="d-none" autocomplete="off">
                            </label>
                        </div>
                    @endif


                    @if($playerInfo->currency->char_code == 'EUR')
                        <div class="col-md-4 box">
                            <label class="">
                                <img src="{{ asset('img/payments/paykasa.png') }}" alt="..." class="img-check">
                                <input type="radio" name="payment_method" value="PAYKASA" class="d-none" autocomplete="off">
                            </label>
                        </div>
                    @endif


                    @if(in_array($playerInfo->currency->char_code, array('CNY')))
                        {{--<div class="col-md-4 box">--}}
                            {{--<label class="btn">--}}
                                {{--<img src="{{ asset('img/payments/paysec.jpg') }}" alt="..." class="img-thumbnail img-check">--}}
                                {{--<input type="radio" name="payment_method" value="WECHAT" class="d-none" autocomplete="off">--}}
                            {{--</label>--}}
                        {{--</div>--}}
                    @endif

                    {{--<div class="col-md-4 box">--}}
                        {{--<label class="btn">--}}
                            {{--<img src="{{ asset('img/payments/ideal.png') }}" alt="..." class="img-thumbnail img-check">--}}
                            {{--<input type="radio" name="payment_method" value="IDEAL" class="d-none" autocomplete="off">--}}
                        {{--</label>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4 box">--}}
                        {{--<label class="btn">--}}
                            {{--<img src="{{ asset('img/payments/achterafbetalen.png') }}" alt="..." class="img-thumbnail img-check">--}}
                            {{--<input type="radio" name="payment_method" value="ABETALEN" class="d-none" autocomplete="off">--}}
                        {{--</label>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-4 box">--}}
                        {{--<label class="btn">--}}
                            {{--<img src="{{ asset('img/payments/visa.png') }}" alt="..." class="img-thumbnail img-check">--}}
                            {{--<input type="radio" name="payment_method" value="IVISA" class="d-none" autocomplete="off">--}}
                        {{--</label>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-4 box">--}}
                        {{--<label class="btn">--}}
                            {{--<img src="{{ asset('img/payments/mastercard.png') }}" alt="..." class="img-thumbnail img-check">--}}
                            {{--<input type="radio" name="payment_method" value="IMASTERC" class="d-none" autocomplete="off">--}}
                        {{--</label>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-4 box">--}}
                        {{--<label class="btn">--}}
                            {{--<img src="{{ asset('img/payments/direct-debit.png') }}" alt="..." class="img-thumbnail img-check">--}}
                            {{--<input type="radio" name="payment_method" value="DDEBIT" class="d-none" autocomplete="off">--}}
                        {{--</label>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-4 box">--}}
                        {{--<label class="btn">--}}
                            {{--<img src="{{ asset('img/payments/sofort.png') }}" alt="..." class="img-thumbnail img-check">--}}
                            {{--<input type="radio" name="payment_method" value="DIRECTEBANK" class="d-none" autocomplete="off">--}}
                        {{--</label>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-4 box">--}}
                        {{--<label class="btn">--}}
                            {{--<img src="{{ asset('img/payments/mistercash.png') }}" alt="..." class="img-thumbnail img-check">--}}
                            {{--<input type="radio" name="payment_method" value="MISTERCASH" class="d-none" autocomplete="off">--}}
                        {{--</label>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-4 box">--}}
                        {{--<label class="btn">--}}
                            {{--<img src="{{ asset('img/payments/logo_paysafecard.png') }}" alt="..." class="img-thumbnail img-check">--}}
                            {{--<input type="radio" name="payment_method" value="PAYSAFECARD" class="d-none" autocomplete="off">--}}
                        {{--</label>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-4 box">--}}
                        {{--<label class="btn">--}}
                            {{--<img src="{{ asset('img/payments/paypal.png') }}" alt="..." class="img-thumbnail img-check">--}}
                            {{--<input type="radio" name="payment_method" value="PAYPAL" class="d-none" autocomplete="off">--}}
                        {{--</label>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-4 box">--}}
                        {{--<label class="btn">--}}
                            {{--<img src="{{ asset('img/payments/eps.png') }}" alt="..." class="img-thumbnail img-check">--}}
                            {{--<input type="radio" name="payment_method" value="EPS" class="d-none" autocomplete="off">--}}
                        {{--</label>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-4 box">--}}
                        {{--<label class="btn">--}}
                            {{--<img src="{{ asset('img/payments/trustly.png') }}" alt="..." class="img-thumbnail img-check">--}}
                            {{--<input type="radio" name="payment_method" value="TRUSTLY" class="d-none" autocomplete="off">--}}
                        {{--</label>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-4 box">--}}
                        {{--<label class="btn">--}}
                            {{--<div id="paypal-button"></div>--}}
                            {{--<script src="https://www.paypalobjects.com/api/checkout.js"></script>--}}
                            {{--<script>--}}
                                {{--console.log();--}}
                                {{--paypal.Button.render({--}}
                                    {{--// Configure environment--}}
                                    {{--env: 'sandbox',--}}
                                    {{--client: {--}}
                                        {{--// sandbox: 'demo_sandbox_client_id',--}}
                                        {{--// production: 'demo_production_client_id'--}}
                                        {{--sandbox: 'AQ3lCOmBTWu6JTgQos9SNC3FcGPuxPuQjpcrskVgfoWh4Hfm3Hvg3hXILmUKgYlWj-ENv_jTA-pUDRrr'--}}
                                    {{--},--}}
                                    {{--// Customize button (optional)--}}
                                    {{--locale: 'en_US',--}}
                                    {{--style: {--}}
                                        {{--size: 'small',--}}
                                        {{--color: 'gold',--}}
                                        {{--shape: 'pill',--}}
                                    {{--},--}}
                                    {{--// Set up a payment--}}
                                    {{--payment: function(data, actions) {--}}
                                        {{--// alert(document.querySelector('input[name="amount"]').value);--}}
                                        {{--// return false;--}}
                                        {{--return actions.payment.create({--}}
                                            {{--transactions: [{--}}
                                                {{--amount: {--}}
                                                    {{--total: document.querySelector('input[name="amount"]').value,--}}
                                                    {{--currency: 'EUR'--}}
                                                {{--}--}}
                                            {{--}]--}}
                                        {{--});--}}
                                    {{--},--}}
                                    {{--// Execute the payment--}}
                                    {{--onAuthorize: function(data, actions) {--}}
                                        {{--return actions.payment.execute().then(function() {--}}
                                            {{--// Show a confirmation message to the buyer--}}
                                            {{--window.alert('Thank you for your purchase!');--}}
                                        {{--});--}}
                                    {{--}--}}
                                {{--}, '#paypal-button');--}}

                            {{--</script>--}}
                        {{--</label>--}}
                    {{--</div>--}}

                </div>

                {{--<div class="collapse form-group bank-issuer">--}}
                    {{--<label for="bank" class="control-label">Please select your bank <span class="red">*</span> <i class="fa fa-info-circle" data-toggle="tooltip" data-html="true" title="Bank select is required for iDEAL payment method"></i></label>--}}
                    {{--<select class="form-control" name="bank" id="ideal-bank">--}}
                        {{--<option value="ABNAMRO">ABN AMRO Group</option>--}}
                        {{--<option value="ASNBANK">ASN Bank</option>--}}
                        {{--<option value="BUNQ">Bunq</option>--}}
                        {{--<option value="ING">ING Groep</option>--}}
                        {{--<option value="KNAB">KNAB</option>--}}
                        {{--<option value="RABOBANK">Rabobank</option>--}}
                        {{--<option value="SNSBANK">SNS Bank</option>--}}
                        {{--<option value="SNSREGIOBANK">SNS Regio Bank</option>--}}
                        {{--<option value="TRIODOSBANK">Triodos Bank</option>--}}
                        {{--<option value="VANLANSCHOT">Van Lanschot</option>--}}
                    {{--</select>--}}
                {{--</div>--}}

                {{--<div class="collapse" id="card_info">--}}
                    {{--<div class="card card-body">--}}
                        {{--<div class="form-group player-cards-dropdown">--}}
                            {{--<label for="">Cards</label>--}}
                            {{--<select class="form-control" id="player_card" name="player_card" required=""></select>--}}

                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<input type="checkbox" name="new_card" value="1" id="depositNewCard">--}}
                            {{--New Card--}}
                        {{--</div>--}}
                        {{--<div class="new-card-fields clearfix">--}}
                            {{--<div class="col-12">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label for="">Card Number</label>--}}
                                    {{--<input type="text" class="form-control" name="card_no" value="4200000000000000" placeholder="Card number">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-4 pull-left">--}}
                                {{--<div class="form-gorup">--}}

                                    {{--<label for="">MM</label>--}}
                                    {{--<input class="form-control" type="text" name="exp_month" value="07" placeholder="Exp Month">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-4 pull-left">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label for="">YYYY</label>--}}
                                    {{--<input class="form-control" type="text" name="exp_year" value="2019" placeholder="Exp Year">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-4 pull-left">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label for="">CVV</label>--}}
                                    {{--<input class="form-control" type="text" name="cvv" placeholder="CVV" value="311">--}}
                                {{--</div>--}}

                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="form-group">
                    {{--<div class="col-sm-offset-2 col-sm-10">--}}
                    <button type="button" class="btn btn-primary mt-3">Done</button>
                    {{--</div>--}}
                </div>




            </form>
        </div>
        <span class="js-close-popup" title="{{ __('common.close') }}"></span>
    </div>
@endif