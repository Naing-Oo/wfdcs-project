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
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                        </div>
                        <a href="#" class="primary-btn">ADD TO CARD</a>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
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
