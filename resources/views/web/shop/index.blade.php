@extends('web.layout.template')

@section('content')

    <!-- Breadcrumb Section Begin -->
    @include('web.common.breadcrumb', [
        'title' => 'Shop'
    ])
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">

                {{-- left --}}
                @include('web.shop.filter')

                {{-- right --}}
                <div class="col-lg-9 col-md-7">

                    {{-- promotion / discount --}}
                    @include('web.shop.promotion')

                    {{-- sort by and result --}}
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>16</span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- products --}}
                    @include('web.shop.product')

                    {{-- pagination --}}
                    <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div>

                </div>

            </div>

        </div>
    </section>
    <!-- Product Section End -->
@endsection
