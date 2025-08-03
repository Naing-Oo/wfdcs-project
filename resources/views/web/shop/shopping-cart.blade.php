@extends('web.layout.template')

@section('content')
    <!-- Breadcrumb Section Begin -->
    @include('web.common.breadcrumb', [
        'title' => 'Vegetable’s Package',
    ])
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                    <tr id="row{{ $cart['id'] }}">
                                        <td class="shoping__cart__item">
                                            <img src="{{ $cart['image'] }}" alt="" width="100" height="100">
                                            <h5>{{ $cart['name'] }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{ number_format($cart['price'], 2) }} THB
                                        </td>
                                        
                                        {{-- qty --}}
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty" data-id="{{ $cart['id'] }}">
                                                    <input type="text" value="{{ $cart['qty'] }}">
                                                </div>
                                            </div>
                                        </td>

                                        <td class="shoping__cart__total">
                                            {{ number_format($cart['total'], 2) }} THB
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <span class="icon_close" 
                                                onclick="remove('{{ route('cart.remove', $cart['id']) }}')">
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>$454.98</span></li>
                            <li>Total <span>$454.98</span></li>
                        </ul>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection

@section('script')
    <script>

        $(document).on('click', '.qtybtn', function(){
            $event = $(this);
            let qty = $event.siblings('input').val();
            const id = $event.parents('.pro-qty').data('id');

            console.log(qty, id);

            update(id, qty);
        });

        function update(id, qty) {
            $.ajax({
                type: 'POST',
                url: `/shop/shopping-cart/${id}/update`,
                data: {
                    '_token': "{{ csrf_token() }}",
                    'qty' : qty
                },
                success: function(res) {
                    alertSuccess(res.message);
                },
                error: function(res) {
                    console.log(res);
                }
            });
        }


        function remove(url) {

            $.ajax({
                type: 'GET',
                url: url,
                success: function(res) {
                    alertSuccess(res.message);

                    // remove tr
                    $(`tr#row${res.id}`).remove();
                },
            });
        }
    </script>
@endsection
