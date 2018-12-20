<div class="modal player-kyc-docs-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">KYC Docs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target=".my-account-modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <div class="modal-body">
                <div class="container-fluid align-items-center align-content-center justify-content-center align-middle text-center">

                    <form enctype= "multipart/form-data" action="{{ route('uploadkycDocs') }}" method="post">
                        <div class="form-group">
                            <label for="email">Upload Doc:</label>
                            {{csrf_field()}}
                            <input type="file" required name="file" class="form-control" id="email">
                        </div>

                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal" data-target=".my-account-modal">Close</button>
                    </form>


                </div>


            </div>

        </div>
    </div>
</div>