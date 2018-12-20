<div class="modal signup-popup" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Signup</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ URL::to('/player/register') }}" method="post" id="register-player-form" name="register-player-form">
            <div class="modal-body">
                <div class="container-fluid">
                    {{csrf_field()}}
                    <input type="hidden" name="merchant_id" value="{{ env('MERCHANT_ID') }}">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" required id="username" name="username" placeholder="Enter your username">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="username">Name</label>
                                <input type="text" class="form-control" required id="name" name="name" placeholder="Enter your name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" required id="email" name="email" placeholder="Enter email">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" required id="password" name="password" placeholder="Enter password">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="conf-password">Confirm password</label>
                                <input type="password" class="form-control" required id="confirm_password" name="confirm_password" placeholder="Enter password">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dob">BirthDate</label>
                                <input type="text" class="form-control" required id="dob" name="dob" placeholder="1985-07-12">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="currency">Currency</label>
                                <select class="form-control" name="currency" id="currency" required>
                                    <option value="">---</option>
                                    <?php $currencies = \App\Helpers\Functions::getCurrencies(); ?>
                                    @foreach($currencies as $currency)
                                        <option value="{{$currency->id}}">{{$currency->char_code}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group clearfix">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" required id="phone" name="phone" placeholder="Phone" value="+380976534373">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="country_id">Country</label>
                                <select class="form-control" name="country_id" id="country_id" required>
                                    <option value="">---</option>
                                    <?php $countries = \App\Helpers\Functions::getCountries(); ?>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="zip">Zip</label>
                                <input type="text" name="zip" id="zip" required class="form-control" placeholder="Zip">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" name="city" id="city" required class="form-control" placeholder="City">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Address">Address</label>
                                <input type="text" name="address" id="address" required class="form-control" placeholder="Address">
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="submit"  class="btn btn-primary btn-sm" id="register-player-submit">Sign Up</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
            </form>

        </div>
    </div>
</div>