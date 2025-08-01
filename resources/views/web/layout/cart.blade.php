@php
    use App\Models\MyCart;
    $carts = MyCart::where('user_id', 1)->get();

    $totalQty = 0;
    $totalAmt = 0;

    foreach ($carts as $cart) {
        $totalQty += $cart->qty;
        $totalAmt += $cart->qty * $cart->price;
    }
 @endphp

 <ul>
     <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
     <li>
        <a href="{{ route('shop.shoppingCart') }}"><i class="fa fa-shopping-bag"></i>
            <span class="cart-qty">{{ $totalQty }}</span></a>
     </li>
 </ul>
 <div class="header__cart__price">
     item: <span class="cart-amount">{{ number_format($totalAmt, 2) }}</span>
     <span>THB</span>
 </div>
