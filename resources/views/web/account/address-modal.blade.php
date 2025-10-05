<!-- The Modal -->
<div class="modal fade" id="addressModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="number">Address</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="frmCheckout" action="{{ route('account.address.update') }}" method="post">

                    @csrf

                    <input type="hidden" id="id" name="id">

                    @include('web.shop.address')
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer d-block text-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btnSubmit" class="btn btn-success">Apply</button>
            </div>

        </div>
    </div>
</div>
