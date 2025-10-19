@extends('web.layout.template')

@section('content')
    <!-- Breadcrumb Section Begin -->
    @include('web.common.breadcrumb', [
        'title' => 'Vegetable’s Package',
    ])
    <!-- Breadcrumb Section End -->


    <section class="shoping-cart spad">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                <h5 class="font-weight-bold">Payment</h5>
                {!! $order->status_style !!}
            </div>

            <ol class="breadcrumb mb-1">
                <li class="breadcrumb-item">
                    <a href="{{ route('shop.shoppingCart') }}">Shopping Cart</a>
                </li>
                <li class="breadcrumb-item active">Order Number # {{ $order->order_number }}</li>
            </ol>

            <div class="row">
                <div class="col-12 col-md-6">
                    @include('web.checkout.summary')
                </div>
                <div class="col-12 col-md-6">

                    <div class="bg-light rounded p-4 mt-3 text-center">
                        <div class="text-center">
                            <img id="showLogo" src="{{ asset('web/img/MY-KBANK.jpg') }}" alt=""
                                class="img-fluid" width="300">
                        </div>
                    </div>

                    <label for="" class="mt-3">{{ __('file.Attach slip') }}</label>
                    <input type="file" class="form-control" name="slip" form="frmPayment" required>

                    {{-- <div class="bg-light rounded p-4 mt-3 text-center">
                            <div class="text-center">
                                <img id="showLogo" src="{{ asset('web/img/PromptPay-logo.png') }}" alt=""
                                    class="img-fluid" width="300">
                                <div id="qrImage" class="text-center"></div>
                                <h4 class="mt-3" id="amount"></h4>
                                <h4 class="mt-2" id="timer"></h4>
                            </div>
                            <button type="button" id="download-btn"
                                class="btn btn-primary mt-3">{{ __('file.DOWNLOAD QR CODE') }}</button>

                        </div> --}}

                </div>
            </div>

        </div>
    </section>
@endsection
