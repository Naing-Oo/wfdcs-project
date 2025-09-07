<!-- The Modal -->
<div class="modal fade" id="orderDetails">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="number">ORD-250824001</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <ul class="list-group">
                            <li class="list-group-item border-0 p-1">
                                Order Date: <span id="date"></span>
                            </li>
                            <li class="list-group-item border-0 p-1">
                                Customer: <span id="customer"></span>
                            </li>
                            <li class="list-group-item border-0 p-1">
                                Address: <span id="address"></span>
                            </li>
                            <li class="list-group-item border-0 p-1">
                                Remark: <span id="remark"></span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item border-0 p-1 d-flex justify-content-between">
                                Deliver Fee:
                                <span>
                                    <span id="delivery_fee" class="mr-2">0.00</span>THB 
                                </span>
                            </li>
                            <li class="list-group-item border-0 p-1 d-flex justify-content-between">
                                Discount: 
                                <span>
                                    <span id="discount" class="text-danger mr-2">0.00</span>THB
                                </span>
                            </li>
                            <li class="list-group-item border-0 p-1 d-flex justify-content-between">
                                Amount: 
                                <span>
                                    <span id="amount" class="mr-2">0.00</span>
                                    THB
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <table id="items" class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th class="text-right">Price</th>
                            <th class="text-right">Qty</th>
                            <th class="text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
