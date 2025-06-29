@extends('web.layout.template')

@section('content')
    <!-- Breadcrumb Section Begin -->
    @include('web.common.breadcrumb', [
        'title' => 'Vegetable’s Package',
    ])
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                {{-- left --}}
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        {{-- first image --}}
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large" src="{{ $product->first_image }}" alt="">
                        </div>

                        {{-- other images --}}
                        <div class="product__details__pic__slider owl-carousel">
                            @foreach ($product->images as $img)
                                <img data-imgbigurl="{{ asset($img->image_url) }}" src="{{ asset($img->image_url) }}"
                                    alt="">
                            @endforeach
                        </div>

                    </div>
                </div>

                {{-- right --}}
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $product->name }}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">{{ number_format($product->price, 2) }} THB</div>
                        <p>{{ $product->description }}</p>

                        <div class="d-flex flex-wrap justify-content-start align-items-center">
                            <div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button id="btnDecrease" class="btn-outline-secondary border-0 py-2 px-2" disabled>
                                            <i class="fa fa-minus-circle" aria-hidden="true" style="font-size: 28px;"></i>
                                        </button>
                                    </div>
                                    <input type="text" id="qty" class="border-0 text-center" value="1"
                                        style="font-size: 18px;width:60px;">
                                    <div class="input-group-prepend">
                                        <button id="btnIncrease"
                                            class="btn-outline-secondary border-0 py-2 px-2" @if ($product->qty <= 0) disabled @endif>
                                            <i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 28px;"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <a href="{{ route('shop.update', $product->id) }}" id="btnAddToCard"
                                    class="btn-success py-2 mx-3 px-5 @if ($product->qty <= 0) disabled @endif">
                                    ADD TO CART
                                </a>

                                <a href="#" class="btn-dark border-0 py-2 px-3"><span
                                        class="icon_heart_alt"></span></a>
                            </div>
                        </div>


                        <ul>
                            <li><b>Availability</b>
                                @if ($product->qty > 0)
                                    <span>In Stock</span>
                                @else
                                    <span class="text-danger">Out of Stock</span>
                                @endif
                            </li>

                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="col-lg-12">
                    {{-- @include('web.shop.description') --}}
                </div>

            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    {{-- @include('web.shop.related') --}}
    <!-- Related Product Section End -->
@endsection

@section('script')
    <script>
        const proQty = parseFloat("{{ $product->qty }}") || 0;
        var qty = 1;

        $(document).on('click', '#btnDecrease, #btnIncrease', function() {
            const button = $(this);
            const isIncrease = button.attr('id') === 'btnIncrease';

            const input = $('input#qty');
            qty = parseFloat(input.val()) || 0;

            qty += isIncrease ? 1 : -1;

            if (qty <= 1) {
                button.prop('disabled', true);
            } else {
                $('#btnDecrease').prop('disabled', false);
            }

            if (qty === proQty || proQty <= 0) {
                button.prop('disabled', true);
            } else {
                $('#btnIncrease').prop('disabled', false);
            }

            input.val(qty);
        });

        $(document).on('click', '#btnAddToCard', function(e) {
            e.preventDefault();
            const url = $(this).attr('href');

            $.ajax({
                type: 'post',
                url: url,
                data: {
                    qty,
                    '_token': '{{ csrf_token() }}'
                },
                success: function() {
                    // 
                }
            })

        });
    </script>
@endsection
