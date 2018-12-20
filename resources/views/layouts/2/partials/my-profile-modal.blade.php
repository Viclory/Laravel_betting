<div class="modal my-profile-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">My Profile</h5>
                <button type="button" class="close" data-dismiss="modal" data-toggle="modal" data-target=".my-account-modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php $player = json_decode(\App\StaygamingBO::getPlayerInfo(Auth::user()))->result; ?>

            <div class="modal-body">
                <div class="container-fluid align-items-center align-content-center justify-content-center align-middle text-center">

                    <form action="/profile/update" method="post">
                        <div class="row">
                            {{ csrf_field() }}
                            <input type="hidden" name="player_id" value="{{ $player->id }}">


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="firstname">Name</label>
                                    <input type="text" class="form-control" name="firstname" value="{{ $player->name }}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select name="gender" class="form-control">
                                        <option value="m">Male</option>
                                        <option value="f">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="dob">Birthdate</label>
                                    <input type="date" class="form-control" name="dob" value="{{ date('Y-m-d', strtotime($player->dob)) }}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $player->phone }}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" value="">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" disabled class="form-control" name="email" value="{{ $player->email }}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="status">Account Status</label>
                                    <input type="text" disabled class="form-control" name="status" value="{{ $player->status }}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="currency">Currency</label>
                                    <input type="text" disabled class="form-control" name="currency" value="{{ $player->currency->char_code }}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="lang">Language</label>
                                    <input type="text" class="form-control" name="country_id" id="country_id" value="{{ $player->country->name }}" disabled>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">

                                <button class="btn btn-success" type="submit">Save</button>
                                <button type="button" class="btn btn-secondary " data-dismiss="modal" data-toggle="modal" data-target=".my-account-modal">Close</button>
                            </div>
                        </div>

                    </form>


                </div>


            </div>
        </div>
    </div>
</div>