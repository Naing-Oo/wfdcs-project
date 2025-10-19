<div class="bg-light rounded p-4 mt-3">
    <h5 class="font-weight-bold mb-3">{{ __('file.Cart Total') }}</h5>
    <ul class="list-group">
        <li
            class="list-group-item d-flex flex-wrap justify-content-between align-items-center border-0 bg-transparent px-0 px-md-2 py-1">
            <h6>{{ __('file.Total') }}</h6>
            <div>
                <span id="subTotal" class="mr-2">{{ number_format($order->sub_total, 2) }}</span>
                <span>{{ __('file.THB') }}</span>
            </div>
        </li>
        <li
            class="list-group-item d-flex flex-wrap justify-content-between align-items-center border-0 bg-transparent px-0 px-md-2 py-1">
            <h6>{{ __('file.Delivery Fee') }}</h6>
            <div>
                <span id="deliveryFee" class="mr-2">{{ number_format($order->delivery_fee, 2) }}</span>
                <span>{{ __('file.THB') }}</span>
            </div>
        </li>

        <li
            class="list-group-item d-flex flex-wrap justify-content-between align-items-center border-0 bg-transparent px-0 px-md-2 py-1">
            <h6>{{ __('file.Coupon') }}</h6>
            <div>
                <span id="couponDiscount"
                    class="mr-2 text-danger">{{ number_format($order->coupon_discount, 2) }}</span>
                <span>{{ __('file.THB') }}</span>
            </div>
        </li>

        <li
            class="list-group-item d-flex flex-wrap justify-content-between align-items-center border-0 bg-transparent px-0 px-md-2 py-1">
            <h6 class="font-weight-bold">{{ __('file.Total') }}</h6>
            <div>
                <span id="grandTotal" class="font-weight-bold mr-2">{{ number_format($order->grand_total, 2) }}</span>
                <span class="font-weight-bold">{{ __('file.THB') }}</span>
            </div>
        </li>
    </ul>
</div>
<p class="text-danger my-3 text-center">{{ __('file.Please press the button to confirm payment') }}</p>


<form id="frmPayment" action="{{ route('checkout.update', $order->id) }}" 
    method="post" enctype="multipart/form-data">

    @csrf
    @method('put')

    <button type="submit" class="btn btn-primary py-2 w-100">
        {{ __('file.Confirm payment') }}
    </button>
</form>
