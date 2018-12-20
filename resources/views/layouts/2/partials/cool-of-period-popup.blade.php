<div class="cool-of">
    <div class="modal fade cool-off-period-popup" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Self-exclusion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">


                <?php $playerInfo = \App\Helpers\Functions::getPlayerInfo(); ?>

<!--                --><?php //\Log::debug(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$playerInfo->cool_of_period_start)); ?>
<!--                --><?php //\Log::debug(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$playerInfo->cool_of_period_end)); ?>
                @if(!$playerInfo->cool_of_period_end)
                        <p>If you feel you are at risk of developing a gambling problem or believe you currently have a gambling problem, please consider Self-Exclusion.</p>

                        <p>If you want to take a short break from betting and gaming, please use our Cool of Period option. Should you wish to close your account for any other reason, please contact our customer support team for a standard account closure.</p>

                        <p>Self-Exclusion allows you to close your account for a specified period of 6 months, 1 year, 2 years, 3 years or 5 years. This prevents you gambling for your selected period of time.</p>

                        <p>During a period of self-exclusion you will not be able to use your account for betting and gaming. It will not be possible to re-open your account for any reason and we will do all it can to detect and close any new accounts you may open.</p>

                        <p>Should you opt to self-exclude, we strongly recommend that you seek exclusion from all other gambling operators you have an account with.</p>

                        <p>Whilst we will remove you from our marketing databases we recommend that you seek support from a problem gambling support service to help you deal with your problem.</p>
                        <form class="deposit-form" role="form" action="{{ URL::to('/cool-off') }}" method="post">
                            {{csrf_field()}}


                            {{ $playerInfo->cool_of_period_start }}
                            <input type="hidden" name="player_id" value="{{ $playerInfo->id }}"/>

                            <div class="form-group">
                                <label  class="control-label" for="amount">Lock my account for</label>
                                <div>
                                    <select name="duration" class="form-control">
                                        <option value="24h">24 Hours</option>
                                        <option value="48h">48 Hours</option>
                                        <option value="7d">7 Days</option>
                                        <option value="30d">30 Days</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Lock account</button>
                            </div>

                            <div class="form-group">
                                {{--<div class="col-sm-offset-2 col-sm-10">--}}
                                <button type="button" class="btn btn-primary mt-3">Done</button>
                                {{--</div>--}}
                            </div>




                        </form>
                    @endif


                    {{--@if(\Carbon\Carbon::createFromTimestamp($playerInfo->cool_of_period_start))--}}

                    {{--</iframe>--}}
                </div>


            </div>
        </div>
    </div>

</div>