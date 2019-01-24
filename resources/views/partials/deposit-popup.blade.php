@if(Auth::user())
    <?php $balanceObj = App\StaygamingBO::getBalanceByPlayerId(Auth::user()->player_id); ?>
    <?php $player_info = \App\Helpers\Functions::getPlayerInfo(); ?>
    <div class="simple-popup payment-order hidden">
        <p class="h2" data-text="Депозит с neteller">Депозит с neteller</p>
        <div class="max-w">
            <p class="large">Min deposit amount: 1.16 USD<br> Max deposit amount: 116.50 USD<br> Remaining deposit amount: 116.50 USD</p>
            <form action="#" class="form">
                <div class="field">
                    <input type="text" class="form-control" placeholder="Amount">
                    <button type="button" class="btn sub-color field-btn">{{ $player_info->currency->char_code }}</button>
                </div>
                <button type="button" class="btn full-width">{{ __('common.continue') }}</button>
            </form>
        </div>
        <span class="js-close-popup" title="{{ __('common.close') }}"></span>
    </div>
@endif